<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage as Storage;
use Image;
use Illuminate\Support\Facades\DB;
use \App\Models\Kegiatan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kegiatanController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		$data = Kegiatan::orderBy('id', 'DESC')->get();
		return view('admin.kegiatan.kegiatan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		return view('admin.kegiatan.insertKegiatan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'judul' => 'required',
			'tgl_publish' => 'required',
			'deskripsi' => 'required',
			'img' => 'image|mimes:jpg,png,jpeg,svg|max:2000',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'image'		=> ':attribute harus berupa file gambar',
			'max'			=> 'ukuran file :attribute maksimal :max Kb'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('kegiatan.create')
				->withErrors($validate)
				->withInput();
		} else {
			// dd($request);
			$image = $request->file('img');
			if(!empty($image)){
				$image->storeAs('public/img/kegiatan', $image->hashName());
				$name = $image->hashName();
			}else{
				$name = '';
			}

			$data = new Kegiatan;
			$data->img = $name;
			$data->title = $request['judul'];
			$data->content = $request['deskripsi'];
			$data->publish_at = date('Y-m-d 00:00:00', strtotime($request['tgl_publish']));
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('kegiatan.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}

	public function show(Request $request, $id)
	{
		$data = Kegiatan::findOrFail($id);
		return view('admin.kegiatan.insertKegiatan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function update(Request $request)
	{
		$rules = array(
			'judul' => 'required',
			'tgl_publish' => 'required',
			'deskripsi' => 'required',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('kegiatan.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			if ($request->hasFile('img')) {
				$rules = array(
					'img' => 'required|image|mimes:jpg,png,jpeg,svg|max:2000',
				);
				$customMessages = [
					'required' 	=> ':attribute harus diisi.',
					'image'		=> ':attribute harus berupa file gambar',
					'max'			=> 'ukuran file :attribute maksimal :max Kb'
			  ];
				$validate = Validator::make($request->all(), $rules, $customMessages);
				if ($validate->fails()) {
					return Redirect::route('kegiatan.create', $request['id'])
						->withErrors($validate)
						->withInput();
				} else {
					//upload new image
					$image = $request->file('img');
					$image->storeAs('public/img/kegiatan', $image->hashName());

					//delete old image
					$data = Kegiatan::where('id',$request['id'])->first();
					Storage::delete('public/img/kegiatan/'.$data['img']);

					//update post with new image
					$data = Kegiatan::FindOrFail($request['id']);
					$data->img = $image->hashName();
					$data->title = $request['judul'];
					$data->content = $request['deskripsi'];
					$data->publish_at = date('Y-m-d 00:00:00', strtotime($request['tgl_publish']));
					$data->updated_at = date('Y-m-d H:i:s');
					$data->update();
					
					return Redirect::route('kegiatan.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
				}
        	} else {
				$data = Kegiatan::FindOrFail($request['id']);
				$data->title = $request['judul'];;
				$data->publish_at = date('Y-m-d 00:00:00', strtotime($request['tgl_publish']));
				$data->content = $request['deskripsi'];
				$data->updated_at = date('Y-m-d H:i:s');
				$data->update();

				// dd($data);
				return Redirect::route('kegiatan.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		  	}
		}
	}

	public function destroy(Request $request, $id)
	{
		$data = Kegiatan::where('id',$request['id'])->first();
		Storage::delete('public/img/kegiatan/'.$data['img']);

		DB::table('kegiatans')->where('id',$id)->delete();

		return Redirect::route('kegiatan.index')->withInput()->with(['message'=>'Data berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Kegiatan::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}

	public function showBerita(Request $request)
	{
		$data = DB::table('kegiatans')->where('id',$request['id'])->first();
		if($request['show']==0){
			$respon['berita'] = $data->content;
		}else{
			$respon['berita'] = \App\Helpers\helper::potong_berita($data->content);
		}

		return json_encode($respon);
	}
	
	public function upload(Request $request)
	{
		if($request->hasFile('upload')) {
			if ($request->file('upload')->getSize() > 2000000){
				return response()->json([
						'error' => 'error',
						'message' => 'Ukuran file Foto harus dibawah 2 MB '
				]);
			}else{
				//get filename with extension
				$filenamewithextension = $request->file('upload')->getClientOriginalName();
		
				//get filename without extension
				$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
		
				//get file extension
				$extension = $request->file('upload')->getClientOriginalExtension();
		
				//filename to store
				$filenametostore = $filename.'_'.time().'.'.$extension;
		
				//Upload File
				$request->file('upload')->storeAs('public/img/kegiatan', $filenametostore);
				$request->file('upload')->storeAs('public/img/kegiatan/thumbnail', $filenametostore);
		
				//Resize image here
				// $thumbnailpath = public_path('storage/img/kegiatan/thumbnail/'.$filenametostore);
				// $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
				// 		$constraint->aspectRatio();
				// });
				// $img->save($thumbnailpath);
		
				echo json_encode([
					'default' => asset('storage/img/kegiatan/'.$filenametostore),
					'500' => asset('storage/img/kegiatan/thumbnail/'.$filenametostore)
				]);
			}
		}
	}

	public function preview($id)
	{
		$data = Kegiatan::FindOrFail($id);
		return json_encode($data);
	}

}

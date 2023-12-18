<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use \App\Models\Pelayanan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelayananController extends Controller
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
		$data = Pelayanan::orderBy('id', 'ASC')->get();
		return view('admin.pelayanan.pelayanan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		return view('admin.pelayanan.insertPelayanan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'deskripsi_singkat' => 'required',
			'icon' => 'required',
			'link' => 'required'
			// 'description' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('pelayanan.create')
				->withErrors($validate)
				->withInput();
		} else {
			$data = new Pelayanan;
			$data->title = $request['title'];
			$data->deskripsi_singkat = $request['deskripsi_singkat'];
			$data->icon = $request['icon'];
			// $data->description = $request['description'];
			$data->link = $request['link'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('pelayanan.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}

	public function show(Request $request, $id)
	{
		$data = Pelayanan::findOrFail($id);
		return view('admin.pelayanan.insertPelayanan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'deskripsi_singkat' => 'required',
			'icon' => 'required',
			'link' => 'required'
			// 'description' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('pelayanan.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			$data = Pelayanan::FindOrFail($request['id']);
			$data->title = $request['title'];
			$data->deskripsi_singkat = $request['deskripsi_singkat'];
			$data->icon = $request['icon'];
			// $data->description = $request['description'];
			$data->link = $request['link'];
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
			
			return Redirect::route('pelayanan.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

	public function destroy(Request $request, $id)
	{
		DB::table('pelayanans')->where('id',$id)->delete();

		return Redirect::route('pelayanan.index')->withInput()->with(['message'=>'Data berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Pelayanan::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}
	
	public function showDesc(Request $request)
	{
		$data = DB::table('pelayanans')->where('id',$request['id'])->first();
		if($request['show']==0){
			$respon['description'] = $data->description;
		}else{
			$respon['description'] = \App\Helpers\helper::potong_berita($data->description);
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
				$request->file('upload')->storeAs('public/img/pelayanan', $filenametostore);
				$request->file('upload')->storeAs('public/img/pelayanan/thumbnail', $filenametostore);
		
				//Resize image here
				// $thumbnailpath = public_path('storage/img/pelayanan/thumbnail/'.$filenametostore);
				// $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
				// 		$constraint->aspectRatio();
				// });
				// $img->save($thumbnailpath);
		
				echo json_encode([
					'default' => asset('storage/img/pelayanan/'.$filenametostore),
					'500' => asset('storage/img/pelayanan/thumbnail/'.$filenametostore)
				]);
			}
		}
	}

	public function preview($id)
	{
		$data = Pelayanan::FindOrFail($id);
		return json_encode($data);
	}
	
}

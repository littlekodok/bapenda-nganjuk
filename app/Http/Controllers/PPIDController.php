<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage as Storage;
use Image;
use Illuminate\Support\Facades\DB;
use \App\Models\Ppid;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PPIDController extends Controller
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
		$data = Ppid::orderBy('id', 'ASC')->get();
		return view('admin.ppid.ppid', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		$group = DB::select('SELECT DISTINCT ppids.group FROM ppids WHERE isactive = 1');
		return view('admin.ppid.insertPpid', [
			'data' => $data,
			'group' => $group,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'group' => 'required',
			'pdf' => 'mimes:pdf|max:1000',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'mimes'		=> ':attribute harus berupa file pdf',
			'max'			=> 'ukuran file :attribute maksimal :max Kb'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('ppid.create')
				->withErrors($validate)
				->withInput();
		} else {
			// dd($request);
			if(empty($request['title'])){
				$title = $request['group'];
			}else{
				$title = $request['title'];
			}
			$name = str_replace(' ','_',$title);
			$pdffile = $request->file('pdf');
			if (!empty($pdffile)){
				$pdffile->storeAs('public/pdf', $name.'.pdf');
				$name = $name.'.pdf';
			}else{
				$name = null;
			}
			$data = new PPID;
			$data->file = $name;
			$data->group = $request['group'];
			$data->title = $title;
			$data->description = $request['description'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('ppid.index')->withInput()->with(['message'=>'Data berhasil disimpan','status'=>true]);
		}
	}
	
	public function show(Request $request, $id)
	{
		$data = Ppid::findOrFail($id);
		$group = DB::select('SELECT DISTINCT ppids.group FROM ppids WHERE isactive = 1');
		return view('admin.ppid.insertPpid', [
			'data' => $data,
			'group' => $group,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request)
	{
		$rules = array(
			'group' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('ppid.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {

			if(empty($request['title'])){
				$title = $request['group'];
			}else{
				$title = $request['title'];
			}

			if ($request->hasFile('pdf')) {
				$rules = array(
					'pdf' => 'mimes:pdf|max:1000',
				);
				$customMessages = [
					'mimes'		=> ':attribute harus berupa file pdf',
					'max'			=> 'ukuran file :attribute maksimal :max Kb'
				];
				$validate = Validator::make($request->all(), $rules, $customMessages);
				if ($validate->fails()) {
					return Redirect::route('ppid.show', $request['id'])
						->withErrors($validate)
						->withInput();
				} else {
					$name = str_replace(' ','_',$title);
					$pdffile = $request->file('pdf');
					$pdffile->storeAs('public/pdf', $name.'.pdf');

					//delete old image
					$data = Ppid::where('id',$request['id'])->first();
					Storage::delete('public/pdf/'.$data['pdf']);

					//update post with new image
					$data = Ppid::FindOrFail($request['id']);
					$data->file = $name.'.pdf';
					$data->group = $request['group'];
					$data->title = $title;
					$data->description = $request['description'];
					$data->updated_at = date('Y-m-d H:i:s');
					$data->update();
					
					return Redirect::route('ppid.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
				}
        	} else {
				$data = Ppid::FindOrFail($request['id']);
				$data->group = $request['group'];
				$data->title = $title;
				$data->description = $request['description'];
				$data->updated_at = date('Y-m-d H:i:s');
				$data->update();

				return Redirect::route('ppid.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		  	}
		}
	}

	public function destroy(Request $request, $id)
	{
		$data = Ppid::where('id',$request['id'])->first();
		Storage::delete('public/pdf/'.$data['pdf']);

		DB::table('ppids')->where('id',$id)->delete();

		return Redirect::route('ppid.index')->withInput()->with(['message'=>'Data telah berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Ppid::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

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
				$request->file('upload')->storeAs('public/img/ppid', $filenametostore);
				$request->file('upload')->storeAs('public/img/ppid/thumbnail', $filenametostore);
		
				//Resize image here
				// $thumbnailpath = public_path('storage/img/ppid/thumbnail/'.$filenametostore);
				// $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
				// 		$constraint->aspectRatio();
				// });
				// $img->save($thumbnailpath);
		
				echo json_encode([
					'default' => asset('storage/img/ppid/'.$filenametostore),
					'500' => asset('storage/img/ppid/thumbnail/'.$filenametostore)
				]);
			}
		}
	}

	public function preview($id)
	{
		$data = Ppid::FindOrFail($id);
		return json_encode($data);
	}
}
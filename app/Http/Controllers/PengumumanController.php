<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Models\Masterbroadcast;
use \App\Models\Broadcast;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		$data['master'] = Masterbroadcast::first();
		$data['pengumuman'] = Broadcast::get();
		return view('admin.pengumuman.pengumuman', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		return view('admin.pengumuman.insertPengumuman', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
      //   dd($request);
		$rules = array(
			'title' => 'required',
			'description' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('pengumuman.create')
				->withErrors($validate)
				->withInput();
		} else {
			$data = new Broadcast;
			$data->title = $request['title'];
			$data->description = $request['description'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('pengumuman.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}

	public function show(Request $request, $id)
	{
		$data = Broadcast::findOrFail($id);
		return view('admin.pengumuman.insertPengumuman', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'description' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('pengumuman.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			$data = Broadcast::FindOrFail($request['id']);
			$data->title = $request['title'];
			$data->description = $request['description'];
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
			
			return Redirect::route('pengumuman.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

	public function destroy(Request $request, $id)
	{
		DB::table('broadcasts')->where('id',$id)->delete();

		return Redirect::route('pengumuman.index')->withInput()->with(['message'=>'Data berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Broadcast::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}

	public function masterisActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}

		$data = Masterbroadcast::FindOrFail($request['id']);
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
				$request->file('upload')->storeAs('public/img/pengumuman', $filenametostore);
				$request->file('upload')->storeAs('public/img/pengumuman/thumbnail', $filenametostore);
		
				//Resize image here
				// $thumbnailpath = public_path('storage/img/pengumuman/thumbnail/'.$filenametostore);
				// $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
				// 		$constraint->aspectRatio();
				// });
				// $img->save($thumbnailpath);
		
				echo json_encode([
					'default' => asset('storage/img/pengumuman/'.$filenametostore),
					'500' => asset('storage/img/pengumuman/thumbnail/'.$filenametostore)
				]);
			}
		}
	}

	public function preview($id)
	{
		$data = Broadcast::FindOrFail($id);
		return json_encode($data);
	}
}

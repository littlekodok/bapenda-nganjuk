<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use \App\Models\Visi;
use \App\Models\Misi;
use Illuminate\Support\Facades\Auth;

class VisiMisiController extends Controller
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

	public function index($id = null){
		$from = $id;
		$visi = Visi::orderBy('id', 'DESC')->first();
		$misi = Misi::orderBy('id', 'DESC')->get();
		return view('admin.visimisi.visimisi', [
			'from' => $from,
			'visi' => $visi,
			'misi' => $misi,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function createVisi()
	{
		$data = ['id'=>'', 'textfirst'=>'', 'textalternative'=>'', 'textsecond'=>'', 'textanimation'=>''];
		return view('admin.visimisi.visi', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function insertVisi(Request $request)
	{
		$rules = array(
			'textone' => 'required',
			'texttwo' => 'required',
			'textthree' => 'required',
			'textfour' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('visi.create')
				->withErrors($validate)
				->withInput();
		} else {
			$data = new Visi;
			$data->textfirst = $request['textone'];
			$data->textalternative = $request['texttwo'];
			$data->textsecond = $request['textthree'];
			$data->textanimation = $request['textfour'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();

			return Redirect::route('visimisi.index')->withInput()->with(['message'=>'Data berhasil disimpan','status'=>true]);
		}
	}

	public function updateVisi(Request $request)
	{
		$id 		= $request->id;
		$text 	= $request->text;
		$column	= $request->column;

		if($column == 'textanimation'){
			$text = str_replace(' ', '', $text);
		}

		$data = Visi::findOrFail($id);
		$data->$column = $text;
		$data->updated_at = date('Y-m-d H:i:s');
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";
		// return json_encode($respon = ['message'=>$id.' '.$text.' '.$column]);

		return json_encode($respon);
	}

	public function createMisi()
	{
		$data = ['id'=>'', 'periode'=>'', 'description'=>''];
		return view('admin.visimisi.misi', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function insertMisi(Request $request)
	{
		// dd($request['yearStart'],$request['yearEnd'],$request['misi']);
		$rules = array(
			'yearStart' => 'required',
			'yearEnd' => 'required',
			'misi' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('misi.create')
				->withErrors($validate)
				->withInput();
		} else {
			$periode = $request['yearStart'].' - '.$request['yearEnd'];
			$data = new Misi;
			$data->periode = $periode;
			$data->description = $request['misi'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			$val = 'misi';
			return Redirect::route('visimisi.index',$val)->withInput()->with(['message'=>'Data berhasil disimpan','status'=>true]);
		}
	}

	public function showMisi($id)
	{
		$data = Misi::findOrFail($id);
		return view('admin.visimisi.misi', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function updateMisi(Request $request)
	{
		$rules = array(
			'yearStart' => 'required',
			'yearEnd' => 'required',
			'misi' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('misi.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			$periode = $request['yearStart'].' - '.$request['yearEnd'];
			$data = Misi::FindOrFail($request['id']);
			$data->periode = $periode;
			$data->description = $request['misi'];
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
			
			$val = 'misi';
			return Redirect::route('visimisi.index',$val)->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

	public function destroyMisi(Request $request, $id)
    {
        DB::table('misi')->where('id',$id)->delete();

		  $val = 'misi';
		  return Redirect::route('visimisi.index',$val)->withInput()->with(['message'=>'Data telah berhasil dihapus.','status'=>true]);
    }

	 public function uploadMisi(Request $request)
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
				$request->file('upload')->storeAs('public/img/misi', $filenametostore);
				$request->file('upload')->storeAs('public/img/misi/thumbnail', $filenametostore);
		
				//Resize image here
				// $thumbnailpath = public_path('storage/img/misi/thumbnail/'.$filenametostore);
				// $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
				// 		$constraint->aspectRatio();
				// });
				// $img->save($thumbnailpath);
		
				echo json_encode([
					'default' => asset('storage/img/misi/'.$filenametostore),
					'500' => asset('storage/img/misi/thumbnail/'.$filenametostore)
				]);
			}
		 }
	 }
 
	 public function previewMisi($id)
	 {
		 $data = Misi::FindOrFail($id);
		 return json_encode($data);
	 }
}

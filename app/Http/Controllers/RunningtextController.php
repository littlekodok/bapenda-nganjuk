<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use \App\Models\Runningtext;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RunningtextController extends Controller
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
		$data = Runningtext::orderBy('id', 'DESC')->get();
		return view('admin.runningtext.runningtext', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		return view('admin.runningtext.insertRunningtext', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'description' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('runningtext.create')
				->withErrors($validate)
				->withInput();
		} else {
			$data = new Runningtext;
			$data->title = $request['title'];
			$data->description = $request['description'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('runningtext.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}

	public function show(Request $request, $id)
	{
		$data = Runningtext::findOrFail($id);
		return view('admin.runningtext.insertRunningtext', [
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
			return Redirect::route('runningtext.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			$data = Runningtext::FindOrFail($request['id']);
			$data->title = $request['title'];
			$data->description = $request['description'];
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
			
			return Redirect::route('runningtext.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

	public function destroy(Request $request, $id)
	{
		DB::table('runningtexts')->where('id',$id)->delete();

		return Redirect::route('runningtext.index')->withInput()->with(['message'=>'Data telah berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Runningtext::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use \App\Models\Social;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
		$data = Social::orderBy('id', 'ASC')->get();
		return view('admin.social.social', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data = ['id'=>''];
		return view('admin.social.insertSocial', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'icon' => 'required',
			'url' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('social.create')
				->withErrors($validate)
				->withInput();
		} else {
			$data = new Social;
			$data->title = $request['title'];
			$data->icon = $request['icon'];
			$data->url = $request['url'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('social.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}

	public function show(Request $request, $id)
	{
		$data = Social::findOrFail($id);
		return view('admin.social.insertSocial', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'icon' => 'required',
			'url' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('social.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			$data = Social::FindOrFail($request['id']);
			$data->title = $request['title'];
			$data->icon = $request['icon'];
			$data->url = $request['url'];
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
			
			return Redirect::route('social.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

	public function destroy(Request $request, $id)
	{
		DB::table('socials')->where('id',$id)->delete();

		return Redirect::route('social.index')->withInput()->with(['message'=>'Data berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Social::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}
}

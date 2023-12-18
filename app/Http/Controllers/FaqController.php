<?php

namespace App\Http\Controllers;

use App\Models\Faq;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect as Redirect;

class FaqController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
    public function index(){
		$data = Faq::orderBy('id', 'DESC')->get();
		return view('admin.faq.faq', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	public function create()
	{
		$data = ['id'=>''];
		return view('admin.faq.insertFaq', [
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
			
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('faq.create')
				->withErrors($validate)
				->withInput();
		} else {
			// dd($request);
			
			$data = new Faq;
			$data->title = $request['judul'];
			$data->deskripsi = $request['deskripsi'];
			$data->publish_at = date('Y-m-d 00:00:00', strtotime($request['tgl_publish']));
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('faq.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}
	public function show(Request $request, $id)
	{
		$data = Faq::findOrFail($id);
		return view('admin.faq.insertFaq', [
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
			return Redirect::route('faq.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			
				$data = Faq::FindOrFail($request['id']);
				$data->title = $request['judul'];;
				$data->publish_at = date('Y-m-d 00:00:00', strtotime($request['tgl_publish']));
				$data->deskripsi = $request['deskripsi'];
				$data->updated_at = date('Y-m-d H:i:s');
				$data->update();

				return Redirect::route('faq.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		  	}
		
	}
	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Faq::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}
	public function preview(Request $request)
	{
		$data = Faq::FindOrFail($request->get('id'));
		// dd($request->get('id'));
		return json_encode($data);
	}

	public function destroy(Request $request, $id)
	{
		$data = Faq::where('id',$request['id'])->first();
		

		DB::table('faqs')->where('id',$id)->delete();

		return Redirect::route('faq.index')->withInput()->with(['message'=>'Data berhasil dihapus.','status'=>true]);
	}
	
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\DB;
use \App\Models\Header;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeaderController extends Controller
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
		$data = Header::orderBy('id', 'DESC')->first();
		return view('admin.header.header', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		return view('admin.header.insertHeader');
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'text_judul' => 'required',
			'text_putih' => 'required',
			'text_merah' => 'required',
			'text_slogan' => 'required',
			'background' => 'required|image|mimes:jpg,png,jpeg,svg|max:2000',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'image'		=> ':attribute harus berupa file gambar',
			'max'			=> 'ukuran file :attribute maksimal :max Kb'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('header.create')
				->withErrors($validate)
				->withInput();
		} else {
			// dd($request);
			$image = $request->file('background');
			$image->storeAs('public/img', $image->hashName());

			$data = new Header;
			$data->background = $image->hashName();
			$data->linefirst = $request['text_judul'];
			$data->linesecondw = $request['text_putih'];
			$data->linesecondr = $request['text_merah'];
			$data->linethrith = $request['text_slogan'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('header.index')->withInput()->with(['message'=>'Data berhasil disimpan.','status'=>true]);
		}
	}

	public function update(Request $request)
	{
		$id 		= $request->id;
		$text 	= $request->text;
		$column	= $request->column;
		
		if($column == 'linesecond'){
			$textTwo = explode('_', $text);
			$data = Header::findOrFail($id);
			$data->linesecondw = $textTwo[0];
			$data->linesecondr = $textTwo[1];
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
		}else{
			$data = Header::findOrFail($id);
			$data->$column = $text;
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
		}

		$respon['message'] = "Data berhasil diperbaharui";
		// return json_encode($respon = ['message'=>$id.' '.$text.' '.$column]);

		return json_encode($respon);
	}

	public function updateBg(Request $request)
	{
		$rules = array(
			'background' => 'required|image|mimes:jpg,png,jpeg,svg|max:2000',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'image'		=> ':attribute harus berupa file gambar',
			'max'			=> 'ukuran file :attribute maksimal :max Kb'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('header.index')
				->withErrors($validate)
				->withInput();
		} else {
			$image = $request->file('background');
			$image->storeAs('public/img', $image->hashName());

			//delete old image
			$data = Header::where('id',$request['id'])->first();
			// dd($request['id'], $data);
			Storage::delete('public/img/'.$data['background']);

			//update post with new image
			$data = Header::FindOrFail($request['id']);
			$data->background = $image->hashName();
			$data->updated_at = date('Y-m-d H:i:s');
			$data->update();
			
			return Redirect::route('header.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

}

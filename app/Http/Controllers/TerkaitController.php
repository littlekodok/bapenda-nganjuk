<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\DB;
use \App\Models\Terkait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerkaitController extends Controller
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
		$data = Terkait::orderBy('id', 'ASC')->get();
		return view('admin.terkait.terkait', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		return view('admin.terkait.insertTerkait', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'brand' => 'required',
			'caption' => 'required',
			'link' => 'required',
			'img' => 'required|image|mimes:jpg,png,jpeg,svg|max:1000',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'image'		=> ':attribute harus berupa file gambar',
			'max'			=> 'ukuran file :attribute maksimal :max Kb'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('terkait.create')
				->withErrors($validate)
				->withInput();
		} else {
			// dd($request);
			$image = $request->file('img');
			$image->storeAs('public/img', $image->hashName());

			$data = new Terkait;
			$data->img = $image->hashName();
			$data->brand = $request['brand'];
			$data->caption = $request['caption'];
			$data->link = $request['link'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			
			return Redirect::route('terkait.index')->withInput()->with(['message'=>'Data berhasil disimpan','status'=>true]);
		}
	}

	public function show(Request $request, $id)
	{
		$data = Terkait::findOrFail($id);
		return view('admin.terkait.insertTerkait', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request)
	{
		$rules = array(
			'brand' => 'required',
			'caption' => 'required',
			'link' => 'required',
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'image'		=> ':attribute harus berupa file gambar',
			'max'			=> 'ukuran file :attribute maksimal :max Kb'
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('terkait.show', $request['id'])
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
					return Redirect::route('terkait.show', $request['id'])
						->withErrors($validate)
						->withInput();
				} else {

					//upload new image
					$image = $request->file('img');
					$image->storeAs('public/img', $image->hashName());

					//delete old image
					$data = Terkait::where('id',$request['id'])->first();
					Storage::delete('public/img/'.$data['img']);

					//update post with new image
					$data = Terkait::FindOrFail($request['id']);
					$data->img = $image->hashName();
					$data->brand = $request['brand'];
					$data->caption = $request['caption'];
					$data->link = $request['link'];
					$data->updated_at = date('Y-m-d H:i:s');
					$data->update();
					
					return Redirect::route('terkait.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
				}
			} else {
				$data = Terkait::FindOrFail($request['id']);
				$data->brand = $request['brand'];
				$data->caption = $request['caption'];
				$data->link = $request['link'];
				$data->updated_at = date('Y-m-d H:i:s');
				$data->update();

				return Redirect::route('terkait.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
			}
		}
	}

	public function destroy(Request $request, $id)
	{
		$data = Terkait::where('id',$request['id'])->first();
		Storage::delete('public/img/'.$data['img']);

		DB::table('terkaits')->where('id',$id)->delete();

		return Redirect::route('terkait.index')->withInput()->with(['message'=>'Data telah berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = Terkait::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}
	
}

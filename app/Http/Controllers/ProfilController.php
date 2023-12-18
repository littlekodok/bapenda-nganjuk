<?php

namespace App\Http\Controllers;

use \App\Models\Misi;
use \App\Models\Ppid;
use \App\Models\Visi;
use \App\Models\Header;
use \App\Models\Social;
use \App\Models\Terkait;
use \App\Models\Kegiatan;
use \App\Models\Broadcast;
use \App\Models\Pelayanan;
use App\Models\KepalaBadan;
use \App\Models\Runningtext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Redirect as Redirect;


class ProfilController extends Controller
{
	public function index($id = null)
	{
		$from = $id;
		$visi = Visi::orderBy('id', 'DESC')->first();
		$kepalaBadan = KepalaBadan::orderBy('id', 'DESC')->get();
		return view('admin.profile.profile', [
			'from' => $from,
			'visi' => $visi,
			'kepalaBadan' => $kepalaBadan,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	public function createKepalaBadan()
	{
		$data = ['id' => '', 'periode' => '', 'description' => ''];
		return view('admin.profile.kepalabadan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	public function insert(Request $request)
	{
		$rules = array(
			'yearStart' => 'required',
			'yearEnd' => 'required',
			'nama' => 'required',
			'description' => 'required',
			'foto' => 'image|mimes:jpg,png,jpeg,svg|max:2000',
		);
		$customMessages = [
			'required'     => ':attribute harus diisi.',
			'image'        => ':attribute harus berupa file gambar',
			'max'        => 'ukuran file :attribute maksimal :max Kb'
		];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('kepala-badan.create')
				->withErrors($validate)
				->withInput();
		} else {
			// dd($request);
			$image = $request->file('foto');
			if (!empty($image)) {
				$image->storeAs('public/img/kepalabadan', $image->hashName());
				$name = $image->hashName();
			} else {
				$name = '';
			}

			$periode = $request['yearStart'] . ' - ' . $request['yearEnd'];
			$data = new KepalaBadan;
			$data->periode = $periode;
			$data->foto = $name;
			$data->nama = $request['nama'];
			$data->description = $request['description'];
			$data->created_at = date('Y-m-d H:i:s');
			$data->save();
			// dd($data);
			return Redirect::route('profil.index')->withInput()->with(['message' => 'Data berhasil disimpan.', 'status' => true]);
		}
	}
	public function show($id)
	{
		$data = kepalaBadan::findOrFail($id);
		return view('admin.profile.kepalabadan', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	public function update(Request $request)
	{
		$rules = array(
			'yearStart' => 'required',
			'yearEnd' => 'required',
			'nama' => 'required',
			'description' => 'required',
		);
		$customMessages = [
			'required'     => ':attribute harus diisi.'
		];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('kepalabadan.edit', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			if ($request->hasFile('foto')) {
				$rules = array(
					'foto' => 'required|image|mimes:jpg,png,jpeg,svg|max:2000',
				);
				$customMessages = [
					'required'     => ':attribute harus diisi.',
					'image'        => ':attribute harus berupa file gambar',
					'max'        => 'ukuran file :attribute maksimal :max Kb'
				];
				$validate = Validator::make($request->all(), $rules, $customMessages);
				if ($validate->fails()) {
					return Redirect::route('kepala-badan.edit', $request['id'])
						->withErrors($validate)
						->withInput();
				} else {
					//upload new image
					$image = $request->file('foto');
					$image->storeAs('public/img/kepalabadan', $image->hashName());

					//delete old image
					$data = KepalaBadan::where('id', $request['id'])->first();
					Storage::delete('public/img/kepalabadan/' . $data['foto']);

					//update post with new image
					$periode = $request['yearStart'] . ' - ' . $request['yearEnd'];
					$data = KepalaBadan::FindOrFail($request['id']);
					$data->periode = $periode;
					$data->foto = $image->hashName();
					$data->nama = $request['nama'];
					$data->description = $request['description'];
					$data->updated_at = date('Y-m-d H:i:s');
					$data->update();

					return Redirect::route('profil.index')->withInput()->with(['message' => 'Data berhasil diperbaharui.', 'status' => true]);
				}
			} else {
				$periode = $request['yearStart'] . ' - ' . $request['yearEnd'];
				$data = KepalaBadan::FindOrFail($request['id']);
				$data->periode = $periode;
				$data->nama = $request['nama'];
				$data->description = $request['description'];
				$data->updated_at = date('Y-m-d H:i:s');
				$data->update();

				// dd($data);
				return Redirect::route('profil.index')->withInput()->with(['message' => 'Data berhasil diperbaharui.', 'status' => true]);
			}
		}
	}
	public function bapenda()
	{
		$data = [];

		$data['header']             = Header::orderBy('id', 'DESC')->first();
		$data['visi']               = Visi::orderBy('id', 'DESC')->first();
		$data['misi']               = Misi::where('isactive', 1)->orderBy('id', 'DESC')->first();
		$data['kegiatan']           = Kegiatan::where('publish_at', '<=', date('Y-m-d 23:59:59'))->where('isactive', 1)->where('id', '2')->orderBy('id', 'ASC')->first();
		$data['pelayanan']          = Pelayanan::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['ppid']               = Ppid::where('isactive', 1)->orderBy('group', 'ASC')->distinct('group')->get();
		$data['terkait']            = Terkait::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['runningtext']        = Runningtext::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['masterpengumuman']   = DB::select('Select isactive From masterbroadcasts');
		$data['pengumuman']         = Broadcast::where('isactive', 1)->orderBy('id', 'DESC')->first();
		$data['sosial']             = Social::where('isactive', 1)->orderBy('id')->get();

		// dd($data['kegiatan']['img']);
		return view('profile.bapenda', [
			'data' => $data
		]);
	}
	public function kepalaBadan()
	{
		$data = [];
		$data['header']             = Header::orderBy('id', 'DESC')->first();
		$data['visi']               = Visi::orderBy('id', 'DESC')->first();
		$data['misi']               = Misi::where('isactive', 1)->orderBy('id', 'DESC')->first();
		$data['kegiatan']           = Kegiatan::where('publish_at', '<=', date('Y-m-d 23:59:59'))->where('isactive', 1)->where('id', '2')->orderBy('id', 'ASC')->first();
		$data['pelayanan']          = Pelayanan::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['ppid']               = Ppid::where('isactive', 1)->orderBy('group', 'ASC')->distinct('group')->get();
		$data['terkait']            = Terkait::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['runningtext']        = Runningtext::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['masterpengumuman']   = DB::select('Select isactive From masterbroadcasts');
		$data['pengumuman']         = Broadcast::where('isactive', 1)->orderBy('id', 'DESC')->first();
		$data['sosial']             = Social::where('isactive', 1)->orderBy('id')->get();
		$data['kepalabadan']        = KepalaBadan::orderBy('id', 'DESC')->first();

		// dd($data['kegiatan']['img']);
		return view('profile.kepalabadan', [
			'data' => $data
		]);
	}
	public function sekretariat()
	{
		$data = [];
		$data['header']             = Header::orderBy('id', 'DESC')->first();
		$data['visi']               = Visi::orderBy('id', 'DESC')->first();
		$data['misi']               = Misi::where('isactive', 1)->orderBy('id', 'DESC')->first();
		$data['kegiatan']           = Kegiatan::where('publish_at', '<=', date('Y-m-d 23:59:59'))->where('isactive', 1)->where('id', '2')->orderBy('id', 'ASC')->first();
		$data['pelayanan']          = Pelayanan::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['ppid']               = Ppid::where('isactive', 1)->orderBy('group', 'ASC')->distinct('group')->get();
		$data['terkait']            = Terkait::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['runningtext']        = Runningtext::where('isactive', 1)->orderBy('id', 'ASC')->get();
		$data['masterpengumuman']   = DB::select('Select isactive From masterbroadcasts');
		$data['pengumuman']         = Broadcast::where('isactive', 1)->orderBy('id', 'DESC')->first();
		$data['sosial']             = Social::where('isactive', 1)->orderBy('id')->get();


		// dd($data['kegiatan']['img']);
		return view('profile.sekretariat', [
			'data' => $data
		]);
	}
	public function previewKepalaBadan($id)
	{
		$data = KepalaBadan::FindOrFail($id);
		return json_encode($data);
	}
}

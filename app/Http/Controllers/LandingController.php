<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use \App\Models\Misi;
use \App\Models\Ppid;
use \App\Models\Visi;
use \App\Models\Header;
use \App\Models\Social;
use \App\Models\Terkait;
use \App\Models\Kegiatan;
use \App\Models\Broadcast;
use \App\Models\Pelayanan;
use \App\Models\Runningtext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Support\Facades\Redirect as Redirect;

class LandingController extends Controller
{
    public function index(){
        $data = [];

		$data['header']             = Header::orderBy('id', 'DESC')->first();
        $data['visi']               = Visi::orderBy('id', 'DESC')->first();
		$data['misi']               = Misi::where('isactive',1)->orderBy('id', 'DESC')->first();
        $data['kegiatan']           = Kegiatan::where('publish_at','<=',date('Y-m-d 23:59:59'))->where('isactive',1)->orderBy('id', 'DESC')->limit(4)->get();
        $data['pelayanan']          = Pelayanan::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['ppid']               = Ppid::where('isactive',1)->orderBy('group', 'ASC')->distinct('group')->get('group');
        $data['terkait']            = Terkait::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['runningtext']        = Runningtext::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['masterpengumuman']   = DB::select('Select isactive From masterbroadcasts');
        $data['pengumuman']         = Broadcast::where('isactive',1)->orderBy('id', 'DESC')->first();
        $data['sosial']             = Social::where('isactive',1)->orderBy('id')->get();
        $data['faq']                = Faq::where('isactive',1)->orderBy('id')->get();

        
        // dd($data['ppid']);

		return view('landing', [
			'data' => $data
		]);
	}

    public function show($id)
    {
        $data = DB::table('kegiatans')->where('id',$id)->first();
		return json_encode($data);
    }

    public function PPIDShow($group)
    {
        $data = DB::table('ppids')->where('group','LIKE',$group)->get();
		return json_encode($data);
    }

    public function surveyShow()
    {

        $data['terkait']            = Terkait::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['runningtext']        = Runningtext::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['sosial']             = Social::where('isactive',1)->orderBy('id')->get();

		return view('survey', [
			'data' => $data
		]);
    }

    public function kegiatanShow()
    {

        $data['terkait']            = Terkait::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['runningtext']        = Runningtext::where('isactive',1)->orderBy('id', 'ASC')->get();
        $data['sosial']             = Social::where('isactive',1)->orderBy('id')->get();
        $data['kegiatan']           = Kegiatan::where('isactive',1)->orderByDesc('publish_at')->get();

        return view('kegiatan', [
            'data' => $data
        ]);
    }
}

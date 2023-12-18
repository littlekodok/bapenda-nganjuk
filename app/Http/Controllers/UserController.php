<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
		$data = User::orderBy('id', 'DESC')->get();
		return view('admin.user.user', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function create()
	{
		$data = ['id'=>''];
		return view('admin.user.insertUser', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}
	
	public function insert(Request $request)
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email:rfc,dns|unique:users,email',
			'password' => [
				'required',
				Password::min(8)
					 ->letters()
					 ->mixedCase()
					 ->numbers()
					 ->symbols()
					 ->uncompromised()
		  ],
		  'repassword' => 'required'
		);
		$customMessages = [
			'required' 	=> ':attribute harus diisi.',
			'password.min' => 'Password minimal :min karakter',
			'password.letters' => 'Password harus terdapat karakter huruf',
			'password.mixedCase' => 'Password harus terdapat karakter huruf, angka dan simbol',
			'password.numbers' => 'Password harus terdapat karakter angka',
			'password.symbols' => 'Password harus terdapat karakter simbol',
	  ];
		$validate = Validator::make($request->all(), $rules, $customMessages);
		if ($validate->fails()) {
			return Redirect::route('user.create')
				->withErrors($validate)
				->withInput();
		} else {
            if ($request['password']==$request['repassword']){
                $data = new User;
                $data->name = $request['name'];
                $data->email = $request['email'];
                $data->password = Hash::make($request['password']);
                $data->created_at = date('Y-m-d H:i:s');
                $data->save();
                
                return Redirect::route('user.index')->withInput()->with(['message'=>'Data berhasil disimpan','status'=>true]);
            }else{
                return Redirect::route('user.create')
						->withErrors('Password dengan repassword tidak sama.')
						->withInput();
                // return Redirect::route('user.index')->withInput()->with(['message'=>,'status'=>true]);
            }
		}
	}

	public function show(Request $request, $id)
	{
		$data = User::findOrFail($id);
		return view('admin.user.insertUser', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request)
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required',
		);
		$validate = Validator::make($request->all(), $rules);
		if ($validate->fails()) {
			return Redirect::route('user.show', $request['id'])
				->withErrors($validate)
				->withInput();
		} else {
			if(empty($request['password'])){
                $user = User::findOrFail($request['id']);
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->updated_at = date('Y-m-d H:i:s');
                $user->update();
            }else{
					$rulesPas = array(
						'password' => [
							'required',
							Password::min(8)
								 ->letters()
								 ->mixedCase()
								 ->numbers()
								 ->symbols()
								 ->uncompromised()
					  ],
					  'repassword' => 'required|same:password'
					);
					$customMessages = [
						'required' 	=> ':attribute harus diisi.',
						'password.min' => 'Password minimal :min karakter',
						'password.letters' => 'Password harus terdapat karakter huruf',
						'password.mixedCase' => 'Password harus terdapat karakter huruf, angka dan simbol',
						'password.numbers' => 'Password harus terdapat karakter angka',
						'password.symbols' => 'Password harus terdapat karakter simbol',
				  ];
					$validatePas = Validator::make($request->all(), $rulesPas, $customMessages);
					if ($validatePas->fails()) {
						return Redirect::route('user.show', $request['id'])
							->withErrors($validatePas)
							->withInput();
					} else {
						$user = User::findOrFail($request['id']);
						$user->name = $request['name'];
						$user->email = $request['email'];
						$user->password = Hash::make($request['password']);
						$user->updated_at = date('Y-m-d H:i:s');
						$user->update();
					}
            }
            return Redirect::route('user.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
		}
	}

	public function destroy(Request $request, $id)
	{
		DB::table('users')->where('id',$id)->delete();

		return Redirect::route('user.index')->withInput()->with(['message'=>'Data telah berhasil dihapus.','status'=>true]);
	}

	public function isActive(Request $request)
	{
		if($request['isactive'] == 1){
			$isactive = 0;
		}else{
			$isactive = 1;
		}
		$data = User::FindOrFail($request['id']);
		$data->isactive = $isactive;
		$data->update();

		$respon['message'] = "Data berhasil diperbaharui";

		return json_encode($respon);
	}
}

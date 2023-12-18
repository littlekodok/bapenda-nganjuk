<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect as Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
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
		$data = User::where('id',Auth::user()->id)->first();
		return view('admin.account', [
			'data' => $data,
			'isAdmin' => Auth::user()->isAdmin
		]);
	}

	public function update(Request $request){
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
			  ]
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
				return Redirect::route('account.index')
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
		return Redirect::route('account.index')->withInput()->with(['message'=>'Data berhasil diperbaharui.','status'=>true]);
	}
}

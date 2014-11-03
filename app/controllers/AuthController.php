<?php

class AuthController extends BaseController {
	
	public function getLogin() {
		return View::make('login');
	}

	public function postLogin() {
		$rules = array('username' => 'required', 'password' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::route('login')->withErrors($validator);
		}

		$auth = Auth::attempt(array(
			'name' => Input::get('username'),
			'password' => Input::get('password') 
		), false);

		if(!$auth) {
			return Redirect::route('login')->withErrors(array(
				'Invalid credentials were provided.'
			));
		}

		return Redirect::route('home');
	}

	public function getRegister() {
		return View::make('register');
	}

	public function postRegister() {
		$rules = array('name' => 'required|min:3|max:32|unique:users', 
					   'password' => 'required|min:8',
					   'confirmPassword' => 'required|same:password',
					   'email' => 'required|email');
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::route('register')->withErrors($validator);
		}

		$user = new User;
		$user->name = Input::get('name');
		$user->password = Hash::make(Input::get('password'));
		$user->email = Input::get('email');

		$user->save();

		return Redirect::route('login');

	}

}
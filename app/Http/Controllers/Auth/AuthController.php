<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

   // use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth){
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin(){

        return view('auth.login');
    }

    public function postLogin(Request $request){
        //VALIDATION
        $rules = array(
            'username'          => 'required',
            'password'          => 'required'
        );

        $messages = array(
            'username.required'     => trans('auth.usernameRequired'),
            'password.required'     => trans('auth.passwordRequired')
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) { 
            return redirect('login')->withErrors($validator);
        }

        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect('/');
        }

        return redirect('login')
                    ->withInput($request->only('username', 'remember'))
                    ->withErrors([
                        'username' => trans('auth.failedLogin'),
                    ]);
    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
}

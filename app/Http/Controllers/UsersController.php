<?php 
namespace App\Http\Controllers;
use Response;
use Request;
use Hash;
use Validator;
use Auth;
use App\User;
use App\Role;

class UsersController extends Controller {


	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex(){
		$listData =  User::get();
		return View('app.users.list',['listData' => $listData]);
	}

	public function getNew() {
		$roles 	= Role::get();
		return View('app.users.new',['roles' => $roles]);
	}

	public function postNew(){
		$data = Request::all();
		
		//Validation
		$rules 	= [ 
			'username' 	=> 'required|unique:users|min:5',
			'email'		=> 'required|email|unique:users',
			'password'	=> 'required|min:6',
			'role_id'	=> 'not_in:0'
		];

		$messages 	= [
			'username.required' 	=> trans('app.username_required'),
			'username.unique' 		=> trans('app.username_unique'),
			'username.min' 			=> trans('app.username_min'),
			'email.required'		=> trans('app.email_required'),
			'email.email'			=> trans('app.valid_email'),
			'email.unique' 			=> trans('app.email_unique'),
			'password.required'		=> trans('app.password_required'),
			'password.min'			=> trans('app.password_min'),
			'role_id.not_in'		=> trans('app.choose_role')
		];

		$validator = Validator::make($data, $rules, $messages);

		if ($validator->fails()) {
			return redirect('users/new')->withErrors($validator)->withInput();
		}

		$data['password']	= Hash::make(Request::get('password'));
		
		$user = User::create($data);

		return redirect()->route('users.index')->with('successMsg',trans('app.add_save_success'));
	}

	public function getEdit($id){
		if ($user = User::find($id)){
			$roles 	= Role::get();
			return View('app.users.edit',['roles' => $roles,'user' => $user]);
		} else {
			return redirect()->route('users.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}

	public function postEdit($id){
		if ($user = User::find($id)){

			$data 				= Request::except('_token');
			//Validation
			$rules 	= [ 
				'email'		=> 'email',
				'role_id'	=> 'not_in:0'
			];

			$messages 	= [
				'email.email'			=> trans('app.valid_email'),
				'role_id.not_in'		=> trans('app.choose_role')
			];

			$validator = Validator::make($data, $rules, $messages);

			if ($validator->fails()) {
				return redirect('users/edit/'.$user->id)->withErrors($validator)->withInput();
			}
			
			if ($data['password'] == ""){
				$data['password'] = $user->password;	
			} else {
				$data['password'] = Hash::make($data['password']);
			}

			if (User::where('id','=',$id)->update($data)){
				return redirect()->route('users.index')->with('successMsg',trans('app.edit_save_success'));
			} else {
				return redirect()->route('users.index')->with('successMsg',trans('app.edit_save_error'));
			}
		} else {
			return redirect()->route('users.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}

	public function getShow($id){
		if ($user = User::find($id)){
			return View('app.users.show',['user' => $user]);
		} else {
			return redirect()->route('users.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}

	public function getDelete($id){
		if ($user = User::find($id)){
			$user->delete();
			return redirect()->route('users.index')->with('successMsg',trans('app.deleted_success'));
		} else {
			return redirect()->route('users.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}

}

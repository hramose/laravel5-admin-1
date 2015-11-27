<?php 
namespace App\Http\Controllers;
use Response;
use Request;
use Hash;
use Validator;
use Auth;
use App\User;

class SettingsController extends Controller {


	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex(){
		return view('app.settings');
	}

	public function postSave(){

		if (!Hash::check(Request::get('old'), Auth::user()->password)) {
		   return redirect()->route('settings.index')->with('errorMsg',trans('app.settings_wrond_pass'));
		}

		$data 				= Request::all();

		$rules 	= [ 
			'old'				=> "required",
			'new'				=> 'required|min:5|confirmed',
			'new_confirmation'	=> 'required'
		];

		$messages 	= [
			'old.required'		=> trans('app.settings_old_req'),
			'new.required'		=> trans('app.settings_new_req'),
			'new.min'			=> trans('app.settings_new_min'),
			'new.confirmed'		=> trans('app.settings_new_confirmed'),
			'new_confirmation.required' => trans('app.settings_new_confirmation')
		];

		$validator = Validator::make($data, $rules, $messages);

		if ($validator->fails()) {
			return redirect()->route('settings.index')->withErrors($validator);
		}


		if ($user = User::find(Auth::user()->id)){

			$user->password = Hash::make(Request::get('new'));
			$user->save();
			return redirect()->route('settings.index')->with('successMsg',trans('app.settings_success'));
			
		} else {
			return redirect()->route('settings.index')->with('errorMsg',trans('app.settings_error'));
		}
	}

}

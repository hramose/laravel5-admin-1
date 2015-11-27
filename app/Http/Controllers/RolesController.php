<?php 
namespace App\Http\Controllers;
use Response;
use Request;
use Hash;
use Validator;
use Auth;
use App\Role;

class RolesController extends Controller {


	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex(){
		$listData =  Role::get();
		return View('app.roles.list',['listData' => $listData]);
	}

	public function getNew() {
		return View('app.roles.new');
	}

	public function postNew(){
		$data = Request::except('_token');

		//Validation
		$rules 	= [ 
			'name' 				=> 'required|unique:roles|min:5'
		];
		$messages 	= [
			'name.required' 	=> trans('app.name_required'),
			'name.unique' 		=> trans('app.name_unique'),
			'name.min' 			=> trans('app.name_min')
		];

		$validator = Validator::make($data, $rules, $messages);

		if ($validator->fails()) {
			return redirect('roles/new')->withErrors($validator)->withInput();
		}

		$arr 				= [];
		$arr['name']		= $data['name'];

		//Users
		$arr['users']		= "";
		if (isset($data['users'])){
			foreach ($data['users'] as $h) {
				$arr['users'] .= $h.",";
			}
		}
		//Roles
		$arr['roles']	= "";
		if (isset($data['roles'])){
			foreach ($data['roles'] as $h) {
				$arr['roles'] .= $h.",";
			}
		}

		//rtrim()
		foreach ($arr as $key => $value) {
			$arr[$key] = rtrim($value,",");
		}

		//Create new
		$rec = Role::create($arr);

		return redirect()->route('roles.index')->with('successMsg',trans('app.add_save_success'));
	}

	public function getEdit($id){
		if ($editData = Role::find($id)){
			return View('app.roles.edit',['editData' => $editData]);
		} else {
			return redirect()->route('roles.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}

	public function postEdit($id){
		if ($editData = Role::find($id)){
			$data 	= Request::except('_token');
			
			$arr 				= [];

			//Users
			$arr['users']		= "";
			if (isset($data['users'])){
				foreach ($data['users'] as $h) {
					$arr['users'] .= $h.",";
				}
			}
			//Roles
			$arr['roles']	= "";
			if (isset($data['roles'])){
				foreach ($data['roles'] as $h) {
					$arr['roles'] .= $h.",";
				}
			}
			
			//rtrim()
			foreach ($arr as $key => $value) {
				$arr[$key] = rtrim($value,",");
			}
	
			if (Role::where('id','=',$id)->update($arr)){
				return redirect()->route('roles.index')->with('successMsg',trans('app.edit_save_success'));
			} else {
				return redirect()->route('roles.index')->with('successMsg',trans('app.edit_save_error'));
			}
		} else {
			return redirect()->route('roles.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}


	public function getDelete($id){
		if ($delData = Role::find($id)){
			if ($delData->name != "admin"){
				$delData->delete();
				return redirect()->route('roles.index')->with('successMsg',trans('app.deleted_success'));
			} else {
				return redirect()->route('roles.index')->with('errorMsg',trans('app.record_not_found'));
			}
		} else {
			return redirect()->route('roles.index')->with('errorMsg',trans('app.record_not_found'));
		}
	}

}

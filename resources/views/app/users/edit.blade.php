@extends('app.users')

@section('sub_content')

<form method="post" action="{{ URL::to('users/edit/'.$user->id) }}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="edit">
	    <div class="row">
	        <div class="col-lg-6">
	            <div class="sub-header">@lang('app.editRec')</div>
	        </div>
	        <div class="col-lg-6 form-btn">
	            <button type="submit" class="btn btn-info">@lang('app.saveBtn')</button>
	            <a href="{{ route('users.index') }}" class="btn btn-danger">@lang('app.cancelBtn')</a>
	        </div>
	    </div>

	    <div class="special-form">
	        <div class="fieldset clearfix">
	            <label>{{ trans('app.username') }}</label>
	            <label class="full">
	                 {{ $user->username }}
	            </label>
	        </div>
	        <div class="fieldset clearfix">
	            <label>{{ trans('app.password') }}</label>
	            <label class="full">
	                <input type="password" name="password" class="form-control" value="{{ old('password') }}"> 
	            </label>
	        </div>
	        <div class="fieldset clearfix">
	            <label>{{ trans('app.role') }}</label>
	            <label class="full">
	                <select name="role_id" class="form-control"> 
	                    <option value="0">---Select---</option>
	                    @foreach($roles as $r)
	                    	<option value="{{ $r->id }}" @if($r->id == $user->role_id) selected  @endif >{{ $r->name }}</option>
	                    @endforeach
	                </select>
	            </label>
	        </div>
	        <div class="fieldset clearfix">
	            <label>{{ trans('app.name_surname') }}</label>
	            <label class="full">
	                <input type="text" name="adsoyad" class="form-control" value="{{ $user->adsoyad }}"> 
	            </label>
	        </div>
	        <div class="fieldset clearfix">
	            <label>E-mail</label>
	            <label class="full">
	                <input type="text" name="email" class="form-control" value="{{ $user->email }}"> 
	            </label>
	        </div>
	    </div>
	</div>
</form>
@stop
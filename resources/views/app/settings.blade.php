@extends('app')

@section('content')

<div class="row">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        	@foreach ($errors->all() as $error)
            <li>  {{ $error }} </li>
           	@endforeach
        </ul>
    </div>
    @endif

    @if (Session::has('errorMsg'))
    <div class="alert alert-danger">
        {{ Session::get('errorMsg') }}
    </div>
    @endif

    @if (Session::has('successMsg'))
    <div class="alert alert-success">
        {{ Session::get('successMsg') }}
    </div>
    @endif
</div>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">@lang('app.settings')</h2>
    </div>
</div>

<div class="edit">
    <form name="dataForm" method="post" action="{{ URL::to('settings/save') }}">

    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	    <div class="special-form">
	        <div class="fieldset clearfix">
	            <label>@lang('app.settings_old_password')</label>
	            <label class="full">
	                <input type="password" name="old" class="form-control"> 
	            </label>
	        </div>
	        <div class="fieldset clearfix">
	            <label>@lang('app.settings_new_password')</label>
	            <label class="full">
	                <input type="password" name="new" class="form-control"> 
	            </label>
	        </div>
	        <div class="fieldset clearfix">
	            <label>@lang('app.settings_new_again')</label>
	            <label class="full">
	                <input type="password" name="new_confirmation" class="form-control"> 
	            </label>
	        </div>
	        
	        <div class="fieldset clearfix">
	        	<label></label>
	        	<button type="submit" class="btn btn-info">@lang('app.saveBtn')</button>
	        </div>
	    </div>
    </form>
</div>

@stop
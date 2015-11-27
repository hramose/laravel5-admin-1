@extends('app.roles')

@section('sub_content')

<form method="post" action="{{ URL::to('roles/new') }}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="edit">
	    <div class="row">
	        <div class="col-lg-6">
	            <div class="sub-header">@lang('app.addNew')</div>
	        </div>
	        <div class="col-lg-6 form-btn">
	            <button type="submit" class="btn btn-info">@lang('app.saveBtn')</button>
	            <a href="{{ route('roles.index') }}" class="btn btn-danger">@lang('app.cancelBtn')</a>
	        </div>
	    </div>

	    <div class="special-form">
	        <div class="fieldset clearfix">
	            <label>{{ trans('app.role_name') }}</label>
	            <label class="full">
	                <input type="text" name="name" class="form-control" value="{{ old('name') }}"> 
	            </label>
	        </div>

	        <div class="fieldset clearfix">
	            <label><b>{{ trans('app.management') }}</b></label>
	            <div>
		            <label class="full">
		                <label><input type="checkbox" class="selectAll"> {{ trans('app.all') }} </label>
		                <div class="yetki-item">
		                	<h4>{{ trans('app.users') }}</h4>
		                	<label><input type="checkbox" value="1" name="users[1]"> {{ trans('app.access') }} </label>
		                	<label><input type="checkbox" value="2" name="users[2]"> {{ trans('app.addNew') }} </label>
		                	<label><input type="checkbox" value="3" name="users[3]"> {{ trans('app.showRec') }} </label>
		                	<label><input type="checkbox" value="4" name="users[4]"> {{ trans('app.editRec') }} </label>
		                	<label><input type="checkbox" value="5" name="users[5]"> {{ trans('app.delRec') }} </label>
		                </div>
		                <div class="yetki-item">
		                	<h4>{{ trans('app.roles') }}</h4>
		                	<label><input type="checkbox" value="1" name="roles[1]"> {{ trans('app.access') }} </label>
		                	<label><input type="checkbox" value="2" name="roles[2]"> {{ trans('app.addNew') }} </label>
		                	<label><input type="checkbox" value="4" name="roles[4]"> {{ trans('app.editRec') }} </label>
		                	<label><input type="checkbox" value="5" name="roles[5]"> {{ trans('app.delRec') }} </label>
		                </div>
		            </label>
	            </div>
	        </div>
	    </div>
	</div>
</form>

<script type="text/javascript">
	$().ready(function(){
		$(".selectAll").click(function(){
			var item = $(this).parent().parent().find('input');
			if(this.checked) { 
                item.each(function() { 
                    this.checked = true;           
                });
            } else{
                item.each(function() { 
                    this.checked = false;                
                });         
            }
		});
	});
</script>

@stop
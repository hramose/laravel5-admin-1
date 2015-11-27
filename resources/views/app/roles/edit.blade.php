@extends('app.roles')

@section('sub_content')

<form method="post" action="{{ URL::to('roles/edit/'.$editData->id) }}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="edit">
	    <div class="row">
	        <div class="col-lg-6">
	            <div class="sub-header">@lang('app.editRec')</div>
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
	                {{ $editData->name }}
	            </label>
	        </div>

	        
	        <div class="fieldset clearfix">
	            <label><b>{{ trans('app.management') }}</b></label>
	            <div>
		            <label class="full">
		                <label><input type="checkbox" class="selectAll"> {{ trans('app.all') }} </label>
		                <?php 
				        $roles 	= explode(",", $editData->users);
				        ?>
		                <div class="yetki-item">
		                	<h4>{{ trans('app.users') }}</h4>
		                	<label><input type="checkbox" value="1" name="users[1]" @if(in_array(1,$roles)) checked="checked" @endif> {{ trans('app.access') }} </label>
		                	<label><input type="checkbox" value="2" name="users[2]" @if(in_array(2,$roles)) checked="checked" @endif> {{ trans('app.addNew') }} </label>
		                	<label><input type="checkbox" value="3" name="users[3]" @if(in_array(3,$roles)) checked="checked" @endif> {{ trans('app.showRec') }} </label>
		                	<label><input type="checkbox" value="4" name="users[4]" @if(in_array(4,$roles)) checked="checked" @endif> {{ trans('app.editRec') }} </label>
		                	<label><input type="checkbox" value="5" name="users[5]" @if(in_array(5,$roles)) checked="checked" @endif> {{ trans('app.delRec') }} </label>
		                </div>
		                <?php 
				        $roles 	= explode(",", $editData->roles);
				        ?>
		                <div class="yetki-item">
		                	<h4>{{ trans('app.roles') }}</h4>
		                	<label><input type="checkbox" value="1" name="roles[1]" @if(in_array(1,$roles)) checked="checked" @endif> {{ trans('app.access') }} </label>
		                	<label><input type="checkbox" value="2" name="roles[2]" @if(in_array(2,$roles)) checked="checked" @endif> {{ trans('app.addNew') }} </label>
		                	<label><input type="checkbox" value="4" name="roles[4]" @if(in_array(4,$roles)) checked="checked" @endif> {{ trans('app.editRec') }} </label>
		                	<label><input type="checkbox" value="5" name="roles[5]" @if(in_array(5,$roles)) checked="checked" @endif> {{ trans('app.delRec') }} </label>
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
@extends('app.roles')

@section('sub_content')

<div class="edit">
    <div class="row">
        <div class="col-lg-6">
            <div class="sub-header">@lang('app.showRec')</div>
        </div>
        <div class="col-lg-6 form-btn">
            <a href="{{ URL::to('roles') }}" class="btn btn-danger">@lang('app.cancelBtn')</a>
        </div>
    </div>

    <div class="special-form">
        <div class="fieldset clearfix">
            <label>Yetki Adı</label>
            <label class="full">
                {{ $showData->name }}
            </label>
        </div>
    </div>
</div>

@stop
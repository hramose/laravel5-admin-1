@extends('app.users')

@section('sub_content')

<div class="edit">
    <div class="row">
        <div class="col-lg-6">
            <div class="sub-header">@lang('app.showRec')</div>
        </div>
        <div class="col-lg-6 form-btn">
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
                {{ $user->name }}
            </label>
        </div>
        <div class="fieldset clearfix">
            <label>{{ trans('app.role') }}</label>
            <label class="full">
                {{ $user->role->name }}
            </label>
        </div>
        <div class="fieldset clearfix">
            <label>{{ trans('app.name_surname') }}</label>
            <label class="full">
                {{ $user->adsoyad }}
            </label>
        </div>
        <div class="fieldset clearfix">
            <label>E-mail</label>
            <label class="full">
                {{ $user->email }}
            </label>
        </div>
    </div>
</div>

@stop
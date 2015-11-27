@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-users"></i> {{ trans('app.roles') }} </h3>
    </div>
</div>

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

@yield('sub_content')

@stop
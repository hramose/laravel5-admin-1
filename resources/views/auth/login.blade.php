@extends('auth.layout')

@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top: 30px;">

		<div style="text-align:center;">
			<img src="{{ asset('img/logo.png') }}" style="height: 90px;"><br>
            <h3>{{env('APP_TITLE1')}}</h3>
            <h4>{{env('APP_TITLE2')}}</h4>
		</div>

		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('auth.login') }}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
								{{ $error }}<br>
							@endforeach
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('auth.username') }}</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="username">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('auth.password') }}</label>
							<div class="col-md-8">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> {{ trans('auth.remember') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									{{ trans('auth.login-btn') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{env('APP_TITLE1')}} - {{env('APP_TITLE2')}}</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('/') }}" style="margin-left: 12px;">{{ env('APP_TITLE1') }}</a>
                </div>

                @if (!Auth::guest())
    	            <ul class="nav navbar-top-links navbar-right">
    	               
                        <li>
                            <form method="post" action="{{ URL::to('search') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" name="term" class="form-control" id="topUrunAra" placeholder="{{ trans('app.search') }}">   
                            </form>
                        </li>

                        <li class="dropdown">
    	                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;;">
    	                        @if (Auth::user()->adsoyad != "") {{ Auth::user()->adsoyad }} @else {{ Auth::user()->username }} @endif <span class="caret"></span>
    	                    </a>
    	                    <ul class="dropdown-menu dropdown-user">
    	                        <li><a href="{{ route('settings.index') }}">{{ trans('app.settings') }}</a></li>
    							<li><a href="{{ URL::to('logout') }}">{{ trans('app.logout') }}</a></li>
    	                    </ul>
    	                </li>
    	            </ul>
                @endif

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse collapse out">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="{{ URL::to('/') }}">
                                	<i class="fa fa-home"></i>
                                	{{ trans('app.dashboard') }}
                                </a>
                            </li>
                            
                            <li>
                                <?php 
                                if(Request::is('users') || Request::is('users/*') || Request::is('roles') || Request::is('roles/*'))
                                    $collapse1 = "in";
                                else 
                                    $collapse1 = "out";
                                ?>
                                <a href="javascript:;;" data-toggle="collapse" data-target="#sub1">
                                	<i class="fa fa-wrench fa-fw"></i> {{ trans('app.management') }} <span class="fa arrow"></span>
                                </a>
                                <ul id="sub1" class="nav nav-second-level collapse {{ $collapse1 }}">
                                    <li>
                                		<a href="{{ route('users.index') }}"> <i class="fa fa-user fa-fw"></i> {{ trans('app.users') }} </a>
                                	</li>
                                    <li>
                                        <a href="{{ route('roles.index') }}"> <i class="fa fa-users fa-fw"></i> {{ trans('app.roles') }} </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Scripts -->
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/jquery-ui.js') }}"></script>
            <script src="{{ asset('js/jQuery.print.js') }}"></script>
            
            <div id="page-wrapper">
                @yield('content')
            </div>
        </div>
    </div>


    
    <script type="text/javascript">
        $().ready(function(){
            $(".datepicker").datepicker({ dateFormat : "dd.mm.yy"});

            $('.checkAll').click(function(event) { 
                if(this.checked) { 
                    $('.checkAllItem').each(function() { 
                        this.checked = true;           
                    });
                }else{
                    $('.checkAllItem').each(function() { 
                        this.checked = false;                
                    });         
                }
            });

            $('[data-toggle="tooltip"]').tooltip();

            $('input.time').keypress(function(e) {
                if (e.keyCode != 8){
                    if ($(this).val().length == 2) {
                        $(this).val($(this).val()+":");
                    }
                }
            });
        });
    </script>

</body>
</html>
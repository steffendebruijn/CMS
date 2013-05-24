{{ Asset::container('bootstrapper')->styles() }}
{{ Asset::container('bootstrapper')->scripts() }}
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{{URL::to('home');}}">cms blog</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class=""><a href="{{URL::to('home');}}">Home</a></li>
                    @if(Auth::check() && Auth::user()->has_admin_rights)
                   
                    <li class=""><a href="{{URL::to('article/new');}}">New entry</a></li>
                    @endif
                </ul><ul class="nav pull-right">
                    <li class="pull-right" style="color: #08c;">
                        @if(Auth::check())
                        {{ HTML::link('logout', 'Logout', array('style' => 'color: gray;')) }}
                        @else
                        {{ HTML::link('login', 'Login', array('style' => 'color: gray;')) }}
                        @endif
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container">
    <div class='content'>
    <!-- alert message handling -->
    @if(!is_null(Session::get('alert-success')))
    <div class="alert alert-success">
        {{ Session::get('alert-success') }}
    </div>
    @elseif(!is_null(Session::get('alert-error')))
    <div class="alert alert-error">
        {{ Session::get('alert-error') }}
    </div>
    @endif

<div class="container continerWithSite">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
            <h1>{{ $title }}</h1>	
			<h3>{{ Auth::user()->name }}</h3>
			<h4>{{ Auth::user()->email }}</h4>
            {{-- @include('back-end.partials.fields-name-admin-login')
            --}}
			<form action="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formSearch" method="post" accept-charset="utf-8">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			        <i class="fa fa-search" aria-hidden="true"></i>
			        <input type="text" name="user_search" placeholder="{{ $placeholder }} ">
			    </div>
			</form>			
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <ul class="nav navbar-nav navbar-right navulRIght">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                            Salir
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
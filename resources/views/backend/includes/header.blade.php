<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a class="navbar-brand" href="{{ route('frontend.index') }}">
        <img src="/img/frontend/logo_sticky.png" alt="" height="35px" width="120px">
    </a>
    <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('frontend.index') }}"><i class="icon-home"></i></a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('navs.frontend.dashboard') }}</a>
        </li>
    </ul>

    <ul class="nav navbar-nav ml-auto" style="margin-right: 2rem">
        {{--<li class="nav-item d-md-down-none">--}}
            {{--<a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-info">0</span></a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-md-down-none">--}}
            {{--<a class="nav-link" href="#"><i class="icon-list"></i></a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-md-down-none">--}}
            {{--<a class="nav-link" href="#"><i class="icon-location-pin"></i></a>--}}
        {{--</li>--}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->picture }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
                <span class="d-md-down-none">{{ $logged_in_user->full_name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}"><i
                            class="fa fa-lock"></i> {{ __('navs.general.logout') }}</a>
            </div>
        </li>
    </ul>

    {{--<button class="navbar-toggler aside-menu-toggler" type="button">☰</button>--}}
</header>
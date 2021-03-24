<header class="header menu_fixed">
    <div id="logo">
        <a href="{{ route('frontend.index') }}" title="Summit">
            <img src="{{ asset('img/frontend/logo_sticky.png') }}" width="150" height="45" alt="" class="logo_normal">
            <img src="{{ asset('img/frontend/logo_sticky.png') }}" width="110" height="35" alt="" class="logo_sticky">
        </a>
    </div>
    <ul id="top_menu">
        @guest
            @if (config('access.registration'))
                <li><a href="#sign-up-dialog" class="login" id="sign-up" title="Register">Register</a></li>
            @endif
            <li><a href="#sign-in-dialog" class="login" id="sign-in" title="Login">Login</a></li>
        @endguest
    </ul>
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <nav id="menu" class="main-menu">
        <ul>
            {{--@auth()--}}
                {{--<li><span>--}}
                    {{--<a href="{{route('frontend.user.dashboard')}}"--}}
                       {{--class="{{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">Dashboard</a></span>--}}
                {{--</li>--}}
            {{--@endauth--}}
            @guest
                {{--@if (config('access.registration'))--}}
                    {{--<li>--}}
                        {{--<span>--}}
                        {{--<a href="#sign-up-dialog" id="sign-up" class="login" title="Sign up">Sign Up</a>--}}
                        {{--</span>--}}
                    {{--</li>--}}
                {{--@endif--}}
            @else
                <li><span><a href="#0">{{ $logged_in_user->name }}</a></span>
                    <ul>
                        <li>
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}">Administration</a>
                            @endcan
                        </li>
                        <li>
                            @can('view backend')
                                <a href="{{ route('frontend.pending') }}">Pending</a>
                            @endcan
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{ route('frontend.user.account') }}"--}}
                               {{--class="{{ active_class(Active::checkRoute('frontend.user.account')) }}">Account</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{ route('frontend.auth.logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            @endguest
            {{--<li>--}}
                {{--<span>--}}
                {{--<a href="{{route('frontend.contact')}}"--}}
                   {{--class="{{ active_class(Active::checkRoute('frontend.contact')) }}">Contact</a>--}}
                {{--</span>--}}
            {{--</li>--}}
        </ul>
    </nav>
</header>

@include('frontend.includes.partials.login')
@include('frontend.includes.partials.register')

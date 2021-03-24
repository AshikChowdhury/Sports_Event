<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Summit Web Application')">
    <meta name="author" content="@yield('meta_author', 'Ashik Chowdhury')">
    <title>@yield('title', app_name())</title>
@yield('meta')

<!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('img/frontend/favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/frontend/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="{{ asset('img/frontend/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{ asset('img/frontend/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{ asset('img/frontend/apple-touch-icon-144x144-precomposed.png') }}">

@stack('before-styles')

<!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    {{ style(asset('css/frontend/bootstrap.min.css')) }}
    {{ style(asset('css/frontend/style.css')) }}
    {{ style(asset('css/frontend/vendors.css')) }}
    {{ style(asset('css/frontend/blog.css')) }}

<!-- YOUR CUSTOM CSS -->
    {{ style(asset('css/frontend/custom.css')) }}

    @stack('after-styles')

</head>
<body>
<div id="page">
    @include('includes.partials.logged-in-as')
        @yield('main_nav')

        {{--@include('includes.partials.messages')--}}
        @yield('content')

    @include('frontend.includes.footer')
</div><!-- #page -->

<!-- Scripts -->
@stack('before-scripts')
{{--{!! script(mix('js/frontend.js')) !!}--}}
{{ script(asset('js/frontend/common_scripts.js')) }}
{{ script(asset('js/frontend/functions.js')) }}
{{ script(asset('js/frontend/assets/validate.js')) }}

@stack('after-scripts')

{{--@include('includes.partials.ga')--}}
</body>
</html>

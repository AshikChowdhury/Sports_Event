@extends('frontend.layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fa fa-dashboard"></i> {{ __('navs.frontend.dashboard') }}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
                                <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fa fa-envelope-o"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fa fa-calendar-check-o"></i> {{ __('strings.frontend.general.joined') }} {{ $logged_in_user->created_at->timezone(get_user_timezone())->format('F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                            <i class="fa fa-user-circle-o"></i> {{ __('navs.frontend.user.account') }}
                                        </a>

                                        @can('view backend')
                                            &nbsp;<a href="{{ route ('admin.dashboard')}}"
                                                     class="btn btn-danger btn-sm mb-1">
                                                <i class="fa fa-user-secret"></i> {{ __('navs.frontend.user.administration') }}
                                            </a>
                                        @endcan
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h4 class="card-title">Info card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div><!--card-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis
                                            deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis
                                            deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis
                                            deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis
                                            deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="w-100"></div>

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis
                                            deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis
                                            deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->
                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection

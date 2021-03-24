@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('main_nav')
    @include('frontend.includes.event_detail_nav')
@endsection

@section('content')
    <style>
        li{
            list-style: none;
        }
    </style>
    <main>
        <div class="hero_in hotels_detail">
            <div class="wrapper">
                <div class="event_title text-center">
                    <h2>{{ $event->name }}</h2>
                    <a class="address" href="#">{{ $event->venue }}</a>
                    <div style="padding-top: 20px;">
                        <span class="loc_open" style="color: #fff;">{{ $event->start_date->format('d M Y') }}</span>
                        @if($event->start_date->format('d M Y') !== $event->end_date->format('d M Y'))
                            @if($event->id == 1)
                                <span style="color: #fff;">&</span>
                            @else
                                <span style="color: #fff;">-</span>
                            @endif
                            <span class="loc_open" style="color: #fff;">{{ $event->end_date->format('d M Y')}}</span>
                        @endif
                    </div>

                </div>
                <span class="magnific-gallery">
                    <a href="{{ "/images/".$event->image }}" class="btn_photos" title="{{ $event->name }}. Banner" data-effect="mfp-zoom-in">View photos</a>
                    @foreach($posts as $post)
                        @if($post->image)
                            <a href="{{ "/images/".$post->image }}" title="{{ $post->user->first_name.' '. $post->user->last_name }}" data-effect="mfp-zoom-in"></a>
                        @endif
                    @endforeach
				</span>
            </div>
        </div>

        <!--/hero_in-->
        <nav class="secondary_nav sticky_horizontal_2">
            <div class="container" >
                <ul class="clearfix">
                    {{--<li><a href="{{ route('frontend.event_detail', $event) }}"><i class="fa fa-backward"></i>Go Back</a></li>--}}
                    <li><a href="#description" class="active">About</a></li>
                    <li><a href="#members">Members</a></li>
                    <li><a href="#sidebar"></a></li>
                </ul>
            </div>
        </nav>

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <section id="description">
                        <div class="detail_title_1">
                            <h1 class="text-center">{{ $team->name }}</h1>
                            {{--<a class="address" href="#">{{ $team->id }}</a>--}}
                        </div>
                        <p class="text-center">{{ $team->description }}</p>
                        <!-- /row -->
                    </section>
                    <!-- /section -->

                    <section id="members">
                        <div class="detail_title_1">
                            <h4 class="text-center">Members</h4>
                        </div>
                        <div class="row">
                            @foreach($team_member->members as $member)
                                <div class="col-xl-4 col-lg-6 col-md-6 isotope-item bars">
                                    <div class="strip grid">
                                        <figure>
                                            <a href="#0" class="wish_bt"></a>
                                            <a href="#"><img src="{{ "/images/".$member->photo}}" class="img-fluid" alt=""></a>
                                        </figure>
                                        <div class="wrapper" style="padding: 20px 0 0 10px">
                                            <h4><a href="#">{{ $member->name }}</a></h4><br>
                                            <li>{{ $member->role }}</li>
                                            <li>{{ $member->batting_style }}</li>
                                            <li>{{ $member->bowling_Style }}</li>
                                            <br>
                                            <p>{{ $member->about }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- /section -->
                </div>
                <!-- /col -->

                <aside class="col-lg-4" >
                    <div class="box_detail booking">
                        @if( $team_sponsor->sponsor->count()>0)
                            <h4 class="text-center">Sponsor</h4><br>
                        @endif
                        <div class="row add_bottom_30">
                            @foreach($team_sponsor->sponsor as $sponsor)
                                <div class="col-lg-6 col-sm-6">
                                    <a href="#" class="grid_item small">
                                        <figure>
                                            <img src="{{ "/images/".$sponsor->banner}}" alt="">
                                            <div class="info">
                                                <h3>{{ $sponsor->name }}</h3>
                                            </div>
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="overlay"></div>
    </main>
    <!--/main-->


@endsection

@push('after-scripts')
    <script>
        $(document).ready(function () {
            $(".text").click(function () {
                $(".overlay").fadeIn(500);
            });
            $(".overlay").not(".text").click(function() {
                $(".overlay").fadeOut(500);
            });
            $("[type = submit]").click(function () {
                var post = $("textarea").val();
                $("<p class='post'>" + post + "</p>").appendTo("section");
            });
        });

        function descriptionFunction() {
            document.getElementById("members").style.display = "none";
            document.getElementById("description").style.display = "block";

        }
        function membersFunction() {
            document.getElementById("members").style.display = "block";
            document.getElementById("description").style.display = "none";

        }

    </script>
@endpush
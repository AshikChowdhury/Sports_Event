@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('main_nav')
    @include('frontend.includes.event_detail_nav')
@endsection

@section('content')

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
                    <a href="{{ "/images/".$event->image }}" class="btn_photos" title="{{ $event->name }}. Banner"
                       data-effect="mfp-zoom-in">View photos</a>
                    @foreach($posts as $post)
                        @if($post->image)
                            <a href="{{ "/images/posts/".$post->image }}"
                               title="{{ $post->user->first_name.' '. $post->user->last_name }}"
                               data-effect="mfp-zoom-in"></a>
                        @endif
                    @endforeach
				</span>
            </div>
        </div>

        <!--/hero_in-->
        <nav class="secondary_nav sticky_horizontal_2">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" onclick="descriptionFunction()" class="active">Description</a></li>
                    <li><a href="#posts" onclick="postsFunction()">Activities</a></li>
                    <li><a href="#participants" onclick="participantsFunction()">Participants</a></li>
                    <li><a href="#schedule" onclick="scheduleFunction()">Schedule</a></li>
                    @if($matches->count()> 0)
                        <li><a href="#fixtures" onclick="fixturesFunction()">Fixtures</a></li>
                    @endif
                    <li><a href="#sidebar"></a></li>
                </ul>
            </div>
        </nav>

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <section id="description">
                        <div class="detail_title_1">
                            <h1 class="text-center">{{ $event->name }}</h1>
                            <div class="text-center" style="padding-top: 10px">
                                <a class="address " style="color: #000000" href="#">{{ $event->venue }}</a>
                            </div>

                        </div>
                        <p class="text-center">{{ $event->description }}</p>
                        <h5 class="add_bottom_15">Overview</h5>
                        <div class="row add_bottom_30">
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>{{ $event->start_date->format('d M Y') }}</li>
                                    {{--<li>{{ $event->end_date->format('d M Y') }}</li>--}}
                                    <li>{{ $event->venue }}</li>
                                    <li>{{ $event->organizer }}</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    {{--<li>Timeam inimicus</li>--}}
                                    {{--<li>Oportere democritum</li>--}}
                                    {{--<li>Cetero inermis</li>--}}
                                    {{--<li>Pertinacia eum</li>--}}
                                </ul>
                            </div>
                        </div>
                        <!-- /row -->
                    </section>
                    <!-- /section -->
                    <section id="posts">
                        {{--<div class="detail_title_1">--}}
                        {{--<h3 class="text-center">Post Timeline</h3>--}}
                        {{--</div>--}}
                        <div class="reviews-container add_bottom_30">
                            <div class="row">
                                <div class="col-lg-12">
                                    <section id="new_post">
                                        <div class="text">
                                            {{ html()->form('POST', route('frontend.posts.store', $event))->acceptsFiles()->class('form-horizontal')->open() }}
                                            <img src="/images/avatar.png"/>
                                            {{ html()->textarea('post')
                                                ->placeholder("What's in your mind")
                                                ->required()}}
                                            {{ html()->file('image')->accept('image/*') }}
                                            {{ form_submit('Post')
                                                ->class('btn_1')}}
                                            {{ html()->form()->close() }}
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>

                        @foreach($posts as $post)
                            <article class="blog">

                                <div class="post_info" id="post_delete">
                                    <ul>
                                        <li></li>
                                        @if(auth()->user()->id == $post->created_by || auth()->user()->hasRole(1))
                                        <li>
                                            {{ html()->form('DELETE', route('frontend.posts.destroy', [$event, $post->id]))
                                                ->open() }}
                                            {{ html()->submit('Delete')->class('btn-sm btn-danger')}}
                                            {{ html()->form()->close()}}
                                        </li>
                                            @endif
                                    </ul>
                                    <br>
                                </div>
                                @if($post->image)
                                    <figure>
                                        <a href=""><img src="{{ "/images/posts/".$post->image }}" alt=""></a>
                                    </figure>
                                @endif
                                <div class="post_info">
                                    <ul>
                                        <li>
                                            <div class="thumb"><img src="/images/avatar.png" alt="">
                                            </div> {{ $post->user->first_name.' '. $post->user->last_name }}
                                        </li>
                                        <li><i class="clock"></i>{{ $post->created_at->format('M d, Y, h:i A') }}</li>
                                    </ul>
                                    <br>
                                    <p>{{ $post->post }}</p>

                                    <input type="button" onclick="toggleComment('{{ $post->id }}')" class="btn btn-sm"
                                           value="Comments">
                                </div>
                                <div id="comments-{{ $post->id }}" class="post_comments" style="display: none">
                                    <section id="comment">
                                        <div class="text">
                                            {{ html()->form('POST', route('frontend.comments.store', $event))->class('form-horizontal')->open() }}
                                            {{html()->hidden('post_id')->value($post->id)}}
                                            {{ html()->textarea('comment')
                                                ->placeholder("Leave your comment")
                                                ->required()}}
                                            {{ form_submit('Comment')
                                                ->class('btn_1')}}
                                            {{ html()->form()->close() }}
                                        </div>
                                    </section>
                                    {{--<h6 style="padding-bottom: 10px">Comments</h6>--}}

                                    @foreach($post->comments as $comment)

                                        <div class="avatar">
                                            <a href="#"><img src="/images/avatar.png" alt="">
                                            </a>
                                        </div>
                                        <div class="comment_right clearfix">
                                            <div class="post_info" id="post_delete">
                                                <ul>
                                                    <li></li>
                                                    @if(auth()->user()->id == $comment->created_by || auth()->user()->hasRole(1))
                                                        <li>
                                                            {{ html()->form('DELETE', route('frontend.comments.destroy', [$event, $comment->id]))
                                                                ->open() }}
                                                            {{ html()->submit('Delete')->class('btn-sm btn-danger')}}
                                                            {{ html()->form()->close()}}
                                                        </li>
                                                    @endif
                                                </ul>
                                                <br>
                                            </div>
                                            <div class="comment_info">
                                                By {{ $comment->user->first_name.' '. $comment->user->last_name }}<span>|</span>{{ $comment->created_at->format('M d, Y, h:i A') }}
                                            </div>
                                            <p>
                                                {{ $comment->comment }}
                                            </p>
                                        </div><br>
                                    @endforeach
                                </div>
                            </article>
                            <!-- /review-container -->
                        @endforeach
                    </section>

                    <section id="participants" style="display: none">
                        <div class="detail_title_1">
                            <h3 class="text-center">Participants</h3>
                        </div>
                        <div class="row add_bottom_30">
                            @foreach($team_sponsor->team as $team)
                                <div class="col-lg-4 col-sm-6">
                                    <a href="{{ route('frontend.team_detail', [$event->id, $team->id]) }}"
                                       class="grid_item small">
                                        <figure>
                                            <img src="{{ "/images/".$team->logo}}" alt="">
                                            <div class="info">
                                                <h3>{{ $team->name }}</h3>
                                            </div>
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section id="schedule" style="display: none">
                        <div class="detail_title_1">
                            <h3 class="text-center">Schedules</h3>
                        </div>
                        <div class="row add_bottom_30">
                            @foreach($schedules as $schedule)
                                <div class="strip grid col-md-6 col-sm-12">
                                    <div class="wrapper">
                                        <h5><a href="#">{{ $schedule->date->format('M d, Y') }}</a></h5>
                                        <small>{{ $schedule->name }}</small>
                                        <br>
                                        <small>{{ $schedule->venue }}</small>
                                        <p>{{ $schedule->from_time->format('h:i A').' - '.$schedule->to_time->format('h:i A')}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section id="fixtures" style="display: none">
                        <div class="detail_title_1">
                            <h3 class="text-center">Fixture</h3>
                        </div>
                        <div class="row add_bottom_30">
                            <table class="table table-striped table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="text-center">Match</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Venue</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($matches as $match)
                                    <tr>
                                        <td>{{ $match->date->format('M d, Y') }}</td>
                                        <td>{{ optional($match->team_1)->name }}
                                            <span> Vs </span> {{ optional($match->team_2)->name }}</td>
                                        <td>{{ $match->time->format('h:i A') }}</td>
                                        <td>{{ $match->venue }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </section>
                    <!-- /section -->
                </div>
                <!-- /col -->

                <aside class="col-lg-4">
                    <div class="box_detail booking">
                        @if( $team_sponsor->sponsor->count()>0)
                            <h4 class="text-center">Sponsor</h4><br>
                        @endif
                        <div class="row add_bottom_30">
                            @foreach($team_sponsor->sponsor as $sponsor)
                                <div class="col-lg-6 col-sm-6" id="pic-sponsor">
                                    <a href="#" class="grid_item small">
                                        <figure>
                                            <img src="{{ "/images/".$sponsor->banner}}" alt="">
                                            <div class="info text-center">
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
            $(".overlay").not(".text").click(function () {
                $(".overlay").fadeOut(500);
            });
            $("[type = submit]").click(function () {
                var post = $("textarea").val();
                $("<p class='post'>" + post + "</p>").appendTo("section");
            });

        });

        function toggleComment(id) {
            $("#comments-" + id).toggle();
        }

        function descriptionFunction() {
            document.getElementById("posts").style.display = "block";
            document.getElementById("description").style.display = "block";
            document.getElementById("participants").style.display = "none";
            document.getElementById("schedule").style.display = "none";
            document.getElementById("fixtures").style.display = "none";

        }

        function postsFunction() {
            document.getElementById("posts").style.display = "block";
            document.getElementById("description").style.display = "block";
            document.getElementById("participants").style.display = "none";
            document.getElementById("schedule").style.display = "none";
            document.getElementById("fixtures").style.display = "none";
        }

        function participantsFunction() {
            document.getElementById("posts").style.display = "none";
            document.getElementById("description").style.display = "none";
            document.getElementById("participants").style.display = "block";
            document.getElementById("schedule").style.display = "none";
            document.getElementById("fixtures").style.display = "none";

        }

        function scheduleFunction() {
            document.getElementById("posts").style.display = "none";
            document.getElementById("description").style.display = "none";
            document.getElementById("participants").style.display = "none";
            document.getElementById("schedule").style.display = "block";
            document.getElementById("fixtures").style.display = "none";

        }

        function fixturesFunction() {
            document.getElementById("posts").style.display = "none";
            document.getElementById("description").style.display = "none";
            document.getElementById("participants").style.display = "none";
            document.getElementById("schedule").style.display = "none";
            document.getElementById("fixtures").style.display = "block";
        }

    </script>
@endpush
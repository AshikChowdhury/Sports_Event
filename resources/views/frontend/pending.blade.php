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
                    <h2>Event Wall</h2>
                    <a class="address" href="#">ERP || Transcom Limited</a>
                    <div style="padding-top: 20px;">

                    </div>
                </div>
            </div>
        </div>

        <!--/hero_in-->
        <nav class="secondary_nav sticky_horizontal_2">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#posts" onclick="postsFunction()" class="active">Posts</a></li>
                    <li><a href="#comments_tab" onclick="commentsFunction()">Comments</a></li>
                    <li><a href="#hudai"></a></li>
                    {{--<li><a href="#description" onclick="descriptionFunction()" >Description</a></li>--}}
                </ul>
            </div>
        </nav>

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <!-- /section -->
                    <section id="posts">
                        @foreach($posts as $post)
                            <article class="blog">

                                <div class="post_info" id="post_delete">
                                    <ul>
                                        @if(auth()->user()->hasRole(1))
                                            <li class="approve">
                                                {{ html()->form('PATCH', route('frontend.pending.post_status',  $post->id))
                                                    ->open() }}
                                                <input type="hidden" name="status" value="1">
                                                {{ html()->submit('Approve')->class('btn-sm btn-success')}}
                                                {{ html()->form()->close()}}
                                            </li>
                                            <li>
                                                {{ html()->form('DELETE', route('frontend.posts.destroy', [$post->event_id, $post->id]))
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

                                </div>

                            </article>
                            <!-- /review-container -->
                        @endforeach
                    </section>

                    <section id="comments_tab" style="display: none">
                        @foreach($comments as $comment)
                            <article class="blog">

                                <div class="post_info" id="post_delete">
                                    <ul>
                                        @if(auth()->user()->hasRole(1))
                                            <li class="approve">
                                                {{ html()->form('PATCH', route('frontend.pending.comment_status',  $comment->id))
                                                    ->open() }}
                                                <input type="hidden" name="status" value="1">
                                                {{ html()->submit('Approve')->class('btn-sm btn-success')}}
                                                {{ html()->form()->close()}}
                                            </li>
                                            <li>
                                                {{ html()->form('DELETE', route('frontend.comments.destroy', [$comment->post->event_id, $comment->id]))
                                                    ->open() }}
                                                {{ html()->submit('Delete')->class('btn-sm btn-danger')}}
                                                {{ html()->form()->close()}}
                                            </li>
                                        @endif
                                    </ul>
                                    <br>
                                </div>
                                <div class="post_info">
                                    <ul>
                                        <li>
                                            <div class="thumb"><img src="/images/avatar.png" alt="">
                                            </div> {{ $comment->user->first_name.' '. $comment->user->last_name }}
                                        </li>
                                        <li><i class="clock"></i>{{ $comment->created_at->format('M d, Y, h:i A') }}</li>
                                    </ul>
                                    <br>
                                    <p>{{ $comment->comment }}</p>
                                </div>

                            </article>
                            <!-- /review-container -->
                        @endforeach
                    </section>

                    <!-- /section -->
                </div>
                <!-- /col -->

                <aside class="col-lg-4">
                    <div class="box_detail booking">
                        {{--@if( $team_sponsor->sponsor->count()>0)--}}
                            {{--<h4 class="text-center">Sponsor</h4><br>--}}
                        {{--@endif--}}
                        <div class="row add_bottom_30">
                            {{--@foreach($team_sponsor->sponsor as $sponsor)--}}
                                {{--<div class="col-lg-6 col-sm-6" id="pic-sponsor">--}}
                                    {{--<a href="#" class="grid_item small">--}}
                                        {{--<figure>--}}
                                            {{--<img src="{{ "/images/".$sponsor->banner}}" alt="">--}}
                                            {{--<div class="info text-center">--}}
                                                {{--<h3>{{ $sponsor->name }}</h3>--}}
                                            {{--</div>--}}
                                        {{--</figure>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
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
        function toggleComment(id) {
            $("#comments-" + id).toggle();
        }

        function commentsFunction() {
            document.getElementById("posts").style.display = "none";
            document.getElementById("comments_tab").style.display = "block";

        }

        function postsFunction() {
            document.getElementById("posts").style.display = "block";
            document.getElementById("comments_tab").style.display = "none";
        }

    </script>
@endpush
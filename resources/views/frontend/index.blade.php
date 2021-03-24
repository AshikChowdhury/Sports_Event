@extends('frontend.layouts.app')

@section('title', app_name() . ' | '.__('navs.general.home'))

@section('main_nav')
    @include('frontend.includes.nav')
@endsection

@section('content')
    <main>
        <section class="hero_single version_4">
            <div class="wrapper">
                <div class="container-fluid margin_80_55">
                    <div id="reccomended" class="owl-carousel owl-theme">
                        @foreach($events as $event)
                            <div class="item">
                                <div class="strip grid">
                                    <figure>
                                        <a href="{{ route('frontend.event_detail', $event->id) }}" ><img src="{{ "/images/".$event->image }}"  class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>
                                                    {{ auth()->user() ? "See Detail" : "Please Login To See Details" }}</span></div></a>
                                        {{--<a href="{{ auth()->user() ? route('frontend.event_detail', $event->id) : '#sign-in-dialog' }}" id="sign-in-check"><img src="{{ "/images/".$event->image }}"  class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>See Detail</span></div></a>--}}
                                    </figure>
                                    <div class="wrapper">
                                        <small style="color: #eceb41">{{ auth()->user() ? "" : "Please Login To See Details" }}</small>
                                        <h3>
                                            {{--<a href="{{ auth()->user() ? route('frontend.event_detail', $event->id) : '#sign-in-dialog' }}" id="sign-in-check-details">{{$event->name}}</a>--}}
                                            <a href="{{ route('frontend.event_detail', $event->id) }}">{{$event->name}}</a>
                                        </h3>
                                        <p>{{ $event->description }}</p>
                                        {{--<a class="address" href="">Get directions</a>--}}
                                    </div>

                                    <div style="padding-bottom: 20px;">
                                        <span class="loc_open">{{ $event->start_date->format('d M Y') }}</span>
                                        {{--@if(!empty ( $event->end_date ))--}}
                                        @if($event->start_date->format('d M Y') !== $event->end_date->format('d M Y'))
                                            @if($event->id == 1)
                                                <span style="color: #000;">&</span>
                                            @else
                                                <span style="color: #000;">-</span>
                                            @endif
                                            <span class="loc_open">{{ $event->end_date->format('d M Y')}}</span>
                                            {{--@endif--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /item -->
                        @endforeach
                    </div>
                    <!-- /carousel -->
                </div>
            </div>
        </section>
        <!-- /hero_single -->
    </main>
    <!-- /main -->

@endsection

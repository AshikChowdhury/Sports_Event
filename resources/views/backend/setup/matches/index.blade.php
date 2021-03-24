@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' .$page_heading))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $module_parent }} ||
                        <small class="text-muted">{{ $page_heading }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.setup.matches.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Event</th>
                                <th class="text-center">Match</th>
                                <th>Venue</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($$module_name as $module_name)
                                <tr>
                                    <td>{{ $module_name->date->format('d M Y')}}</td>
                                    <td>{{ $module_name->time->format('h:i A') }}</td>
                                    <td>{{ $module_name->transevent->name }}</td>
                                    <td class="text-center">{{ optional($module_name->team_1)->name }} Vs {{ optional($module_name->team_2)->name }}</td>
                                    <td>{{ $module_name->venue }}</td>
                                    <td>{!! $module_name->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {{--{!! $$module_name->total() !!} {{ trans_choice('Events', $$module_name->total()) }}--}}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {{--{!! $$module_name->render() !!}--}}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

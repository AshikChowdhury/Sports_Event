@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . $page_heading)

@section('content')

    {{ html()->form('POST', route($module_route.'.schedule.store', $event->id))->class('form-horizontal')->open() }}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $module_parent }} ||
                        <small class="text-muted">{{ $event->name." ".$page_heading }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <hr/>
            <ul class="nav nav-tabs">
                @foreach($dates as $date)
                    <li><a data-toggle="tab" href="#{{ $date->format('dmy') }}">{{ $date->format('d M Y') }}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">

                @foreach($dates as $date)
                    <div class="row mt-4 mb-4 tab-pane fade" id="{{$date->format('dmy')}}">
                        <div class="col">
                            <div class="form-group row">

                                {{ html()->label('Schedule Name')->class('col-md-2 form-control-label')->for('event_name') }}
                                <div class="col-md-6">
                                    {{ html()->text('schedules['.$date->toDateString().'][name]')
                                        ->class('form-control')
                                        ->placeholder('Schedule Name')
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                {{ html()->label('Time Schedule')->class('col-md-2 form-control-label')->for('time') }}
                                <div class="col-md-3">
                                    {{ html()->text('schedules['.$date->toDateString().'][from_time]')
                                        ->class('form-control time')
                                        ->placeholder('From')
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--col-->
                                <div class="col-md-3">
                                    {{ html()->text('schedules['.$date->toDateString().'][to_time]')
                                        ->class('form-control time')
                                        ->placeholder('To')
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--col-->
                            </div><!--form-group-->

                            <div class="form-group row">
                                {{ html()->label('Venue')->class('col-md-2 form-control-label')->for('venue') }}

                                <div class="col-md-6">
                                    {{ html()->text('schedules['.$date->toDateString().'][venue]')
                                        ->class('form-control')
                                        ->placeholder('Venue Name')
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--col-->
                            </div><!--form-group-->
                        </div><!--col-->
                    </div><!--row-->
                @endforeach

            </div>
        </div><!--card-body-->
    </div>
    <div class="card-footer clearfix">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.setup.events.index'), 'Cancel') }}
            </div><!--col-->

            <div class="col text-right">
                {{ form_submit('Create') }}
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
    </div><!--card-->


    {{ html()->form()->close() }}

    @push('after-scripts')
        <script type="text/javascript">
            $(function () {
                $('.time').datetimepicker({
                    format: 'LT'
                });
                $('ul li:first-child').addClass('active');
                $('.tab-content div').first().addClass('in active');
            });
        </script>
    @endpush

@endsection
@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . $page_heading)

@section('content')
    {{ html()->form('POST', route($module_route.'.store'))->acceptsFiles()->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $module_parent }}
                        <small class="text-muted">{{ $page_heading }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr/>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Event Name')->class('col-md-2 form-control-label')->for('event_name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Event Name')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Event Venue')->class('col-md-2 form-control-label')->for('event_venue') }}
                        <div class="col-md-10">
                            {{ html()->text('venue')
                                ->class('form-control')
                                ->placeholder('Event Venue')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Organizer')->class('col-md-2 form-control-label')->for('organizer') }}

                        <div class="col-md-10">
                            {{ html()->text('organizer')
                                ->class('form-control')
                                ->placeholder('Organizer')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Description')->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder('Description')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Start Date')->class('col-md-2 form-control-label')->for('start_date') }}

                        <div class="col-md-10">
                            {{ html()->text('start_date')
                                ->class('form-control datepicker')
                                ->placeholder('Start Date')
                                ->attribute('maxlength', 191)
                                ->required()
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('End Date')->class('col-md-2 form-control-label')->for('end_date') }}
                        <div class="col-md-10">
                            {{ html()->text('end_date')
                                ->class('form-control datepicker')
                                ->placeholder('End Date')
                                ->attribute('maxlength', 191)
                                ->required()
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Banner')->class('col-md-2 form-control-label')->for('banner') }}
                        <div class="col-md-10">
                            {{ html()->file('banner')
                                ->required()
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Status')->class('col-md-2 form-control-label')->for('active') }}
                        <div class="col-md-10">
                            <label class="switch switch-3d switch-primary">
                                {{ html()->checkbox('active', true, '1')->class('switch-input') }}
                                <span class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

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
            $(".datepicker").datetimepicker({
                format: 'dd-MM-yyyy',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
        </script>
    @endpush

@endsection
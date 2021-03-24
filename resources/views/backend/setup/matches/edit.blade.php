@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . $page_heading)

@section('content')
    {{ html()->modelForm($module_name_singular, 'PATCH', route($module_route.'.update', $module_name_singular->id))->acceptsFiles()->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ $module_parent }} ||
                        <small class="text-muted">{{ $page_heading }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <hr/>
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Event')->class('col-md-2 form-control-label')->for('event_id') }}
                        <div class="col-md-4">
                            {{ html()->select('event_id', $trans_events, null)
                                ->class('form-control')
                                ->placeholder('Select Event')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Match')->class('col-md-2 form-control-label')->for('event_name') }}
                        <div class="col-md-4">
                            {{ html()->select('team1', $teams, null)
                                ->class('form-control')
                                ->placeholder('Select 1st Team')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                        <h4>Vs</h4>
                        <div class="col-md-4">
                            {{ html()->select('team2', $teams, null)
                                ->class('form-control')
                                ->placeholder('Select 2nd Team')
                                ->attribute('maxlength', 191)
                                ->required()}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Date & Time')->class('col-md-2 form-control-label')->for('date') }}
                        <div class="col-md-4">
                            {{ html()->text('date')
                                ->class('form-control')
                                ->id('date')
                                ->attribute('autocomplete','off')
                                ->placeholder('Match Date')
                                ->required() }}
                        </div><!--col-->
                        &nbsp; &nbsp; &nbsp;
                        <div class="col-md-4">
                            {{ html()->text('time')
                                ->class('form-control time')
                                ->id('time')
                                ->attribute('autocomplete','off')
                                ->placeholder('Match Time')
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Venue')->class('col-md-2 form-control-label')->for('venue') }}
                        <div class="col-md-8">
                            {{ html()->text('venue')
                                ->class('form-control')
                                ->placeholder('Sher-e-Bangla National Cricket Stadium')
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
                    {{ form_cancel(route('admin.setup.matches.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Update') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
    @push('after-scripts')
        <script type="text/javascript">
            $(function () {
                $('#time').datetimepicker({
                    format: 'LT'
                });
                $('#date').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        </script>
    @endpush

@endsection

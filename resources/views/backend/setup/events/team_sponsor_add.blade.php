@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . $page_heading)

@section('content')
    {{ html()->form('POST', route($module_route.'.team_sponsor.store', $event->id))->class('form-horizontal')->open() }}
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
                        {{ html()->label('Select Team')->class('col-md-2 form-control-label')->for('teams') }}
                        <div class="col-md-10">
                            {{ html()->select('teams[]', $teams, null)
                                ->class('form-control')
                                ->id('teams')
                                ->attribute('multiple', "multiple") }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Select Sponsors')->class('col-md-2 form-control-label')->for('sponsors') }}
                        <div class="col-md-10">
                            {{ html()->select('sponsors[]', $sponsors, null)
                                   ->class('form-control')
                                   ->id('sponsors')
                                   ->attribute('multiple', "multiple") }}
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

@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#teams').select2();
            $('#sponsors').select2();
        });
    </script>
@endpush
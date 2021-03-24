@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . $page_heading)

@section('content')
    {{ html()->modelForm($module_name_singular, 'PATCH', route($module_route.'.update', [$team_id,$module_name_singular->id]))->acceptsFiles()->class('form-horizontal')->open() }}
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
                        {{ html()->label('Member Name')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-8">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Tamim Iqbal')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Role')->class('col-md-2 form-control-label')->for('role') }}

                        <div class="col-md-3">
                            {{ html()->text('role')
                                ->class('form-control')
                                ->placeholder('Batsman')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->

                        {{ html()->label('Photo')->class('col-md-2 form-control-label')->for('photo') }}
                        <div class="col-md-3">
                            {{ html()->file('photo') }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Batting Style')->class('col-md-2 form-control-label')->for('batting_style') }}

                        <div class="col-md-3">
                            {{ html()->text('batting_style')
                                ->class('form-control')
                                ->placeholder('Right Handed Bat')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->

                        {{ html()->label('Bowling Style')->class('col-md-2 form-control-label')->for('bowling_Style') }}
                        <div class="col-md-3">
                            {{ html()->text('bowling_Style')
                                ->class('form-control')
                                ->placeholder('Right Handed Pacer')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('About')->class('col-md-2 form-control-label')->for('about') }}

                        <div class="col-md-8">
                            {{ html()->textarea('about')
                                ->class('form-control')
                                ->placeholder('About')}}
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Status')->class('col-md-2 form-control-label')->for('active') }}
                        <div class="col-md-8">
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
                    {{ form_cancel(route('admin.setup.teams.index'), 'Cancel') }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Update') }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}


@endsection

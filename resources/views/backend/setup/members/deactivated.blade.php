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
                    @include('backend.setup.events.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>Description</th>
                                <th>Logo</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($$module_name as $module_name)
                                <tr>
                                    <td>{{ $module_name->name }}</td>
                                    <td>{{ $module_name->description }}</td>
                                    <td><img height="40" width="50" src="{{ "/images/".$module_name->logo }}" alt=""></td>
                                    <td>{{ $module_name->created_at }}</td>
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

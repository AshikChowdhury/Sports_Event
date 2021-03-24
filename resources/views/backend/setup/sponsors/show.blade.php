@extends ('backend.layouts.app')

@section ('title', app_name() . ' | ' . $page_heading)

@section('content')
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

            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab"
                               aria-controls="overview" aria-expanded="true"><i
                                        class="fa fa-eye"></i> {{ __('labels.backend.access.users.tabs.titles.overview') }}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                            @include('backend.setup.sponsors.show.tabs.overview')
                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>{{ __('labels.backend.access.users.tabs.content.overview.created_at') }}
                            :</strong> {{ $module_name_singular->updated_at->timezone(get_user_timezone()) }}
                        ({{ $module_name_singular->created_at->diffForHumans() }}),
                        <strong>{{ __('labels.backend.access.users.tabs.content.overview.last_updated') }}
                            :</strong> {{ $module_name_singular->created_at->timezone(get_user_timezone()) }}
                        ({{ $module_name_singular->updated_at->diffForHumans() }})
                        @if ($module_name_singular->trashed())
                            <strong>{{ __('labels.backend.access.users.tabs.content.overview.deleted_at') }}
                                :</strong> {{ $module_name_singular->deleted_at->timezone(get_user_timezone()) }}
                            ({{ $module_name_singular->deleted_at->diffForHumans() }})
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection

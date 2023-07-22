@extends('layouts.app')
@section("title", trans("projects.projects"))
@section('breadcrumb')
    @include('layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('projects.projects') => null,
        ],
    ])
@stop
@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="row card-title m-0">
                <div class="col-md-4">

                <h3 class="fw-bold m-0">{{__('projects.projects')}}</h3>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                    <a href="{{route('projects.create')}}" class="btn btn-sm fw-bold btn-primary" >
                        {{__('common.create')}}</a>

                </div>
            </div>
            <!--end::Card title-->

        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            @include('projects.table')
            {{$projects->links('pagination.paginator', ['paginator' => $projects, 'filter' => ''])}}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection

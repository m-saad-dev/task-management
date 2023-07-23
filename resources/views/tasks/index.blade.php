@extends('layouts.app')
@section("title", trans("tasks.tasks"))
@section('breadcrumb')
    @include('layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('tasks.tasks') => null,
        ],
    ])
@stop
{{--@section('before-js')--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>--}}

{{--  --}}{{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
{{--  <script src="{{asset('jquery-ui-1.13.2.custom/jquery-ui.js')}}"></script>--}}
{{--  <script>--}}
{{--  $( function() {--}}
{{--    $( "#sortable" ).sortable();--}}
{{--  } );--}}
{{--  </script>--}}
{{--@stop--}}
@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="row card-title m-0">
                <div class="col-md-4">

                <h3 class="fw-bold m-0">{{__('tasks.tasks')}}</h3>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                    <a href="{{route('tasks.create')}}" class="btn btn-sm fw-bold btn-primary" >
                        {{__('common.create')}}</a>

                </div>
            </div>
            <!--end::Card title-->

        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
                @livewire('tasks-table', ['tasks'=> $tasks])
{{--            {{$tasks->links('pagination.paginator', ['paginator' => $tasks, 'filter' => ''])}}--}}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection

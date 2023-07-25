@extends('layouts.app')
@section("title", trans("tasks.tasks"))
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@stop

@section('breadcrumb')
    @include('layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('tasks.tasks') => route('tasks.index'),
            trans('common.edit') => null,
        ],
    ])
@stop
@section('page_title')
{{__('common.edit')}}
@stop
@section('actions')
    <a href="{{url()->previous()}}" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">{{__('common.back')}}</a>
@stop
@section('content')
    <div class="card mb-5 mb-xl-10">
        @if (session()->has('issue_message'))
            <div class="alert alert-danger">{{ session()->get('issue_message') }}</div>
        @endif
        <!--begin::Form-->
        <form class="form" action="{{route('tasks.update', ['task' => $task->id])}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            @include('tasks.fields', $task)
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">@lang('common.cancel')</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('common.save')</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection
@section('after-js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script>
            $('#select2').select2();
        </script>
@stop

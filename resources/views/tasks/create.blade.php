@extends('layouts.app')
@section("title", trans("menu.tasks"))
@section('breadcrumb')
    @include('layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('tasks.tasks') => route('tasks.index'),
            trans('common.create') => null,
        ],
    ])
@stop
@section('page_title')
{{__('common.edit')}}
@stop
@section('content')
    <div class="card mb-5 mb-xl-10">
        @if (session()->has('issue_message'))
            <div class="alert alert-danger">{{ session()->get('issue_message') }}</div>
        @endif
        <!--begin::Form-->
        <form class="form" action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('tasks.fields')
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

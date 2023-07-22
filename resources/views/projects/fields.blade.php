<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{__('fields.name')}}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="name" class="form-control" placeholder="{{__('fields.name')}}" value="{{isset($project) ? $project->name : (old('name') ?? '')}}" />
            @error('name')
                <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->

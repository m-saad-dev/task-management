<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-md-4 col-form-label  fw-semibold ">{{__('fields.name')}}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-md-8">
            <input type="text" name="name" class="form-control" required placeholder="{{__('fields.name')}}" value="{{isset($task) ? $task->name : (old('name') ?? '')}}" />
            @error('name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->

    </div>
    <!--end::Input group-->
    <div class="row mb-6 mt-3">
        <!--begin::Label-->
        <label class="col-md-4 col-form-label fw-semibold">{{__('fields.project')}}</label>
        <!--end::Label-->
        <!--begin::Col-->
{{--        {{dd(old('project_id'))}}--}}
        <div class="col-md-8">
            <select id="select2" class="form-control" name="project_id">
                <option value=""> Select </option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}"
                            @if((isset($task) || old('project_id')) && ($project->id == $task->project_id || $project->id == old('project_id')))
                                selected
                            @endif
                    >
                        {{$project->name}}
                    </option>
                @endforeach
            </select>
            @error('project_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


        </div>
    </div>
</div>
<!--end::Card body-->

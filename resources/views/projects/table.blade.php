<div>
    <!--begin::Table-->
    <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9" style="max-width: inherit !important;">
        <!--begin::Thead-->
        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
        <tr>
            <th class="min-w-50% max-w-100%">#</th>
            <th class="min-w-100px"> {{__('fields.name')}}</th>
            <th class="min-w-150px"> {{__('common.actions')}}</th>
        </tr>
        </thead>
        <!--end::Thead-->
        <!--begin::Tbody-->
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td class="min-w-50% max-w-100%">
                    <span class="">{{$loop->iteration}}</span>
                </td>
                <td>
                    <a href="{{route('projects.show', $project->id)}}" class="fs-7 fw-semibold text-decoration-none">{{$project->name}}</a>
                </td>
                <td class="text-start">
                    <!--begin::Actions-->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            {{__('common.actions')}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('projects.edit', $project->id)}}">
                                    {{__('common.edit')}}
                                </a>

                            </li>
                            <li>
                                 <form method="post" id="my_form" class="menu-item px-3" action="{{route('projects.destroy', $project->id)}}">
                                     @csrf @method('Delete')
                                     <a role="button" href="javascript::void();" onclick="this.closest('form').submit()" methods='DELETE' class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                         {{__('common.delete')}}</a>
                                 </form>
                            </li>
                        </ul>
                    </div>

                    <!--end::Actions-->
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Tbody-->
    </table>
    <!--end::Table-->
</div>

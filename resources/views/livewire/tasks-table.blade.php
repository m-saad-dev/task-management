<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9" style="max-width: inherit !important;">
    <!--begin::Thead-->
    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
    <tr>
        <th class="min-w-50% max-w-100%">#</th>
        <th class="min-w-100px fs-3 fw-semibold"> {{__('fields.name')}}</th>
        <th class="min-w-100px fs-3 fw-semibold"> {{__('fields.project')}}</th>
        <th class="min-w-150px fs-3 fw-semibold"> {{__('common.actions')}}</th>
    </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody wire:sortable="updateTaskOrder">
    @foreach($tasks as $task)
        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
            <td wire:sortable.handle>
                    <span class="svg-icon svg-icon-2x align-left">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor"></path>
                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor"></path>
                        </svg>
                    </span>
            </td>
            <td wire:sortable.handle>
                <p href="javascript::void();" class="fs-4 fw-semibold text-black">{{$task->name}}</p>
            </td>
            <td wire:sortable.handle>
                <p class="fs-7 fw-semibold ">{{$task->project?->name}}</p>
            </td>
            <td class="text-start">
                <!--begin::Actions-->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        {{__('common.actions')}}
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('tasks.edit', $task->id)}}">
                                {{__('common.edit')}}
                            </a>
                        </li>
                        <li>
                                <a href="javascript::void(0);" role="button" onclick="$('#my_form-{{$task->id}}').submit()" data-kt-ecommerce-product-filter="delete_row">
                                    {{__('common.delete')}}</a>
                            <form method="post" id="my_form-{{$task->id}}" class="menu-item " action="{{route('tasks.destroy', $task->id)}}">
                                @csrf
                                @method('Delete')
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

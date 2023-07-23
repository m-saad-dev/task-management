<!-- Sidebar Holder -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h5>Task Management
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" id="" class="btn btn-info float-end">
                    {{-- <i class="fas fa-align-left"></i> --}}
                    <span> Logout </span>
                </button>

            </form>
        </h5>

    </div>
    <hr>
    <ul class="list-unstyled">
        <li class="{{--active--}}">
            <a href="{{route('projects.index')}}"> {{ __('projects.projects') }} </a>
        </li>
        <li>
            <a href="{{route('tasks.index')}}"> {{ __('tasks.tasks') }} </a>
        </li>
    </ul>
</nav>

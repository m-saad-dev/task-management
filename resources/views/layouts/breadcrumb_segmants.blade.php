@if(isset($menu) && count($menu) > 0)
    @foreach($menu as $title => $route)
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ $route ?? 'javascript::void(0)' }}" class="text-muted text-hover-primary">{{ $title }}</a>
        </li>
        <!--end::Item-->
        @if($loop->iteration != count($menu))
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
        @endif
    @endforeach
@endif

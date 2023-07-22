@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link rounded-lg ml-3 gray-bg dark gray-bg hover-bg" href="{{ $paginator->url(1).$filter  }}">
                @lang('pagination.previous')
            </a>
        </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item  ml-3 {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link dark rounded-lg gray-bg hover-bg" href="{{ $paginator->url($i).$filter }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link gray-bg dark rounded-lg gray-bg hover-bg" href="{{ $paginator->url($paginator->currentPage()+1).$filter  }}" >
                @lang('pagination.next')
            </a>
        </li>
    </ul>
@endif





@if($items->lastPage() > 1)
    <nav aria-label="Page navigation" id="pagination">
        <ul class="pagination justify-content-center">

            <li class="page-item {{$items->onFirstPage() ? 'disabled' : ''}}">
                <a class="page-link" href="{{$items->url(1)}}" aria-label="Previous">
                    <i aria-hidden="true" class="fa fa-angle-left disabled"></i>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            @if($items->onFirstPage())
                @for($i = $items->currentPage(); $i <= $items->currentPage() + 4 && $i <= $items->lastPage(); $i++)
                    <li class="page-item {{($i == $items->currentPage()) ? 'active disabled' : '' }}"><a
                            class="page-link" href="{{$items->url($i)}}">{{$i}}</a></li>
                @endfor

            @elseif($items->currentPage() == 2)
                @for($i = $items->currentPage() - 1; $i <= $items->currentPage() + 3 && $i <= $items->lastPage(); $i++)
                    <li class="page-item {{($i == $items->currentPage()) ? 'active disabled' : '' }}"><a
                            class="page-link" href="{{$items->url($i)}}">{{$i}}</a></li>
                @endfor

            @elseif($items->lastPage() > 5 && $items->currentPage() == $items->lastPage() - 1)
                @for($i = $items->currentPage() - 3; $i <= $items->currentPage()+1 && $i <= $items->lastPage(); $i++)
                    <li class="page-item {{($i == $items->currentPage()) ? 'active disabled' : '' }}"><a
                            class="page-link" href="{{$items->url($i)}}">{{$i}}</a></li>
                @endfor

            @elseif($items->lastPage() > 5 && $items->currentPage() == $items->lastPage())
                @for($i = $items->currentPage() - 4; $i <= $items->currentPage() && $i <= $items->lastPage(); $i++)
                    <li class="page-item {{($i == $items->currentPage()) ? 'active disabled' : '' }}"><a
                            class="page-link" href="{{$items->url($i)}}">{{$i}}</a></li>
                @endfor

            @else
                @for($i = $items->currentPage() - 2; $i <= $items->currentPage() + 2 && $i <= $items->lastPage(); $i++)
                    <li class="page-item {{($i == $items->currentPage()) ? 'active disabled' : '' }}"><a
                            class="page-link" href="{{$items->url($i)}}">{{$i}}</a></li>
                @endfor
            @endif

            <li class="page-item {{($items->currentPage() >=  $items->lastPage()) ? 'disabled' : ''}}">
                <a class="page-link" href="{{ $items->url($items->lastPage())}}" aria-label="Next">
                    <i aria-hidden="true" class="fa fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endif

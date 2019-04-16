<div class="block clearfix">
    <h3 class="title">{{trans('text.navigation')}}</h3>
    <div class="separator-2"></div>
    @if (isset($menu))
        <nav>
            <ul class="nav flex-column">
                @foreach($menu as $item)
                    <li class="nav-item"><a
                            class="nav-link {{ (url()->current() == $item->path) ? 'active' : '' }}"
                            href="{{$item->path}}">{{$item->title}}</a></li>
                @endforeach
            </ul>
        </nav>
    @endif
</div>

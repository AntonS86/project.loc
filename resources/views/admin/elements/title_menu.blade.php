<div class="main-navigation animated">

    <ul class="nav-bar nav justify-content-center">
        @foreach($menu as $i => $item)
            <li class="nav-item mx-3 {{$item->children->isEmpty() ? '' : 'dropdown'}}">
                <div id="dropdown-{{$i}}"
                     class="nav-link {{$item->children->isEmpty() ? '' : 'dropdown-toggle'}}" {{$item->children->isEmpty() ? '' : 'data-toggle=dropdown'}}>{{$item->title}}
                    <a href="#" class="text-right"><i class="text-danger fa fa-times pl-10"></i></a></div>
                @if(! $item->children->isEmpty())
                    <ul class="dropdown-menu flex-column">
                        @foreach($item->children as $children)
                            <li class="nav-item">
                                <div class="nav-link justify-content-between">{{$children->title}}<span><i
                                            class="text-danger fa fa-times pl-10"></i></span></div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        <li class="nav-item mx-3">
            <a class="nav-link">Добавить пункт</a>
        </li>
    </ul>

</div>

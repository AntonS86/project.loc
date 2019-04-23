@if(isset($menu))
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @foreach($menu as $item)
                    <li class="nav-item {{$item->path == url()->current() ? 'active' : ''}}">
                        <a href="{{$item->path}}" class="nav-link" aria-haspopup="true" aria-expanded="false"> <i
                                class="menu-icon {{$item->icon}}"></i>{{$item->title}}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" aria-haspopup="true" aria-expanded="false"> <i
                            class="menu-icon fa fa-power-off"></i>{{__('text.logout')}}</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

@endif

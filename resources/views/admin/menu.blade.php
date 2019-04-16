
 <ul class="navbar-nav ml-xl-auto">
	@guest
		<li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ title_case(__('text.login')) }}</a>
		</li>
		
	@else
		@if(isset($menu))
		@foreach($menu as $item)
		<li class="nav-item">
			<a href="{{$item->path}}" class="nav-link"  aria-haspopup="true" aria-expanded="false">{{$item->title}}</a>
		</li>
		@endforeach
		@endif

	<li class="nav-item dropdown">
		<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
			{{ Auth::user()->name }} <span class="caret"></span>
		</a>

		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="{{ route('logout') }}"
				onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
				{{ title_case(__('text.logout')) }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
	</li>
	@endguest     
</ul>  

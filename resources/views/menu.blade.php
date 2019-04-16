
@if (isset($menu))
<ul class="navbar-nav ml-xl-auto">
@foreach($menu as $key => $item)
	<li class="nav-item {{(isset($item->children) && $item->children->isNotEmpty()) ? 'dropdown' : ''}} {{ (url()->current() == $item->path) ? 'active' : '' }}">
		  <a href="{{ $item->path }}" class="nav-link {{(isset($item->children) && $item->children->isNotEmpty()) ? 'dropdown-toggle' : ''}}" id="dropdown-{{$key}}" {{(isset($item->children) && $item->children->isNotEmpty()) ? 'data-toggle=dropdown' : ''}} aria-haspopup="true"
             aria-expanded="false">{{$item->title}}</a>

			@if(isset($item->children) && $item->children->isNotEmpty())
		  	<ul class="dropdown-menu" aria-labelledby="dropdown-{{$key}}">

			  	@foreach($item->children as $itemChildren)
				<li>
					<a href="{{$itemChildren->path}}">{{$itemChildren->title}}</a>
				</li>
				@endforeach
			</ul>
		  	@endif
	</li>
@endforeach
</ul>
@endif

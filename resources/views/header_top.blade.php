<div class="header-top hidden-md-down">
	<div class="container">
	<div class="row">
		<div class="col-2 col-md-5">
		<!-- header-top-first start -->
		<!-- ================ -->
			<div class="header-top-first clearfix">
				@if(isset($company->companyLinks))
				<ul class="social-links circle small animated-effect-1 clearfix hidden-sm-down">
					@foreach($company->companyLinks as $socialLink)
					<li class="{{$socialLink->name}}"><a href="{{$socialLink->link}}"><i class="fa {{$socialLink->icon}}"></i></a></li>
					@endforeach
				</ul>
				<div class="social-links hidden-md-up circle small animated-effect-1">
					<div class="btn-group dropdown">
						<button id="header-top-drop-1" type="button" class="btn dropdown-toggle dropdown-toggle--no-caret" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></button>
						<ul class="dropdown-menu dropdown-animation" aria-labelledby="header-top-drop-1">
							@foreach($company->companyLinks as $socialLink)
							<li class="{{$socialLink->name}}"><a href="{{$socialLink->link}}"><i class="fa {{$socialLink->icon}}"></i></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif
			</div>
		<!-- header-top-first end -->
		</div>
		<div class="col-10 col-md-7">

		<!-- header-top-second start -->
		<!-- ================ -->
		<div id="header-top-second"  class="clearfix text-right">

			@if($company)
				<ul class="list-inline">
					<li class="list-inline-item"><i class="fa fa-map-marker pr-1 pl-10"></i>{{$company->address}}</li>
					<li class="list-inline-item"><a href="tel:{{$company->phone}}" class="link-dark"><i class="fa fa-phone pr-1 pl-10"></i>{{$company->phone}}</a></li>
					<li class="list-inline-item"><a href="mailto:{{$company->email}}?subject=Вопрос по Продажам" class="link-dark"><i class="fa fa-envelope-o pr-1 pl-10"></i>{{$company->email}}</a></li>
				</ul>
			@endif

		</div>
		<!-- header-top-second end -->
		</div>
	</div>
	</div>
</div>
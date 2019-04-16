<section class="main-container">
	<div class="container">
		<div class="row">
			<div class="main col-lg-8">
				<h1 class="page-title">Редактор статей</h1>
				<div class="separator-2"></div>

				<div id="main-content">
					@if(isset($articles))
					@include('admin.articles_table')
					@else
					@include('admin.articles_create')
					@endif
				</div>
	
			</div>

			<div class="col-lg-4">
				<div class="block clearfix">
					@include('admin.category_edit')
					
				</div>
			</div>
		</div>
	</div>
</section>

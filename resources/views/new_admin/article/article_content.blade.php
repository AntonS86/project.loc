@component('new_admin.components.breadcrumbs')
    Редактор статей
@endcomponent

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <div class="row">

            <div class="main col-md-8">

                @if(isset($articles))
                    @include('new_admin.article.articles_table')
                @else
                    @include('new_admin.article.articles_create')
                @endif

            </div>
            <div class="col-md-4">
                @include('new_admin.article.category_edit')
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>

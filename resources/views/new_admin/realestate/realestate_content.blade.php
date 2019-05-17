@component('new_admin.components.breadcrumbs')
    Редактор объявлений
@endcomponent

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <div class="row">

            <div class="main col-md-8">

                @if(isset($realestates))
                    @include('new_admin.realestate.realestates_table')
                @else
                    @include('new_admin.realestate.realestate_edit')
                @endif

            </div>
            <div class="col-md-4">
                @if(isset($realestates))
                    @include('new_admin.realestate.search_realestate')
                @endif
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>

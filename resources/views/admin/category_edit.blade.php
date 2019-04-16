<div style="overflow-wrap: break-word;">
    <h1 class="page-title">Редактор категорий</h1>
    <div class="separator-3"></div>
    @if ($errors->any())
        <div class="alert  alert-icon alert-danger" role="alert">
            <i class="fa fa-times"></i>
            @foreach($errors->all() as $k => $error){{$k+1}}&nbsp;{{$error}}<br>@endforeach
        </div>
    @endif
    @if (session('catStatus'))
        <div class="alert  alert-icon alert-info" role="alert">
            <i class="fa fa-info-circle"></i>
            {{session('catStatus')}}
        </div>
    @endif
    @include('admin.category_create')

    <div class="separator-3"></div>
    @include('admin.category_update')

    <div class="separator-3"></div>
    @include('admin.category_destroy')
</div>

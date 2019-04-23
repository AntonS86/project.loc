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
@include('new_admin.article.category_create')


@include('new_admin.article.category_update')

@include('new_admin.article.category_destroy')

<form action="{{route('admin.categories.update')}}" method="post">
    <fieldset class="form-group">
        <legend class="col-form-legend">Изменить категорию</legend>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id">Все категории</label>
            <select class="form-control" name="id">
                <option disabled>Выбери категорию</option>
                @foreach($categories as $category)
                    @continue($category->alias === 'news')
                    <option value="{{$category->id}}" class="font-weight-bold">{{$category->title}}</option>
                    @if(isset($category->children))
                        @foreach($category->children as $categoryChild)
                            <option value="{{$categoryChild->id}}">
                                &nbsp;&nbsp;{{$categoryChild->title}}</option>
                        @endforeach
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group has-feedback">
            <label for="title">Название категории</label>
            <input type="text" name="title" class="form-control" placeholder="Новое название" value="">
        </div>

        <div>
            <button type="submit" class="btn btn-animated btn-default">Обновить<i class="fa fa-floppy-o"></i></button>
        </div>
    </fieldset>
</form>

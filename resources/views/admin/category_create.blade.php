<form action="{{route('admin.categories.store')}}" method="post" class="rounded">
    <fieldset class="form-group">
        <legend class="col-form-legend">Создание категории</legend>
        @csrf
        <div class="form-group">
            <label for="parent">Все категории</label>
            <select class="form-control" name="parent">
                <option value="0" class="font-weight-bold">--Новая категория--</option>
                @foreach($categories as $category)
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
            <input type="text" name="title" class="form-control" placeholder="Новая категория" value="">
        </div>

        <div>
            <button type="submit" class="btn btn-animated btn-default">Создать<i class="fa fa-floppy-o"></i></button>
        </div>
    </fieldset>
</form>

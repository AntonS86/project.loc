@if (! $categories->isEmpty())
<form action="{{route('admin.categories.destroy')}}" method="post">
    <fieldset class="form-group">
        <legend class="col-form-legend">Удалить категорию<br>Статьи удалятся автоматически</legend>
        @csrf
        @method('DELETE')
        <div class="form-check">
            @foreach($categories as $i => $category)
                @continue($category->alias === 'news')
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="id[]" value="{{$category->id}}" id="delete-{{$i}}" class="custom-control-input">
                    <label for="delete-{{$i}}" class="custom-control-label">{{$category->title}}</label>
                </div>
                @if(isset($category->children))
                    @foreach($category->children as $j => $categoryChild)
                        <div class="custom-control custom-checkbox">
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="id[]" value="{{$categoryChild->id}}" id="delete-{{$i}}-{{$j}}" class="custom-control-input">
                        <label for="delete-{{$i}}-{{$j}}" class="custom-control-label">{{$categoryChild->title}}</label>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
        <div>
            <button type="submit" class="btn btn-animated btn-danger">Удалить<i class="fa fa-warning"></i></button>
        </div>
    </fieldset>
</form>
@endif


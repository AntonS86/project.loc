<div class="card">
    <div class="card-header">
        <strong class="card-title">Поик объявлений</strong>
    </div>
    <div class="card-body">
        <form class="rounded" id="search_realestates"
              method="GET" action="{{route('admin.realestates.search')}}">
            @csrf
            @if($rubrics->isNotEmpty())
                <div class="form-group">
                    <label for="parent">Рубрика</label>
                    <select class="form-control" name="rubric_id">
                        @foreach($rubrics as $rubric)
                            <option class="font-weight-bold"
                                    {{session('rubric_id') == $rubric->id ? 'selected' : ''}} value="{{$rubric->id}}">{{$rubric->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if($types->isNotEmpty())
                <div class="form-group">
                    <label for="parent">Категория</label>
                    <select class="form-control" name="type_id">
                        <option class="font-weight-bold" value="">Все категории</option>
                        @foreach($types as $type)
                            <option class="font-weight-bold"
                                    {{session('type_id') == $type->id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group has-feedback">
                <label for="title">Улица</label>
                <input type="text" name="street_name" class="form-control"
                       data-search_address="{{route('search.street')}}"
                       value="{{session('street_name') ?? ''}}" placeholder="Улица" id="street_name">
                <input type="hidden" name="street_id" value="{{session('street_id') ?? ''}}">
                <div class="dropdown-div">
                    <ul id="list-street" class="dropdown-list" hidden>

                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label>Сортировать по</label>
                <select class="form-control" name="sort">
                    <option selected="selected" value="created_at">Дате</option>
                    <option value="price">Цене</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="sort_by" value="{{session('sort_by') ?? 'DESC'}}">
                <button class="btn bg-instagram color-white btn-block" id="button-sort"
                        value="{{session('sort_by') ?? 'DESC'}}"><i
                        class="fa {{session('sort_by') == 'ASC' ? 'fa-arrow-up' : 'fa-arrow-down'}}"></i>
                </button>
            </div>
            <div>
                <button type="submit" value="send"
                        class="btn bg-instagram color-white btn-block">{{trans('text.to_find')}}</button>
            </div>
        </form>
    </div>
</div>

<div class="banner dark-translucent-bg padding-bottom-clear"
     style="background-image:url({{asset('images/search-backgr.jpeg')}});background-position: 50% 32%;">

    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
                <h2 class="title hc-element-invisible" data-animation-effect="fadeIn"
                    data-effect-delay="100">{{trans('text_action.welcome_market')}}</h2>
                {{-- <div class="separator hc-element-invisible mt-10" data-animation-effect="fadeIn"
                      data-effect-delay="100"></div>
                 <p class="text-center hc-element-invisible" data-animation-effect="fadeIn" data-effect-delay="100"></p>--}}
            </div>
        </div>
    </div>
    <!-- section start -->
    <!-- ================ -->
    <div class="dark-translucent-bg section">
        <div class="container-fluid">
            <!-- filters start -->
            <div class="sorting-filters text-center mb-20 d-flex justify-content-center">
                <form class="form-inline" id="search_realestates"
                      method="GET" action="{{route('realestates.search')}}">
                    @csrf
                    @if($rubrics->isNotEmpty())
                        <div class="form-group mr-1">
                            <label class="invisible">Рубрика</label>
                            <select class="form-control" name="rubric_id">
                                @foreach($rubrics as $rubric)
                                    <option
                                        {{session('rubric_id') == $rubric->id ? 'selected' : ''}} value="{{$rubric->id}}">{{$rubric->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($types->isNotEmpty())
                        <div class="form-group mr-1">
                            <label class="invisible">Категория</label>
                            <select class="form-control" name="type_id">
                                <option value="">Все категории</option>
                                @foreach($types as $type)
                                    <option
                                        {{session('type_id') == $type->id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group mr-1 position-relative">
                        <label class="invisible">Улица</label>
                        <input type="text" class="form-control" name="street_name"
                               data-search_address="{{route('search.street')}}"
                               value="{{session('street_name') ?? ''}}" placeholder="Улица" id="street_name">
                        <input type="hidden" name="street_id" value="{{session('street_id') ?? ''}}">
                        <div class="dropdown-div">
                            <ul id="list-street" class="dropdown-list" hidden>

                            </ul>
                        </div>
                    </div>
                    <div class="form-group mr-1">
                        <label>Сортировать по</label>
                        <select class="form-control" name="sort">
                            <option value="created_at">Дате</option>
                            <option value="price" {{session('sort') === 'price' ? 'selected' : ''}}>Цене</option>
                        </select>
                    </div>
                    <div class="form-group mr-1">
                        <input type="hidden" name="sort_by" value="{{session('sort_by') ?? 'DESC'}}">
                        <button class="btn btn-default" id="button-sort" value="{{session('sort_by') ?? 'DESC'}}"><i
                                class="fa {{session('sort_by') == 'ASC' ? 'fa-arrow-up' : 'fa-arrow-down'}}"></i>
                        </button>
                    </div>
                    <div class="form-group mr-1">
                        <button type="submit" class="btn btn-default" name="submit"
                                value="send">{{trans('text.to_find')}}</button>
                    </div>

                </form>
            </div>
            <!-- filters end -->
        </div>
    </div>
    <!-- section end -->
</div>

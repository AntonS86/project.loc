<div class="banner dark-translucent-bg padding-bottom-clear"
     style="background-image:url({{asset('images/slider/002_1920_650.jpg')}});background-position: 50% 32%;">

    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
                <h2 class="title hc-element-invisible" data-animation-effect="fadeIn" data-effect-delay="100">Wellcome
                    to <strong>Shop</strong></h2>
                <div class="separator hc-element-invisible mt-10" data-animation-effect="fadeIn"
                     data-effect-delay="100"></div>
                <p class="text-center hc-element-invisible" data-animation-effect="fadeIn" data-effect-delay="100">Lorem
                    ipsum dolor sit amet, consectetur adipisicing elit. Excepturi perferendis magnam ea necessitatibus,
                    officiis voluptas odit! Aperiam omnis, cupiditate laudantium velit nostrum, exercitationem
                    accusamus, possimus soluta illo deserunt tempora qui.</p>
            </div>
        </div>
    </div>
    <!-- section start -->
    <!-- ================ -->
    <div class="dark-translucent-bg section">
        <div class="container-fluid">
            <!-- filters start -->
            <div class="sorting-filters text-center mb-20 d-flex justify-content-center">
                <form class="form-inline" data-search_address="{{route('search.address')}}" id="search_market">
                    @if($rubrics->isNotEmpty())
                        <div class="form-group mr-1">
                            <label class="invisible">Рубрика</label>
                            <select class="form-control" name="rubric_id">
                                @foreach($rubrics as $rubric)
                                    <option
                                        {{$loop->first ? 'selected' : ''}} value="{{$rubric->id}}">{{$rubric->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($types->isNotEmpty())
                        <div class="form-group mr-1">
                            <label class="invisible">Категория</label>
                            <select class="form-control" name="type_id">
                                <option>Все категории</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group mr-1 position-relative">
                        <label class="invisible">Улица</label>
                        <input type="text" class="form-control" value="" placeholder="Улица" id="street_name">
                        <div class="dropdown-div">
                            <ul id="list-street" class="dropdown-list" hidden>

                            </ul>
                        </div>
                    </div>
                    <div class="form-group mr-1">
                        <label>Сортировать по</label>
                        <select class="form-control" name="sort">
                            <option selected="selected" value="created_at">Дате</option>
                            <option value="price">Цене</option>
                        </select>
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-default" id="button-sort" data-sort="DESC"><i
                                class="fa fa-arrow-down"></i></button>
                    </div>

                    <div class="form-group mr-1">
                        <button href="#" class="btn btn-default">Найти</button>
                    </div>

                </form>
            </div>
            <!-- filters end -->
        </div>
    </div>
    <!-- section end -->
</div>

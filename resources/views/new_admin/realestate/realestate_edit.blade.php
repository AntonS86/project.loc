<div class="card">
    <div class="card-header">
        <strong
            class="card-title">{{isset($realestate->id) ? 'Редактирование объявления' : 'Создать объявление'}}</strong>
    </div>
    <div class="card-body">
        <form class="row" id="form-edit" method="post"
              data-success_redirect="{{route('admin.realestates.index')}}"
              action="{{isset($realestate->id)
              ? route('admin.realestates.update', ['realestate' => $realestate->id])
              : route('admin.realestates.store')}}">
            @if (isset($realestate->id))
                @method('PUT')
                <input type="hidden" name="realestate_id" value="{{$realestate->id}}">
            @endif
            @csrf
            @if(isset($rubrics) && $rubrics->isNotEmpty())
                <div class="form-group col-sm-6">
                    <label for="rubric">Рубрика</label>
                    <select class="form-control" name="rubric_id" id="rubric">
                        @foreach($rubrics as $rubric)
                            <option class="font-weight-bold"
                                    value="{{$rubric->id}}"
                                {{(isset($realestate->rubric_id) && ($realestate->rubric_id === $rubric->id)) ? 'selected' : ''}}
                            >{{$rubric->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if(isset($types) && $types->isNotEmpty())
                <div class="form-group col-sm-6">
                    <label for="type">Категория</label>
                    <select class="form-control" name="type_id" id="type">
                        @foreach($types as $type)
                            <option class="font-weight-bold"
                                    {{(isset($realestate->type_id) && ($realestate->type_id === $type->id)) ? 'selected' : ''}}
                                    value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group col-sm-6">
                <label for="region_name">Регион</label>
                <input type="text" name="region_name" class="form-control"
                       data-search_address="{{route('search.region')}}"
                       value="{{$realestate->region->name ?? ''}}"
                       placeholder="Регион" id="region_name">
                <input type="hidden" name="region_id"
                       value="{{$realestate->region_id ?? ''}}">
                <div class="dropdown-div">
                    <ul id="list-region" class="dropdown-list" hidden>

                    </ul>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label for="area_name">Район</label>
                <input type="text" name="area_name" class="form-control"
                       data-search_address="{{route('search.area')}}"
                       value="{{$realestate->area->name ?? ''}}"
                       placeholder="Район" id="area_name">
                <input type="hidden" name="area_id"
                       value="{{$realestate->area_id ?? ''}}">
                <div class="dropdown-div">
                    <ul id="list-area" class="dropdown-list" hidden>

                    </ul>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label for="city_name">Город</label>
                <input type="text" name="city_name" class="form-control"
                       data-search_address="{{route('search.city')}}"
                       value="{{isset($realestate->city->name) ? $realestate->city->name : ''}}"
                       placeholder="Город" id="city_name">
                <input type="hidden" name="city_id"
                       value="{{$realestate->city_id ?? ''}}">
                <div class="dropdown-div">
                    <ul id="list-city" class="dropdown-list" hidden>

                    </ul>
                </div>
            </div>
                <div class="form-group col-sm-6">
                    <label for="city_name">Округ</label>
                    <input type="text" name="district_name" class="form-control"
                           data-search_address="{{route('search.district')}}"
                           value="{{isset($realestate->district->name) ? $realestate->district->name : ''}}"
                           placeholder="Округ" id="district_name">
                    <input type="hidden" name="district_id"
                           value="{{$realestate->district_id ?? ''}}">
                    <div class="dropdown-div">
                        <ul id="list-district" class="dropdown-list" hidden>

                        </ul>
                    </div>
                </div>
            <div class="form-group col-sm-6">
                <label for="village_name">Деревня или Сот</label>
                <input type="text" name="village_name" class="form-control"
                       data-search_address="{{route('search.village')}}"
                       value="{{$realestate->village->name ?? ''}}"
                       placeholder="Деревня или Сот" id="village_name">
                <input type="hidden" name="village_id"
                       value="{{$realestate->village_id ?? ''}}">
                <div class="dropdown-div">
                    <ul id="list-village" class="dropdown-list" hidden>

                    </ul>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label for="street_name">Улица</label>
                <input type="text" name="street_name" class="form-control"
                       data-search_address="{{route('search.street')}}"
                       value="{{$realestate->street->name ?? ''}}"
                       placeholder="Улица" id="street_name">
                <input type="hidden" name="street_id"
                       value="{{$realestate->street_id ?? ''}}">
                <div class="dropdown-div">
                    <ul id="list-street" class="dropdown-list" hidden>

                    </ul>
                </div>
            </div>
            <div class="form-group col-sm-2">
                <label for="house_number">Номер дома</label>
                <input type="text" name="house_number" class="form-control"
                       value="{{$realestate->house_number ?? ''}}"
                       placeholder="0к0"
                       id="house_number">
            </div>
            <div class="form-group col-sm-2">
                <label for="rooms">Комнат</label>
                <input type="text" name="rooms" class="form-control"
                       value="{{$realestate->rooms ?? ''}}"
                       placeholder="0"
                       id="rooms">
            </div>
            <div class="form-group col-sm-2">
                <label for="year">Год постройки</label>
                <input type="text" name="year" class="form-control"
                       value="{{$realestate->year ?? ''}}"
                       placeholder="0000"
                       id="year">
            </div>
            <div class="form-group col-sm-2">
                <label for="floor">Этаж</label>
                <input type="text" name="floor" class="form-control"
                       value="{{$realestate->floor ?? ''}}"
                       placeholder="0"
                       id="floor">
            </div>
            <div class="form-group col-sm-2">
                <label for="floors">Всего этажей</label>
                <input type="text" name="floors" class="form-control"
                       value="{{$realestate->floors ?? ''}}"
                       placeholder="0"
                       id="floors">
            </div>
            <div class="form-group col-sm-2">
                <label for="balcony">Балкон</label>
                <input type="text" name="balcony" class="form-control"
                       value="{{$realestate->balcony ?? ''}}"
                       placeholder="0"
                       id="balcony">
            </div>
            <div class="form-group col-sm-2">
                <label for="loggia">Лоджия</label>
                <input type="text" name="loggia" class="form-control"
                       value="{{$realestate->loggia ?? ''}}"
                       placeholder="0"
                       id="loggia">
            </div>
            <div class="form-group col-sm-2">
                <label for="total_square">Помещение м<sup>2</sup></label>
                <input type="text" name="total_square" class="form-control"
                       value="{{$realestate->total_square ?? ''}}"
                       placeholder="0.0"
                       id="total_square">
            </div>
            <div class="form-group col-sm-2">
                <label for="land_square">Участок м<sup>2</sup></label>
                <input type="text" name="land_square" class="form-control"
                       value="{{$realestate->land_square ?? ''}}"
                       placeholder="0.0"
                       id="land_square">
            </div>
            <div class="form-group col-sm-12">
                <label for="description">Описание</label>
                <textarea name="description" class="form-control"
                          placeholder="" rows="4"
                          id="description">{{$realestate->description ?? ''}}</textarea>
            </div>
            <div class="form-group col-sm-4">
                <label for="price">Цена</label>
                <input type="text" name="price" class="form-control"
                       value="{{$realestate->price ?? ''}}"
                       placeholder="0"
                       id="price">
            </div>
            <div class="form-group col-sm-4">
                <label for="cadastral_number">Кадастровый номер</label>
                <input type="text" name="cadastral_number" class="form-control"
                       value="{{$realestate->cadastral_number ?? ''}}"
                       placeholder="00:00:00000"
                       id="cadastral_number">
            </div>
            <div class="form-group col-sm-4">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option class="font-weight-bold"
                            value="published"
                        {{(isset($realestate->status) && $realestate->status === 'published') ? 'selected' : ''}}
                    >Опубликовано
                    </option>
                    <option class="font-weight-bold"
                            value="archived"
                        {{(isset($realestate->status) && $realestate->status === 'archived') ? 'selected' : ''}}
                    >В архиве
                    </option>
                </select>
            </div>
                @if($realestate->images->isNotEmpty())
                    <div id="uploaded-photo"
                         class="col-sm-12 d-flex flex-wrap align-items-stretch justify-content-center my-2 p-1"
                    >
                        @foreach($realestate->images as $image)
                            <div class="uploader-images border rounded"
                                 style="background-image: url('{{$image->asset_thumbs_path}}');"
                                 data-image="{{$image->id}}">
                                <a href="#" class="close text-danger" aria-label="Close">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                                <input type="hidden" name="images" value="{{$image->id}}">
                            </div>
                        @endforeach
                    </div>
                @else
                <div id="uploaded-photo"
                     class="col-sm-12 d-flex flex-wrap align-items-stretch justify-content-center my-2 p-1"
                     hidden></div>
                @endif


                <div id="upload-progress" class="progress my-1 col-sm-12" hidden>
                <div id="progress-line"
                     class="progress-bar bg-info"
                     role="progressbar"
                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="form-group col-sm-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" data-route="{{route('imagesUploader')}}"
                           id="images-uploader" name="images" multiple>
                    <label class="custom-file-label" for="uploader" data-browse="{{trans('text.photo')}}"
                    ><i class="fa fa-folder-open-o" aria-hidden="true"></i>
                    </label>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" value="send"
                        class="btn bg-instagram color-white btn-block">{{trans('text.send')}}</button>
            </div>
        </form>
    </div>
</div>


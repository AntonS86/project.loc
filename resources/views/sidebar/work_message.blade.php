<div class="block clearfix">
    <h3 class="title">{{trans('text.apply')}}</h3>
    <div class="separator-2"></div>
    <form action="{{route('workMessage')}}" method="post" enctype="multipart/form-data" id="form-work-message">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="mes-work">{{trans('text.works')}}</label>
            <select class="form-control" id="mes-work" name="work_id">
                @foreach($works as $work)
                    <option value="{{$work->id}}" class="font-weight-bold">{{$work->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group has-feedback">
            <label for="mes-name">{{trans('text.name')}}</label>
            <div class="input-group">
                <input type="text" class="form-control" id="mes-name" name="name" placeholder="Ваше имя"
                       aria-describedby="inputGroupPrependPhone" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="inputGroupPrependName"><i class="fa fa-user-o"
                                                                                 aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="mes-phone">{{trans('text.phone')}}</label>
            <div class="input-group">
                <input type="text" class="form-control" id="mes-phone" name="phone" placeholder="89005550022"
                       aria-describedby="inputGroupPrependPhone" required>
                <div class="input-group-append">
                <span class="input-group-text" id="inputGroupPrependPhone"><i class="fa fa-phone"
                                                                              aria-hidden="true"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mes-desc">{{trans('text.message')}}</label>
            <textarea class="form-control" id="mes-desc" name="message" rows="3" required></textarea>
        </div>


        <div id="uploaded-photo" class="d-flex flex-wrap align-items-stretch my-2 p-1" hidden></div>

        <div id="upload-progress" class="progress style-1 my-1" hidden>
            <span class="text"></span>
            <div id="progress-line" class="progress-bar progress-bar-gray progress-bar-striped progress-bar-animated" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>

        <div class="form-group has-feedback">
            <div class="custom-file">
                <input type="file" class="custom-file-input" data-route="{{route('imagesUploader')}}" id="images-uploader" name="images[]" multiple>
                <label class="custom-file-label" for="uploader" data-browse="{{trans('text.photo')}}"
                ><i class="fa fa-folder-open-o" aria-hidden="true"></i>
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-default btn-block">{{trans('text.send_apply')}}</button>
    </form>
</div>

@push('workMessage')
    <script src="{{asset('js/WorkMessageHandler.js')}}"></script>
@endpush

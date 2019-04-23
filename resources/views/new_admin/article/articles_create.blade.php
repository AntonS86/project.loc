<div id="articles-create">
    @if(isset($article))
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{$article->title ?? 'Новая статья'}}</strong>
            </div>
            <div class="card-body">
                <form action="{{route('admin.articles.update', ['article' => $article->id])}}" method="post"
                      enctype="multipart/form-data" id="form-article" data-images_route="{{route('imagesUploader')}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="articleId" value="{{$article->id}}">
                    <div class="form-group has-feedback">
                        <label for="title">Заголовок статьи</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок статьи"
                               value="{{$article->title ?? 'Новая статья'}}">
                    </div>


                    <div class="form-group has-feedback">
                        <label for="desc">Описание статьи</label>
                        <input type="text" name="desc" class="form-control" id="desc" placeholder="Описание статьи"
                               value="{{$article->desc ?? ''}}">
                    </div>

                    <div class="form-group has-feedback">
                        <label for="meta-desc">Meta description</label>
                        <input type="text" name="meta_desc" class="form-control" id="meta_desc"
                               placeholder="Meta description"
                               value="{{$article->meta_desc ?? ''}}">
                    </div>

                    <div class="form-group has-feedback">
                        <label for="meta-desc">Тэги, ключевые слова</label>
                        <input type="text" name="keywords" class="form-control" id="keywords"
                               placeholder="#спорт #природа #туризм"
                               value="@foreach($article->keywords as $keyword)#{{$keyword->name}} @endforeach">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Выбери категорию статьи</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        {{($category->id == $article->category->id) ? 'selected' : ''}} class="font-weight-bold">{{$category->title}}</option>
                                @if(isset($category->children))
                                    @foreach($category->children as $categoryChild)
                                        <option
                                            value="{{$categoryChild->id}}" {{($categoryChild->id == $article->category->id) ? 'selected' : ''}}>
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{$categoryChild->title}}</option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div id="quill-upl-prog" class="progress style-1 my-1" hidden>
                        <span class="text"></span>
                        <div id="quill-prog-line" class="progress-bar progress-bar-default"
                             data-animate-width="100%"></div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="editor">Текст статьи</label>
                        <div id="editor" name="text">
                            @if(isset($article->text))
                                {!!$article->text!!}
                            @else
                                <p>Привет мир!</p>
                                <p>Напишите здесь статью</p>
                            @endif
                        </div>
                    </div>

                    <div class="overlay-container my-5">
                        <img
                            @if($article->images->first() !== null)
                            src="{{$article->images->first()->asset_path}}" data-id="{{$article->images->first()->id}}"
                            @else
                            src="{{asset('images/wall.jpg')}}"
                            @endif
                            id="titleImagePreview" class="mx-auto d-block">
                    </div>


                    <div id="upload-progress" class="progress style-1 my-1" hidden>
                        <span class="text"></span>
                        <div id="progress-line" class="progress-bar progress-bar-default"
                             data-animate-width="100%"></div>
                    </div>


                    <div class="form-group has-feedback">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="titleImage"
                                   data-route="{{route('imageUploader')}}">
                            <label class="custom-file-label" for="titleImage">Фото</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <div>
                            <button type="submit" id="submit" class="btn btn-primary">Обновить</button>
                        </div>

                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="status"
                                   value="published" {{($article->status == 'published') ? 'checked' : ''}}>
                            <label class="custom-control-label" for="status">Опубликована</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <form action="{{route('admin.articles.destroy', ['article' => $article->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div>
                        <input class="btn btn-danger" type="submit" value="Удалить">
                    </div>
                </form>
            </div>
        </div>
    @else
        <h3 class="text-danger">Ошибка: попробуйте перезагрузить страницу или зайти попозже</h3>
    @endif
</div>

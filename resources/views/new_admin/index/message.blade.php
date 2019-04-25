<div class="card">
    <div class="card-body">
        <h4 class="card-title box-title">Сообщения</h4>
        <div class="card-content">
            <div class="messenger-box">
                @if (isset($messages) && $messages->isNotEmpty())
                    <ul>
                        @foreach($messages as $message)
                            <li>
                                <div class="msg-received msg-container">
                                    <a href="#{{$message->id}}">
                                        <div class="avatar">
                                            <img src="{{asset('images/avatar.jpg')}}" alt="">
                                            <div class="send-time">{{$message->time}}</div>
                                        </div>
                                    </a>
                                    <div class="msg-box">
                                        <div class="inner-box">
                                            <button type="button" class="close"
                                                    data-route="{{route('workmessage.update', ['id' => $message->id])}}"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="name">
                                                {{$message->name}}
                                            </div>
                                            <div class="meg">
                                                <a href="tel:+{{$message->phone->number}}">+{{$message->phone->number}}</a>
                                                <p>{{$message->message}}</p>
                                                @if($message->images->isNotEmpty())
                                                    <div class="img-preview my-2">
                                                        @foreach($message->images as $image)
                                                            <div class="preview"
                                                                 style="background-image: url({{$image->asset_thumbs_path}});"></div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.msg-received -->
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h3>Нет новых сообщений</h3>
                @endif
            </div><!-- /.messenger-box -->
        </div>
    </div> <!-- /.card-body -->
</div>

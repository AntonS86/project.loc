<div class="dropdown for-message">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-envelope"></i>
        <span class="count bg-primary">{{$messages->count()}}</span>
    </button>
    <div class="dropdown-menu" aria-labelledby="message">
        <p class="red">У вас {{$messages->count() . ' ' .trans_choice('text.messages', $messages->count())}}</p>
        @forelse($messages as $message)
            <a class="dropdown-item media" href="{{route('admin.admin.index')}}#{{$message->id}}">
                <span class="photo media-left"><img alt="avatar" src="{{asset('images/avatar.jpg')}}"></span>
                <div class="message media-body">
                    <span class="name float-left">{{$message->name}}</span>
                    <span class="time float-right">{{$message->time}}</span>
                    <p>{{$message->message}}</p>
                </div>
            </a>
        @empty
            <div class="message media-body">
                <p>Нет новых сообщений</p>
            </div>
        @endforelse
    </div>
</div>

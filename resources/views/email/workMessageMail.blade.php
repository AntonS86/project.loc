@if(isset($data))
    <h1>Имя: {{$data->name}}</h1>
    <p>Категория: {{$data->work->name}}</p>
    <div>Сообщение: {{$data->message}}</div>
    <div>Тел: <a href="tel:+{{$data->phone->number}}">+{{$data->phone->number}}</a></div>

    @foreach($data->images as $image)
        <img src="{{asset($image->asset_path)}}">
    @endforeach
@else
    <h1>Нет данных: Error</h1>
@endif

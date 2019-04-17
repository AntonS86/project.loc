@if(isset($data))
    <h1>{{$data->name}}</h1>
    <div>{{$data->message}}</div>
    <div>{{$data->phone->number}}</div>

    @foreach($data->images as $image)
        <img src="{{asset($image->asset_path)}}">
    @endforeach
@else
    <h1>Нет данных: Error</h1>
@endif

Hello <strong>{{ $name }}</strong>,
<p>{{$body}}</p>

<a target="_blank" href="{{ url('/') }}/images/fish1.jpg">
    <img src="{{ $message->embed(public_path('images/fish1.jpg')) }}" width="200px">
</a>

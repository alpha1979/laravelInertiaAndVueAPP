
<a href="/">home page</a>


this is about page

@foreach ($messages as $message)
    <p> {{$message->text}}</p>
@endforeach
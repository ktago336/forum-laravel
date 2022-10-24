<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Диалог </title>
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
@foreach($messages as $message)
    @if($message->send==$toWho)
        {{strval($companion)}}
    @else
        {{strval($me)}}
    @endif
    {{strval($message->message)}}<br>
@endforeach
<div class="container">
    <div class="row">
        <form method="POST" action="/sendmessageto/{{$toWho}}" style="text-align: center; margin: auto;">
            {!! csrf_field() !!}
            <div>
                <input style="margin: 10px;" type="text" name="message" placeholder="Сообщение">
            </div>

            <div>
                <button style="margin: 10px;" type="submit">Отправить</button>
            </div>
        </form>
    </div>
</div>
<script src="js/app.js"></script>
</body>
</html>

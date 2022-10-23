<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ЛИЧНЫЕ СООБЩЕНИЯ</title>
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
@if(Illuminate\Support\Facades\Auth::check())
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    @if(isset($fromWho))
    @foreach($fromWho as $contact)
        <a href>{{$contact->send}}</a><br><hr>

    @endforeach
    @endif



    <div class="container">
        <div class="row">
            <form method="POST" action="sendMessage" style="text-align: center; margin: auto;">
                {!! csrf_field() !!}

                <div>
                    Кому
                    <input style="margin: 10px;" type="text" name="to" placeholder="Ник получателя">
                </div>
                <div>
                    Сообщение
                    <input style="margin: 10px;" type="text" name="message" placeholder="Сообщение">
                </div>

                <div>
                    <button style="margin: 10px;" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/app.js"></script>
@endif
</body>
</html>

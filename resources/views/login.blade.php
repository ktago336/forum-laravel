<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<div class="container">
    <div class="row">
        <form method="POST" action="log" style="text-align: center; margin: auto;">
            @csrf
            <div>
                Username
                <input style="margin: 10px;" type="text" name="name">
            </div>

            <div>
                Пароль
                <input style="margin: 10px;" type="password" name="password" id="password">
            </div>

            <div>
                <button style="margin: 10px;" type="submit">Вход</button>
            </div>
        </form>
    </div>
</div>
<script src="js/app.js"></script>
</body>
</html>

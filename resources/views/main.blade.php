<html>
<body>

@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif


<!--<form-->
@if (Illuminate\Support\Facades\Auth::check())
<<<<<<< HEAD
    Вы зашли как {{$user=auth()->user()->name}}<br>
    <a href="/direct">ЛИЧНЫЕ СООБЩЕНИЯ</a>
=======
    Вы зашли как {{$user=auth()->user()->name}}
    <a href="/logout">Выход</a>
@else
    <a href="/login">Логин</a><br>
    Или
    <a href="/register">Регистрация</a><br>
>>>>>>> 6b4460a54f65449b5a1f62c5fc3a10860bf6b274
@endif
<h1>Привет, Это представление, в которое я передал массив и прошелся по нему blade циклом</h1>
@if (Illuminate\Support\Facades\Auth::check())
    <h2>
        <div class="container">
            <div class="row">
                <form method="GET" action="MakeRecord" style="text-align: center; margin: auto;">
                    @csrf
                    <div>
                        <input style="margin: 10px;" type="text" name="text" placeholder="Введите сообщение">
                    </div>

                    <div>
                        <button style="margin: 10px;" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </h2>
@endif

@if (Illuminate\Support\Facades\Auth::check())
   <!-- <b>WOW YOU'RE LOGGED<hr></b>-->
@endif
    @if (isset($records))
    @foreach ($records as $record)
        <b>{{$record->author}}</b>
        <h3>{{$record->message}}</h3>
        <i>{{$record->time}}</i><br>
        <hr>

    @endforeach
    @endif
<br><br>

<script>
    function digitalClock() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        //* добавление ведущих нулей */
        if (hours < 10) hours = "0" + hours;
        if (minutes < 10) minutes = "0" + minutes;
        if (seconds < 10) seconds = "0" + seconds;
        document.getElementById("id_clock").innerHTML = hours + ":" + minutes + ":" + seconds;
        setTimeout("digitalClock()", 1000);
    }</script>
<script>
    setInterval(function () {
        var now = new Date();
        var clock = document.getElementById("clock");
        clock.innerHTML = now.toLocaleTimeString();
    }, 1000);
</script>
    <div id="id_clock"></div>
    <script>digitalClock();</script>



</body>
</html>

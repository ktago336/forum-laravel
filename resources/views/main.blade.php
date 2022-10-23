<html>
<body>

@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<a href="/login">Логин</a><br>
<a href="/logout">Выход</a>
<!--<form-->
@if (Illuminate\Support\Facades\Auth::check())
    Вы зашли как {{$user=auth()->user()->name}}<br>
    <a href="/direct">ЛИЧНЫЕ СООБЩЕНИЯ</a>
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
        {{$record->author}}<br>
        {{$record->message}}<br>
        {{$record->time}}<br>
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



</body>
</html>

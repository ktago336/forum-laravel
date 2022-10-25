<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>FORUM</title>
</head>
<body>

@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif


<!--<form-->
<div class="qwer">
@if (Illuminate\Support\Facades\Auth::check())
    Вы зашли как {{$user=auth()->user()->name}}<br>
    <a href="/direct">ЛИЧНЫЕ СООБЩЕНИЯ</a><br>
    <a href="/logout">Выход</a>
@else
    <a href="/login">Логин</a><br>
    <a href="/register">Регистрация</a><br>
@endif
</div>
 <h1 class="pisi">Общий чат</h1>
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
    
        @if (strval($record->author)=="admin3")
            <h4><b>{{$record->author}}</b><h4><br>
            {{$record->message}}<br>
            <i>{{$record->time}}<br>
        @else
   
            <b>{{$record->author}}</b><br>
            {{$record->message}}<br>
            <i>{{$record->time}}<br>
        <hr>
        @endif
    @endforeach
    @endif
<h1 class="hh">Online clock</h1>
            <div id="clock">
              <div id="time" class="glow"></div>          
              <div id="date">
                <span class="month"></span>
                <span class="day"></span>,
                <span class="year"></span>
              </div>      
              <div class="container">
                <button id="twelveHourBtn">24 hour clock</button>
              </div>
            </div>          
            <div class="container">
              <ul id="days">
                <li class="sunday">Sun</li>
                <li class="monday">Mon</li>
                <li class="tuesday">Tues</li>
                <li class="wednesday">Wed</li>
                <li class="thursday">Thurs</li>
                <li class="friday">Fri</li>
                <li class="saturday">Sat</li>
              </ul>
            </div>
<!------------------------------------------------------------------>  
        <script>
        const switchBtn = document.getElementById("twelveHourBtn");

            let twelveHourBtn = document.getElementById("twelveHourBtn");
            let getTime = document.getElementById("time");
            let isTwelveHour = true;
            let amPm = " AM";
            
            // ============ Get the time ======================
            
            function checkTime(i) {
              if (i < 10) {
                i = "0" + i;
              }
              return i;
            }
            
            function startTime() {
              let hours = "12";
              let today = new Date();
              let h = today.getHours();
            
              if (h > 12) {
                amPm = " PM";
              } else {
                amPm = " AM";
              }
            
              if (isTwelveHour) {
                hours = "24";
                if (h >= 12) {
                  h = h - 12;
                }
              } else {
                hours = "12";
              }
              twelveHourBtn.innerHTML = hours + " hour clock";
              let m = today.getMinutes();
              let s = today.getSeconds();
              // add a zero in front of numbers<10
              m = checkTime(m);
              s = checkTime(s);
              getTime.innerHTML = h + ":" + m + ":" + s + amPm;
              t = setTimeout(function() {
                startTime();
              }, 500);
            }
            
            startTime();
            
            switchBtn.addEventListener("click", function(e) {
              isTwelveHour = !isTwelveHour;
            });
            
            // ============= Get the day of the week =============================
            switch (new Date().getDay()) {
              case 0:
                document.querySelector(".sunday").classList.add("glow");
                break;
              case 1:
                document.querySelector(".monday").classList.add("glow");
                break;
              case 2:
                document.querySelector(".tuesday").classList.add("glow");
                break;
              case 3:
                document.querySelector(".wednesday").classList.add("glow");
                break;
              case 4:
                document.querySelector(".thursday").classList.add("glow");
                break;
              case 5:
                document.querySelector(".friday").classList.add("glow");
                break;
              case 6:
                document.querySelector(".saturday").classList.add("glow");
            }
            
            // ============= Get the date =============================
            let month = document.querySelector(".month");
            let day = document.querySelector(".day");
            let year = document.querySelector(".year");
            let date = new Date();
            
            let months = [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July",
              "August",
              "September",
              "October",
              "November",
              "December"
            ];
            month.innerHTML = months[date.getMonth()];
            day.innerHTML = date.getDate();
            year.innerHTML = date.getFullYear();
            </script>
        
        
</body>
</html>

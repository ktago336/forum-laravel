<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>FORUM</title>
</head>
<body>
    <!--<form-->
        <div class="qwer">
        <a href="/login">Логин</a><br>
        <a href="/register">Регистрация</a><br>
        </div>
    <h1 class="pisi">Общий чат</h1>
    
                <b>admin</b><br>
            Дела отлично<br>
            2022/10/22  20:35:10<br>
            <hr>
    
                <b>admin</b><br>
            Да, вижу<br>
            2022/10/22  20:34:50<br>
            <hr>
    
                <b>Zeka</b><br>
            А ты видишь эти смайлики ❤️😘👻<br>
            2022/10/22  20:33:06<br>
            <hr>
    
                <b>Zeka</b><br>
            Как дела :-)<br>
            2022/10/22  20:32:41<br>
            <hr>
    
                <b>Zeka</b><br>
            Проверенно<br>
            2022/10/22  20:31:54<br>
            <hr>
    
                <b>Zeka</b><br>
            Нормально<br>
            2022/10/22  20:31:44<br>
            <hr>
    
                <b>admin</b><br>
            TESTED<br>
            2022/10/22  20:12:03<br>
            <hr>
    
                <b>admin</b><br>
            STARTED UP<br>
            2022/10/22  20:11:43<br>
            <hr>
    
            <br><br>
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

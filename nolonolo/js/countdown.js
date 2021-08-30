CountDown('08/30/2021 12:00 PM', 'primaOfferta');
CountDown('08/25/2021 12:00 PM', 'secondaOfferta');
CountDown('09/15/2021 12:00 PM', 'terzaOfferta');
CountDown('09/23/2021 12:00 PM', 'quartaOfferta');
CountDown('10/15/2021 12:00 PM', 'quintaOfferta');

function CountDown(data, id) {
    var end = new Date(data);

    var second = 1000;
    var minute = second * 60;
    var hour = minute * 60;
    var day = hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById(id).innerHTML = '[offerta scaduta]';

            return;
        }
        var days = Math.floor(distance / day);
        var hours = Math.floor((distance % day) / hour);
        var minutes = Math.floor((distance % hour) / minute);
        var seconds = Math.floor((distance % minute) / second);

        document.getElementById(id).innerHTML = days + 'g ';
        document.getElementById(id).innerHTML += hours + 'h ';
        document.getElementById(id).innerHTML += minutes + 'm ';
        document.getElementById(id).innerHTML += seconds + 's';
        
    }

    timer = setInterval(showRemaining, 1000);
}
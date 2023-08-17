require([
    'jquery',
    'weatherApi'
])
define(['jquery'], function ($) {
    $('#submit-weather').on('click', function () {
        var data = {
            lat: $('#lat').val(),
            lon: $('#lon').val()
        };
        $.ajax({
            url: BASE_URL + 'weather/data/getpost',
            method: 'post',
            dataType: 'json',
            cache: false,
            data: {data: data},
            success: function (data) {
                let result = JSON.parse(data);
                console.log(data);
                $('#city').html(result.name);
                $('#country').html(result.sys.country);
                $('#desc').html(result.weather[0]['description']);
                $('#temperature').html(result.main.temp);
                $('#feels_like').html(result.main.feels_like);
                $('#pressure').html(result.main.pressure);
                $('#humidity').html(result.main.humidity);
                $('#wind_speed').html(result.wind.speed);
                $('#sunrise').html(result.sys.sunrise);
                $('#sunset').html(result.sys.sunset);
                $('#latitude').html(result.coord.lat);
                $('#longitude').html(result.coord.lon);
            },
            error: function (){
                document.cookie = "lat=" + data.lat;
                document.cookie = "lon=" + data.lon;
                window.location.href = 'weather/history/gethistory';
                console.log(document.cookie);
            }
        })
    })
})


$(function(){
    navigator.geolocation.getCurrentPosition(function(position){
        var ajaxReq = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&cnt=3", {
        APPID: "a3e158cae18676225bc1c74badfe5dfa",
        units: "imperial"    
    });
    ajaxReq.always(function(){
        console.log('req sent');
    });
    ajaxReq.fail(function(){
        console.log('error');
        console.log(ajaxReq.status);
    });
    ajaxReq.done(function(data){
        var cityName = data.city.name;
        weatherRender(data);
        displayMap(position.coords.latitude,position.coords.longitude,cityName);
        console.log('done');
    });

});

// =================================================================

    function displayMap(lat,lng,cityName){
        var latLng = new google.maps.LatLng(lat, lng);
        var mapOptions = {
            zoom: 15,
            center: latLng,
            animation: google.maps.Animation.DROP,
        };

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            draggable: true,
            title: cityName
        });
        google.maps.event.addListener(marker, 'dragend', function(){
            var latLng = marker.getPosition();
            var lat = latLng.lat();
            var lng = latLng.lng();
            weatherDisplay(lat,lng);
        });
    }
// =================================================================
    function weatherRender(data) {
        var html ="";
        
        $('.locationheader').html('<h2>'+ data.city.name+' '+data.city.country +'</h2>');
            // weather frame 1
            html += '<span>' + '<h3>' + data.list[0].temp.min + '°F/' + data.list[0].temp.max + '°F' + '</h3>' + '</span>';
            html += '<span>' + '<p>' + '<img src="http://openweathermap.org/img/w/' + data.list[0].weather[0].icon + '.png">' + '</p>' + '</span>';
            html += '<span>' + '<p>' + data.list[0].weather[0].main + ': ' + data.list[0].weather[0].description + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Humidity: ' + data.list[0].humidity + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Wind: ' + data.list[0].speed + ' mph' + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Pressure: ' + data.list[0].pressure + '</p>' + '</span>';
            $('.weatherframes').html(html);

            // weather frame 2
            html = '<span>' + '<h3>' + data.list[1].temp.min + '°F/' + data.list[1].temp.min + '°F ' + '</h3>' + '</span>';
            html += '<span>' + '<p>' + '<img src="http://openweathermap.org/img/w/' + data.list[1].weather[0].icon + '.png">' + '</p>' + '</span>';
            html += '<span>' + '<p>' + data.list[1].weather[0].main + ': ' + data.list[1].weather[0].description + '</p>' + '</span>';
            html += '<span>' + '<p>' +'Humidity: ' + data.list[1].humidity + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Wind: ' + data.list[1].speed + ' mph' + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Pressure: ' + data.list[1].pressure + '</p>' + '</span>';
            $('.weatherframes2').html(html);

            // weather frame 3            
            html = '<span>' + '<h3>' + data.list[2].temp.min + '°F/' + data.list[2].temp.min + '°F' + '</h3>' + '</span>';
            html += '<span>' + '<p>' + '<img src="http://openweathermap.org/img/w/' + data.list[2].weather[0].icon + '.png">' + '</p>' + '</span>';
            html += '<span>' + '<p>' + data.list[2].weather[0].main + ': ' + data.list[2].weather[0].description + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Humidity: ' + data.list[2].humidity + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Wind: ' + data.list[2].speed + ' mph' + '</p>' + '</span>';
            html += '<span>' + '<p>' + 'Pressure: ' + data.list[2].pressure + '</p>' + '</span>';
            $('.weatherframes3').html(html);

            // // changes background img based on todays weather
            // if(data.list[0].weather[0].main == "Clouds"){
            //     $(".weatherframes").css("background", "url(/img/cloudy-sky.jpg) no-repeat  center fixed");
            // }else if(data.list[0].weather[0].main == "Clear"){
            //     $(".weatherframes").css("background", "url(/img/clear-sky.jpg) no-repeat  center fixed");
            // }else if(data.list[0].weather[0].main == "Rain"){
            //     $(".weatherframes").css("background", "url(/img/rainy.jpg) no-repeat  center fixed");
            // }else{
            //     $(".weatherframes").css("background", "color:blue; url(blank)");
            // }
    };
// ======================================
function weatherDisplay(lat,lng){
    var ajaxReq = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + lat + "&lon=" + lng + "&cnt=3", {
                        APPID: "a3e158cae18676225bc1c74badfe5dfa",
                        units: "imperial"
                    });
                    ajaxReq.always(function(){
                        console.log('req sent');
                    });
                    ajaxReq.fail(function(data, error){
                        console.log('error');
                        console.log(ajaxReq.status);
                    });
                    ajaxReq.done(function(data){
                        var cityName = data.city.name;
                        weatherRender(data);
                        displayMap(lat,lng,cityName)
                        console.log('done');
                    });
};
// ===================================

//FORM INPUT ON CLICK FUNCTION

    $('#formId').on('submit',function (e) {
        e.preventDefault();
        //MAKING IT AN ARRAY FOR EASY USE
        var json = $('form').serializeArray();
        var address = json[0].value;
        var geocoder = new google.maps.Geocoder();
        
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();

                weatherDisplay(lat,lng);
                displayMap(lat,lng);

            } else {
                alert("Geocoding was not successful - STATUS: " + status);
            }
        });
    });


});

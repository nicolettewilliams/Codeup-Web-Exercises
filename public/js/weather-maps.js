    var map;
$(function(){
    navigator.geolocation.getCurrentPosition(function(position){
        var ajaxReq = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&cnt=3", {
            APPID: "a3e158cae18676225bc1c74badfe5dfa",
            units: "imperial"    
        });
        ajaxReq.done(function(data){
            var cityName = data.city.name;
            weatherRender(data);
            displayMap(position.coords.latitude,position.coords.longitude,cityName);
        });

    });

    var previousZoom;
// =================================================================
    function displayMap(lat,lng,cityName){
        var latLng = new google.maps.LatLng(lat, lng);
        var mapOptions = {
            zoom: 20,
            center: latLng,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };

        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            animation: google.maps.Animation.DROP,
            draggable: true,
            title: cityName
        });

        marker.addListener('click' , function(){
            if(map.getZoom() != 18){
                previousZoom = map.getZoom();
                map.setZoom(18);
                map.setCenter(marker.getPosition());
            } else {
                map.setZoom(previousZoom);
                map.setCenter(marker.getPosition());
                console.log(previousZoom);
            }
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
            html += '<span><h3>' + Math.round(data.list[0].temp.min) + '°F / ' + Math.round(data.list[0].temp.max) + '°F' + '</h3></span>';
            html += '<span><p>' + '<img src="http://openweathermap.org/img/w/' + data.list[0].weather[0].icon + '.png">' + '</p></span>';
            html += '<span><p>' + data.list[0].weather[0].main + ': ' + data.list[0].weather[0].description + '</p></span>';
            html += '<span><p>' + 'Humidity: ' + data.list[0].humidity + '</p></span>';
            html += '<span><p>' + 'Wind: ' + Math.round(data.list[0].speed) + ' mph' + '</p></span>';
            html += '<span><p>' + 'Pressure: ' + Math.round(data.list[0].pressure) + '</p></span>';
            $('.weatherframes').html(html);

            // weather frame 2
            html = '<span><h3>' + Math.round(data.list[1].temp.min) + '°F / ' + Math.round(data.list[1].temp.max) + '°F ' + '</h3></span>';
            html += '<span><p>' + '<img src="http://openweathermap.org/img/w/' + data.list[1].weather[0].icon + '.png">' + '</p></span>';
            html += '<span><p>' + data.list[1].weather[0].main + ': ' + data.list[1].weather[0].description + '</p></span>';
            html += '<span><p>' +'Humidity: ' + data.list[1].humidity + '</p></span>';
            html += '<span><p>' + 'Wind: ' + Math.round(data.list[1].speed) + ' mph' + '</p></span>';
            html += '<span><p>' + 'Pressure: ' + Math.round(data.list[1].pressure) + '</p></span>';
            $('.weatherframes2').html(html);

            // weather frame 3            
            html = '<span><h3>' + Math.round(data.list[2].temp.min) + '°F / ' + Math.round(data.list[2].temp.max) + '°F' + '</h3></span>';
            html += '<span><p>' + '<img src="http://openweathermap.org/img/w/' + data.list[2].weather[0].icon + '.png">' + '</p></span>';
            html += '<span><p>' + data.list[2].weather[0].main + ': ' + data.list[2].weather[0].description + '</p></span>';
            html += '<span><p>' + 'Humidity: ' + data.list[2].humidity + '</p></span>';
            html += '<span><p>' + 'Wind: ' + Math.round(data.list[2].speed) + ' mph' + '</p></span>';
            html += '<span><p>' + 'Pressure: ' + Math.round(data.list[2].pressure) + '</p></span>';
            $('.weatherframes3').html(html);
    };
// ======================================
function weatherDisplay(lat,lng){
    var ajaxReq = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + lat + "&lon=" + lng + "&cnt=3", {
        APPID: "a3e158cae18676225bc1c74badfe5dfa",
        units: "imperial"
        });
        ajaxReq.done(function(data){
            var cityName = data.city.name;
            weatherRender(data);
            displayMap(lat,lng,cityName)
        });
};
// ===================================
//FORM INPUT ON CLICK FUNCTION
    $('#formId').on('submit',function(e){
        e.preventDefault();
        var form = $('form').serializeArray();
        var address = form[0].value;
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address' : address} , function(results , status){
            if (status == google.maps.GeocoderStatus.OK) {
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
                console.log(results);

                weatherDisplay(lat,lng);
                displayMap(lat,lng);
            } else {
                alert('Geocoder failed due to: ' + status);
            }
        });
    });
});

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        #map-canvas {
            width: 100%;
            height: 250px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form action="{{url('create-events')}}" method="post">
                @csrf
                <div class="event_title form-group">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title">
                    {{$errors->first('evt_title')}}

                </div>
                <div class="event_title form-group">
                    <label for="">Category</label>
                    <input class="form-control" type="text" name="category">
                    {{$errors->first('category')}}

                </div>

                <div class="event_title form-group">
                    <label for="">Date</label>
                    <input class="form-control" type="date" name="date">
                    {{$errors->first('date')}}

                </div>

                <div class="form-group">
                    <label for="search">Search:</label>
                    <input type="text" name="location" class="form-control" id="searchBox">
                    {{$errors->first('location')}}
                    <div id="map-canvas"></div>
                </div>
                <div class="form-group">
                    <label for="lat">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="lat">
                    {{$errors->first('lat')}}

                </div>
                <div class="form-group">
                    <label for="lng">Longitude</label>
                    <input type="text" class="form-control" id="lng" name="lng">
                    {{$errors->first('lng')}}

                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">

    setTimeout(function(){
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center:{
                lat: 23.76,
                lng: 90.43
            },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {
                lat: 23.76,
                lng: 90.43
            },
            map:map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchBox'));
        google.maps.event.addListener(searchBox,'places_changed',function () {
            var places=searchBox.getPlaces();
            var bounds=new google.maps.LatLngBounds();
            var i,place;
            for(i=0; place=places[i]; i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);


        });

        google.maps.event.addListener(marker,'position_changed',function () {

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });

    }, 3000);


</script>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWVwtYsL7a8pxq5V2xigxvgtDG25KOwM4&libraries=places"
></script>
</body>
</html>

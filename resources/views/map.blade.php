@extends('layouts.public')

@section('content')
  <div id="map" style="height: 300px; width: 100%;"></div>
	<!-- <div class="section">
		<div class="container">
			<ul>
			@foreach( $user -> journeys[0] -> locations as $location )
				<li>Lat: {{ $location -> lat }}; Lon: {{ $location -> lon }}</li>
			@endforeach
			</ul>
		</div>
	</div> -->
  <div id="locationResult">
    
  </div>

<script>
  function initMap() {
    var firstLocation = @php echo json_encode($locations[0]) @endphp;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: firstLocation
    });
    var marker = new google.maps.Marker({
      position: firstLocation,
      map: map
    });

    // coords are all the locations the user recorded
    var coords = <? echo json_encode($locations) ?>;
    var path = new google.maps.Polyline({
      path: coords,
      geodesic: true,
      strokeColor: '#FF0000',
      strokeOpacity: 1.0,
      strokeWeight: 2
    });

    path.setMap(map);

    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    geocodeLatLng(coords, geocoder, map, infowindow);
  }

  function geocodeLatLng(coords, geocoder, map, infowindow) {
    var input = "51.5424634,9.932618"
    var latlngStr = input.split(',', 2);
    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if (results[0]) {
          map.setZoom(11);
          var marker = new google.maps.Marker({
            position: latlng,
            map: map
          });
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
          console.log( results );
          document.getElementById('locationResult').innerHTML = results;
        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9KCIbJYuzZK-EnBHlqUXaQVQx0k5fPUo&callback=initMap" type="text/javascript"></script>
@endsection('content')
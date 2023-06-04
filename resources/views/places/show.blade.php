@extends('places.layout')  
@section('content')
@push('head-scripts')
@once
<!-- Include the necessary Google Maps scripts and stylesheets -->
<script src="https://maps.googleapis.com/maps/api/js?key={key}"></script>
    <style>
      #map-container {
        height: 400px;
      }
    </style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
@endonce
    @endpush
    <div id="map-container"></div>
    @push('scripts')
    @once
    <script>
      // Retrieve places data from your Laravel controller
      var places = {!! json_encode($places) !!};
      function initMap() {
        // Create a map instance
        var map = new google.maps.Map(document.getElementById("map-container"), {
          center: { lat: 0, lng: 0 }, // Set a default center if needed
          zoom: 2,
        });
        
        // Add markers for each place
        places.forEach(function (place) {
          console.log(places.place_name);
          var marker = new google.maps.Marker({
            position: { lat: parseFloat(place.latitude), lng: parseFloat(place.longitude) },
            map: map,
            title: place.place_name,
          });
        });
      }

      // Initialize the map when the page is loaded
      window.onload = function () {
        initMap();
      };
    </script>
   @endonce
    @endpush
@endsection

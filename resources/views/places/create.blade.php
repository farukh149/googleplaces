@extends('places.layout')  
@section('content')

@push('head-scripts')
    @once
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
@endonce
    @endpush

<div class="container mt-5">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 m-auto">
<div class="card shadow">
<div class="card-header bg-primary">
<h5 class="card-title text-white"> Google Autocomplete Address</h5>
</div>
<form action="{{route('places.store')}}" method="post">
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
    @csrf
<div class="card-body">
<div class="form-group">
<label for="autocomplete"> Location/City/Address </label>
<input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location">
</div>
<div class="form-group" id="lat_area">
<label for="latitude"> Latitude </label>
<input type="text" name="latitude" id="latitude" class="form-control">
</div>
<div class="form-group" id="long_area">
<label for="latitude"> Longitude </label>
<input type="text" name="longitude" id="longitude" class="form-control">
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-success"> Submit </button>
</form>
</div>
</div>
</div>
</div>
</div>
@push('scripts')
    @once
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script src="https://maps.googleapis.com/maps/api/js?key={key}&libraries=places"></script>

<script>
$(document).ready(function() {
$("#lat_area").addClass("d-none");
$("#long_area").addClass("d-none"); 
});
</script>
<script>
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
var input = document.getElementById('autocomplete');
var autocomplete = new google.maps.places.Autocomplete(input);
autocomplete.addListener('place_changed', function() {
var place = autocomplete.getPlace();
$('#latitude').val(place.geometry['location'].lat());
$('#longitude').val(place.geometry['location'].lng());
// --------- show lat and long ---------------
$("#lat_area").removeClass("d-none");
$("#long_area").removeClass("d-none");
});
}
</script>
    @endonce
    @endpush
@endsection
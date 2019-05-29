@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Mapa')])

@section('content')
<head>
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.css' rel='stylesheet' />
</head>
<div id='map'></div>
@endsection

@push('js')
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiZW56b2dlcm9sYSIsImEiOiJjanZlMnoxamUwOWg0NDNwMW00Z2s2OHVsIn0.pMtAJJpUbQgRGnKRpgmpRw';
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  zoom: 13,
  center: [4.899, 52.372]
});
</script>
@endpush

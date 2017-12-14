@extends('layouts.public')

@section('content')
	<ul>
	@foreach( $user -> locations as $location )
		<li>Lat: {{ $location -> lat }}; Lon: {{ $location -> lon }}</li>
	@endforeach
	</ul>
@endsection('content')
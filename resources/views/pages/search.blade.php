@extends('layouts.app')
	
	@section('content')
		@include('partials.asideLeft')
			<main role="main">
				<div class="search-title"><h1>{{ count($results) == 1 ? count($results) . ' Resultado' : count($results) . ' Resultados' }}</h1></div>
				<div class="search-results">
					@foreach($results as $result)
						<div class="search-results-item rd">
							<div class="small-image"
	                             style="background-image: url({{ $result->photo }});" 
	                        ></div>
	                        <div class="content">
	                        	<div class="info">
		                        	<h1>{{ $result->alias }}</h1>
		                        	<h2>Psicología, Comedia</h2>
	                        	</div>
	                        	<div class="buttons">
	                        		<a href="{{ route('profile', $result->alias) }}">Ver perfil</a>
	                        		@if(Auth::id() == $result->id)
										{{ NULL }}
									@else
										<follow follower="{{ $result->id }}"></follow>
	                        		@endif
	                        	</div>
	                        </div>
						</div>
					@endforeach
				</div>
			</main>
			<template id="follow-template">
				<form action="{{ route('follow', ['id' => $result->id]) }}" method="POST" v-on:submit="onSubmit">
					{{ csrf_field() }}
					<button v-bind:class="active">@{{ text }}</button>
				</form>
			</template>
		@include('partials.asideRight')
	@endsection
@extends('layouts.app')
	
	@section('content')
		<aside> 
		    <div class="aside-left">
		        <!-- Profile picture -->
		        <div class="profile-picture rd" style="background-image: url('{{ $user->photo }}')">
		        </div>
		        <div class="medium-wrapper">
		            <!-- Profile name -->
		            <div class="asd-item rd">
		                <h1 class="user-name">{{ $user->alias }}</h1>
		            </div>

					<div class="social-options">
						@if(Auth::id() != $user->id)
							{!! Form::open(array('route' => ['follow', $user->id], 'method' => 'POST')) !!}
								<button>SEGUIR</button>
							{!! Form::close() !!}
							<button>ENVIAR MENSAJE</button>
						@endif
					</div>

		        </div>
		    </div>
		</aside>

		<main role="main">
			<div class="about-item">
				<h1>ACERCA DE MÍ:</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi deserunt natus architecto aliquam, dolor quaerat beatae quae cupiditate quibusdam saepe, mollitia magnam maiores blanditiis distinctio voluptates labore cumque. Adipisci, expedita!</p>
			</div>
			<div class="about-item">
				<h1>INTERESES DE LECTURA:</h1>
				<p>Psicología, Sci-fi</p>
			</div>
			<div class="about-item">
				<h1>LIBROS LEÍDOS:</h1>
			</div>		
		</main>

		<aside class="aside-right">      
		    <!-- Ask for content -->
		    <div class="asd-item rd">
		        <h1 class="asd-title">¿NO ENCUENTRAS LO QUE QUIERES LEER?</h1>
		        <p class="asd-text flex">Invita al autor a subir su contenido a LECSU.</p>
		        <div class="asd-item-input flex">
		            <form action="">
		                <label for="type">
		                    <select name="" id="type">
		                        <option disabled selected>¿Qué tipo de contenido es?</option>
		                        <option value="">Revista</option>
		                        <option value="">Periódico</option>
		                        <option value="">Libro</option>
		                    </select>
		                    <svg><use xlink:href="#down" /></svg>
		                </label>
		                <input type="mail" placeholder="Correo electrónico">
		                <button>Enviar</button>
		            </form>
		        </div>
		    </div>
		    <!-- Search -->
		    <div class="asd-item rd">
		        <h1 class="asd-title">Buscar amigo en Lecsu</h1>
		        <div class="asd-item-input flex">
		            {!! Form::open(array('route' => 'searchUsers', 'method' => 'GET')) !!}
		                <input type="text" name="keyword" placeholder="Correo electrónico">
		                <button class="btn btn-blue">Buscar</button>
		            {!! Form::close() !!}
		        </div>
		    </div>
		</aside>

	@endsection
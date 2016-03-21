@extends('layouts.app')

@section('login')
    <!-- Login -->
    <div class="ct ct-form ct-active">
        <div class="ct-form-wrapper">
            <h1>Ingresa a tu cuenta</h1>
            {!! Form::open(array('route' => 'postLogin' , 'method' => 'post')) !!}
                <div class="ct-form-input">
                    <input type="email" name="email" placeholder="Correo electrónico" required autofocus></input>  
                </div>
                <div class="ct-form-input">
                    <input type="password" name="password" placeholder="Contraseña" required></input>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="ct-form-check">
                    <label><input type="checkbox" name="remember">Recordarme</label>
                </div>
                <div class="ct-form-button">
                    <button class="btn btn-blue">Ingresar</button>
                </div>
                <h1></h1>
                <p>Aún no registrado? <a href="{{ route('register') }}">Crea una cuenta.</a></p>
                <p>Olvidaste tu contraseña? <a href="{{ route('reset') }}">Recupérala o modifícala aquí.</a></p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Registro')

@section('login')
    <!-- Register -->
    <div class="ct ct-form ct-active">
        <div class="ct-form-wrapper">
            <h1>Regístrate en Lecsu</h1>
            {!! Form::open(array('route' => 'postRegister' , 'method' => 'post')) !!}
                <div class="ct-form-input">
                    <input type="text" name="alias" placeholder="Alias" autofocus required>
                    {!! $errors->has('alias') ? $errors->first('alias', '<span>:message</span>') : null  !!}
                </div> 
                <div class="ct-form-input">
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                    {!! $errors->has('email') ? $errors->first('email', '<span>:message</span>') : null  !!}
                </div>
                <div class="ct-form-input">
                    <div class="input-col">
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="input-col">
                        <input type="password" name="password_confirmation" placeholder="Repetir contraseña">
                    </div>
                    {!! $errors->has('password') ? $errors->first('password', '<span>:message</span>') : null  !!}
                </div>
                <div class="ct-form-input">
                    <input type="text" name="codigo" placeholder="Código de la persona que lo invitó">
                    {!! $errors->has('codigo') ? $errors->first('codigo', '<span>:message</span>') : null  !!}
                </div>
                <p>Al crear una cuenta con Lecsu estás aceptando los <a href="#">Términos de uso y condiciones</a>, además aceptas recibir correos electrónicos de Lecsu.</p>
                <div class="ct-form-button">
                    <button class="btn btn-blue">Crear Cuenta</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

<!DOCTYPE html>
@extends('header.header-login') <!-- Extiende de la plantilla base -->

@section('title', 'Mis Secciones') <!-- Define el título específico para esta página -->

@section('content')

        
        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="POST" class="login-imput">
                @csrf
                <img src="{{ asset('img/apanine_logo.png') }}" style="width:40%; margin-bottom:5%;" alt="">

                <div class="titulo-inicio">
                    <h1>Iniciar sesión</h1>
                </div>

                <!-- Mostrar mensaje de error si las credenciales son incorrectas -->
                @if ($errors->has('email'))
                    <p style="color: red;">{{ $errors->first('email') }}</p>
                @endif

                <input type="email" name="email" placeholder="Correo" value="{{ old('email') }}" required>
                <input type="password" name="password" placeholder="Contraseña" required>

                <div class="boton-ingresar">
                    <a href="#">Olvidaste tu contraseña?</a>
                    <button type="submit">Ingresar</button>
                </div>
            </form>
        </div>


    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

@endsection

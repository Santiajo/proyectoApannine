<!DOCTYPE html>
@extends('header.header-login') <!-- Extiende de la plantilla base -->

@section('title', 'Mis Secciones') <!-- Define el título específico para esta página -->

@section('content')

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Crear Cuenta</h1>
                <input type="text" placeholder="Nombre">
                <input type="email" placeholder="Correo">
                <input type="password" placeholder="Contraseña">
                <button>Registrar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <img src="{{ asset('img/apanine_logo.png') }}" style="width:40%; margin-bot:5%" alt="">
                <div class="titulo-inicio">
                    <h1>Iniciar sesión</h1>
                </div>
                <div class="login-imput">
                    <input type="email" placeholder="Correo">
                    <input type="password" placeholder="Contraseña">
                    <div class="boton-ingresar">
                        <a href="#">Olvidaste tu contraseña?</a>
                        <button ><a href="{{ route('beneficiarios.listarBeneficiarios') }}">Ingresar</a></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">

                    <h1>¡Bienvenido nuevamente!</h1>
                    <p>Ingrese sus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login">Ingresar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¡Bienvenido a Apanine!</h1>
                    <p>Regístrate con tus datos personales para ingresar a nuestro sistema</p>
                    <button class="hidden" id="register">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

@endsection

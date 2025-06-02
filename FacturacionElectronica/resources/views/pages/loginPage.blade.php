@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <section class="LoginFormSection">
        <h2>Iniciar Sesión</h2>

        <form class="LoginForm" action="" method="POST">
            @csrf

            @if(session('message'))
                <small class="error-msg"> {{ session('message') }} </small>
            @endif

            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" required>
            @error('user') <small class="error-msg">{{ $message }}</small> @enderror
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            @error('password') <small class="error-msg">{{ $message }}</small> @enderror
            <button type="submit">Ingresar</button>

            <p>¿Es nuevo usuario? <a href="{{ route('userRegister') }}">Registrarse</a></p> 
        </form>
    </section>
@endsection()
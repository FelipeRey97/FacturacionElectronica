@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <section class="RegisterFormSection">
        <h2>Registrar Usuario</h2>

        <form class="RegisterForm" action="" method="POST">
            @csrf

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Ingresar</button>
        </form>
    </section>

@endsection('content')
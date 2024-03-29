@extends('layouts.main')

@section('title', 'Atjaunot paroli - Matemīla.lv')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Atjaunot paroli</h1>
</div>

<div class="loginBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <label for="email">E-pasta adrese</label><br>
    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" autofocus /><br>
    @if ($errors->has('email'))
            <p class="text-danger">&#10071; {{ $errors->first('email') }}</p><br>
    @endif

    <label for="password">Parole</label><br>
    <input id="password" type="password" name="password" autocomplete="current-password" /><br>
    @if ($errors->has('password'))
            <p class="text-danger">&#10071; {{ $errors->first('password') }}</p><br>
    @endif

    <label for="password_confirmation">Apstiprināt paroli</label><br>
    <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="current-password" /><br>
    @if ($errors->has('password_confirmation'))
            <p class="text-danger">&#10071; {{ $errors->first('password_confirmation') }}</p><br>
    @endif   
    <button>Apstiprināt</button><br>
    </form>
</div>

@section('content')

@endsection
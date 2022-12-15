@extends('layouts.main')

@section('title', 'Nomainīt - Matemīla.lv')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Nomainīt paroli</h1>
</div>

<div class="loginBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('updatePassword') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <label for="password">Vecā parole</label><br>
    <input id="old_password" type="password" name="old_password" autofocus /><br>
    @if ($errors->has('old_password'))
            <p class="text-danger">&#10071; {{ $errors->first('password') }}</p><br>
    @endif

    <label for="password">Jaunā parole</label><br>
    <input id="password" type="password" name="password" autocomplete="current-password" /><br>
    @if ($errors->has('password'))
            <p class="text-danger">&#10071; {{ $errors->first('password') }}</p><br>
    @endif

    <label for="password_confirmation">Apstiprināt jauno paroli</label><br>
    <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="current-password" /><br>
    @if ($errors->has('password_confirmation'))
            <p class="text-danger">&#10071; {{ $errors->first('password_confirmation') }}</p><br>
    @endif   
    <button>Apstiprināt</button><br>
    </form>
</div>

@section('content')

@endsection
@extends('layouts.main')

@section('title', 'Paroles atjaunošana - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Paroles atjaunošana</h1>
</div>

<div class="forgotPasswordBox" data-aos="zoom-in">

    @if(session('status'))
        <p class="forgotPasswordText">{{ session('status') }}</p>
        <a href="{{ route('mainPage') }}" class="indexLink">Pāriet uz galveno lapu</a>
    @else
        <p class="forgotPasswordText"><i class='bx bx-info-circle'></i> Aizmirsi savu paroli? Neuztraucies, ievadi savu esošo e-pasta adresi un uzreiz saņemsi e-pasta vēstuli ar paroles atjaunošanas linku.</p>
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">E-pasta adrese</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus /><br>
            @if ($errors->has('email'))
                    <p class="text-danger">&#10071; {{ $errors->first('email') }}</p><br>
            @endif

            <button>Apstiprināt</button>
        </form>
    @endif
    
    
</div>

@endsection

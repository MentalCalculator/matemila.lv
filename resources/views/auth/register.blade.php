@extends('layouts.main')

@section('title', 'Reģistrācija - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Reģistrācija</h1>
</div>

<div class="registerBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="registerForm">
            <div class="registerFormHalf">
                <label for="username">Lietotājvārds*</label><br>
                <input id="username" type="text" name="username" value="{{ old('username') }}" autofocus/><br>
                @if ($errors->has('username'))
                    <p class="text-danger">&#10071; {{ $errors->first('username') }}</p><br>
                @endif
                <label for="name">Vārds*</label><br>
                <input id="name" type="text" name="name" value="{{ old('name') }}" /><br>
                @if ($errors->has('name'))
                    <p class="text-danger">&#10071; {{ $errors->first('name') }}</p><br>
                @endif
                <label for="surname">Uzvārds*</label><br>
                <input id="surname" type="text" name="surname" value="{{ old('surname') }}" /><br>
                @if ($errors->has('surname'))
                    <p class="text-danger">&#10071; {{ $errors->first('surname') }}</p><br>
                @endif
                <label for="email">E-pasta adrese*</label><br>
                <input id="email" type="email" name="email" value="{{ old('email') }}" /><br>
                @if ($errors->has('email'))
                    <p class="text-danger">&#10071; {{ $errors->first('email') }}</p><br>
                @endif
                <label for="phone">Telefona numurs</label><br>
                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" /><br>
            </div>
            <div class="registerFormHalf">
                <label for="place">Pilsēta/novads*</label><br>
                <select name="place" id="place" selected="{{ old('place') }}">
                    <option value="">Izvēlēties...</option>
                    <option value="Rīga">Rīga</option>
                    <option value="Daugavpils">Daugavpils</option>
                    <option value="Jelgava">Jelgava</option>
                    <option value="Jēkabpils">Jēkabpils</option>
                    <option value="Jūrmala">Jūrmala</option>
                    <option value="Liepāja">Liepāja</option>
                    <option value="Ogre">Ogre</option>
                    <option value="Rēzekne">Rēzekne</option>
                    <option value="Valmiera">Valmiera</option>
                    <option value="Ventspils">Ventspils</option>
                </select><br>
                <label for="school">Skola</label><br>
                <select name="school" id="school" selected="{{ old('school') }}">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija">Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="class">Klase*</label><br>
                <select name="class" id="class" selected="{{ old('class') }}">
                    <option value="0">bērnudārzs</option>
                    <option value="1">1.klase</option>
                    <option value="2">2.klase</option>
                    <option value="3">3.klase</option>
                    <option value="4">4.klase</option>
                    <option value="5">5.klase</option>
                    <option value="6">6.klase</option>
                    <option value="7">7.klase</option>
                    <option value="8">8.klase</option>
                    <option value="9">9.klase</option>
                    <option value="10">10.klase / 1.kurss</option>
                    <option value="11">11.klase / 2.kurss</option>
                    <option value="12">12.klase / 3.-4.kurss</option>
                    <option value="13">pieaugušo klase</option>
                </select><br>
                <p class="infoText"">Ņemiet vērā, ka 1.-4.kursi attiecas uz tehnikumu audzēkņiem. Augstskolu studentiem jāizvēlas pieaugušo klase.</p>
                <label for="password">Parole*</label><br>
                <input id="password" type="password" name="password" autocomplete="new-password" /><br>
                @if ($errors->has('password'))
                    <p class="text-danger">&#10071; {{ $errors->first('password') }}</p><br>
                @endif
                <label for="password_confirmation">Apstiprini paroli*</label></br>
                <input id="password_confirmation" type="password" name="password_confirmation" />
            </div>
        </div>
        <button>Reģistrēties</button><br>
    </form>
</div>


@endsection



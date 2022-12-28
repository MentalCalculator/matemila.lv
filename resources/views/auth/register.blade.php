@extends('layouts.main')

@section('title', 'Reģistrācija - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Reģistrācija</h1>
</div>

<div class="formBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="formHalfs">
            <div class="formHalf">
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
            <div class="formHalf">
                <label for="place">Pilsēta/novads*</label><br>
                <select name="place" id="place">
                    <option value="">Izvēlēties...</option>
                    <option value="Rīga" @if (old('place') == "Rīga") {{ 'selected' }} @endif>Rīga</option>
                    <option value="Aizkraukles novads" @if (old('place') == "Aizkraukles novads") {{ 'selected' }} @endif>Aizkraukles novads</option>
                    <option value="Alūksnes novads" @if (old('place') == "Alūksnes novads") {{ 'selected' }} @endif>Alūksnes novads</option>
                    <option value="Augšdaugavas novads" @if (old('place') == "Augšdaugavas novads") {{ 'selected' }} @endif>Augšdaugavas novads</option>
                    <option value="Ādažu novads" @if (old('place') == "Ādažu novds") {{ 'selected' }} @endif>Ādažu novads</option>
                    <option value="Balvu novads" @if (old('place') == "Balvu novads") {{ 'selected' }} @endif>Balvu novads</option>
                    <option value="Bauskas novads" @if (old('place') == "Bauskas novads") {{ 'selected' }} @endif>Bauskas novads</option>
                    <option value="Cēsu novads" @if (old('place') == "Cēsu novads") {{ 'selected' }} @endif>Cēsu novads</option>
                    <option value="Daugavpils" @if (old('place') == "Daugavpils") {{ 'selected' }} @endif>Daugavpils</option>
                    <option value="Dienvidkurzemes novads" @if (old('place') == "Dienvidkurzemes novads") {{ 'selected' }} @endif>Dienvidkurzemes novads</option>
                    <option value="Dobeles novads" @if (old('place') == "Dobeles novads") {{ 'selected' }} @endif>Dobeles novads</option>
                    <option value="Gulbenes novads" @if (old('place') == "Gulbenes novads") {{ 'selected' }} @endif>Gulbenes novads</option>
                    <option value="Jelgava" @if (old('place') == "Jelgava") {{ 'selected' }} @endif>Jelgava</option>
                    <option value="Jelgavas novads" @if (old('place') == "Jelgavas novads") {{ 'selected' }} @endif>Jelgavas novads</option>
                    <option value="Jēkabpils" @if (old('place') == "Jēkabpils") {{ 'selected' }} @endif>Jēkabpils</option>
                    <option value="Jēkabpils novads" @if (old('place') == "Jēkabpils novads") {{ 'selected' }} @endif>Jēkabpils novads</option>
                    <option value="Jūrmala" @if (old('place') == "Jūrmala") {{ 'selected' }} @endif>Jūrmala</option>
                    <option value="Krāslavas novads" @if (old('place') == "Krāslavas novads") {{ 'selected' }} @endif>Krāslavas novads</option>
                    <option value="Kuldīgas novads" @if (old('place') == "Kuldīgas novads") {{ 'selected' }} @endif>Kuldīgas novads</option>
                    <option value="Ķekavas novads" @if (old('place') == "Ķekavas novads") {{ 'selected' }} @endif>Ķekavas novads</option>
                    <option value="Liepāja" @if (old('place') == "Liepāja") {{ 'selected' }} @endif>Liepāja</option>
                    <option value="Limbažu novads" @if (old('place') == "Limbažu novads") {{ 'selected' }} @endif>Limbažu novads</option>
                    <option value="Līvānu novads" @if (old('place') == "Līvānu novads") {{ 'selected' }} @endif>Līvānu novads</option>
                    <option value="Ludzas novads" @if (old('place') == "Ludzas novads") {{ 'selected' }} @endif>Ludzas novads</option>
                    <option value="Madonas novads" @if (old('place') == "Madonas novads") {{ 'selected' }} @endif>Madonas novads</option>
                    <option value="Mārupes novads" @if (old('place') == "Mārupes novads") {{ 'selected' }} @endif>Mārupes novads</option>
                    <option value="Ogre" @if (old('place') == "Ogre") {{ 'selected' }} @endif>Ogre</option>
                    <option value="Ogres novads" @if (old('place') == "Ogres novads") {{ 'selected' }} @endif>Ogres novads</option>
                    <option value="Olaines novads" @if (old('place') == "Olaines novads") {{ 'selected' }} @endif>Olaines novads</option>
                    <option value="Preiļu novads" @if (old('place') == "Preiļu novads") {{ 'selected' }} @endif>Preiļu novads</option>
                    <option value="Rēzekne" @if (old('place') == "Rēzekne") {{ 'selected' }} @endif>Rēzekne</option>
                    <option value="Rēzeknes novads" @if (old('place') == "Rēzeknes novads") {{ 'selected' }} @endif>Rēzeknes novads</option>
                    <option value="Ropažu novads" @if (old('place') == "Ropažu novads") {{ 'selected' }} @endif>Ropažu novads</option>
                    <option value="Salaspils novads" @if (old('place') == "Salaspils novads") {{ 'selected' }} @endif>Salaspils novads</option>
                    <option value="Saldus novads" @if (old('place') == "Saldus novads") {{ 'selected' }} @endif>Saldus novads</option>
                    <option value="Saulkrastu novads" @if (old('place') == "Saulkrastu novads") {{ 'selected' }} @endif>Saulkrastu novads</option>
                    <option value="Siguldas novads" @if (old('place') == "Siguldas novads") {{ 'selected' }} @endif>Siguldas novads</option>
                    <option value="Smiltenes novads" @if (old('place') == "Smiltenes novads") {{ 'selected' }} @endif>Smiltenes novads</option>
                    <option value="Talsu novads" @if (old('place') == "Talsu novads") {{ 'selected' }} @endif>Talsu novads</option>
                    <option value="Tukuma novads" @if (old('place') == "Tukuma novads") {{ 'selected' }} @endif>Tukuma novads</option>
                    <option value="Valkas novads" @if (old('place') == "Valkas novads") {{ 'selected' }} @endif>Valkas novads</option>
                    <option value="Valmiera" @if (old('place') == "Valmiera") {{ 'selected' }} @endif>Valmiera</option>
                    <option value="Valmieras novads" @if (old('place') == "Limbažu novads") {{ 'selected' }} @endif>Valmieras novads</option>
                    <option value="Varakļānu novads" @if (old('place') == "Varakļānu novads") {{ 'selected' }} @endif>Varakļānu novads</option>
                    <option value="Ventspils" @if (old('place') == "Ventspils") {{ 'selected' }} @endif>Ventspils</option>
                    <option value="Ventspils novads" @if (old('place') == "Ventspils novads") {{ 'selected' }} @endif>Ventspils novads</option>
                </select><br>
                <label for="school">Skola</label><br>
                <select name="school" id="school">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" @if (old('school') == "Rīgas Valsts 1.ģimnāzija") {{ 'selected' }} @endif>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="class">Klase*</label><br>
                <select name="class" id="class">
                    <option value="0" @if (old('minClass') == "0") {{ 'selected' }} @endif>bērnudārzs</option>
                    <option value="1" @if (old('minClass') == "1") {{ 'selected' }} @endif>1.klase</option>
                    <option value="2" @if (old('minClass') == "2") {{ 'selected' }} @endif>2.klase</option>
                    <option value="3" @if (old('minClass') == "3") {{ 'selected' }} @endif>3.klase</option>
                    <option value="4" @if (old('minClass') == "4") {{ 'selected' }} @endif>4.klase</option>
                    <option value="5" @if (old('minClass') == "5") {{ 'selected' }} @endif>5.klase</option>
                    <option value="6" @if (old('minClass') == "6") {{ 'selected' }} @endif>6.klase</option>
                    <option value="7" @if (old('minClass') == "7") {{ 'selected' }} @endif>7.klase</option>
                    <option value="8" @if (old('minClass') == "8") {{ 'selected' }} @endif>8.klase</option>
                    <option value="9" @if (old('minClass') == "9") {{ 'selected' }} @endif>9.klase</option>
                    <option value="10" @if (old('minClass') == "10") {{ 'selected' }} @endif>10.klase / 1.kurss</option>
                    <option value="11" @if (old('minClass') == "11") {{ 'selected' }} @endif>11.klase / 2.kurss</option>
                    <option value="12" @if (old('minClass') == "12") {{ 'selected' }} @endif>12.klase / 3.-4.kurss</option>
                    <option value="13" @if (old('minClass') == "13") {{ 'selected' }} @endif>pieaugušo klase</option>
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



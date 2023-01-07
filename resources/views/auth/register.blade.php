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
                    <option value="Rīga" {{ old('place') == 'Rīga' ? "selected" : "" }}>Rīga</option>
                    <option value="Aizkraukles novads" {{ old('place') == "Aizkraukles novads" ? "selected" : "" }}>Aizkraukles novads</option>
                    <option value="Alūksnes novads" {{ old('place') == "Alūksnes novads" ? "selected" : "" }}>Alūksnes novads</option>
                    <option value="Augšdaugavas novads" {{ old('place') == "Augšdaugavas novads" ? "selected" : "" }}>Augšdaugavas novads</option>
                    <option value="Ādažu novads" {{ old('place') == "Ādažu novds" ? "selected" : "" }}>Ādažu novads</option>
                    <option value="Balvu novads" {{ old('place') == "Balvu novads" ? "selected" : "" }}>Balvu novads</option>
                    <option value="Bauskas novads" {{ old('place') == "Bauskas novads" ? "selected" : "" }}>Bauskas novads</option>
                    <option value="Cēsu novads" {{ old('place') == "Cēsu novads" ? "selected" : "" }}>Cēsu novads</option>
                    <option value="Daugavpils" {{ old('place') == "Daugavpils" ? "selected" : "" }}>Daugavpils</option>
                    <option value="Dienvidkurzemes novads" {{ old('place') == "Dienvidkurzemes novads" ? "selected" : "" }}>Dienvidkurzemes novads</option>
                    <option value="Dobeles novads" {{ old('place') == "Dobeles novads" ? "selected" : "" }}>Dobeles novads</option>
                    <option value="Gulbenes novads" {{ old('place') == "Gulbenes novads" ? "selected" : "" }}>Gulbenes novads</option>
                    <option value="Jelgava" {{ old('place') == "Jelgava" ? "selected" : "" }}>Jelgava</option>
                    <option value="Jelgavas novads" {{ old('place') == "Jelgavas novads" ? "selected" : "" }}>Jelgavas novads</option>
                    <option value="Jēkabpils" {{ old('place') == "Jēkabpils" ? "selected" : "" }}>Jēkabpils</option>
                    <option value="Jēkabpils novads" {{ old('place') == "Jēkabpils novads" ? "selected" : "" }}>Jēkabpils novads</option>
                    <option value="Jūrmala" {{ old('place') == "Jūrmala" ? "selected" : "" }}>Jūrmala</option>
                    <option value="Krāslavas novads" {{ old('place') == "Krāslavas novads" ? "selected" : "" }}>Krāslavas novads</option>
                    <option value="Kuldīgas novads" {{ old('place') == "Kuldīgas novads" ? "selected" : "" }}>Kuldīgas novads</option>
                    <option value="Ķekavas novads" {{ old('place') == "Ķekavas novads" ? "selected" : "" }}>Ķekavas novads</option>
                    <option value="Liepāja" {{ old('place') == "Liepāja" ? "selected" : "" }}>Liepāja</option>
                    <option value="Limbažu novads" {{ old('place') == "Limbažu novads" ? "selected" : "" }}>Limbažu novads</option>
                    <option value="Līvānu novads" {{ old('place') == "Līvānu novads" ? "selected" : "" }}>Līvānu novads</option>
                    <option value="Ludzas novads" {{ old('place') == "Ludzas novads" ? "selected" : "" }}>Ludzas novads</option>
                    <option value="Madonas novads" {{ old('place') == "Madonas novads" ? "selected" : "" }}>Madonas novads</option>
                    <option value="Mārupes novads" {{ old('place') == "Mārupes novads" ? "selected" : "" }}>Mārupes novads</option>
                    <option value="Ogre" {{ old('place') == "Ogre" ? "selected" : "" }}>Ogre</option>
                    <option value="Ogres novads" {{ old('place') == "Ogres novads" ? "selected" : "" }}>Ogres novads</option>
                    <option value="Olaines novads" {{ old('place') == "Olaines novads" ? "selected" : "" }}>Olaines novads</option>
                    <option value="Preiļu novads" {{ old('place') == "Preiļu novads" ? "selected" : "" }}>Preiļu novads</option>
                    <option value="Rēzekne" {{ old('place') == "Rēzekne" ? "selected" : "" }}>Rēzekne</option>
                    <option value="Rēzeknes novads" {{ old('place') == "Rēzeknes novads" ? "selected" : "" }}>Rēzeknes novads</option>
                    <option value="Ropažu novads" {{ old('place') == "Ropažu novads" ? "selected" : "" }}>Ropažu novads</option>
                    <option value="Salaspils novads" {{ old('place') == "Salaspils novads" ? "selected" : "" }}>Salaspils novads</option>
                    <option value="Saldus novads" {{ old('place') == "Saldus novads" ? "selected" : "" }}>Saldus novads</option>
                    <option value="Saulkrastu novads" {{ old('place') == "Saulkrastu novads" ? "selected" : "" }}>Saulkrastu novads</option>
                    <option value="Siguldas novads" {{ old('place') == "Siguldas novads" ? "selected" : "" }}>Siguldas novads</option>
                    <option value="Smiltenes novads" {{ old('place') == "Smiltenes novads" ? "selected" : "" }}>Smiltenes novads</option>
                    <option value="Talsu novads" {{ old('place') == "Talsu novads" ? "selected" : "" }}>Talsu novads</option>
                    <option value="Tukuma novads" {{ old('place') == "Tukuma novads" ? "selected" : "" }}>Tukuma novads</option>
                    <option value="Valkas novads" {{ old('place') == "Valkas novads" ? "selected" : "" }}>Valkas novads</option>
                    <option value="Valmiera" {{ old('place') == "Valmiera" ? "selected" : "" }}>Valmiera</option>
                    <option value="Valmieras novads" {{ old('place') == "Limbažu novads" ? "selected" : "" }}>Valmieras novads</option>
                    <option value="Varakļānu novads" {{ old('place') == "Varakļānu novads" ? "selected" : "" }}>Varakļānu novads</option>
                    <option value="Ventspils" {{ old('place') == "Ventspils" ? "selected" : "" }}>Ventspils</option>
                    <option value="Ventspils novads" {{ old('place') == "Ventspils novads" ? "selected" : "" }}>Ventspils novads</option>
                </select><br>
                @if ($errors->has('place'))
                    <p class="text-danger">&#10071; {{ $errors->first('place') }}</p><br>
                @endif
                <label for="school">Skola</label><br>
                <select name="school" id="school">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" {{ old('school') == 'Rīgas Valsts 1.ģimnāzija' ? "selected" : "" }}>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="class">Klase*</label><br>
                <select name="class" id="class">
                    <option value="0" {{ old('class') == '0' ? "selected" : "" }}>bērnudārzs</option>
                    <option value="1" {{ old('class') == '1' ? "selected" : "" }}>1.klase</option>
                    <option value="2" {{ old('class') == '2' ? "selected" : "" }}>2.klase</option>
                    <option value="3" {{ old('class') == '3' ? "selected" : "" }}>3.klase</option>
                    <option value="4" {{ old('class') == '4' ? "selected" : "" }}>4.klase</option>
                    <option value="5" {{ old('class') == '5' ? "selected" : "" }}>5.klase</option>
                    <option value="6" {{ old('class') == '6' ? "selected" : "" }}>6.klase</option>
                    <option value="7" {{ old('class') == '7' ? "selected" : "" }}>7.klase</option>
                    <option value="8" {{ old('class') == '8' ? "selected" : "" }}>8.klase</option>
                    <option value="9" {{ old('class') == '9' ? "selected" : "" }}>9.klase</option>
                    <option value="10" {{ old('class') == '10' ? "selected" : "" }}>10.klase / 1.kurss</option>
                    <option value="11" {{ old('class') == '11' ? "selected" : "" }}>11.klase / 2.kurss</option>
                    <option value="12" {{ old('class') == '12' ? "selected" : "" }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ old('class') == '13' ? "selected" : "" }}>pieaugušo klase</option>
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



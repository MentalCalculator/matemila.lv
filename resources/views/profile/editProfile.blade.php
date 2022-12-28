@extends('layouts.main')

@section('title', 'Rediģēt profilu - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Rediģēt profilu</h1>
</div>

<div class="formBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('updateProfile') }}">
        @csrf
        <div class="formHalfs">
            <div class="formHalf">
                <label for="username">Lietotājvārds*</label><br>
                <input id="username" type="text" name="username" value="{{ Auth::user()->username }}" autofocus/><br>
                @if ($errors->has('username'))
                    <p class="text-danger">&#10071; {{ $errors->first('username') }}</p><br>
                @endif
                <label for="name">Vārds*</label><br>
                <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" /><br>
                @if ($errors->has('name'))
                    <p class="text-danger">&#10071; {{ $errors->first('name') }}</p><br>
                @endif
                <label for="surname">Uzvārds*</label><br>
                <input id="surname" type="text" name="surname" value="{{ Auth::user()->surname }}" /><br>
                @if ($errors->has('surname'))
                    <p class="text-danger">&#10071; {{ $errors->first('surname') }}</p><br>
                @endif
                <label for="email">E-pasta adrese*</label><br>
                <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" /><br>
                @if ($errors->has('email'))
                    <p class="text-danger">&#10071; {{ $errors->first('email') }}</p><br>
                @endif
            </div>
            <div class="formHalf">
                <label for="phone">Telefona numurs</label><br>
                <input id="phone" type="text" name="phone" value="{{ Auth::user()->phone }}" /><br>
                <label for="place">Pilsēta/novads*</label><br>
                <select name="place" id="place">
                    <option value="">Izvēlēties...</option>
                    <option value="Rīga" {{ Auth::user()->place == 'Rīga' ? 'selected' : '' }}>Rīga</option>
                    <option value="Daugavpils" {{ Auth::user()->place == 'Daugavpils' ? 'selected' : '' }}>Daugavpils</option>
                    <option value="Jelgava" {{ Auth::user()->place == 'Jelgava' ? 'selected' : '' }}>Jelgava</option>
                    <option value="Jēkabpils" {{ Auth::user()->place == 'Jēkabpils' ? 'selected' : '' }}>Jēkabpils</option>
                    <option value="Jūrmala" {{ Auth::user()->place == 'Jūrmala' ? 'selected' : '' }}>Jūrmala</option>
                    <option value="Liepāja" {{ Auth::user()->place == 'Liepāja' ? 'selected' : '' }}>Liepāja</option>
                    <option value="Ogre" {{ Auth::user()->place == 'Ogre' ? 'selected' : '' }}>Ogre</option>
                    <option value="Rēzekne" {{ Auth::user()->place == 'Rēzekne' ? 'selected' : '' }}>Rēzekne</option>
                    <option value="Valmiera" {{ Auth::user()->place == 'Valmiera' ? 'selected' : '' }}>Valmiera</option>
                    <option value="Ventspils" {{ Auth::user()->place == 'Ventspils' ? 'selected' : '' }}>Ventspils</option>
                </select><br>
                <label for="school">Skola</label><br>
                <select name="school" id="school">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" {{ Auth::user()->school == 'Rīgas Valsts 1.ģimnāzija' ? 'selected' : '' }}>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="class">Klase*</label><br>
                <select name="class" id="class">
                    <option value="0" {{ Auth::user()->class == 0 ? 'selected' : '' }}>bērnudārzs</option>
                    <option value="1" {{ Auth::user()->class == 1 ? 'selected' : '' }}>1.klase</option>
                    <option value="2" {{ Auth::user()->class == 2 ? 'selected' : '' }}>2.klase</option>
                    <option value="3" {{ Auth::user()->class == 3 ? 'selected' : '' }}>3.klase</option>
                    <option value="4" {{ Auth::user()->class == 4 ? 'selected' : '' }}>4.klase</option>
                    <option value="5" {{ Auth::user()->class == 5 ? 'selected' : '' }}>5.klase</option>
                    <option value="6" {{ Auth::user()->class == 6 ? 'selected' : '' }}>6.klase</option>
                    <option value="7" {{ Auth::user()->class == 7 ? 'selected' : '' }}>7.klase</option>
                    <option value="8" {{ Auth::user()->class == 8 ? 'selected' : '' }}>8.klase</option>
                    <option value="9" {{ Auth::user()->class == 9 ? 'selected' : '' }}>9.klase</option>
                    <option value="10" {{ Auth::user()->class == 10 ? 'selected' : '' }}>10.klase / 1.kurss</option>
                    <option value="11" {{ Auth::user()->class == 11 ? 'selected' : '' }}>11.klase / 2.kurss</option>
                    <option value="12" {{ Auth::user()->class == 12 ? 'selected' : '' }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ Auth::user()->class == 13 ? 'selected' : '' }}>pieaugušo klase</option>
                </select><br>
                <p class="infoText"">Ņemiet vērā, ka 1.-4.kursi attiecas uz tehnikumu audzēkņiem. Augstskolu studentiem jāizvēlas pieaugušo klase.</p>
            </div>
        </div>
        <button>Atjaunināt</button><br>
    </form>
</div>


@endsection
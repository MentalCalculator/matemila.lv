@extends('layouts.main')

@section('title', 'Rediģēt profilu - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Rediģēt profilu "{{ $user->username }}"</h1>
</div>

<div class="formBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('updateAnotherProfile', $user->id) }}">
        @csrf
        <div class="formHalfs">
            <div class="formHalf">
                <label for="username">Lietotājvārds*</label><br>
                <input id="username" type="text" name="username" value="{{ $user->username }}" autofocus/><br>
                @if ($errors->has('username'))
                    <p class="text-danger">&#10071; {{ $errors->first('username') }}</p><br>
                @endif
                <label for="name">Vārds*</label><br>
                <input id="name" type="text" name="name" value="{{ $user->name }}" /><br>
                @if ($errors->has('name'))
                    <p class="text-danger">&#10071; {{ $errors->first('name') }}</p><br>
                @endif
                <label for="surname">Uzvārds*</label><br>
                <input id="surname" type="text" name="surname" value="{{ $user->surname }}" /><br>
                @if ($errors->has('surname'))
                    <p class="text-danger">&#10071; {{ $errors->first('surname') }}</p><br>
                @endif
                <label for="email">E-pasta adrese*</label><br>
                <input id="email" type="email" name="email" value="{{ $user->email }}" /><br>
                @if ($errors->has('email'))
                    <p class="text-danger">&#10071; {{ $errors->first('email') }}</p><br>
                @endif
            </div>
            <div class="formHalf">
            <label for="phone">Telefona numurs</label><br>
                <input id="phone" type="text" name="phone" value="{{ $user->phone }}" /><br>
                <label for="place">Pilsēta/novads*</label><br>
                <select name="place" id="place">
                    <option value="">Izvēlēties...</option>
                    <option value="Rīga" {{ $user->place == 'Rīga' ? 'selected' : '' }}>Rīga</option>
                    <option value="Daugavpils" {{ $user->place == 'Daugavpils' ? 'selected' : '' }}>Daugavpils</option>
                    <option value="Jelgava" {{ $user->place == 'Jelgava' ? 'selected' : '' }}>Jelgava</option>
                    <option value="Jēkabpils" {{ $user->place == 'Jēkabpils' ? 'selected' : '' }}>Jēkabpils</option>
                    <option value="Jūrmala" {{ $user->place == 'Jūrmala' ? 'selected' : '' }}>Jūrmala</option>
                    <option value="Liepāja" {{ $user->place == 'Liepāja' ? 'selected' : '' }}>Liepāja</option>
                    <option value="Ogre" {{ $user->place == 'Ogre' ? 'selected' : '' }}>Ogre</option>
                    <option value="Rēzekne" {{ $user->place == 'Rēzekne' ? 'selected' : '' }}>Rēzekne</option>
                    <option value="Valmiera" {{ $user->place == 'Valmiera' ? 'selected' : '' }}>Valmiera</option>
                    <option value="Ventspils" {{ $user->place == 'Ventspils' ? 'selected' : '' }}>Ventspils</option>
                </select><br>
                <label for="school">Skola</label><br>
                <select name="school" id="school">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" {{ $user->school == 'Rīgas Valsts 1.ģimnāzija' ? 'selected' : '' }}>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="class">Klase*</label><br>
                <select name="class" id="class">
                    <option value="0" {{ $user->class == 0 ? 'selected' : '' }}>bērnudārzs</option>
                    <option value="1" {{ $user->class == 1 ? 'selected' : '' }}>1.klase</option>
                    <option value="2" {{ $user->class == 2 ? 'selected' : '' }}>2.klase</option>
                    <option value="3" {{ $user->class == 3 ? 'selected' : '' }}>3.klase</option>
                    <option value="4" {{ $user->class == 4 ? 'selected' : '' }}>4.klase</option>
                    <option value="5" {{ $user->class == 5 ? 'selected' : '' }}>5.klase</option>
                    <option value="6" {{ $user->class == 6 ? 'selected' : '' }}>6.klase</option>
                    <option value="7" {{ $user->class == 7 ? 'selected' : '' }}>7.klase</option>
                    <option value="8" {{ $user->class == 8 ? 'selected' : '' }}>8.klase</option>
                    <option value="9" {{ $user->class == 9 ? 'selected' : '' }}>9.klase</option>
                    <option value="10" {{ $user->class == 10 ? 'selected' : '' }}>10.klase / 1.kurss</option>
                    <option value="11" {{ $user->class == 11 ? 'selected' : '' }}>11.klase / 2.kurss</option>
                    <option value="12" {{ $user->class == 12 ? 'selected' : '' }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ $user->class == 13 ? 'selected' : '' }}>pieaugušo klase</option>
                </select><br>
                <p class="infoText"">Ņemiet vērā, ka 1.-4.kursi attiecas uz tehnikumu audzēkņiem. Augstskolu studentiem jāizvēlas pieaugušo klase.</p>
                <label for="status">Loma</label><br>
                <select name="status" id="class">
                    <option value="user" {{ $user->status == 'user' ? 'selected' : '' }}>Lietotājs</option>
                    <option value="moderator" {{ $user->status == 'moderator' ? 'selected' : '' }}>Moderators</option>
                    <option value="admin" {{ $user->status == 'admin' ? 'selected' : '' }}>Administrators</option>
                </select>
            </div>
        </div>
        <button>Atjaunināt</button><br>
    </form>
</div>


@endsection
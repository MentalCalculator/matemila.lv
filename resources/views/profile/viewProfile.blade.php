@extends('layouts.main')

@section('title', 'Profila informācija - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="../Images/profile_icon.png" alt="Profils" class="headerIcon" />
    <h1>Profila informācija</h1>
</div>

<div class="profileBox" data-aos="zoom-in">
    <div class="profileBoxHalf">
        <p class="label"><span>&#9997;&#127995;</span> Vārds</p>
        <p class="value">{{ Auth::user()->name }}</p>
        <p class="label"><span>&#9997;&#127995;</span> Uzvārds</p>
        <p class="value">{{ Auth::user()->surname }}</p>
        <p class="label">&#128231; E-pasta adrese</p>
        <p class="value">{{ Auth::user()->email }}</p>
        <p class="label">&#128222; Telefona numurs</p>
        @if(Auth::user()->phone == '')
            <p class="value">Nav norādīts</p>
        @else
            <p class="value">{{ Auth::user()->phone }}</p>
        @endif
    </div>
    <div class="profileBoxHalf">
        <p class="label">&#127968; Pilsēta/novads</p>
        <p class="value">{{ Auth::user()->place }}</p>
        <p class="label">&#127979; Skola</p>
        <p class="value">{{ Auth::user()->school }}</p>
        <p class="label">&#128211; Klase</p>
        @if(Auth::user()->class == '0')
            <p class="value">Bērnudārzs</p>
        @elseif(Auth::user()->class == '10')
            <p class="value">10.klase / 1.kurss</p>
        @elseif(Auth::user()->class == '11')
            <p class="value">11.klase / 2.kurss</p>
        @elseif(Auth::user()->class == '12')
            <p class="value">12.klase / 3.kurss</p>
        @elseif(Auth::user()->class == '13')
            <p class="value">Pieaugušo klase</p>
        @else
            <p class="value">{{ Auth::user()->class }}.klase</p>
        @endif
    </div>
</div>

<div class="profileButtons" data-aos="zoom-in">
    <ul>
        <a href="{{ route('editProfile') }}"><li>Rediģēt profilu</li></a>
        <a href="{{ route('editPassword') }}"><li>Nomainīt paroli</li></a>
        <li class="deleteButton" id="deleteButton">Dzēst profilu</li>
    </ul>
</div>

<div id="dialog" class="dialog" data-aos="zoom-in">
    <div class="dialogContent">
        <span class="close" id="close">&times;</span>
        <h2 class="dialogText">Vai Jūs vēlaties dzēst savu profilu?</h2>
        <p class="dialogSubtext">Ievadiet savu paroli, lai apstiprinātu savu izvēli.</p>
        <form method="POST" action="{{ route('deleteProfile') }}">
            @csrf
            @method('DELETE')
            <label for="password">Esošā parole</label><br>
            <input id="password" type="password" name="password" autofocus /><br>
            @if ($errors->has('password'))
                    <p class="textDanger">&#10071; {{ $errors->first('password') }}</p><br>
            @endif
            <button>Apstiprināt</button>
        </form>
    </div>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Profilu meklēšanas rezultāti - Matemīla.lv')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Profilu meklēšanas rezultāti</h1>
</div>

<div class="formBox" data-aos="zoom-in">
    <form action="{{ route('searchProfiles') }}">
        <div class="formHalfs">
            <div class="formHalf">
                <label for="username">Lietotājvārds</label><br>
                <input id="username" type="text" name="username" value="{{ $fields['username'] }}" autofocus/><br>
                <label for="name">Vārds</label><br>
                <input id="name" type="text" name="name" value="{{ $fields['name'] }}" /><br>
                <label for="surname">Uzvārds</label><br>
                <input id="surname" type="text" name="surname" value="{{ $fields['surname'] }}" /><br>
                <label for="email">E-pasta adrese</label><br>
                <input id="email" type="email" name="email" value="{{ $fields['email'] }}" /><br>
            </div>
            <div class="formHalf">
                <label for="place">Pilsēta/novads</label><br>
                <select name="place" id="place">
                    <option value="">Izvēlēties...</option>
                    <option value="Rīga" {{ ($fields['place'] == "Rīga") ? 'selected' : '' }}>Rīga</option>
                    <option value="Daugavpils" {{ ($fields['place'] == "Daugavpils") ? 'selected' : '' }}>Daugavpils</option>
                    <option value="Jelgava" {{ ($fields['place'] == "Jelgava") ? 'selected' : '' }}>Jelgava</option>
                    <option value="Jēkabpils" {{ ($fields['place'] == "Jēkabpils") ? 'selected' : '' }}>Jēkabpils</option>
                    <option value="Jūrmala" {{ ($fields['place'] == "Jūrmala") ? 'selected' : '' }}>Jūrmala</option>
                    <option value="Liepāja" {{ ($fields['place'] == "Liepāja") ? 'selected' : '' }}>Liepāja</option>
                    <option value="Ogre" {{ ($fields['place'] == "Ogre") ? 'selected' : '' }}>Ogre</option>
                    <option value="Rēzekne" {{ ($fields['place'] == "Rēzekne") ? 'selected' : '' }}>Rēzekne</option>
                    <option value="Valmiera" {{ ($fields['place'] == "Valmiera") ? 'selected' : '' }}>Valmiera</option>
                    <option value="Ventspils" {{ ($fields['place'] == "Ventspils") ? 'selected' : '' }}>Ventspils</option>
                </select><br>
                <label for="school">Skola</label><br>
                <select name="school" id="school">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" {{ ($fields['school'] == "Rīgas Valsts 1.ģimnāzija") ? 'selected' : '' }}>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="minClass">Minimālā klase</label><br>
                <select name="minClass" id="minClass" class="classes">
                    <option value="0" {{ ($fields['minClass'] == "0") ? 'selected' : '' }}>bērnudārzs</option>
                    <option value="1" {{ ($fields['minClass'] == "1") ? 'selected' : '' }}>1.klase</option>
                    <option value="2" {{ ($fields['minClass'] == "2") ? 'selected' : '' }}>2.klase</option>
                    <option value="3" {{ ($fields['minClass'] == "3") ? 'selected' : '' }}>3.klase</option>
                    <option value="4" {{ ($fields['minClass'] == "4") ? 'selected' : '' }}>4.klase</option>
                    <option value="5" {{ ($fields['minClass'] == "5") ? 'selected' : '' }}>5.klase</option>
                    <option value="6" {{ ($fields['minClass'] == "6") ? 'selected' : '' }}>6.klase</option>
                    <option value="7" {{ ($fields['minClass'] == "7") ? 'selected' : '' }}>7.klase</option>
                    <option value="8" {{ ($fields['minClass'] == "8") ? 'selected' : '' }}>8.klase</option>
                    <option value="9" {{ ($fields['minClass'] == "9") ? 'selected' : '' }}>9.klase</option>
                    <option value="10" {{ ($fields['minClass'] == "10") ? 'selected' : '' }}>10.klase / 1.kurss</option>
                    <option value="11" {{ ($fields['minClass'] == "11") ? 'selected' : '' }}>11.klase / 2.kurss</option>
                    <option value="12" {{ ($fields['minClass'] == "12") ? 'selected' : '' }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ ($fields['minClass'] == "13") ? 'selected' : '' }}>pieaugušo klase</option>
                </select><br>
                <label for="maxClass">Maksimālā klase</label><br>
                <select name="maxClass" id="maxClass" class="classes">
                    <option value="0" {{ ($fields['maxClass'] == "0") ? 'selected' : '' }}>bērnudārzs</option>
                    <option value="1" {{ ($fields['maxClass'] == "1") ? 'selected' : '' }}>1.klase</option>
                    <option value="2" {{ ($fields['maxClass'] == "2") ? 'selected' : '' }}>2.klase</option>
                    <option value="3" {{ ($fields['maxClass'] == "3") ? 'selected' : '' }}>3.klase</option>
                    <option value="4" {{ ($fields['maxClass'] == "4") ? 'selected' : '' }}>4.klase</option>
                    <option value="5" {{ ($fields['maxClass'] == "5") ? 'selected' : '' }}>5.klase</option>
                    <option value="6" {{ ($fields['maxClass'] == "6") ? 'selected' : '' }}>6.klase</option>
                    <option value="7" {{ ($fields['maxClass'] == "7") ? 'selected' : '' }}>7.klase</option>
                    <option value="8" {{ ($fields['maxClass'] == "8") ? 'selected' : '' }}>8.klase</option>
                    <option value="9" {{ ($fields['maxClass'] == "9") ? 'selected' : '' }}>9.klase</option>
                    <option value="10" {{ ($fields['maxClass'] == "10") ? 'selected' : '' }}>10.klase / 1.kurss</option>
                    <option value="11" {{ ($fields['maxClass'] == "11") ? 'selected' : '' }}>11.klase / 2.kurss</option>
                    <option value="12" {{ ($fields['maxClass'] == "12") ? 'selected' : '' }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ ($fields['maxClass'] == "13") ? 'selected' : '' }}>pieaugušo klase</option>
                </select><br>
            </div>
        </div>
        <button>Meklēt</button><br>
    </form>
</div>

@if($profiles->count() == 0)
    <h2 class="emptyListWarning">&#128533; Diemžēl netika atrasts neviens profils pēc norādītajiem kritērijiem.</h2>
@else
<table class="allProfilesTable">
    <tr data-aos="zoom-in-up">
        <th>ID</th>
        <th>Lietotājs</th>
        <th>Kontaktinformācija</th>
        <th>Vieta un skola</th>
        <th>Klase</th>
        <th>Darbības</th>
    </tr>
    @foreach($profiles as $profile)
    <tr data-aos="zoom-in-up">
        <td>{{ $profile->id }}</td>
        <td>
            <span>{{ $profile->username }}</span><br>
            {{ $profile->name }} {{ $profile->surname}}<br>
            <span class="mobilePosition">
            @if($profile->phone != '')
                📧 {{ $profile->email }} / 📞 {{ $profile->phone }}<br>
            @else
                📧 {{ $profile->email }}<br>
            @endif
            <i>{{ $profile->place }}, {{ $profile->school }}, 
                @if($profile->class == '0')
                    bērnud.
                @elseif($profile->class == '10')
                    10.kl./1.ku.
                @elseif($profile->class == '11')
                    11.kl./2.ku.
                @elseif($profile->class == '12')
                    12.kl./3-4.ku.
                @elseif($profile->class == '13')
                    pieaug. kl.
                @else
                    {{ $profile->class }}.klase
                @endif
            </i>
            </span>
        </td>
        <td>
            📧 {{ $profile->email }}<br>
            @if($profile->phone != '')
                📞 {{ $profile->phone }}
            @endif
        </td>
        <td>
            <span>{{ $profile->place }}</span><br>
            {{ $profile->school }}
        </td>
        <td>
            <span>
                @if($profile->class == '0')
                    bērnud.
                @elseif($profile->class == '10')
                    10.kl./1.ku.
                @elseif($profile->class == '11')
                    11.kl./2.ku.
                @elseif($profile->class == '12')
                    12.kl./3-4.ku.
                @elseif($profile->class == '13')
                    pieaug. kl.
                @else
                    {{ $profile->class }}.klase
                @endif
            <span>
        </td>
        <td>
            <div class="profileButtons">
                <a href="{{ route('editAnotherProfile', $profile->id) }}" class="editProfileLink">Rediģēt</a>
                <button class="deleteButton">Dzēst</button>
            </div>
        </td>
    </tr>

    <div class="dialog" data-aos="zoom-in">
    <div class="dialogContent">
        <span class="close">&times;</span>
        <h2 class="dialogText">Vai Jūs vēlaties dzēst šo profilu "{{ $profile->username }}"?</h2>
        <p class="dialogSubtext">Ievadiet savu paroli, lai apstiprinātu savu izvēli.</p>
        <form method="POST" action="{{ route('deleteAnotherProfile', $profile->id) }}">
            @csrf
            @method('DELETE')
            <center><label for="password">Parole</label><br>
            <input id="password" type="password" name="password" autofocus /><br>
            @if ($errors->has('password'))
                    <p class="textDanger">&#10071; {{ $errors->first('password') }}</p><br>
            @endif
            <button>Apstiprināt</button></center>
        </form>
    </div>
    </div>
    @endforeach
</table>

<div class="pageLinks">
    @if(!$profiles->onFirstPage())
        <a href="{{$profiles->previousPageUrl()}}" class="previousPageLink"><i class='bx bxs-chevron-left'></i> Atpakaļ</a>
    @endif
    @for($i=1; $i<=$profiles->lastPage(); $i++)
        @if($i == $profiles->currentPage())
        <a href="{{$profiles->url($i)}}" class="currentPageNumberLink">{{$i}}</a>
        @else
        <a href="{{$profiles->url($i)}}" class="pageNumberLink">{{$i}}</a>
        @endif
    @endfor
    @if($profiles->currentPage() != $profiles->lastPage())
    <a href="{{$profiles->nextPageUrl()}}" class="nextPageLink"><i class='bx bxs-chevron-right'></i> Tālāk</a>
    @endif
</div>

@endif



@section('content')
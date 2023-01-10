@extends('layouts.main')

@section('title', 'Visi profili - Matemīla.lv')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Visi profili</h1>
</div>

<div class="formBox" data-aos="zoom-in">
    <form action="{{ route('searchProfiles') }}">
        <div class="formHalfs">
            <div class="formHalf">
                <label for="username">Lietotājvārds</label><br>
                <input id="username" type="text" name="username" autofocus /><br>
                <label for="name">Vārds</label><br>
                <input id="name" type="text" name="name" /><br>
                <label for="surname">Uzvārds</label><br>
                <input id="surname" type="text" name="surname" /><br>
                <label for="email">E-pasta adrese</label><br>
                <input id="email" type="email" name="email" /><br>
            </div>
            <div class="formHalf">
                <label for="place">Pilsēta/novads</label><br>
                <select name="place" id="place">
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
                <select name="school" id="school">
                    <option value="">Izvēlēties...</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija">Rīgas Valsts 1. ģimnāzija</option>
                    <option value="Rīgas Valsts 2.ģimnāzija">Rīgas Valsts 2. ģimnāzija</option>
                    <option value="Rīgas Valsts 3.ģimnāzija">Rīgas Valsts 3. ģimnāzija</option>
                    <option value="Āgenskalna Valsts ģimnāzija">Āgenskalna Valsts ģimnāzija</option>
                </select><br>
                <label for="minClass">Minimālā klase</label><br>
                <select name="minClass" id="minClass" class="classes">
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
                <label for="maxClass">Maksimālā klase</label><br>
                <select name="maxClass" id="maxClass" class="classes">
                    <option value="kindergarten">bērnudārzs</option>
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
                    <option value="13" selected="selected">pieaugušo klase</option>
                </select><br>
            </div>
        </div>
        <button>Meklēt</button><br>
    </form>
</div>

<table class="allProfilesTable">
    <tr data-aos="zoom-in-up">
        <th>ID</th>
        <th>Lietotājs</th>
        <th>Kontaktinformācija</th>
        <th>Vieta un skola</th>
        <th>Klase</th>
        <th>Darbība</th>
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
            </div>
        </td>
    </tr>

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

<!--<div id="dialog" class="dialog" data-aos="zoom-in">
    <div class="dialogContent">
        <span class="close" id="close">&times;</span>
        <h2 class="dialogText">Vai Jūs vēlaties dzēst šo profilu {{ $profile->username }}?</h2>
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
</div>-->

@section('content')
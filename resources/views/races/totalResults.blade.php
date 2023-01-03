@extends('layouts.main')

@section('title', 'Sacensību rezultāti - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Sacensību "{{ $race->name }}" rezultāti</h1>
</div>

<div class="trainingResultsForm" data-aos="zoom-in-up">
    <h2>Atlasīt rezultātus</h2>
    <form>
        <div class="trainingResFormFields">
            <div class="trainingResForm1Half">
            <label for="region">Novads/pilsēta:</label>
                <select name="place" id="place">
                    <option value="">Visas vietas</option>
                    <option value="Rīga" @if (old('place') == "Rīga") {{ 'selected' }} @endif>Rīga</option>
                    <option value="Daugavpils" @if (old('place') == "Daugavpils") {{ 'selected' }} @endif>Daugavpils</option>
                    <option value="Jelgava" @if (old('place') == "Jelgava") {{ 'selected' }} @endif>Jelgava</option>
                    <option value="Jēkabpils" @if (old('place') == "Jēkabpils") {{ 'selected' }} @endif>Jēkabpils</option>
                    <option value="Jūrmala" @if (old('place') == "Jūrmala") {{ 'selected' }} @endif>Jūrmala</option>
                    <option value="Liepāja" @if (old('place') == "Liepāja") {{ 'selected' }} @endif>Liepāja</option>
                    <option value="Ogre" @if (old('place') == "Ogre") {{ 'selected' }} @endif>Ogre</option>
                    <option value="Rēzekne" @if (old('place') == "Rēzekne") {{ 'selected' }} @endif>Rēzekne</option>
                    <option value="Valmiera" @if (old('place') == "Valmiera") {{ 'selected' }} @endif>Valmiera</option>
                    <option value="Ventspils" @if (old('place') == "Ventspils") {{ 'selected' }} @endif>Ventspils</option>
                </select><br>
                <label for="school">Skola</label>
                <select name="school" id="school">
                    <option value="">Visas skolas</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" @if (old('school') == "Rīgas Valsts 1.ģimnāzija") {{ 'selected' }} @endif>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
            </div>
            <div class="trainingResForm2Half">
                <label for="minClass maxClass">Klases:</label>
                <select name="minClass" id="minClass" class="classes">
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
                </select>
                -
                <select name="maxClass" id="maxClass" class="classes">
                    <option value="0" @if (old('maxClass') == "0") {{ 'selected' }} @endif>bērnudārzs</option>
                    <option value="1" @if (old('maxClass') == "1") {{ 'selected' }} @endif>1.klase</option>
                    <option value="2" @if (old('maxClass') == "2") {{ 'selected' }} @endif>2.klase</option>
                    <option value="3" @if (old('maxClass') == "3") {{ 'selected' }} @endif>3.klase</option>
                    <option value="4" @if (old('maxClass') == "4") {{ 'selected' }} @endif>4.klase</option>
                    <option value="5" @if (old('maxClass') == "5") {{ 'selected' }} @endif>5.klase</option>
                    <option value="6" @if (old('maxClass') == "6") {{ 'selected' }} @endif>6.klase</option>
                    <option value="7" @if (old('maxClass') == "7") {{ 'selected' }} @endif>7.klase</option>
                    <option value="8" @if (old('maxClass') == "8") {{ 'selected' }} @endif>8.klase</option>
                    <option value="9" @if (old('maxClass') == "9") {{ 'selected' }} @endif>9.klase</option>
                    <option value="10" @if (old('maxClass') == "10") {{ 'selected' }} @endif>10.klase / 1.kurss</option>
                    <option value="11" @if (old('maxClass') == "11") {{ 'selected' }} @endif>11.klase / 2.kurss</option>
                    <option value="12" @if (old('maxClass') == "12") {{ 'selected' }} @endif>12.klase / 3.-4.kurss</option>
                    <option value="13" @if (old('maxClass') == "13" || old('maxClass') == '') {{ 'selected' }} @endif>pieaugušo klase</option>
                </select>
            </div>
        </div>
        <button class="trainingResFormButton"><i class='bx bx-search-alt'></i> Meklēt</button>
    </form>
</div>

@if($raceTotalResults->count() == 0)
<h2 class="emptyListWarning" data-aos="zoom-in-up">&#128533; Diemžēl netika atrasts neviens rezultāts pēc norādītajiem kritērijiem.</h2>
@else
<div class="trainingResultsSection">
    <table class="trainingResultsTable">
        <tr data-aos="zoom-in-up">
            <th>Vieta</th>
            <th>Lietotājvārds</th>
            <th>Klase</th>
            <th>Skola un vieta</th>
            <th>Rezultāts</th>
        </tr>
        @foreach($raceTotalResults as $raceTotalResult)
        <tr data-aos="zoom-in-up">
            <td>{{ $loop->iteration }}</td>
            <td>
                <span class="nameForMobile">{{ $raceTotalResult->username }}</span><br>
                @if($raceTotalResult->class == '0')
                    <span class="classForMobile">bērnudārzs</span><br>
                @elseif($raceTotalResult->class == '10')
                    <span class="classForMobile">10.klase / 1.kurss</span><br>
                @elseif($raceTotalResult->class == '11')
                    <span class="classForMobile">11.klase / 2.kurss</span><br>
                @elseif($raceTotalResult->class == '12')
                    <span class="classForMobile">12.klase / 3.-4.kurss</span><br>
                @elseif($raceTotalResult->class == '13')
                    <span class="classForMobile">pieaugušo klase</span><br>
                @else
                    <span class="classForMobile">{{ $raceTotalResult->class }}.klase</span><br>
                @endif
                <span class="schoolForMobile">{{ $raceTotalResult->school }}</span>
            </td>
            @if($raceTotalResult->class == '0')
                <td>bērnudārzs</td>
            @elseif($raceTotalResult->class == '10')
                <td>10.klase / 1.kurss</td>
            @elseif($raceTotalResult->class == '11')
                <td>11.klase / 2.kurss</td>
            @elseif($raceTotalResult->class == '12')
                <td>12.klase / 3.-4.kurss</td>
            @elseif($raceTotalResult->class == '13')
                <td>pieaugušo klase</td>
            @else
                <td>{{ $raceTotalResult->class }}.klase</td>
            @endif
            <td>
                 <span class="school">{{ $raceTotalResult->school }}</span><br>
                 <span class="place">{{ $raceTotalResult->place }}</span>
            </td>
            <td>
                <span class="pointsInfo">{{ $raceTotalResult->points }}</span>
                <a href="{{ route('showUserRaceResults', [$race->id, $raceTotalResult->user_id]) }}">📊</a>
                <!--<span class="dateInfo">{{ date("d.m.Y H:i", strtotime($raceTotalResult->updated_at."+2 hours")) }}</span>-->

                <!--@auth
                    @if(Auth::user()->status == 'admin')
                        {{ $raceTotalResult->points }}<br>
                        <button class="deleteButton" id="deleteButton">Dzēst</button>
                    @else
                        {{ $raceTotalResult->points }}
                    @endif
                @endauth
                @guest
                    {{ $raceTotalResult->points }}
                @endguest-->
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pageLinks">
        @if(!$raceTotalResults->onFirstPage())
            <a href="{{$raceTotalResults->previousPageUrl()}}" class="previousPageLink"><i class='bx bxs-chevron-left'></i> Atpakaļ</a>
        @endif
        @for($i=1; $i<=$raceTotalResults->lastPage(); $i++)
            @if($i == $raceTotalResults->currentPage())
            <a href="{{$raceTotalResults->url($i)}}" class="currentPageNumberLink">{{$i}}</a>
            @else
            <a href="{{$raceTotalResults->url($i)}}" class="pageNumberLink">{{$i}}</a>
            @endif
        @endfor
        @if($raceTotalResults->currentPage() != $raceTotalResults->lastPage())
        <a href="{{$raceTotalResults->nextPageUrl()}}" class="nextPageLink"><i class='bx bxs-chevron-right'></i> Tālāk</a>
        @endif
    </div>
</div>
@endif

@endsection
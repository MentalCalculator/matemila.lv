@extends('layouts.main')

@section('title', 'Sacensību rezultāti - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Sacensību "{{ $race->name }}" rezultāti</h1>
</div>

<div class="trainingResultsForm" data-aos="zoom-in-up">
    <h2>Atlasīt rezultātus</h2>
    <form method="GET">
        <div class="trainingResFormFields">
            <div class="trainingResForm1Half">
            <label for="region">Novads/pilsēta:</label>
                <select name="place" id="place">
                    <option value="">Visas vietas</option>
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
                <label for="school">Skola</label>
                <select name="school" id="school">
                    <option value="">Visas skolas</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" {{ ($fields['school'] == "Rīgas Valsts 1.ģimnāzija") ? 'selected' : '' }}>Rīgas Valsts 1.ģimnāzija</option>
                    <option value="Rīgas Valsts 2.ģimnāzija" {{ ($fields['school'] == "Rīgas Valsts 2.ģimnāzija") ? 'selected' : '' }}>Rīgas Valsts 2.ģimnāzija</option>
                    <option value="Rīgas Valsts 3.ģimnāzija" {{ ($fields['school'] == "Rīgas Valsts 3.ģimnāzija") ? 'selected' : '' }}>Rīgas Valsts 3.ģimnāzija</option>
                    <option value="Āgenskalna Valsts ģimnāzija" {{ ($fields['school'] == "Āgenskalna Valsts ģimnāzija") ? 'selected' : '' }}>Āgenskalna Valsts ģimnāzija</option>
                </select><br>
            </div>
            <div class="trainingResForm2Half">
                <label for="minClass maxClass">Klases:</label>
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
                </select>
                -
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
                    <option value="13" {{ ($fields['maxClass'] == "13" || $fields['maxClass'] == "") ? 'selected' : '' }}>pieaugušo klase</option>
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
            <a href="{{$raceTotalResults->appends($fields)->previousPageUrl()}}" class="previousPageLink"><i class='bx bxs-chevron-left'></i> Atpakaļ</a>
        @endif
        @for($i=1; $i<=$raceTotalResults->lastPage(); $i++)
            @if($i == $raceTotalResults->currentPage())
            <a href="{{$raceTotalResults->appends($fields)->url($i)}}" class="currentPageNumberLink">{{$i}}</a>
            @else
            <a href="{{$raceTotalResults->url($i)}}" class="pageNumberLink">{{$i}}</a>
            @endif
        @endfor
        @if($raceTotalResults->currentPage() != $raceTotalResults->lastPage())
        <a href="{{$raceTotalResults->appends($fields)->nextPageUrl()}}" class="nextPageLink"><i class='bx bxs-chevron-right'></i> Tālāk</a>
        @endif
    </div>
</div>
@endif

@endsection
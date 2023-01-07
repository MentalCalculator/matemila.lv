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
                <label for="school">Skola</label>
                <select name="school" id="school">
                    <option value="">Visas skolas</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija" {{ old('school') == 'Rīgas Valsts 1.ģimnāzija' ? "selected" : "" }}>Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
            </div>
            <div class="trainingResForm2Half">
                <label for="minClass maxClass">Klases:</label>
                <select name="minClass" id="minClass" class="classes">
                    <option value="0" {{ old('minClass')  == "0" ? "selected" : "" }}>bērnudārzs</option>
                    <option value="1" {{ old('minClass')  == "1" ? "selected" : "" }}>1.klase</option>
                    <option value="2" {{ old('minClass')  == "2" ? "selected" : "" }}>2.klase</option>
                    <option value="3" {{ old('minClass')  == "3" ? "selected" : "" }}>3.klase</option>
                    <option value="4" {{ old('minClass')  == "4" ? "selected" : "" }}>4.klase</option>
                    <option value="5" {{ old('minClass')  == "5" ? "selected" : "" }}>5.klase</option>
                    <option value="6" {{ old('minClass')  == "6" ? "selected" : "" }}>6.klase</option>
                    <option value="7" {{ old('minClass')  == "7" ? "selected" : "" }}>7.klase</option>
                    <option value="8" {{ old('minClass')  == "8" ? "selected" : "" }}>8.klase</option>
                    <option value="9" {{ old('minClass')  == "9" ? "selected" : "" }}>9.klase</option>
                    <option value="10" {{ old('minClass')  == "10" ? "selected" : "" }}>10.klase / 1.kurss</option>
                    <option value="11" {{ old('minClass')  == "11" ? "selected" : "" }}>11.klase / 2.kurss</option>
                    <option value="12" {{ old('minClass')  == "12" ? "selected" : "" }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ old('minClass')  == "13" ? "selected" : "" }}>pieaugušo klase</option>
                </select>
                -
                <select name="maxClass" id="maxClass" class="classes">
                    <option value="0" {{ old('maxClass')  == "0" ? "selected" : "" }}>bērnudārzs</option>
                    <option value="1" {{ old('maxClass')  == "1" ? "selected" : "" }}>1.klase</option>
                    <option value="2" {{ old('maxClass')  == "2" ? "selected" : "" }}>2.klase</option>
                    <option value="3" {{ old('maxClass')  == "3" ? "selected" : "" }}>3.klase</option>
                    <option value="4" {{ old('maxClass')  == "4" ? "selected" : "" }}>4.klase</option>
                    <option value="5" {{ old('maxClass')  == "5" ? "selected" : "" }}>5.klase</option>
                    <option value="6" {{ old('maxClass')  == "6" ? "selected" : "" }}>6.klase</option>
                    <option value="7" {{ old('maxClass')  == "7" ? "selected" : "" }}>7.klase</option>
                    <option value="8" {{ old('maxClass')  == "8" ? "selected" : "" }}>8.klase</option>
                    <option value="9" {{ old('maxClass')  == "9" ? "selected" : "" }}>9.klase</option>
                    <option value="10" {{ old('maxClass')  == "10" ? "selected" : "" }}>10.klase / 1.kurss</option>
                    <option value="11" {{ old('maxClass')  == "11" ? "selected" : "" }}>11.klase / 2.kurss</option>
                    <option value="12" {{ old('maxClass')  == "12" ? "selected" : "" }}>12.klase / 3.-4.kurss</option>
                    <option value="13" {{ (old('maxClass') == "13" || old('maxClass') == "") ? "selected" : "" }}>pieaugušo klase</option>
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
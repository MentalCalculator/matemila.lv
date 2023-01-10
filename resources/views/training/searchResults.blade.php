@extends('layouts.main')

@section('title', 'Treniņu rezultāti - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="{{URL::asset('../Images/trophy.png')}}" alt="Skaitīklis" class="headerIcon" />
    <h1>Treniņu rezultāti</h1>
</div>

<div class="trainingResultsForm" data-aos="zoom-in-up">
    <h2>Atlasīt rezultātus</h2>
    <form>
        <div class="trainingResFormFields">
            <div class="trainingResForm1Half">
                <label for="discipline">Discilpīna:</label>
                <select name="discipline" id="discipline">
                    <option value="add" {{ ($fields['discipline'] == "add") ? 'selected' : '' }}>Saskaitīšana</option>
                    <option value="sub" {{ ($fields['discipline'] == "sub") ? 'selected' : '' }}>Atņemšana</option>
                    <option value="mul" {{ ($fields['discipline'] == "mul") ? 'selected' : '' }}>Reizināšana</option>
                    <option value="div" {{ ($fields['discipline'] == "div") ? 'selected' : '' }}>Dalīšana</option>
                    <option value="add_sub" {{ ($fields['discipline'] == "add_sub") ? 'selected' : '' }}>Saskaitīšana un atņemšana</option>
                    <option value="mul_div" {{ ($fields['discipline'] == "mul_div") ? 'selected' : '' }}>Reizināšana un dalīšana</option>
                    <option value="all" {{ ($fields['discipline'] == "all") ? 'selected' : '' }}>Visas darbības</option>
                    <option value="com" {{ ($fields['discipline'] == "com") ? 'selected' : '' }}>Salīdzināšana</option>
                    <option value="fie" {{ ($fields['discipline'] == "fie") ? 'selected' : '' }}>Ailīšu aizpildīšana</option>
                    <option value="cli" {{ ($fields['discipline'] == "cli") ? 'selected' : '' }}>Kāpināšana</option>
                    <option value="squ" {{ ($fields['discipline'] == "squ") ? 'selected' : '' }}>Kvadrātsaknes</option>
                </select><br>
                <label for="numbersType">Skaitļu režīms:</label>
                <select name="numbersType" id="numbersType">
                    <option value="natural" {{ ($fields['numbersType'] == "natural") ? 'selected' : '' }}>Naturālie skaitļi</option>
                    <option value="integer" {{ ($fields['numbersType'] == "integer") ? 'selected' : '' }}>Veselie skaitļi</option>
                    <option value="decimal" {{ ($fields['numbersType'] == "decimal") ? 'selected' : '' }}>Decimālskaitļi</option>
                </select><br>
                <label for="disciplineMode">Treniņa režīms:</label>
                <select name="disciplineMode" id="disciplineMode">
                    <option value="normal" {{ ($fields['disciplineMode'] == "normal") ? 'selected' : '' }}>Standarts</option>
                    <option value="sprint" {{ ($fields['disciplineMode'] == "sprint") ? 'selected' : '' }}>Sprints</option>
                    <option value="variants" {{ ($fields['disciplineMode'] == "variants") ? 'selected' : '' }}>Ar variantiem</option>
                </select><br>
                <label for="levelMode">Līmenis:</label>
                <select name="levelMode" id="levelMode">
                    <option value="all" {{ ($fields['levelMode'] == "all") ? 'selected' : '' }}>Visi līmeņi</option>
                    <option value="1" {{ ($fields['levelMode'] == "1") ? 'selected' : '' }}>1. līmenis</option>
                    <option value="2" {{ ($fields['levelMode'] == "2") ? 'selected' : '' }}>2. līmenis</option>
                    <option value="3" {{ ($fields['levelMode'] == "3") ? 'selected' : '' }}>3. līmenis</option>
                    <option value="4" {{ ($fields['levelMode'] == "4") ? 'selected' : '' }}>4. līmenis</option>
                    <option value="5" {{ ($fields['levelMode'] == "5") ? 'selected' : '' }}>5. līmenis</option>
                    <option value="6" {{ ($fields['levelMode'] == "6") ? 'selected' : '' }}>6. līmenis</option>
                    <option value="7" {{ ($fields['levelMode'] == "7") ? 'selected' : '' }}>7. līmenis</option>
                    <option value="8" {{ ($fields['levelMode'] == "8") ? 'selected' : '' }}>8. līmenis</option>
                    <option value="9" {{ ($fields['levelMode'] == "9") ? 'selected' : '' }}>9. līmenis</option>
                </select><br>
            </div>
            <div class="trainingResForm2Half">
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

@if($trainingResults->count() == 0)
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
        @foreach($trainingResults as $trainingResult)
        <tr data-aos="zoom-in-up">
            <td>{{ $loop->iteration }}</td>
            <td>
                <span class="nameForMobile">{{ $trainingResult->username }}</span><br>
                @if($trainingResult->class == '0')
                    <span class="classForMobile">bērnudārzs</span><br>
                @elseif($trainingResult->class == '10')
                    <span class="classForMobile">10.klase / 1.kurss</span><br>
                @elseif($trainingResult->class == '11')
                    <span class="classForMobile">11.klase / 2.kurss</span><br>
                @elseif($trainingResult->class == '12')
                    <span class="classForMobile">12.klase / 3.-4.kurss</span><br>
                @elseif($trainingResult->class == '13')
                    <span class="classForMobile">pieaugušo klase</span><br>
                @else
                    <span class="classForMobile">{{ $trainingResult->class }}.klase</span><br>
                @endif
                <span class="schoolForMobile">{{ $trainingResult->school }}</span>
            </td>
            @if($trainingResult->class == '0')
                <td>bērnudārzs</td>
            @elseif($trainingResult->class == '10')
                <td>10.klase / 1.kurss</td>
            @elseif($trainingResult->class == '11')
                <td>11.klase / 2.kurss</td>
            @elseif($trainingResult->class == '12')
                <td>12.klase / 3.-4.kurss</td>
            @elseif($trainingResult->class == '13')
                <td>pieaugušo klase</td>
            @else
                <td>{{ $trainingResult->class }}.klase</td>
            @endif
            <td>
                 <span class="school">{{ $trainingResult->school }}</span><br>
                 <span class="place">{{ $trainingResult->place }}</span>
            </td>
            <td>
                <span class="pointsInfo">{{ $trainingResult->points }}<br>
                <!--<span class="dateInfo">{{ date("d.m.Y H:i", strtotime($trainingResult->updated_at."+2 hours")) }}</span>-->

                <!--@auth
                    @if(Auth::user()->status == 'admin')
                        {{ $trainingResult->points }}<br>
                        <button class="deleteButton" id="deleteButton">Dzēst</button>
                    @else
                        {{ $trainingResult->points }}
                    @endif
                @endauth
                @guest
                    {{ $trainingResult->points }}
                @endguest-->
            </td>
        </tr>

        <!--<div id="dialog" class="dialog" data-aos="zoom-in">
        <div class="dialogContent">
            <span class="close" id="close">&times;</span>
            <h2 class="dialogText">Vai Jūs vēlaties dzēst šo rezultātu {{$trainingResult->id}} lietotājam {{ $trainingResult->username }}?</h2>
            <form method="POST">
                @csrf
                @method('DELETE')
                <button>Jā</button></center>
            </form>
            <button id="close2">Nē<button>
        </div>
        </div>-->
        @endforeach
    </table>

    <div class="pageLinks">
        @if(!$trainingResults->onFirstPage())
            <a href="{{$trainingResults->appends($fields)->previousPageUrl()}}" class="previousPageLink"><i class='bx bxs-chevron-left'></i> Atpakaļ</a>
        @endif
        @for($i=1; $i<=$trainingResults->lastPage(); $i++)
            @if($i == $trainingResults->currentPage())
            <a href="{{$trainingResults->appends($fields)->url($i)}}" class="currentPageNumberLink">{{$i}}</a>
            @else
            <a href="{{$trainingResults->appends($fields)->url($i)}}" class="pageNumberLink">{{$i}}</a>
            @endif
        @endfor
        @if($trainingResults->currentPage() != $trainingResults->lastPage())
        <a href="{{$trainingResults->appends($fields)->nextPageUrl()}}" class="nextPageLink"><i class='bx bxs-chevron-right'></i> Tālāk</a>
        @endif
    </div>
</div>
@endif

@endsection

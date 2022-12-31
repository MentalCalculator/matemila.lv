@extends('layouts.main')

@section('title', 'Treniņu rezultāti - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="../Images/trophy.png" alt="Skaitīklis" class="headerIcon" />
    <h1>Treniņu rezultāti</h1>
</div>

<div class="trainingResultsForm" data-aos="zoom-in-up">
    <h2>Atlasīt rezultātus</h2>
    <form action="{{ route('mentalMathSearchResults') }}">
        <div class="trainingResFormFields">
            <div class="trainingResForm1Half">
                <label for="discipline">Discilpīna:</label>
                <select name="discipline" id="discipline">
                    <option value="add">Saskaitīšana</option>
                    <option value="sub">Atņemšana</option>
                    <option value="mul">Reizināšana</option>
                    <option value="div">Dalīšana</option>
                    <option value="add_sub">Saskaitīšana un atņemšana</option>
                    <option value="mul_div">Reizināšana un dalīšana</option>
                    <option value="all">Visas darbības</option>
                    <option value="com">Salīdzināšana</option>
                    <option value="fie">Ailīšu aizpildīšana</option>
                    <option value="cli">Kāpināšana</option>
                    <option value="squ">Kvadrātsaknes</option>
                </select><br>
                <label for="numbersType">Skaitļu režīms:</label>
                <select name="numbersType" id="numbersType">
                    <option value="natural">Naturālie skaitļi</option>
                    <option value="integer">Veselie skaitļi</option>
                    <option value="decimal">Decimālskaitļi</option>
                </select><br>
                <label for="disciplineMode">Treniņa režīms:</label>
                <select name="disciplineMode" id="disciplineMode">
                    <option value="normal">Standarts</option>
                    <option value="sprint">Sprints</option>
                    <option value="variants">Ar variantiem</option>
                </select><br>
                <label for="levelMode">Līmenis:</label>
                <select name="levelMode" id="levelMode">
                    <option value="all">Visi līmeņi</option>
                    <option value="1">1. līmenis</option>
                    <option value="2">2. līmenis</option>
                    <option value="3">3. līmenis</option>
                    <option value="4">4. līmenis</option>
                    <option value="5">5. līmenis</option>
                    <option value="6">6. līmenis</option>
                    <option value="7">7. līmenis</option>
                    <option value="8">8. līmenis</option>
                    <option value="9">9. līmenis</option>
                </select><br>
            </div>
            <div class="trainingResForm2Half">
                <label for="region">Novads/pilsēta:</label>
                <select name="place" id="place">
                    <option value="">Visas vietas</option>
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
                <label for="school">Skola</label>
                <select name="school" id="school">
                    <option value="">Visas skolas</option> 
                    <option value="Rīgas Valsts 1.ģimnāzija">Rīgas Valsts 1. ģimnāzija</option>
                </select><br>
                <label for="minClass maxClass">Klases:</label>
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
                </select>
                -
                <select name="maxClass" id="maxClass" class="classes">
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
                    <option value="13" selected>pieaugušo klase</option>
                </select>
            </div>
        </div>
        <button class="trainingResFormButton"><i class='bx bx-search-alt'></i> Meklēt</button>
    </form>
</div>

<h2 class="emptyListWarning" data-aos="zoom-in-up">Izvēlieties vajadzīgos kritērijus, lai apskatītus savus un citu lietotāju labākos rezultātus konkrētajā disciplīnā.</h2>

@endsection

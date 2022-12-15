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
    <form>
        <div class="trainingResFormFields">
            <div class="trainingResForm1Half">
                <label for="discilpine">Discilpīna:</label>
                <select name="discilpine" id="discilpine">
                    <option value="addition">Saskaitīšana</option>
                    <option value="subtraction">Atņemšana</option>
                    <option value="multiplication">Reizināšana</option>
                    <option value="division">Dalīšana</option>
                </select><br>
                <label for="numberMode">Skaitļu režīms:</label>
                <select name="numberMode" id="numberMode">
                    <option value="natural">Naturālie skaitļi</option>
                    <option value="integer">Veselie skaitļi</option>
                    <option value="decimal">Decimālskaitļi</option>
                </select><br>
                <label for="discilpineMode">Treniņa režīms:</label>
                <select name="discilpineMode" id="discilpineMode">
                    <option value="standard">Standarts</option>
                    <option value="sprint">Sprints</option>
                    <option value="variants">Ar variantiem</option>
                </select><br>
                <label for="levelMode">Līmenis:</label>
                <select name="levelMode" id="levelMode">
                    <option value="allLevels">Visi līmeņi</option>
                    <option value="1">1. līmenis</option>
                    <option value="2">2. līmenis</option>
                    <option value="3">3. līmenis</option>
                    <option value="4">4. līmenis</option>
                    <option value="5">5. līmenis</option>
                    <option value="6">6. līmenis</option>
                    <option value="7">7. līmenis</option>
                    <option value="8">8. līmenis</option>
                    <option value="9">9. līmenis</option>
                    <option value="10">10. līmenis</option>
                </select><br>
            </div>
            <div class="trainingResForm2Half">
                <label for="scale">Mērogs:</label>
                <select name="scale" id="scale">
                    <option value="country">Valsts</option>
                    <option value="region">Novads/pilsēta</option>
                    <option value="school">Skola</option>    
                </select><br>
                <label for="region">Novads/pilsēta:</label>
                <select name="place" id="place" disabled>
                    <option>Izvēlēties...</option>
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
                <select name="school" id="school" disabled>
                    <option>Izvēlēties...</option> 
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
                    <option value="veteran" selected="selected">pieaugušo klase</option>
                </select>
            </div>
        </div>
        <button class="trainingResFormButton"><i class='bx bx-search-alt'></i> Meklēt</button>
    </form>
</div>

<div class="trainingResultsSection">
    <table class="trainingResultsTable">
        <tr data-aos="zoom-in-up">
            <th>Vieta</th>
            <th>Lietotājvārds</th>
            <th>Klase</th>
            <th>Skola un vieta</th>
            <th>Rezultāts</th>
        </tr>
        <tr data-aos="zoom-in-up">
            <td>1.</td>
            <td>
                <span class="nameForMobile">OzerskyD</span><br>
                <span class="classForMobile">pieaugušo klase</span><br>
                <span class="schoolForMobile">Rīga</span>
            </td>
            <td>pieaugušo klase</td>
            <td><span class="place">Rīga</span></td>
            <td>7777</td>
        </tr>
        <tr data-aos="zoom-in-up">
            <td>2.</td>
            <td>
                <span class="nameForMobile">Kāmis123</span><br>
                <span class="classForMobile">8.klase</span><br>
                <span class="schoolForMobile">Krāslavas Varavīksnes vidusskola, Krāslavas novads</span>
            </td>
            <td>8.klase</td>
            <td>
                 <span class="school">Krāslavas Varavīksnes vidusskola</span><br>
                 <span class="place">Krāslavas novads</span>
            </td>
            <td>3909</td>
        </tr>
        <tr data-aos="zoom-in-up">
            <td>3.</td>
            <td>
                <span class="nameForMobile">AnnijaO</span><br>
                <span class="classForMobile">10.klase</span><br>
                <span class="schoolForMobile">Daugavpils 19.vidusskola, Daugavpils</span>
            </td>
            <td>10.klase</td>
            <td>
                <span class="school">Daugavpils 19.vidusskola</span><br>
                <span class="place">Daugavpils</span>
            </td>
            <td>2792</td>
        </tr>
        <tr data-aos="zoom-in-up">
            <td>4.</td>
            <td>
                <span class="nameForMobile">Skala</span><br>
                <span class="classForMobile">9.klase</span><br>
                <span class="schoolForMobile">Indras pamatskola, Krāslavas novads</span>
            </td>
            <td>9.klase</td>
            <td>
                <span class="school">Indras pamatskola</span><br>
                <span class="place">Krāslavas novads</span>
            </td>
            <td>1722</td>
        </tr>
    </table>
</div>

@endsection

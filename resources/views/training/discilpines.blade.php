@extends('layouts.main')

@section('title', 'Treniņu lauki - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="../Images/abacus.png" alt="Skaitīklis" class="headerIcon" />
    <h1>Treniņu lauki</h1>
</div>

<div class="numbersModeBar" data-aos="zoom-in-up">
    <div class="numbersModeText">Režīms:</div>
    <ul id="numbersModeList">
        <li class="active">Naturālie skaitļi</li>
        <li>Veselie skaitļi</li>
        <li>Decimālskaitļi</li>
    </ul>
</div>

<div class="discilpinesList" data-aos="zoom-in-up">
    <h2>Naturālie skaitļi</h2>
    <div class="discilpine">
        <h3><i class='bx bx-plus'></i> Saskaitīšana</h3>
        <div class="discilpineModes">
            <a class="normalModeLink" href="#"><i class='bx bx-trip'></i> Standarts</a>
            <a class="sprintModeLink" href="#"><i class='bx bx-timer'></i> Sprints</a>
            <a class="newModeLink" href="#"><i class='bx bx-category'></i> Ar variantiem</a>
        </div>
    </div>
    <div class="discilpine">
        <h3><i class='bx bx-minus'></i> Atņemšana</h3>
        <div class="discilpineModes">
            <a class="normalModeLink" href="#"><i class='bx bx-trip'></i> Standarts</a>
            <a class="sprintModeLink" href="#"><i class='bx bx-timer'></i> Sprints</a>
            <a class="newModeLink" href="#"><i class='bx bx-category'></i> Ar variantiem</a>
        </div>
    </div>
    <div class="discilpine">
        <h3><i class='bx bx-x'></i> Reizināšana</h3>
        <div class="discilpineModes">
            <a class="normalModeLink" href="#"><i class='bx bx-trip'></i> Standarts</a>
            <a class="sprintModeLink" href="#"><i class='bx bx-timer'></i> Sprints</a>
            <a class="newModeLink" href="#"><i class='bx bx-category'></i> Ar variantiem</a>
        </div>
    </div>
</div>

<div class="discilpinesList hide" data-aos="zoom-in-up">
    <h2>Veselie skaitļi</h2>
</div>

<div class="discilpinesList hide" data-aos="zoom-in-up">
    <h2>Decimālskaitļi</h2>
</div>

@endsection
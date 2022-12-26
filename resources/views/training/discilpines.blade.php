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
        <li>Daļskaitļi</li>
    </ul>
</div>

<div class="discilpinesList" data-aos="zoom-in-up">
    <h2>Naturālie skaitļi</h2>
    @foreach($disciplines as $discipline)
    @if($discipline->numbers_type == 'natural')
    <div class="discilpine">
        <h3>{{$discipline->name}}</h3>
        <div class="discilpineModes">
            <a class="normalModeLink" href="{{ route('doDiscipline', [$discipline->id, 'normal']) }}" target="_blank"><i class='bx bx-trip'></i> Standarts</a>
            <a class="sprintModeLink" href="{{ route('doDiscipline', [$discipline->id, 'sprint']) }}" target="_blank"><i class='bx bx-timer'></i> Sprints</a>
            @if($discipline->name != 'Salīdzināšana')
            <a class="newModeLink" href="{{ route('doDiscipline', [$discipline->id, 'variants']) }}" target="_blank"><i class='bx bx-category'></i> Ar variantiem</a>
            @endif
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="discilpinesList hide" data-aos="zoom-in-up">
    <h2>Veselie skaitļi</h2>
    @foreach($disciplines as $discipline)
    @if($discipline->numbers_type == 'integer')
    <div class="discilpine">
        <h3>{{$discipline->name}}</h3>
        <div class="discilpineModes">
            <a class="normalModeLink" href="{{ route('doDiscipline', [$discipline->id, 'normal']) }}" target="_blank"><i class='bx bx-trip'></i> Standarts</a>
            <a class="sprintModeLink" href="{{ route('doDiscipline', [$discipline->id, 'sprint']) }}" target="_blank"><i class='bx bx-timer'></i> Sprints</a>
            <a class="newModeLink" href="{{ route('doDiscipline', [$discipline->id, 'variants']) }}" target="_blank"><i class='bx bx-category'></i> Ar variantiem</a>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="discilpinesList hide" data-aos="zoom-in-up">
    <h2>Decimālskaitļi</h2>
    @foreach($disciplines as $discipline)
    @if($discipline->numbers_type == 'decimal')
    <div class="discilpine">
        <h3>{{$discipline->name}}</h3>
        <div class="discilpineModes">
            <a class="normalModeLink" href="{{ route('doDiscipline', [$discipline->id, 'normal']) }}" target="_blank"><i class='bx bx-trip'></i> Standarts</a>
            <a class="sprintModeLink" href="{{ route('doDiscipline', [$discipline->id, 'sprint']) }}" target="_blank"><i class='bx bx-timer'></i> Sprints</a>
            <a class="newModeLink" href="{{ route('doDiscipline', [$discipline->id, 'variants']) }}" target="_blank"><i class='bx bx-category'></i> Ar variantiem</a>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="discilpinesList hide" data-aos="zoom-in-up">
    <h2>Daļskaitļi</h2>
</div>

@endsection
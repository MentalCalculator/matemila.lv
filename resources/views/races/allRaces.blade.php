@extends('layouts.main')

@section('title', 'Aktuālās sacensības - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="{{URL::asset('../Images/trophy.png')}}" alt="Skaitīklis" class="headerIcon" />
    <h1>Sacensības</h1>
</div>

<div class="racesMenuBar" data-aos="zoom-up">
    <ul>
        <li class="selected"><a href="{{ route('allRaces') }}">Aktuālās sacensības</a></li>
        <li><a href="{{ route('racesArchive') }}">Visas sacensības</a></li>
        @if(Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
        <li><a href="{{ route('createRace') }}">Izveidot sacensības</a></li>
        @endif
    </ul>
</div>

<div class="racesBox">
    <div class="racesBoxField">
        @foreach($races as $race)
        @if((Auth::user()->class >= $race->minClass) && (Auth::user()->class <= $race->maxClass) && (now() >= $race->startTime) && (now() <= $race->endTime))
        <div class="raceBox" data-aos="zoom-up">
            <h2>{{ $race->name }}</h2>
            <div class="raceInfo">
                <p>🏫
                    @if($race->minClass == '0')
                        bērnud.
                    @elseif($race->minClass == '13')
                        pieaug. kl.
                    @else
                        {{ $race->minClass }}.kl.
                    @endif 
                    -
                    @if($race->maxClass == '0')
                        bērnud.
                    @elseif($race->maxClass == '13')
                        pieaug. kl.
                    @else
                        {{ $race->maxClass }}.kl.
                    @endif 
                </p>
                <p>🕒 {{ $race->minutes }} min.</p>
                <p>🧮 x disciplīnas</p>
                <p>🗓️ {{ date("d.m.Y H:i", strtotime($race->startTime)) }} - {{ date("d.m.Y H:i", strtotime($race->endTime)) }}</p>
            </div>
            <p>{{ $race->description }}</p>
            <div class="raceLinksBox">
                <a href="{{ route('doRace', $race->id) }}" class="openRaceButton" target="_blank">Atvērt</a>
                <a href="{{ route('showRaceTotalResults', $race->id) }}" class="openRaceResultsButton">Rezultāti</a>
                @if(Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
                <a href="{{ route('editRace', $race->id) }}" class="editRaceButton">Rediģēt</a>
                <a href="{{ route('editRaceDisciplines', $race->id) }}" class="editRaceDisciplinesButton">Rediģēt disciplīnas</a>
                <button class="deleteButton race" id="deleteButton">Dzēst</a>
                @endif
            </div>
        </div>
        @endif

        <div id="dialog" class="dialog" data-aos="zoom-in">
            <div class="dialogContent">
                <span class="close" id="close">&times;</span>
                <h2 class="dialogText">Vai Jūs vēlaties dzēst šīs sacensības {{ $race->name }}?</h2>
                <div class="choiceButtons">
                    <form method="POST" action="{{ route('deleteRace', $race->id) }}">
                        @csrf
                        @method('DELETE')
                        <button>Jā</button></center>
                    </form>
                    <button class="closeButton" id="close2">Nē</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="pageLinks">
        @if(!$races->onFirstPage())
            <a href="{{$races->previousPageUrl()}}" class="previousPageLink"><i class='bx bxs-chevron-left'></i> Atpakaļ</a>
        @endif
        @for($i=1; $i<=$races->lastPage(); $i++)
            @if($i == $races->currentPage())
            <a href="{{$races->url($i)}}" class="currentPageNumberLink">{{$i}}</a>
            @else
            <a href="{{$races->url($i)}}" class="pageNumberLink">{{$i}}</a>
            @endif
        @endfor
        @if($races->currentPage() != $races->lastPage())
        <a href="{{$races->nextPageUrl()}}" class="nextPageLink"><i class='bx bxs-chevron-right'></i> Tālāk</a>
        @endif
    </div>
</div>

@endsection
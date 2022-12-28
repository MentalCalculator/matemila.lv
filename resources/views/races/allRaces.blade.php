@extends('layouts.main')

@section('title', 'Sacensības - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="{{URL::asset('../Images/trophy.png')}}" alt="Skaitīklis" class="headerIcon" />
    <h1>Sacensības</h1>
</div>

<div class="racesMenuBar" data-aos="zoom-up">
    <ul>
        <li class="racesMenuButton selected">Aktuālās sacensības</li>
        <li class="racesMenuButton">Visas sacensības</li>
        @if(Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
        <li><a class="createNewRaceButton" href="{{ route('createRace') }}">Izveidot sacensības</a></li>
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
                <a href="#" class="openRaceButton">Atvērt</a>
                <a href="#" class="openRaceResultsButton">Rezultāti</a>
                @if(Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
                <a href="{{ route('editRace', $race->id) }}" class="editRaceButton">Rediģēt</a>
                <a href="{{ route('editRaceDisciplines', $race->id) }}" class="editRaceDisciplinesButton">Rediģēt disciplīnas</a>
                <a href="#" class="deleteRaceButton">Dzēst</a>
                @endif
            </div>
        </div>
        @endif
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

<div class="racesBox hidden">
<div class="racesBoxField">
    @if($races->count() == 0)
    <h2 class="emptyListWarning">&#128533; Neviena sacensība netika izveidota.</h2>
    @else
        @foreach($races as $race)
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
                <a href="#" class="openRaceButton">Atvērt</a>
                <a href="#" class="openRaceResultsButton">Rezultāti</a>
                @if(Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
                <a href="{{ route('editRace', $race->id) }}" class="editRaceButton">Rediģēt</a>
                <a href="{{ route('editRaceDisciplines', $race->id) }}" class="editRaceDisciplinesButton">Rediģēt disciplīnas</a>
                <a href="#" class="deleteRaceButton">Dzēst</a>
                @endif
            </div>
        </div>
        @endforeach
    @endif
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

<script>

    AOS.init();

    let racesMenuButtons = document.getElementsByClassName("racesMenuButton");
    let racesBoxes = document.getElementsByClassName("racesBox");

    racesMenuButtons[0].addEventListener("click", function() {
        racesMenuButtons[0].classList.add("selected");
        racesMenuButtons[1].classList.remove("selected");
        racesBoxes[0].classList.remove("hidden");
        racesBoxes[1].classList.add("hidden");
    });

    racesMenuButtons[1].addEventListener("click", function() {
        racesMenuButtons[0].classList.remove("selected");
        racesMenuButtons[1].classList.add("selected");
        racesBoxes[0].classList.add("hidden");
        racesBoxes[1].classList.remove("hidden");
    });

</script>

@endsection
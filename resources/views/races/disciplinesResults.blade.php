@extends('layouts.main')

@section('title', 'Lietotāja disciplīnu rezultāti - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Lietotāja "{{ $user->username }}" disciplīnu rezultāti</h1>
</div>

    <h2 class="raceName" data-aos="fade-down">{{ $race->name }}</h2>
    @foreach($raceDisciplineResults as $raceDisciplineResult)
        <div class="userDisciplineResultBox" data-aos="zoom-in">
            <div class="leftSide">
                <span class="disciplineName">{{ $raceDisciplineResult->disciplineName }}</span><br>
                <span>@if($raceDisciplineResult->disciplineNumbersType == 'natural')
                Naturālie skaitļi
                @elseif($raceDisciplineResult->disciplineNumbersType == 'integer')
                Veselie skaitļi
                @elseif($raceDisciplineResult->disciplineNumbersType == 'decimal')
                Decimālskaitļi
                @endif
                @if($raceDisciplineResult->mode == 'normal')
                (standarta režīms)
                @elseif($raceDisciplineResult->mode == 'sprint')
                (sprinta režīms)
                @elseif($raceDisciplineResult->mode == 'variants')
                (variantu režīms)</span>
                @endif
            </div>
            <div class="rightSide">
                <span class="pointsText">{{ $raceDisciplineResult->points }}</span>
                @if(Auth::user()->status == 'moderator' || Auth::user()->status == 'admin')
                <br><button class="deleteButton" id="deleteButton">Dzēst</button>
                @endif
            </div>
        </div>

        <div id="dialog" class="dialog" data-aos="zoom-in">
            <div class="dialogContent">
                <span class="close" id="close">&times;</span>
                <h2 class="dialogText">Vai Jūs vēlaties dzēst lietotāja "{{ $user->username }}" rezultātu disciplīnā "{{ $raceDisciplineResult->disciplineName }}"?</h2>
                <div class="choiceButtons">
                    <form method="POST" action="{{ route('deleteRaceDisciplineResult', $raceDisciplineResult->id) }}">
                        @csrf
                        @method('DELETE')
                        <button>Jā</button></center>
                    </form>
                    <button class="closeButton" id="close2">Nē</button>
                </div>
            </div>
        </div>
    @endforeach

@endsection
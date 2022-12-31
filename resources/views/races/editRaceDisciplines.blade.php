@extends('layouts.main')

@section('title', 'Rediģēt sacensības - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Rediģēt sacensību "{{ $race->name }}" disciplīnas</h1>
</div>

@if($raceDisciplines->count() == 10)
<h2 class="emptyListWarning" data-aos="zoom-in-up">Šajās sacensībās ir pievienots maksimālais sacensību skaits.</h2>
@else
<div class="formBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('addRaceDiscipline', $race->id) }}">
        @csrf
        <div class="formHalfs">
            <div class="formHalf">
                <label for="discipline">Disciplīna un skaitļu tips</label><br>
                <select name="discipline" id="discipline">
                    @foreach($disciplines as $discipline)
                        <option value="{{ $discipline->id }}">
                            {{ $discipline->name }} - 
                            @if($discipline->numbers_type == 'natural')
                            naturālie skaitļi
                            @elseif($discipline->numbers_type == 'integer')
                            veselie skaitļi
                            @elseif($discipline->numbers_type == 'decimal')
                            decimālskaitļi
                            @endif
                        </option> 
                    @endforeach
                </select><br>
                <label for="mode">Režīms</label><br>
                <select name="mode" id="mode">
                    <option value="normal">Standarts</option>
                    <option value="sprint">Sprints</option>
                    <option value="variants">Ar variantiem</option>
                </select><br>
            </div>
            <div class="formHalf">
                <label for="levelCount">Līmeņu skaits</label><br>
                <input type="range" class="range" id="levelCount" name="levelCount" min="4" max="9" value="9" step="1" oninput="this.nextElementSibling.value = this.value">
                <output class="rangeText">
                    9
                </output>
            </div>
        </div>
        <button>Izveidot</button><br>
    </form>
</div>
@endif

<div class="raceDisciplinesBox">
    @if($raceDisciplines->count() == 0)
    <h2 class="emptyListWarning" data-aos="zoom-in-up">Šajās sacensībās nav izveidota neviena disciplīna.</h2>
    @else
    @foreach($raceDisciplines as $raceDiscipline)
    <div class="raceDisciplineBox" data-aos="zoom-in">
        <div class="raceDisciplineNumber">{{ $loop->iteration }}</div>
        <div class="raceDisciplineForm">
            <form method="POST" action="{{ route('updateRaceDiscipline', [$race->id, $raceDiscipline->id]) }}">
            @csrf
            <div class="formLabel">
                <label for="discipline">Disciplīna un skaitļu tips</label>
                <select name="discipline" id="discipline">
                    @foreach($disciplines as $discipline)
                        <option value="{{ $discipline->id }}" {{ ($discipline->id == $raceDiscipline->discipline_id) ? 'selected' : '' }}>
                        {{ $discipline->name }} - 
                        @if($discipline->numbers_type == 'natural')
                        naturālie skaitļi
                        @elseif($discipline->numbers_type == 'integer')
                        veselie skaitļi
                        @elseif($discipline->numbers_type == 'decimal')
                        decimālskaitļi
                        @endif
                        </option> 
                    @endforeach
                </select>
            </div>
            <div class="formLabel">
                <label for="mode">Režīms</label>
                <select name="mode" id="mode">
                    <option value="normal" {{ $raceDiscipline->mode == 'normal' ? 'selected' : '' }}>Standarts</option>
                    <option value="sprint" {{ $raceDiscipline->mode == 'sprint' ? 'selected' : '' }}>Sprints</option>
                    <option value="variants" {{ $raceDiscipline->mode == 'variants' ? 'selected' : '' }}>Ar variantiem</option>
                </select>
            </div>
            <div class="formLabel">
                <label for="levelCount">Līmeņu skaits</label>
                <input type="range" class="range" id="levelCount" name="levelCount" min="4" max="9" value="{{ $raceDiscipline->levelCount }}" step="1" oninput="this.nextElementSibling.value = this.value">
                <output class="rangeText">
                    {{ $raceDiscipline->levelCount }}
                </output>
            </div>
            <button class="updateButton">Atjaunināt</button>
            </form>
            <button class="deleteButton" id="deleteButton">Dzēst</button>
        </div>
    </div>

    <div id="dialog" class="dialog" data-aos="zoom-in">
        <div class="dialogContent">
            <span class="close" id="close">&times;</span>
            <h2 class="dialogText">Vai Jūs vēlaties dzēst šo disciplīnu?</h2>
            <div class="choiceButtons">
                <form method="POST" action="{{ route('deleteRaceDiscipline', [$race->id, $raceDiscipline->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button>Jā</button></center>
                </form>
                <button class="closeButton" id="close2">Nē</button>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>

@endsection
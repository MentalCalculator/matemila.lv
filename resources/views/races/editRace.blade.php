@extends('layouts.main')

@section('title', 'Rediģēt sacensības - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Rediģēt sacensības "{{ $race->name }}"</h1>
</div>

<div class="formBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('updateRace', $race->id) }}">
        @csrf
        <div class="formHalfs">
            <div class="formHalf">
                <label for="title">Nosaukums*</label><br>
                <input id="title" type="text" name="title" value="{{ $race->name }}" autofocus/><br>
                @if ($errors->has('title'))
                    <p class="text-danger">&#10071; {{ $errors->first('title') }}</p><br>
                @endif
                <label for="description">Apraksts</label><br>
                <textarea id="description" name="description">{{ $race->description }}</textarea><br>
            </div>
            <div class="formHalf">
            <label for="startTime">Sākuma laiks*</label><br>
            <input id="startTime" type="datetime-local" name="startTime" value="{{ $race->startTime }}" required /><br>
            <label for="endTime">Beigu laiks*</label><br>
            <input id="endTime" type="datetime-local" name="endTime" value="{{ $race->endTime }}" required /><br>
            <label for="minClass">Minimālā klase*</label><br>
            <select name="minClass" id="minClass">
                <option value="0" @if ($race->minClass == "0") {{ 'selected' }} @endif>bērnudārzs</option>
                <option value="1" @if ($race->minClass == "1") {{ 'selected' }} @endif>1.klase</option>
                <option value="2" @if ($race->minClass == "2") {{ 'selected' }} @endif>2.klase</option>
                <option value="3" @if ($race->minClass == "3") {{ 'selected' }} @endif>3.klase</option>
                <option value="4" @if ($race->minClass == "4") {{ 'selected' }} @endif>4.klase</option>
                <option value="5" @if ($race->minClass == "5") {{ 'selected' }} @endif>5.klase</option>
                <option value="6" @if ($race->minClass == "6") {{ 'selected' }} @endif>6.klase</option>
                <option value="7" @if ($race->minClass == "7") {{ 'selected' }} @endif>7.klase</option>
                <option value="8" @if ($race->minClass == "8") {{ 'selected' }} @endif>8.klase</option>
                <option value="9" @if ($race->minClass == "9") {{ 'selected' }} @endif>9.klase</option>
                <option value="10" @if ($race->minClass == "10") {{ 'selected' }} @endif>10.klase / 1.kurss</option>
                <option value="11" @if ($race->minClass == "11") {{ 'selected' }} @endif>11.klase / 2.kurss</option>
                <option value="12" @if ($race->minClass == "12") {{ 'selected' }} @endif>12.klase / 3.-4.kurss</option>
                <option value="13" @if ($race->minClass == "13") {{ 'selected' }} @endif>pieaugušo klase</option>
            </select><br>
            <label for="maxClass">Maksimālā klase*</label><br>
            <select name="maxClass" id="maxClass">
                <option value="0" @if ($race->maxClass == "0") {{ 'selected' }} @endif>bērnudārzs</option>
                <option value="1" @if ($race->maxClass == "1") {{ 'selected' }} @endif>1.klase</option>
                <option value="2" @if ($race->maxClass == "2") {{ 'selected' }} @endif>2.klase</option>
                <option value="3" @if ($race->maxClass == "3") {{ 'selected' }} @endif>3.klase</option>
                <option value="4" @if ($race->maxClass == "4") {{ 'selected' }} @endif>4.klase</option>
                <option value="5" @if ($race->maxClass == "5") {{ 'selected' }} @endif>5.klase</option>
                <option value="6" @if ($race->maxClass == "6") {{ 'selected' }} @endif>6.klase</option>
                <option value="7" @if ($race->maxClass == "7") {{ 'selected' }} @endif>7.klase</option>
                <option value="8" @if ($race->maxClass == "8") {{ 'selected' }} @endif>8.klase</option>
                <option value="9" @if ($race->maxClass == "9") {{ 'selected' }} @endif>9.klase</option>
                <option value="10" @if ($race->maxClass == "10") {{ 'selected' }} @endif>10.klase / 1.kurss</option>
                <option value="11" @if ($race->maxClass == "11") {{ 'selected' }} @endif>11.klase / 2.kurss</option>
                <option value="12" @if ($race->maxClass == "12") {{ 'selected' }} @endif>12.klase / 3.-4.kurss</option>
                <option value="13" @if ($race->maxClass == "13") {{ 'selected' }} @endif>pieaugušo klase</option>
            </select><br>
            <label for="minutes">Izpildes laiks minūtēs</label><br>
            <input type="range" class="range" id="minutes" name="minutes" min="10" max="120" value="{{ $race->minutes }}" step="10" oninput="this.nextElementSibling.value = this.value">
            <output class="rangeText">
                {{ $race->minutes }}
            </output>
            </div>
        </div>
        <button>Atjaunināt</button><br>
    </form>
</div>


@endsection
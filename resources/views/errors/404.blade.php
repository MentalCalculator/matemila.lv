@extends('layouts.main')

@section('title', 'Lapa nav atrasta - Matemīla.lv')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Kļūda Nr. 404</h1>
</div>

<h2 class="emptyListWarning" data-aos="zoom-in-up">Šī lapa nav atrasta. <a href="{{ route('mainPage') }}">Atgriezties uz galveno lapu. </h2>

@section('content')
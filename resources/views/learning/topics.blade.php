@extends('layouts.main')

@section('title', 'E-skola - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="../Images/laptop.png" alt="E-skola" class="headerIcon" />
    <h1>E-skola</h1>
</div>

<div class="eSchoolFilterBox" data-aos="zoom-in-up">
    <h2>Filtrēšanas kritēriji</h2>
    <form>
        <div class="field">
            <label for="class">Klase:</label>
            <select name="class" id="class">>
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
                <option value="veteran">pieaugušo klase</option>
            </select>
        </div>
        <div class="field">
            <label for="name">Nosaukums:</label>
            <input type="text" id="name" name="name"></input>
        </div>
        <button><i class='bx bx-check-circle' ></i> Labi</button>
    </form>
</div>

<div class="eSchoolTopicsBox">
    <a href="/learning/1">
        <div class="topicBox" data-aos="zoom-out-right">
            <img src="../Images/example3.jpg" alt="Piemēra bilde" />
            <div class="topicBoxText">
                <h3>Saskaitīšana</h3>
                <p>"Matemīla" komanda</p>
            </div>
        </div>
    </a>
    <a href="/learning/1">
        <div class="topicBox" data-aos="zoom-out-right">
            <img src="../Images/example2.jpg" alt="Piemēra bilde" />
            <div class="topicBoxText">
                <h3>Atņemšana</h3>
                <p>"Matemīla" komanda</p>
            </div>
        </div>
    </a>
    <a href="/learning/1">
        <div class="topicBox" data-aos="zoom-out-right">
            <img src="../Images/example3.jpg" alt="Piemēra bilde" />
            <div class="topicBoxText">
                <h3>Teksta uzdevumi</h3>
                <p>"Matemīla" komanda</p>
            </div>
        </div>
    </a>
    <a href="/learning/1">
        <div class="topicBox" data-aos="zoom-out-right">
            <img src="../Images/example2.jpg" alt="Piemēra bilde" />
            <div class="topicBoxText">
                <h3>Mērvienības</h3>
                <p>"Matemīla" komanda</p>
            </div>
        </div>
    </a>
</div>

@endsection
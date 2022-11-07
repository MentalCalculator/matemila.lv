@extends('layouts.main')

@section('title', 'Forums - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="../Images/forum.png" alt="E-skola" class="headerIcon" />
    <h1>Forums</h1>
</div>

<div class="forumSearchBox" data-aos="zoom-in-up">
<form>
    <input type="text" id="name" name="name" class="forumSearchInput" placeholder="Ievadi vajadzīgo atslēgas vārdu." />
    <button><i class='bx bx-search-alt'></i> Meklēt</button>
</form>
</div>

<div class="forumCategoriesBox">
    <a href="/forum/1">
        <div class="forumCategory" data-aos="zoom-out-right">
            <img src="Images/example2.jpg" alt="Piemēra bilde" />
            <div class="forumCategoryText">
                <h3>Matemātika līdz 6.klasei</h3>
                <ul>
                    <li>Ierakstu skaits: 0</li>
                    <li>Pēdējais ieraksts veikts: 01.01.2023.</li>
                </ul>
            </div>
        </div>
    </a>
    <a href="/forum/2">
        <div class="forumCategory" data-aos="zoom-out-right">
            <img src="Images/example3.jpg" alt="Piemēra bilde" />
            <div class="forumCategoryText">
                <h3>Algebra 7.-12.klasei</h3>
                <ul>
                    <li>Ierakstu skaits: 0</li>
                    <li>Pēdējais ieraksts veikts: 01.01.2023.</li>
                </ul>
            </div>
        </div>
    </a>
    <a href="/forum/3">
        <div class="forumCategory" data-aos="zoom-out-right">
            <img src="Images/example3.jpg" alt="Piemēra bilde" />
            <div class="forumCategoryText">
                <h3>Ģeometrija 7.-12.klasei</h3>
                <ul>
                    <li>Ierakstu skaits: 0</li>
                    <li>Pēdējais ieraksts veikts: 01.01.2023.</li>
                </ul>
            </div>
        </div>
    </a>
    <a href="/forum/4">
        <div class="forumCategory" data-aos="zoom-out-right">
            <img src="Images/example3.jpg" alt="Piemēra bilde" />
            <div class="forumCategoryText">
                <h3>Konsultācijas, privātstundas</h3>
                <ul>
                    <li>Ierakstu skaits: 0</li>
                    <li>Pēdējais ieraksts veikts: 01.01.2023.</li>
                </ul>
            </div>
        </div>
    </a>
    <a href="/forum/5">
        <div class="forumCategory" data-aos="zoom-out-right">
            <img src="Images/example3.jpg" alt="Piemēra bilde" />
            <div class="forumCategoryText">
                <h3>Citas tēmas</h3>
                <ul>
                    <li>Ierakstu skaits: 0</li>
                    <li>Pēdējais ieraksts veikts: 01.01.2023.</li>
                </ul>
            </div>
        </div>
    </a>
</div>

@endsection
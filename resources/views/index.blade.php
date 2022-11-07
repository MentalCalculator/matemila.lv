@extends('layouts.main')

@section('title', 'Matemīla.lv')

@section('content')

<section class = "indexImage" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
<div class = "indexImageLayer">
<div class = "textOnImage1">
    <p class = "textOnImage1_1">Pieejama ikvienam.</p>
    <p class = "textOnImage1_2">Noderīga ikvienam.</p>
    <p class = "textOnImage1_3">Lieliska ikvienam. Tāda ir <span class = "matemila">Matemīla</span>.</p>
</div>
</div>
</section>

<section class = "newsSection">
    <h2 data-aos="zoom-in">Jaunumi</h2>
    <div class = "newsContainer">
    <div class = "newsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class = "newsBox_half1">
            <img class = "newsBoxImage" src = "..\Images\example1.jpg" alt="Piemērs"></img>
        </div>
        <div class = "newsBox_half2">
            <h3>Augam kopā - darīsim!</h3>
            <p class = "newsBoxDate">01.01.2022.</p>
            <p class = "newsBoxText">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, doloremque esse eveniet accusantium, 
            in expedita, ea illo nisi magnam quam odio dolor deserunt sequi nostrum vero. Pariatur voluptatum nobis delectus.</p>
            
            <a class = "newsBoxButton" href = "#">Skatīt vairāk...</a>
        </div>
    </div>
    <div class = "newsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class = "newsBox_half1">
            <img class = "newsBoxImage" src = "..\Images\example1.jpg" alt="Piemērs"></img>
        </div>
        <div class = "newsBox_half2">
            <h3>Jauna ziņa</h3>
            <p class = "newsBoxDate">01.01.2022.</p>
            <p class = "newsBoxText">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, doloremque esse eveniet accusantium, 
            in expedita, ea illo nisi magnam quam odio dolor deserunt sequi nostrum vero. Pariatur voluptatum nobis delectus.</p>
            <p><a class = "newsBoxButton" href = "#">Skatīt vairāk...</a></p>
        </div>
    </div>
    <div class = "newsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class = "newsBox_half1">
            <img class = "newsBoxImage" src = "..\Images\example1.jpg" alt="Piemērs"></img>
        </div>
        <div class = "newsBox_half2">
            <h3>Jauna ziņa</h3>
            <p class = "newsBoxDate">01.01.2022.</p>
            <p class = "newsBoxText">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, doloremque esse eveniet accusantium, 
            in expedita, ea illo nisi magnam quam odio dolor deserunt sequi nostrum vero. Pariatur voluptatum nobis delectus.</p>
            <p><a class = "newsBoxButton" href = "#">Skatīt vairāk...</a></p>
        </div>
    </div>
    <div class = "newsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class = "newsBox_half1">
            <img class = "newsBoxImage" src = "..\Images\example1.jpg" alt="Piemērs"></img>
        </div>
        <div class = "newsBox_half2">
            <h3>Jauna ziņa</h3>
            <p class = "newsBoxDate">01.01.2022.</p>
            <p class = "newsBoxText">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, doloremque esse eveniet accusantium, 
            in expedita, ea illo nisi magnam quam odio dolor deserunt sequi nostrum vero. Pariatur voluptatum nobis delectus.</p>
            <p><a class = "newsBoxButton" href = "#">Skatīt vairāk...</a></p>
        </div>
    </div>
    </div>
</section>

<section class = "aboutUs" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
    <h2>Par MateMīlu</h2>

    <div class="aboutUsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class="aboutUsBoxIcon"><i class='bx bx-heart-circle circleIcon'></i></div>
        <p>"Matemīla" ir pašizglītošanās mājaslapa, kur jebkuram interesentam ir iespēja izaicināt sevi ātrrēķināšanā, veicot matemātiskās darbības ar maziem un lieliem skaitļiem galvā, kā arī gūt atbildes uz dažādiem matemātiskajiem jautājumiem un attīstīt savas matemātiskās prasmes.</p> 
    </div>

    <div class="aboutUsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <p>Katru gadu tiešsaistē tiks rīkots lielais ātrrēķināšanas konkurss "Rēķini galvā", kur jebkuram, kurš sevi izjūt kā ātrrēķinātāju, būs iespēja sacensties ar citiem ātrrēķinātājiem, pareizi aprēķinot pēc iespējas vairāk matemātiskos piemērus un pēc iespējas ātrāk.</p>
        <p>Mūsu ātrrēķinātāji tiks iedalīti četrās grupās atbilstoši vecumam: līdz 3.klasei, 4.-6.klase, 7.-12.klase un veterāni. Desmit labākie ātrrēķinātāji no katras grupas piedalīsies šī konkursa lielajā finālā, kur būs iespējams cīnīties par Latvijas labākā ātrrēķinātāja titulu un vērtīgām balvām. </p>
        <div class="aboutUsBoxIcon"><i class='bx bx-calculator' ></i></div>
    </div>

    <div class="aboutUsBox" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
        <div class="aboutUsBoxIcon"><i class='bx bx-like'></i></div>
        <p>Matemātika - tas nav tikai kaut kāds skolas mācību priekšmets. Tā ir viena no mūsu dzīves sastāvdaļām, bez kura mēs nevaram iedomāties dzīvi.</p>
        <ul>
            <li>Pildi uzdevumus, lai labāk saprastu matemātiku.</li>
            <li>Jautā forumā, ja tev ir neskaidrības.</li>
            <li>Izpēti padomus, kā tu vari pielietot matemātiku reālajā dzīvē.</li>
            <li>Uzlabo sev dienu, palasi jokus par matemātiku un matemātiķiem!</li>
        </ul>
    </div>

</section>

@endsection
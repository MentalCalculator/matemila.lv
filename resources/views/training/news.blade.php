@extends('layouts.main')

@section('title', 'Ātrrēķināšanas jaunumi - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <img src="../Images/newsletter.png" alt="Skaitīklis" class="headerIcon" />
    <h1>Ātrrēķināšanas jaunumi</h1>
</div>

<section class="mentalMathNewsSection">
    <div class="mentalMathNewsBox" data-aos="zoom-out-right">
        <img src="../Images/example2.jpg" alt="Piemēra bilde" class="mentalMathNewsImage" />
        <div class="newsBoxRightSide">
            <div class="generalInfo">
                <h2>Jauna ziņa</h2>
                <p>01.01.2023. - "MateMīla" komanda</p>
            </div>
            <div class="newsText">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae eum voluptatem ipsum distinctio a ab, voluptates vel inventore natus nesciunt unde sapiente nemo, dolorem id, vero commodi similique laborum. Laborum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur debitis commodi architecto consectetur dicta ipsum minus facere, molestiae nobis perferendis dolores rem veritatis culpa neque vero natus quidem, sed a?</p>
            </div>
            <a href="/mentalmath/news/1"><i class='bx bxs-arrow-from-left'></i> Lasīt vairāk...</a>
        </div>
    </div>
    
    <div class="mentalMathNewsBox" data-aos="zoom-out-right">
        <img src="../Images/example3.jpg" alt="Piemēra bilde" class="mentalMathNewsImage" />
        <div class="newsBoxRightSide">
            <div class="generalInfo">
                <h2>Ātrrēķināšanas sacensības "Rēķini galvā" ir atpakaļ!</h2>
                <p>10.10.2023. - "MateMīla" komanda</p>
            </div>
            <div class="newsText">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolor maiores neque aut beatae eos consectetur ullam, dicta tempore illo fugit corporis, ducimus vel voluptas soluta expedita perferendis dolorem labore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci quos ea, fugiat aperiam voluptates cum odio tempora ex repellendus possimus corporis beatae eum et illo nostrum commodi placeat consequatur animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero temporibus laboriosam quis, magni quibusdam dolore suscipit molestias ipsam, iusto vel soluta repellendus dicta asperiores. Temporibus, officiis! Mollitia itaque dolore assumenda.</p>
            </div>
            <a href="/mentalmath/news/1"><i class='bx bxs-arrow-from-left'></i> Lasīt vairāk...</a>
        </div>
    </div>

    <div class="mentalMathNewsBox" data-aos="zoom-right-out">
        <img src="../Images/company4.jpg" alt="Piemēra bilde" class="mentalMathNewsImage" />
        <div class="newsBoxRightSide">
            <div class="generalInfo">
                <h2>Aicinām atbalstīt mūsu projekta darbību!</h2>
                <p>10.10.2023. - "MateMīla" komanda</p>
            </div>
            <div class="newsText">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae dolor dolorem sed magnam quisquam ipsum unde pariatur earum. Laudantium quasi ipsum eligendi esse dolorem pariatur incidunt dolore aut. Obcaecati, atque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque error harum non qui velit exercitationem ipsum, debitis, omnis dolorum animi accusamus iste libero eligendi nam, reprehenderit officia veniam sapiente aut.</p>
            </div>
            <a href="/mentalmath/news/1"><i class='bx bxs-arrow-from-left'></i> Lasīt vairāk...</a>
        </div>
    </div>
</section>


@endsection
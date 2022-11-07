<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel = "stylesheet" type="text/css" href="/css/app.css" />
    <link rel = "icon" href =  "/Logo/Vertical/Black logo - no background (without text).png" type = "image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="{{ URL::asset('js/main.js') }}" defer></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>

<!-- Galvene / Header -->
 
<header>

<nav>
    <div class = "navbar">
    <a href = "/"><img class = "logo" src = "..\Logo\Horizontal (without slogan)\Color logo - no background.png" alt = "Matemīla"></a>
        <div class="nav-links">
            <ul class="links">
                <li><a href = "/" class="link">Sākums</a></li>
                <li class = "drop" id = "dropdown1">Ātrrēķināšana<i class='bx bxs-chevron-down arrow first-arrow' id="arrow1"></i>
                    <ul class = "sub-menu first-sub-menu" id = "subMenu1">
                        <li><a href = "/mentalmath/news">Jaunumi</a></li>
                        <li><a href = "/mentalmath/discilpines">Treniņu lauki</a></li>
                        <li><a href = "/mentalmath/results">Treniņu rezultāti</a></li>
                        <li><a href = "/mentalmath/instruction">Instrukcija</a></li>
                    </ul>
                </li>
                <li><a href = "/learning" class="link">E-skola</a></li>
                <li><a href = "/forum" class="link">Forums</a></li>
                <li class = "drop" id = "dropdown2">Citi<i class='bx bxs-chevron-down arrow second-arrow' id="arrow2"></i>
                    <ul class = "sub-menu second-sub-menu" id = "subMenu2">
                        <li><a href = "#">Fakti</a></li>
                        <li><a href = "#">Konkursi</a></li>
                        <li><a href = "#">Joki</a></li>
                    </ul>
                </li>
                <li class = "drop" id = "dropdown3"><i class='bx bx-world'></i>LV<i class='bx bxs-chevron-down arrow third-arrow'></i>
                    <ul class = "sub-menu third-sub-menu" id = "subMenu3">
                        <li><a href = "#">EN</a></li>
                        <li><a href = "#">RU</a></li>
                    </ul>
                </li>
                <li class = "social-networks"><a href = "https://www.facebook.com" target="_blank"><i class='bx bxl-facebook-circle' id="arrow3"></i></a>
                    <a href = "https://www.instagram.com" target="_blank"><i class='bx bxl-instagram' ></i></a>
                    <a href = "https://www.tiktok.com" target="_blank"><i class='bx bxl-tiktok' ></i></a>
                    <a href = "https://www.youtube.com" target="_blank"><i class='bx bxl-youtube' ></i></a>
                </li>
                <li>
                    <div class = "login-button">
                    <a href = "#" style="color: var(--dark_purple2);"><i class='bx bx-key' ></i> Ieiet</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class = "hamburger-icon">
            <i class='bx bx-menu-alt-right hamburger-icon' id = "hamburgerIcon"></i>
        </div>

    </div>
</nav>

</header>

<!-- Saturs / Content -->

@yield('content')

<!-- Kājene / Footer -->

<footer>
    <div class="leftFooterContent footerBox">
        <p class="footerText1">&#169; 2023 Matemīla.lv - Visas tiesības aizsargātas.</p>
    </div>
    <div class="rightFooterContent footerBox" data-aos="fade-left">
        <p class="rightFooterLabel">Informatīvais e-pasts</p>
        <p class="rightFooterField"><i class='bx bx-envelope' ></i><a href="mailto:info@matemila.lv">info@matemila.lv</a></p>
    </div>
</footer>

<script type="text/javascript" src="{{ URL::asset('js/main.js') }}" defer></script>

</body>


</html>
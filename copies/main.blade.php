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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onresize="resizeFunction()">

<!-- Header -->

<header>

<img class = "logo" src = "..\Logo\Horizontal (without slogan)\Color logo - no background.png" alt = "Matemīla">

<button id = "button">&#x2630;</button>
<button id = "button2">&#10005;</button>

<nav class = "navbar" id = "thisNavbar">
    <ul>
        <li><a href = "#">Sākums</a></li>
        <li><a tabindex="0" id="dropdown1">Ātrrēķināšana <span style='font-size:16px;'>&#9661;</span></a>
            <ul class = "mentalmath" id = "mentalmath">
                <li><a href = "#">Jaunumi</a></li>
                <li><a href = "#">Treniņu laukums</a></li>
                <li><a href = "#">Treniņu rezultāti</a></li>
                <li><a href = "#">Instrukcija</a></li>
            </ul>
        </li>
        <li><a href = "#">E-skola</a></li>
        <li><a href = "#">Forums</a></li>
        <li><a href = "#">Ieiet</a></li>
        <li><a href = "#">Reģistrēties</a></li>
        <li><a tabindex="0" id="dropdown2"><i class="fa fa-globe"></i> LV <span style='font-size:16px;'>&#9661;</span></a>
            <ul class = "language" id = "language">
                <li><a href = "#">RU</a></li>
                <li><a href = "#">EN</a></li>
            </ul>
    </li>
    </ul>


</nav>

</header>

<!-- Content -->

@yield ('content')

<!-- Footer -->

<script>

    var navbar1 = document.getElementById("thisNavbar");
    var button = document.getElementById("button");
    button.addEventListener("click", openMenu);

function openMenu(e){
    navbar1.style.display = "block";
    button.innerHTML = "&#10005;";
    e.stopImmediatePropagation();
    this.removeEventListener("click", openMenu);
    document.onclick = closeMenu;
}

function closeMenu(e){
    navbar1.style.display = "none";
    button.innerHTML = "&#x2630;";
    e.stopImmediatePropagation();
    this.removeEventListener("click", closeMenu);
    document.onclick = openMenu;
}


    var dropdown1 = document.getElementById("dropdown1");
    var dropdown2 = document.getElementById("dropdown2");
    var mentalmath = document.getElementById("mentalmath");
    var language = document.getElementById("language");
    var pressedButton1 = 0;
    var pressedButton2 = 0;
    dropdown1.addEventListener("click", openDropdown1);
    dropdown2.addEventListener("click", openDropdown2);


function openDropdown1(e){

    if(pressedButton1 == 0){
        mentalmath.style.display = "block";
        pressedButton1 += 1;
        if(pressedButton2 == 1){
            language.style.display = "none";
            pressedButton2 -= 1;
        }
    }

    else if(pressedButton1 == 1){
        mentalmath.style.display = "none";
        pressedButton1 -= 1;
    }
}

function openDropdown2(e){

    if(pressedButton2 == 0){
        language.style.display = "block";
        pressedButton2 += 1;
        if(pressedButton1 == 1){
            mentalmath.style.display = "none";
            pressedButton1 -= 1;
        }
    }

    else if(pressedButton2 == 1){
        language.style.display = "none";
        pressedButton2 -= 1;
    }
}

function resizeFunction() {
  var w = window.innerWidth;

  if (w >= 768) {
    navbar1.style.display = 'block';
  }
}
    


</script>

</body>


</html>
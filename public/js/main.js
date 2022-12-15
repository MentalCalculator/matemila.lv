AOS.init();

// Navigācijas joslai / For the navigation bar

let hamburgerButton = document.getElementById("hamburgerIcon");
let navLinks = document.querySelector(".nav-links");
let clickedHB = 0;

hamburgerButton.addEventListener("click", openMobileMenu);

function openMobileMenu(){
    if(clickedHB == 0){
        navLinks.style.left = "0%";
            clickedHB++;
    }
    else if(clickedHB == 1){
        navLinks.style.left = "100%";
        clickedHB -= 1;
    }
}

let drops = document.getElementsByClassName('drop');
let arrows = document.getElementsByClassName('arrow');
let subMenus = document.getElementsByClassName('sub-menu');

for(let i = 0; i < drops.length; i++){
    drops[i].addEventListener("click", function(){
        subMenus[i].classList.toggle("show");
        for(let j = 0; j < drops.length; j++){
            if(j != i){
                subMenus[j].classList.remove("show");
            }
        }
    })
}

// Statusa ziņojumam / For status message

$("#statusMessage").delay(3200).fadeOut(800);

// Dialoga blokiem / For dialog box

let dialogs = document.getElementsByClassName("dialog");
let deleteButtons = document.getElementsByClassName("deleteButton");
let closeButtons = document.getElementsByClassName("close");

for(let i = 0; i < dialogs.length; i++){

    deleteButtons[i].onclick = function() {
        dialogs[i].style.display = "block";
    }

    closeButtons[i].onclick = function() {
        dialogs[i].style.display = "none";
    }

    window.onclick = function(event) {
        if(event.target == dialogs[i]){
            dialogs[i].style.display = "none";
        }
    }
}

// Ātrrēķināšanas treniņu laukiem / For mental math training fields

let numbersModeList = document.getElementById("numbersModeList");
numbersModeList = numbersModeList.children;
let discilpinesLists = document.getElementsByClassName("discilpinesList");

for(let i = 0; i < numbersModeList.length; i++){
    numbersModeList[i].addEventListener("click", function(){
        numbersModeList[i].classList.add("active");
        discilpinesLists[i].classList.remove("hide");
        for(let j = 0; j < numbersModeList.length; j++){
            if(j != i){
                numbersModeList[j].classList.remove("active");
                discilpinesLists[j].classList.add("hide");
            }
        }
    })
}

// Instrukcijas blokiem / For instruction blocks

let instQuestions = document.getElementsByClassName("instructionQuestion");

for (let i = 0; i < instQuestions.length; i++) {
    instQuestions[i].addEventListener("click", function() {
        let instAnswer = this.nextElementSibling;
        let arrow = this.querySelector('.bx-chevron-down');
        if(instAnswer.style.maxHeight) {
            instAnswer.style.maxHeight = null;
            arrow.style.rotate = "0deg";
        } else {
            instAnswer.style.maxHeight = instAnswer.scrollHeight + "px";
            arrow.style.rotate = "180deg";
        }
    })
}





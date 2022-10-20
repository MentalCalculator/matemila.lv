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

let firstDropdown = document.getElementById("dropdown1");
firstDropdown.addEventListener("click", clickFirstDropdown);

let secondDropdown = document.getElementById("dropdown2");
secondDropdown.addEventListener("click", clickSecondDropdown);

let thirdDropdown = document.getElementById("dropdown3");
thirdDropdown.addEventListener("click", clickThirdDropdown);
    
let subMenu1 = document.getElementById("subMenu1");
let subMenu2 = document.getElementById("subMenu2");
let subMenu3 = document.getElementById("subMenu3");

function clickFirstDropdown(){
    subMenu1.classList.toggle("show");
    subMenu2.classList.remove("show");
    subMenu3.classList.remove("show");
}

function clickSecondDropdown(){
    subMenu1.classList.remove("show");
    subMenu2.classList.toggle("show");
    subMenu3.classList.remove("show");
}

function clickThirdDropdown(){
    subMenu1.classList.remove("show");
    subMenu2.classList.remove("show");
    subMenu3.classList.toggle("show");
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

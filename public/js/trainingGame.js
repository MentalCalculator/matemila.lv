/* Starta un spēles sekcijas / Start and Game Sections */

let startSection = document.getElementById("startSection");
let gameSection = document.getElementById("gameSection");

/* Izvēlētā līmeņa vērtība / Selected Level Value */
let level = document.getElementById("levelSelect").value;

/* Mainīt līmeni / Change level */
function changeLevel(){
    level = document.getElementById("levelSelect").value;
}

function gameFunction() {
    console.log(level);
    /* Spēles sekcija tiek palaista / The Game Section is launched */
    startSection.style.display = "none";
    gameSection.style.display = "block";

    /* Progresa informācijas teksti / Progress Information Texts */
    let timeText = document.getElementById("time");
    let yourPointsText = document.getElementById("yourPoints");
    let neededPointsText = document.getElementById("neededPoints");
    let yourLevelText = document.getElementById("yourLevel");
    let maxLevelText = document.getElementById("maxLevel");
    let notificationBox = document.getElementById("notificationBox");

    let yourPoints = 0;
    let neededPoints = 30; // 30
    let timer = 45; // 45
    let yourLevel = 1;
    let maxLevel = 9;

    let firstNumber, secondNumber, remainingNumber, correctAnswer;

    mathExample();

    function mathExample () {
        notificationBox.innerHTML = "";
        let exampleField = document.getElementById("exampleField");
        let inputField = document.getElementById("inputField");
        inputField.focus();
        
        if(yourLevel == 1){
            firstNumber = Math.floor(Math.random() * 10);
            secondNumber = Math.floor(Math.random() * 10);
        }
        else if(yourLevel == 2){
            firstNumber = Math.floor(Math.random() * 50);
            secondNumber = Math.floor(Math.random() * 50);
        }
        else if(yourLevel == 3){
            firstNumber = Math.floor(Math.random() * (100 - 10)) + 10;
            remainingNumber = 100 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        else if(yourLevel == 4){
            firstNumber = Math.floor(Math.random() * (1000 - 100)) + 100;
            remainingNumber = 1000 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        else if(yourLevel == 5){
            firstNumber = Math.floor(Math.random() * (10000 - 1000)) + 1000;
            remainingNumber = 10000 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        else if(yourLevel == 6){
            firstNumber = Math.floor(Math.random() * (100000 - 10000)) + 10000;
            remainingNumber = 100000 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        else if(yourLevel == 7){
            firstNumber = Math.floor(Math.random() * (1000000 - 100000)) + 100000;
            remainingNumber = 1000000 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        else if(yourLevel == 8){
            firstNumber = Math.floor(Math.random() * (10000000 - 1000000)) + 1000000;
            remainingNumber = 10000000 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        else if(yourLevel == 9){
            firstNumber = Math.floor(Math.random() * (100000000 - 10000000)) + 10000000;
            remainingNumber = 100000000 - firstNumber;
            secondNumber = Math.floor(Math.random() * remainingNumber);
        }
        correctAnswer = firstNumber + secondNumber;
        exampleField.innerHTML = firstNumber + " + " + secondNumber + " = ";
    }

    /* Atbildes ievade / Input an Answer */

    inputField.addEventListener("keyup", function(e){
        if (e.keyCode === 13) {
            checkExample();
        }
    });

    let inputFieldValue = document.getElementById("inputField").value;

    let keyboard0 = document.getElementById("keyboard0");
    keyboard0.addEventListener("click", function () {
        document.getElementById("inputField").value += '0';
    });

    let keyboard1 = document.getElementById("keyboard1");
    keyboard1.addEventListener("click", function () {
        document.getElementById("inputField").value += '1';
    });

    let keyboard2 = document.getElementById("keyboard2");
    keyboard2.addEventListener("click", function () {
        document.getElementById("inputField").value += '2';
    });

    let keyboard3 = document.getElementById("keyboard3");
    keyboard3.addEventListener("click", function () {
        document.getElementById("inputField").value += '3';
    });

    let keyboard4 = document.getElementById("keyboard4");
    keyboard4.addEventListener("click", function () {
        document.getElementById("inputField").value += '4';
    });

    let keyboard5 = document.getElementById("keyboard5");
    keyboard5.addEventListener("click", function () {
        document.getElementById("inputField").value += '5';
    });

    let keyboard6 = document.getElementById("keyboard6");
    keyboard6.addEventListener("click", function () {
        document.getElementById("inputField").value += '6';
    });

    let keyboard7 = document.getElementById("keyboard7");
    keyboard7.addEventListener("click", function () {
        document.getElementById("inputField").value += '7';
    });

    let keyboard8 = document.getElementById("keyboard8");
    keyboard8.addEventListener("click", function () {
        document.getElementById("inputField").value += '8';
    });

    let keyboard9 = document.getElementById("keyboard9");
    keyboard9.addEventListener("click", function () {
        document.getElementById("inputField").value += '9';
    });

    let keyboardOK = document.getElementById("keyboardOK");
    keyboardOK.addEventListener("click", function () {
        checkExample();
    });
    
    let keyboardClear = document.getElementById("keyboardClear");
    keyboardClear.addEventListener("click", function () {
        let inputValue = document.getElementById("inputField").value;
        inputValue = inputValue.slice(0,-1);
        document.getElementById("inputField").value = inputValue;
    });

    function checkExample () {
        let yourAnswer = document.getElementById("inputField").value; 
            if(yourAnswer != correctAnswer){
                notificationBox.innerHTML = "Kļūda. Pareizā atbilde: " + correctAnswer;
                notificationBox.style.color = "red";
                exampleField.innerHTML = "";
                inputField.style.display = "none";
                minusPoints();
                setTimeout(restartExample, 1000);

                function restartExample() {
                    mathExample();
                    inputField.style.display = "inline-block";
                }

                document.getElementById("inputField").value = "";
            }
            else{
                plusPoints();
                mathExample();
                document.getElementById("inputField").value = "";
            }
            
            function minusPoints(){
                if(yourLevel == 1){
                    yourPoints -= 1;
                }
                else if(yourLevel == 2){
                    yourPoints -= 3;
                }
                else if(yourLevel == 3){
                    yourPoints -= 6;
                }
                else if(yourLevel == 4){
                    yourPoints -= 10;
                }
                else if(yourLevel == 5){
                    yourPoints -= 15;
                }
                else if(yourLevel == 6){
                    yourPoints -= 21;
                }
                else if(yourLevel == 7){
                    yourPoints -= 28;
                }
                else if(yourLevel == 8){
                    yourPoints -= 36;
                }
                else if(yourLevel == 9){
                    yourPoints -= 45;
                }
                else if(yourLevel == 10){
                    yourPoints -= 100;
                }
                yourPointsText.innerHTML = yourPoints;
            }

            function plusPoints(){
                if(yourLevel == 1){
                    if(firstNumber == 0 || secondNumber == 0){
                        yourPoints += 2;
                    }
                    else if (firstNumber <= 4 || secondNumber <= 4){
                        yourPoints += 3;
                    }
                    else{
                        yourPoints += 5;
                    }
                }
                else if(yourLevel == 2){
                    if(firstNumber == 0 || secondNumber == 0){
                        yourPoints += 5;
                    }
                    else if (firstNumber <= 10 || secondNumber <= 10){
                        yourPoints += 8;
                    }
                    else{
                        yourPoints += 12;
                    }
                }
                else if(yourLevel == 3){
                    if(secondNumber == 0){
                        yourPoints += 9;
                    }
                    else if (secondNumber <= 9){
                        yourPoints += 16;
                    }
                    else if (firstNumber % 10 == 0 || secondNumber % 10 == 0){
                        yourPoints += 14;
                    }
                    else{
                        yourPoints += 20;
                    }
                }
                else if(yourLevel == 4){
                    if(secondNumber == 0){
                        yourPoints += 16;
                    }
                    else if (secondNumber <= 9){
                        yourPoints += 21;
                    }
                    else if (secondNumber <= 99){
                        yourPoints += 29;
                    }
                    else if (firstNumber % 10 == 0 || secondNumber % 10 == 0){
                        yourPoints += 24;
                    }
                    else if (firstNumber % 100 == 0 || secondNumber % 100 == 0){
                        yourPoints += 22;
                    }
                    else{
                        yourPoints += 35;
                    }
                }
                else if(yourLevel == 5){
                    if(secondNumber == 0){
                        yourPoints += 29;
                    }
                    else if (secondNumber <= 9){
                        yourPoints += 37;
                    }
                    else if (secondNumber <= 99){
                        yourPoints += 45;
                    }
                    else if (secondNumber <= 999){
                        yourPoints += 52;
                    }
                    else if (firstNumber % 10 == 0 || secondNumber % 10 == 0){
                        yourPoints += 40;
                    }
                    else if (firstNumber % 100 == 0 || secondNumber % 100 == 0){
                        yourPoints += 38;
                    }
                    else if (firstNumber % 1000 == 0 || secondNumber % 1000 == 0){
                        yourPoints += 35;
                    }
                    else{
                        yourPoints += 59;
                    }
                }
                else if(yourLevel == 6){
                    if(secondNumber == 0){
                        yourPoints += 42;
                    }
                    else if (secondNumber <= 99){
                        yourPoints += 52;
                    }
                    else if (secondNumber <= 999){
                        yourPoints += 59;
                    }
                    else if (secondNumber <= 9999){
                        yourPoints += 71;
                    }
                    else if (firstNumber % 100 == 0 || secondNumber % 100 == 0){
                        yourPoints += 57;
                    }
                    else if (firstNumber % 1000 == 0 || secondNumber % 1000 == 0){
                        yourPoints += 53;
                    }
                    else if (firstNumber % 10000 == 0 || secondNumber % 10000 == 0){
                        yourPoints += 48;
                    }
                    else{
                        yourPoints += 82;
                    }
                }
                else if(yourLevel == 7){
                    if(secondNumber == 0){
                        yourPoints += 63;
                    }
                    else if (secondNumber <= 999){
                        yourPoints += 77;
                    }
                    else if (secondNumber <= 9999){
                        yourPoints += 91;
                    }
                    else if (secondNumber <= 99999){
                        yourPoints += 110;
                    }
                    else if (firstNumber % 1000 == 0 || secondNumber % 1000 == 0){
                        yourPoints += 86;
                    }
                    else if (firstNumber % 10000 == 0 || secondNumber % 10000 == 0){
                        yourPoints += 82;
                    }
                    else if (firstNumber % 100000 == 0 || secondNumber % 100000 == 0){
                        yourPoints += 79;
                    }
                    else{
                        yourPoints += 124;
                    }
                }
                else if(yourLevel == 8){
                    if(secondNumber == 0){
                        yourPoints += 92;
                    }
                    else if (secondNumber <= 9999){
                        yourPoints += 116;
                    }
                    else if (secondNumber <= 99999){
                        yourPoints += 142;
                    }
                    else if (secondNumber <= 999999){
                        yourPoints += 173;
                    }
                    else if (firstNumber % 10000 == 0 || secondNumber % 10000 == 0){
                        yourPoints += 138;
                    }
                    else if (firstNumber % 100000 == 0 || secondNumber % 100000 == 0){
                        yourPoints += 129;
                    }
                    else if (firstNumber % 1000000 == 0 || secondNumber % 1000000 == 0){
                        yourPoints += 121;
                    }
                    else{
                        yourPoints += 208;
                    }
                }
                else if(yourLevel == 9){
                    if(secondNumber == 0){
                        yourPoints += 133;
                    }
                    else if (secondNumber <= 99999){
                        yourPoints += 185;
                    }
                    else if (secondNumber <= 999999){
                        yourPoints += 222;
                    }
                    else if (secondNumber <= 9999999){
                        yourPoints += 262;
                    }
                    else if (firstNumber % 100000 == 0 || secondNumber % 100000 == 0){
                        yourPoints += 229;
                    }
                    else if (firstNumber % 1000000 == 0 || secondNumber % 1000000 == 0){
                        yourPoints += 217;
                    }
                    else if (firstNumber % 10000000 == 0 || secondNumber % 10000000 == 0){
                        yourPoints += 204;
                    }
                    else{
                        yourPoints += 318;
                    }
                }
                else if(yourLevel == 10){
                    if((firstNumber == 0 && secondNumber == 0) || (firstNumber == 0 && thirdNumber == 0) || (secondNumber == 0 && thirdNumber == 0)){
                        yourPoints += 200;
                    }
                    else{
                        yourPoints += 500;
                    }
                }
                yourPointsText.innerHTML = yourPoints;
            }
        }

        



        console.log(yourPoints);
                        

        let timerInterval = setInterval(function () {
            timer--;
            timeText.innerHTML = timer;
            if(timer == 0){
                //clearInterval(timerInterval);
                timer+=45;
                if(yourPoints >= neededPoints){
                    yourLevel++;
                    notificationBox.innerHTML = "Ļoti labi! Jūs tiekat nākamajā līmenī.";
                    notificationBox.style.color = "blue";
                    setTimeout(function() {
                        notificationBox.innerHTML = "";
                        notificationBox.style.color = "black";
                    }, 1000);
                    if(yourLevel == 2){
                        neededPoints = yourPoints + 50;
                    }
                    if(yourLevel == 3){
                        neededPoints = yourPoints + 80;
                    }
                    if(yourLevel == 4){
                        neededPoints = yourPoints + 100;
                    }
                    if(yourLevel == 5){
                        neededPoints = yourPoints + 135;
                    }
                    if(yourLevel == 6){
                        neededPoints = yourPoints + 155;
                    }
                    if(yourLevel == 7){
                        neededPoints = yourPoints + 190;
                    }
                    if(yourLevel == 8){
                        neededPoints = yourPoints + 240;
                    }
                    if(yourLevel == 9){
                        neededPoints = yourPoints + 300;
                    }
                }
                else{
                    notificationBox.innerHTML = "Nepietiek punktu, lai pārietu nākamajā līmenī.";
                    notificationBox.style.color = "red";
                    setTimeout(function() {
                        notificationBox.innerHTML = "";
                        notificationBox.style.color = "black";
                    }, 1000);
                    if(yourLevel == 1){
                        neededPoints = yourPoints + 24;
                    }
                    if(yourLevel == 2){
                        neededPoints = yourPoints + 40;
                    }
                    if(yourLevel == 3){
                        neededPoints = yourPoints + 64;
                    }
                    if(yourLevel == 4){
                        neededPoints = yourPoints + 80;
                    }
                    if(yourLevel == 5){
                        neededPoints = yourPoints + 108;
                    }
                    if(yourLevel == 6){
                        neededPoints = yourPoints + 124;
                    }
                    if(yourLevel == 7){
                        neededPoints = yourPoints + 152;
                    }
                    if(yourLevel == 8){
                        neededPoints = yourPoints + 192;
                    }
                    if(yourLevel == 9){
                        neededPoints = yourPoints + 240;
                    }
                }
                yourLevelText.innerHTML = yourLevel;
                neededPointsText.innerHTML = neededPoints;
                
            }
        }, 1000);
    
    maxLevelText.innerHTML = maxLevel;
}

function returnFunction() {
    location.reload();
}
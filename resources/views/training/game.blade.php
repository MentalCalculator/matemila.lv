<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $discipline->name }} - Matemīla.lv</title>
    <link rel="stylesheet" type="text/css" href="/css/trainingGame.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        window.addEventListener( "pageshow", function (event) {
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                window.location.reload();
            }
        });
    </script>
</head>
<body id="body">
    <!-- Starta sekcija / Start Section -->
    <section class="startSection" id="startSection">
        <h2 class="title">{{ $discipline->name }}</h2>
        <h3>
            @if($discipline->numbers_type == 'natural')
            <span>ar naturāliem skaitļiem </span>
            @elseif($discipline->numbers_type == 'integer')
            <span>ar veseliem skaitļiem </span>
            @elseif($discipline->numbers_type == 'decimal')
            <span>ar decimālskaitļiem </span>
            @endif
            @if(request('mode') == 'normal')
            <span class="modeText">normālajā režīmā.</span>
            @elseif(request('mode') == 'sprint')
            <span class="modeText">sprinta režīmā.</span>
            @elseif(request('mode') == 'variants')
            <span class="modeText">variantu režīmā.</span>
            @endif
        </h3>

        <div class="instructionBox">
            <h2>Īsa instrukcija</h2>
            @if(request('mode') == 'normal')
            <ul>
                <li>Jāievada pēc iespējas vairāk pareizo atbilžu, lai dabūtu pēc iespējas vairāk punktu.</li>
                <li>Atbildes ievadei var izmantot tastatūru vai nospiest vajadzīgās ciparu pogas ekrānā.</li>
                <li>Šajā režīmā ir 9 raundi pa 45 sekundēm. <i>Kopējais laiks: 6 min. 45 sek.</i></li>
                <li>Ja raunda beigās TIEK sasniegts ekrānā norādītais vajadzīgais punktu skaits, nākamajā raundā tiek palielināts grūtības līmenis uz augšu.</li>
                <li>Ja raunda beigās NETIEK sasniegts ekrānā norādītais vajadzīgais punktu skaits, nākamajā raundā grūtības līmenis netiek mainīts.</li>
                <li>Ir iespējams arī veikt matemātiskās darbības tikai vienā grūtības līmenī, lai to varētu veikt, jāizvēlas zemāk norādītais grūtības līmenis.</li>
            </ul>
            @elseif(request('mode') == 'sprint')
            <ul>
                <li>Jāievada pēc iespējas vairāk pareizo atbilžu, lai dabūtu pēc iespējas vairāk punktu.</li>
                <li>Atbildes ievadei var izmantot tastatūru vai nospiest vajadzīgās ciparu pogas ekrānā.</li>
                <li>Šajā režīmā tiek iedotas 5 minūtes atbilžu ievadei.</li>
                <li>Ja tiek ievadītas 5 PAREIZAS atbildes, tad grūtības līmenis tiek palielināts uz augšu.</li>
                <li>Ja tiek ievadīta NEPAREIZA atbilde, tad grūtības līmenis tiek samazināts uz leju.</li>
            </ul>
            @elseif(request('mode') == 'variants')
            <ul>
                <li>Katram piemēram tiek ģenerēti 4 atbilžu varianti, no kuriem 1 ir pareizs. Ir jāizvēlas pareizais atbilžu variants katram variantam, lai varētu iegūt pēc iespējas punktu.</li>
                <li>Jānospiež vajadzīgā atbilžu varianta poga, lai apstiprinātu savu izvēli.</li>
                <li>Šajā režīmā ir 9 raundi pa 45 sekundēm. <i>Kopējais laiks: 6 min. 45 sek.</i></li>
                <li>Ja raunda beigās TIEK sasniegts ekrānā norādītais vajadzīgais punktu skaits, nākamajā raundā tiek palielināts grūtības līmenis uz augšu.</li>
                <li>Ja raunda beigās NETIEK sasniegts ekrānā norādītais vajadzīgais punktu skaits, nākamajā raundā grūtības līmenis netiek mainīts.</li>
                <li>Ir iespējams arī veikt matemātiskās darbības tikai vienā grūtības līmenī, lai to varētu veikt, jāizvēlas zemāk norādītais grūtības līmenis.</li>
            </ul>
            @endif
        </div>

        <form>

        <div class = "selectBox">

        @if(request('mode') == 'normal' || request('mode') == 'variants')
        <label for "level" class="labelText">Izvēlies vajadzīgo līmeni:</label><br>
        @endif

        <select id="levelSelect" onchange="changeLevel()">
            <option value="all">Visi līmeņi</option>
            @if(request('mode') == 'normal' || request('mode') == 'variants')
            <option value="1">1.līmenis</option>
            <option value="2">2.līmenis</option>
            <option value="3">3.līmenis</option>
            <option value="4">4.līmenis</option>
            <option value="5">5.līmenis</option>
            <option value="6">6.līmenis</option>
            <option value="7">7.līmenis</option>
            <option value="8">8.līmenis</option>
            <option value="9">9.līmenis</option>
            @endif
        </select>

        <button type="button" onclick="gameFunction()">Sākt</button>
        </div>

        </form>
        <div class="line"></div>
        <p class="copyrightText">&copy; 2023 Matemīla.lv - versija 0.1.0</p>
    </section>

    <!-- Spēles sekcija / Game Section -->
    <section class="gameSection" id="gameSection">
        <div class="infoBox">
            <div class="timeText">
                Laiks: <span class="time" id="time">-</span>
            </div>
            <div class="pointsText">
                Punkti: <span class="yourPoints" id="yourPoints">0</span><span class = "neededPoints" id="neededPoints"></span>
            </div>
            <div class="levelText">
                Līmenis: <span class="yourLevel" id="yourLevel"></span><span class = "maxLevel" id="maxLevel"></span>
            </div>
            <div class="roundsText" id="roundsText">
                Raundi: <span class="yourRoundsCount" id="yourRoundsCount">1</span>
            </div>
            <div class="buttonText">
                <form method="POST" name='submitResult'>
                    @csrf
                    <input type="hidden" name="level" id="inputLevel" />
                    <input type="hidden" name="points" id="inputPoints" />
                    <!--<input type="hidden" name="errors" id="inputErrors" />-->
                    <button type="submit" class="button" id="finishButton" formaction="{{ route('saveTrainingResult', [$discipline->id, request('mode')]) }}">Pabeigt</button>
                </form>
                    <button class="backButton" id="backButton" onclick="returnFunction()">Atgriezties</button>
            </div>
        </div>

        <div class="notificationBox" id="notificationBox">
            <i class='bx bx-info-circle'></i> Jums jāsasniedz 30 punkti.
        </div>
        
        @if($discipline->short_name == 'com')
        <div class="exampleBox comparison" id="exampleBox">
            <div class="example" id="compNum1"></div>
            <div class="input">
                <input class="inputField" id="inputField" style="width:40px" maxLength="1"/>
            </div>
            <div class="example" id="compNum2"></div>
        </div>
        @else
        <div class="exampleBox" id="exampleBox">
            <div class="example" id="exampleField"></div>
            <div class="input">
                <input class="inputField" id="inputField"/>
            </div>
        </div>
        @endif

        <div class="keyboardBox">
            @if($discipline->short_name == 'com')
            <button class="keyboardButton compare" id="keyboard<"><</button>
            <button class="keyboardButton compare" id="keyboard=">=</button>
            <button class="keyboardButton compare" id="keyboard>">></button>
            @elseif(request('mode') == 'variants')
            <button class="keyboardButton variant">A</button>
            <button class="keyboardButton variant">B</button>
            <button class="keyboardButton variant">C</button>
            <button class="keyboardButton variant">D</button>
            @else
            <button class="keyboardButton" id="keyboard7">7</button>
            <button class="keyboardButton" id="keyboard8">8</button>
            <button class="keyboardButton" id="keyboard9">9</button>
            <button class="keyboardButton" id="keyboard4">4</button>
            <button class="keyboardButton" id="keyboard5">5</button>
            <button class="keyboardButton" id="keyboard6">6</button>
            <button class="keyboardButton" id="keyboard1">1</button>
            <button class="keyboardButton" id="keyboard2">2</button>
            <button class="keyboardButton" id="keyboard3">3</button>
            <button class="keyboardButton" id="keyboard0">0</button>
            @if($discipline->numbers_type == 'integer')
                <button class="keyboardButton minus" id="keyboardMinus">-</button>
            @elseif($discipline->numbers_type == 'decimal')
                <button class="keyboardButton comma" id="keyboardComma">,</button>
            @else
                <button class="keyboardButton accept" id="keyboardOK">OK</button>
            @endif
            <button class="keyboardButton clear" id="keyboardClear">Dzēst</button>
            @if($discipline->numbers_type == 'integer' || $discipline->numbers_type == 'decimal')
                <button class="keyboardButton accept" id="keyboardOK">OK</button>
            @endif
            @endif
        </div>
    </section>

    <script>

        AOS.init();

        /* Disciplīnas masīvs / Array of the Discipline */
        let discipline = {{ Illuminate\Support\Js::from($discipline) }};

        /* Izvēlētais režīms / Selected Mode */
        let mode = {{ Illuminate\Support\Js::from($mode) }};

        /* Fona krāsa / Background Color */
        let body = document.getElementById('body');

        if(discipline.numbers_type == 'integer'){
            body.style.backgroundColor = 'darkcyan';
        }
        else if(discipline.numbers_type == 'decimal'){
            body.style.backgroundColor = 'darkorange';
        }

        /* OK pogas izskata izmainīšana / Changing The OK Button Look */
        let okButton = document.getElementById('keyboardOK');

        if(discipline.numbers_type == 'integer' || discipline.numbers_type == 'decimal'){
            if(mode != 'variants'){
                okButton.style.borderBottomLeftRadius = "30px";
                okButton.style.borderBottomRightRadius = "30px";
            }
        }

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

            /* Spēles sekcija tiek palaista / The Game Section is launched */
            startSection.style.display = "none";
            gameSection.style.display = "block";

            /* Progresa informācijas teksti / Progress Information Texts */
            let timeText = document.getElementById("time");
            let yourPointsText = document.getElementById("yourPoints");
            let neededPointsText = document.getElementById("neededPoints");
            let yourLevelText = document.getElementById("yourLevel");
            let maxLevelText = document.getElementById("maxLevel");
            let roundsText = document.getElementById("roundsText");
            let roundsCountText = document.getElementById("yourRoundsCount");
            let notificationBox = document.getElementById("notificationBox");
            let exampleBox = document.getElementById("exampleBox");

            /* Mainīgās vērtības / Variable Values */
            let yourPoints = 0;
            let neededPoints, timer, yourLevel, maxLevel, completedRounds, maxRounds, roundCount;
            let firstNumber, secondNumber, remainingNumber, correctAnswer, correctDecNumAnswer;
            let example1, example2; // Priekš salīdzināšanas / For Comparison
            let correctAnswersCount = 0; // Pareizo atbilžu skaits pēc kārtas (sprinta režīmā) / Count of Correct Answers in a Row (in Sprint Mode)
            let correctVariant, correctVariantNum; // Pareizais variants un tā numurs (variantu režīmā) / a Correct Variant and It's Number (in Variants Mode)
            let selectedVariantNum; // Izvēlētā varianta numurs (variantu režīmā) / Selected Variant Number (in Variants Mode)
            let arrayOfErrors = []; // Pieļauto kļūdu masīvs / An Array of Errors
            let exampleText; // Piemēra teksts priekš kļūdu masīva / An Example Text for the Array of Errors 

            /* Piemēru lauki priekš salīdzināšanas / Example Fields for Comparison */ 
            let compNum1Field = document.getElementById("compNum1");
            let compNum2Field = document.getElementById("compNum2");

            /* Variantu pogas priekš variantu režīma / Variants Buttons for Variants Mode */
            let variants = document.getElementsByClassName("variant");

            /* Parametru piemērošana, atkarībā no režīma / Applying Parameters depending on the Mode */
            if(mode == 'normal' || mode == 'variants'){
                if(level == 'all'){
                    neededPoints = 30;
                    timer = 45;
                    yourLevel = 1;
                    maxLevel = 9;
                    completedRounds = 1;
                    maxRounds = 9;
                    neededPointsText.innerHTML = ' / ' + neededPoints;
                    maxLevelText.innerHTML = ' / ' + maxLevel;
                }
                else{
                    timer = 405;
                    yourLevel = level;
                    completedRounds = 1;
                    maxRounds = 1;
                }
            }
            else if(mode == 'sprint'){
                timer = 300;
                yourLevel = 1;
                maxLevel = 9;
                completedRounds = 1;
                maxRounds = 1;
            }

            /* Raunndu skaita parādīšana / Showing a Count of Rounds */
            if(mode == 'normal' || mode == 'variants'){
                roundsCount = maxRounds;
                showRoundsCount();
            }
            else{
                roundsText.style.display = "none";
            }

            function showRoundsCount(){
                roundsCountText.innerHTML = roundsCount;
            }

            /* Nejauši izvēlēts naturāls skaitlis / Random Generated Natural Number */
            function getRandomNaturalNumber(min, max) {
                return Math.floor(Math.random() * (max - min)) + min;
            }

            /* Nejauši izvēlēts vesels skaitlis / Random Generated Integer Number */
            function getRandomIntegerNumber(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1) + min);
            }

            /* Nejauši izvēlēts decimālskaitlis / Random Generated Decimal Number */
            function getRandomDecimalNumber(min, max, decimals, option, multiplier){
                let precision = Math.pow(10, decimals);
                let exampleDN;
                
                if(option == 'mul'){
                    let randomMultiplier = getRandomNaturalNumber(min, max);
                    exampleDN = multiplier * randomMultiplier;
                    exampleDN = Math.round(exampleDN * (precision * 10000)) / (precision * 10000);
                }
                else{
                    exampleDN = (Math.floor(Math.random() * (max * precision - min * precision) + min * precision) / (1 * precision)).toFixed(decimals);
                }
                
                return Number(exampleDN);
            }

            /* Pareizi noapaļots decimāldaļas rezultāts / Correct Rounded Decimal Number */
            function getDecimalNumbersResult(firstNum, secondNum, decimals, disc){
                let result;
                
                if(disc == 'add'){
                    result = firstNum + secondNum;
                }
                else if(disc == 'sub'){
                    result = firstNum - secondNum;
                }
                else if(disc == 'mul'){
                    result = firstNum * secondNum;
                }
                else if(disc == 'div'){
                    result = secondNum / firstNum;
                }
                return Number(result.toFixed(decimals));
            }

            /* Vairāku skaitļu iegūšana priekš piemēra / Getting some Numbers for an Example */
            /* Saskaitīšana / Addition */
            function createAdditionExample(option){
                if(yourLevel == 1){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(0, 10);
                        secondNumber = getRandomNaturalNumber(0, 10);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10, 10);
                        secondNumber = getRandomIntegerNumber(-10, 10);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 1);
                        secondNumber = getRandomDecimalNumber(0, 1, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'add');
                    }
                }
                else if(yourLevel == 2){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(0, 50);
                        secondNumber = getRandomNaturalNumber(0, 50);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-50, 50);
                        secondNumber = getRandomIntegerNumber(-50, 50);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 10, 1);
                        secondNumber = getRandomDecimalNumber(0, 10, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'add');
                    }
                }
                else if(yourLevel == 3){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10, 100);
                        remainingNumber = 100 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 50);
                        secondNumber = getRandomIntegerNumber(-50, 100);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(10, 25, 2);
                        secondNumber = getRandomDecimalNumber(10, 25, 2);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'add');
                    }
                }
                else if(yourLevel == 4){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(100, 1000);
                        remainingNumber = 1000 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-1000, 500);
                        secondNumber = getRandomIntegerNumber(-500, 1000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(25, 100, 2);
                        secondNumber = getRandomDecimalNumber(25, 100, 2);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'add');
                    }
                }
                else if(yourLevel == 5){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(1000, 10000);
                        remainingNumber = 10000 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10000, 5000);
                        secondNumber = getRandomIntegerNumber(-5000, 10000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(50, 200, 3);
                        secondNumber = getRandomDecimalNumber(50, 200, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'add');
                    }
                }
                else if(yourLevel == 6){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10000, 100000);
                        remainingNumber = 100000 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100000, 50000);
                        secondNumber = getRandomIntegerNumber(-50000, 100000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(200, 500, 3);
                        secondNumber = getRandomDecimalNumber(200, 500, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3), 'add';
                    }
                }
                else if(yourLevel == 7){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(100000, 1000000);
                        remainingNumber = 1000000 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-1000000, 500000);
                        secondNumber = getRandomIntegerNumber(-500000, 1000000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(1000, 5000, 4);
                        secondNumber = getRandomDecimalNumber(1000, 5000, 4);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 4, 'add');
                    }
                }
                else if(yourLevel == 8){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(1000000, 10000000);
                        remainingNumber = 10000000 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10000000, 5000000);
                        secondNumber = getRandomIntegerNumber(-5000000, 10000000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(5000, 10000, 4);
                        secondNumber = getRandomDecimalNumber(5000, 10000, 4);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 4, 'add');
                    }
                }
                else if(yourLevel == 9){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10000000, 100000000);
                        remainingNumber = 100000000 - firstNumber;
                        secondNumber = Math.floor(Math.random() * remainingNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100000000, 50000000);
                        secondNumber = getRandomIntegerNumber(-50000000, 100000000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(10000, 25000, 5);
                        secondNumber = getRandomDecimalNumber(10000, 25000, 5);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 5, 'add');
                    }
                }

                if(discipline.numbers_type == 'decimal'){
                    correctAnswer = correctDecNumAnswer;
                    let correctAnswerStr = correctAnswer.toString();
                    correctAnswerStr = correctAnswerStr.replace('.', ',');
                    correctAnswer = correctAnswerStr;
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        example1 = firstNumber + secondNumber;
                    }
                    else if(option == 'example2'){
                        example2 = firstNumber + secondNumber;
                    }
                }
                else{
                    correctAnswer = firstNumber + secondNumber;
                }
            }

            /* Atņemšana / Substraction */
            function createSubstractionExample(option){
                if(yourLevel == 1){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(0, 10);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10, 5);
                        secondNumber = getRandomIntegerNumber(-5, 10);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 1);
                        secondNumber = getRandomDecimalNumber(0, firstNumber, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'sub');
                    }
                }
                else if(yourLevel == 2){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10, 50);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-50, 25);
                        secondNumber = getRandomIntegerNumber(-25, 50);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 10, 1);
                        secondNumber = getRandomDecimalNumber(0, firstNumber, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'sub');
                    }
                }
                else if(yourLevel == 3){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(50, 100);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 50);
                        secondNumber = getRandomIntegerNumber(-50, 100);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(10, 25, 2);
                        secondNumber = getRandomDecimalNumber(10, firstNumber, 2);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'sub');
                    }
                }
                else if(yourLevel == 4){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(100, 1000);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-1000, 500);
                        secondNumber = getRandomIntegerNumber(-500, 1000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(25, 100, 2);
                        secondNumber = getRandomDecimalNumber(25, firstNumber, 2);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'sub');
                    }
                }
                else if(yourLevel == 5){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(1000, 10000);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10000, 5000);
                        secondNumber = getRandomIntegerNumber(-5000, 10000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(50, 200, 3);
                        secondNumber = getRandomDecimalNumber(50, firstNumber, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'sub');
                    }
                }
                else if(yourLevel == 6){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10000, 100000);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100000, 50000);
                        secondNumber = getRandomIntegerNumber(-50000, 100000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(200, 500, 3);
                        secondNumber = getRandomDecimalNumber(200, firstNumber, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'sub');
                    }
                }
                else if(yourLevel == 7){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(100000, 1000000);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-1000000, 500000);
                        secondNumber = getRandomIntegerNumber(-500000, 1000000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(1000, 5000, 4);
                        secondNumber = getRandomDecimalNumber(1000, firstNumber, 4);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 4, 'sub');
                    }
                }
                else if(yourLevel == 8){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(1000000, 10000000);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10000000, 5000000);
                        secondNumber = getRandomIntegerNumber(-5000000, 10000000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(5000, 10000, 4);
                        secondNumber = getRandomDecimalNumber(5000, firstNumber, 4);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 4, 'sub');
                    }
                }
                else if(yourLevel == 9){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10000000, 100000000);
                        secondNumber = Math.floor(Math.random() * firstNumber);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100000000, 50000000);
                        secondNumber = getRandomIntegerNumber(-50000000, 100000000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(10000, 25000, 5);
                        secondNumber = getRandomDecimalNumber(10000, firstNumber, 5);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 5, 'sub');
                    }
                }

                if(discipline.numbers_type == 'decimal'){
                    correctAnswer = correctDecNumAnswer;
                    let correctAnswerStr = correctAnswer.toString();
                    correctAnswerStr = correctAnswerStr.replace('.', ',');
                    correctAnswer = correctAnswerStr;
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        example1 = firstNumber - secondNumber;
                    }
                    else if(option == 'example2'){
                        example2 = firstNumber - secondNumber;
                    }
                }
                else{
                    correctAnswer = firstNumber - secondNumber;
                }
            }

            /* Reizināšana / Multiplication */
            function createMultiplicationExample(option){
                if(yourLevel == 1){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(0, 5);
                        secondNumber = getRandomNaturalNumber(0, 5);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-5, 5);
                        secondNumber = getRandomIntegerNumber(-5, 5);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 5, 0);
                        secondNumber = getRandomDecimalNumber(0, 1, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'mul');
                    }
                }
                else if(yourLevel == 2){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(0, 10);
                        secondNumber = getRandomNaturalNumber(0, 10);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10, 10);
                        secondNumber = getRandomIntegerNumber(-10, 10);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 10, 0);
                        secondNumber = getRandomDecimalNumber(0, 1, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'mul');
                    }
                }
                else if(yourLevel == 3){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(0, 20);
                        secondNumber = getRandomNaturalNumber(0, 20);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-20, 20);
                        secondNumber = getRandomIntegerNumber(-20, 20);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 20, 0);
                        secondNumber = getRandomDecimalNumber(0, 1, 2);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'mul');
                    }
                }
                else if(yourLevel == 4){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(10, 25);
                        secondNumber = getRandomNaturalNumber(10, 50);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-25, 10);
                        secondNumber = getRandomIntegerNumber(-50, 50);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(10, 50, 0);
                        secondNumber = getRandomDecimalNumber(0, 1, 2);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'mul');
                    }
                }
                else if(yourLevel == 5){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(25, 50);
                        secondNumber = getRandomNaturalNumber(10, 100);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-50, 25);
                        secondNumber = getRandomIntegerNumber(-100, 100);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(10, 50, 0);
                        secondNumber = getRandomDecimalNumber(0, 1, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'mul');
                    }
                }
                else if(yourLevel == 6){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(25, 100);
                        secondNumber = getRandomNaturalNumber(100, 200);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 25);
                        secondNumber = getRandomIntegerNumber(-200, 200);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(50, 100, 0);
                        secondNumber = getRandomDecimalNumber(0, 1, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'mul');
                    }
                }
                else if(yourLevel == 7){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(25, 100);
                        secondNumber = getRandomNaturalNumber(200, 1000);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 25);
                        secondNumber = getRandomIntegerNumber(-1000, 1000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(50, 100, 0);
                        secondNumber = getRandomDecimalNumber(0, 10, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'mul');
                    }
                }
                else if(yourLevel == 8){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(25, 100);
                        secondNumber = getRandomNaturalNumber(1000, 10000);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 25);
                        secondNumber = getRandomIntegerNumber(-10000, 10000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(100, 200, 0);
                        secondNumber = getRandomDecimalNumber(0, 10, 3);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 3, 'mul');
                    }
                }
                else if(yourLevel == 9){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(25, 100);
                        secondNumber = getRandomNaturalNumber(10000, 100000);
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 25);
                        secondNumber = getRandomIntegerNumber(-100000, 100000);
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(100, 500, 1);
                        secondNumber = getRandomDecimalNumber(0, 10, 1);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'mul');
                    }
                }

                if(discipline.numbers_type == 'decimal'){
                    correctAnswer = correctDecNumAnswer;
                    let correctAnswerStr = correctAnswer.toString();
                    correctAnswerStr = correctAnswerStr.replace('.', ',');
                    correctAnswer = correctAnswerStr;
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        example1 = firstNumber * secondNumber;
                    }
                    else if(option == 'example2'){
                        example2 = firstNumber * secondNumber;
                    }
                }
                else{
                    correctAnswer = firstNumber * secondNumber;
                }
            }

            /* Dalīšana / Division */
            function createDivisionExample(option){
                if(yourLevel == 1){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(1, 5);
                        secondNumber = getRandomNaturalNumber(0, 6) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-5, 5);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-5, 5);
                        }
                        secondNumber = getRandomIntegerNumber(-6, 6) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 1);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 1, 1);
                        }
                        secondNumber = getRandomDecimalNumber(0, 5, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }

                }
                else if(yourLevel == 2){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(1, 10);
                        secondNumber = getRandomNaturalNumber(1, 10) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10, 10);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-10, 10);
                        }
                        secondNumber = getRandomIntegerNumber(-10, 10) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 1);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 1, 1);
                        }
                        secondNumber = getRandomDecimalNumber(0, 10, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }
                }
                else if(yourLevel == 3){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(3, 10);
                        secondNumber = getRandomNaturalNumber(10, 20) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-10, 10);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-10, 10);
                        }
                        secondNumber = getRandomIntegerNumber(-20, 20) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 2);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 1, 2);
                        }
                        secondNumber = getRandomDecimalNumber(0, 20, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'div');
                    }
                }
                else if(yourLevel == 4){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(4, 15);
                        secondNumber = getRandomNaturalNumber(10, 100) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-15, 15);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-15, 15);
                        }
                        secondNumber = getRandomIntegerNumber(-100, 100) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 2);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 1, 2);
                        }
                        secondNumber = getRandomDecimalNumber(10, 50, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 2, 'div');
                    }
                }
                else if(yourLevel == 5){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(5, 20);
                        secondNumber = getRandomNaturalNumber(50, 200) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-20, 20);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-20, 20);
                        }
                        secondNumber = getRandomIntegerNumber(-200, 200) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 3);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 1, 3);
                        }
                        secondNumber = getRandomDecimalNumber(10, 50, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }
                }
                else if(yourLevel == 6){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(20, 50);
                        secondNumber = getRandomNaturalNumber(10, 200) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-50, 50);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-50, 50);
                        }
                        secondNumber = getRandomIntegerNumber(-200, 200) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 1, 3);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 1, 3);
                        }
                        secondNumber = getRandomDecimalNumber(50, 100, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }
                }
                else if(yourLevel == 7){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(20, 50);
                        secondNumber = getRandomNaturalNumber(100, 500) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-50, 50);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-50, 50);
                        }
                        secondNumber = getRandomIntegerNumber(-500, 500) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 10, 3);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 10, 3);
                        }
                        secondNumber = getRandomDecimalNumber(50, 100, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }
                }
                else if(yourLevel == 8){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(50, 100);
                        secondNumber = getRandomNaturalNumber(500, 1000) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-100, 100);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-100, 100);
                        }
                        secondNumber = getRandomIntegerNumber(-1000, 1000) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 10, 3);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 10, 3);
                        }
                        secondNumber = getRandomDecimalNumber(100, 200, 0, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }
                }
                else if(yourLevel == 9){
                    if(discipline.numbers_type == 'natural'){
                        firstNumber = getRandomNaturalNumber(100, 200);
                        secondNumber = getRandomNaturalNumber(1000, 2000) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'integer'){
                        firstNumber = getRandomIntegerNumber(-200, 200);
                        while(firstNumber == 0){
                            firstNumber = getRandomIntegerNumber(-200, 200);
                        }
                        secondNumber = getRandomIntegerNumber(-2000, 2000) * firstNumber;
                    }
                    else if(discipline.numbers_type == 'decimal'){
                        firstNumber = getRandomDecimalNumber(0, 10, 1);
                        while(firstNumber == 0){
                            firstNumber = getRandomDecimalNumber(0, 10, 1);
                        }
                        secondNumber = getRandomDecimalNumber(100, 500, 1, 'mul', firstNumber);
                        correctDecNumAnswer = getDecimalNumbersResult(firstNumber, secondNumber, 1, 'div');
                    }
                }

                if(discipline.numbers_type == 'decimal'){
                    correctAnswer = correctDecNumAnswer;
                    let correctAnswerStr = correctAnswer.toString();
                    correctAnswerStr = correctAnswerStr.replace('.', ',');
                    correctAnswer = correctAnswerStr;
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        example1 = secondNumber / firstNumber;
                    }
                    else if(option == 'example2'){
                        example2 = secondNumber / firstNumber;
                    }
                }
                else{
                    correctAnswer = secondNumber / firstNumber;
                }
            }

            /* Kāpināšana / Climbing */
            function createClimbingExample(){
                if(yourLevel == 1){
                    firstNumber = getRandomNaturalNumber(0, 5);
                    secondNumber = getRandomNaturalNumber(0, 3);
                }
                else if(yourLevel == 2){
                    firstNumber = getRandomNaturalNumber(5, 10);
                    secondNumber = getRandomNaturalNumber(1, 3);
                }
                else if(yourLevel == 3){
                    firstNumber = getRandomNaturalNumber(10, 20);
                    secondNumber = 2;
                }
                else if(yourLevel == 4){
                    firstNumber = getRandomNaturalNumber(20, 30);
                    secondNumber = 2;
                }
                else if(yourLevel == 5){
                    firstNumber = getRandomNaturalNumber(31, 50);
                    secondNumber = 2;
                }
                else if(yourLevel == 6){
                    firstNumber = getRandomNaturalNumber(5, 12);
                    secondNumber = 3;
                }
                else if(yourLevel == 7){
                    firstNumber = getRandomNaturalNumber(50, 100);
                    secondNumber = 2;
                }
                else if(yourLevel == 8){
                    firstNumber = getRandomNaturalNumber(13, 20);
                    secondNumber = 3;
                }
                else if(yourLevel == 9){
                    firstNumber = getRandomNaturalNumber(100, 200);
                    secondNumber = 2;
                }

                correctAnswer = Math.pow(firstNumber, secondNumber);
            }

            /* Kvadrātsaknes / Square Roots */
            function createSquareRootExample(){
                if(yourLevel == 1){
                    firstNumber = getRandomNaturalNumber(1, 10);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 2){
                    firstNumber = getRandomNaturalNumber(10, 20);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 3){
                    firstNumber = getRandomNaturalNumber(20, 30);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 4){
                    firstNumber = getRandomNaturalNumber(30, 50);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 5){
                    firstNumber = getRandomNaturalNumber(50, 75);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 6){
                    firstNumber = getRandomNaturalNumber(75, 100);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 7){
                    firstNumber = getRandomNaturalNumber(100, 150);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 8){
                    firstNumber = getRandomNaturalNumber(150, 250);
                    firstNumber = Math.pow(firstNumber, 2);
                }
                else if(yourLevel == 9){
                    firstNumber = getRandomNaturalNumber(250, 400);
                    firstNumber = Math.pow(firstNumber, 2);
                }

                correctAnswer = Math.sqrt(firstNumber);
            }

            /* Piemēra ģenerēšana un parādīšana spēles sekcijā, atkarībā no disciplīnas / Generating and Showing Examples on the Game Section, depending on the Discipline */ 

            /* Saskaitīšana / Addition */
            function additionExample (option) {
                
                createAdditionExample(option);

                if(secondNumber < 0){
                    exampleField.innerHTML = firstNumber + " + (" + secondNumber + ") = ";
                    exampleText = firstNumber + " + (" + secondNumber + ") = ";
                }
                else if(discipline.numbers_type == 'decimal'){
                    let number1Str = firstNumber.toString();
                    let number2Str = secondNumber.toString();
                    number1Str = number1Str.replace('.', ',');
                    number2Str = number2Str.replace('.', ',');
                    
                    exampleField.innerHTML = number1Str + " + " + number2Str + " = ";
                    exampleText = number1Str + " + " + number2Str + " = ";
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        compNum1Field.innerHTML = firstNumber + " + " + secondNumber;
                        exampleText += firstNumber + " + " + secondNumber;
                    }
                    else if(option == 'example2'){
                        compNum2Field.innerHTML = firstNumber + " + " + secondNumber;
                        exampleText += " ? " + firstNumber + " + " + secondNumber;
                    }
                }
                else{
                    exampleField.innerHTML = firstNumber + " + " + secondNumber + " = ";
                    exampleText = firstNumber + " + " + secondNumber + " = ";
                }
            }

            /* Atņemšana / Substraction */
            function substractionExample(option) {

                createSubstractionExample(option);
                
                if(secondNumber < 0){
                    exampleField.innerHTML = firstNumber + " - (" + secondNumber + ") = ";
                    exampleText = firstNumber + " - (" + secondNumber + ") = ";
                }
                else if(discipline.numbers_type == 'decimal'){
                    let number1Str = firstNumber.toString();
                    let number2Str = secondNumber.toString();
                    number1Str = number1Str.replace('.', ',');
                    number2Str = number2Str.replace('.', ',');
                    
                    exampleField.innerHTML = number1Str + " - " + number2Str + " = ";
                    exampleText = number1Str + " - " + number2Str + " = ";
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        compNum1Field.innerHTML = firstNumber + " - " + secondNumber;
                        exampleText += firstNumber + " - " + secondNumber;
                    }
                    else if(option == 'example2'){
                        compNum2Field.innerHTML = firstNumber + " - " + secondNumber;
                        exampleText += " ? " + firstNumber + " - " + secondNumber;
                    }
                }
                else{
                    exampleField.innerHTML = firstNumber + " - " + secondNumber + " = ";
                    exampleText = firstNumber + " - " + secondNumber + " = ";
                }
            }

            /* Reizināšana / Multiplication */
            function multiplicationExample (option) {
                
                createMultiplicationExample(option);

                if(secondNumber < 0){
                    exampleField.innerHTML = firstNumber + " ∙ (" + secondNumber + ") = "; 
                    exampleText = firstNumber + " ∙ (" + secondNumber + ") = ";
                }
                else if(discipline.numbers_type == 'decimal'){
                    let number1Str = firstNumber.toString();
                    let number2Str = secondNumber.toString();
                    number1Str = number1Str.replace('.', ',');
                    number2Str = number2Str.replace('.', ',');
                    
                    exampleField.innerHTML = number1Str + " ∙ " + number2Str + " = ";
                    exampleText = number1Str + " ∙ " + number2Str + " = ";
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        compNum1Field.innerHTML = firstNumber + " ∙ " + secondNumber;
                        exampleText += firstNumber + " ∙ " + secondNumber;
                    }
                    else if(option == 'example2'){
                        compNum2Field.innerHTML = firstNumber + " ∙ " + secondNumber;
                        exampleText += " ? " + firstNumber + " ∙ " + secondNumber;
                    }
                }
                else{
                    exampleField.innerHTML = firstNumber + " ∙ " + secondNumber + " = ";
                    exampleText = firstNumber + " ∙ " + secondNumber + " = ";
                }
            }

            /* Dalīšana / Division */
            function divisionExample (option) {
                
                createDivisionExample(option);

                if(firstNumber < 0){
                    exampleField.innerHTML = secondNumber + " : (" + firstNumber + ") = ";
                    exampleText = secondNumber + " : (" + firstNumber + ") = ";
                }
                else if(discipline.numbers_type == 'decimal'){
                    let number1Str = firstNumber.toString();
                    let number2Str = secondNumber.toString();
                    number1Str = number1Str.replace('.', ',');
                    number2Str = number2Str.replace('.', ',');
                    
                    exampleField.innerHTML = number2Str + " : " + number1Str + " = ";
                    exampleText = number2Str + " : " + number1Str + " = ";
                }
                else if(discipline.short_name == 'com'){
                    if(option == 'example1'){
                        compNum1Field.innerHTML = secondNumber + " : " + firstNumber;
                        exampleText += secondNumber + " : " + firstNumber;
                    }
                    else if(option == 'example2'){
                        compNum2Field.innerHTML = secondNumber + " : " + firstNumber;
                        exampleText += " ? " + secondNumber + " : " + firstNumber;
                    }
                }
                else{
                    exampleField.innerHTML = secondNumber + " : " + firstNumber + " = ";
                    exampleText = secondNumber + " : " + firstNumber + " = ";
                }
            }

            /* Salīdzināšana / Comparison */
            function comparisonExample () {
                // Darbības numura ģenerēšana katram piemēram / Generating an Operation Number for every Example
                let discNumber1 = Math.floor(Math.random() * 4) + 1;
                let discNumber2 = Math.floor(Math.random() * 4) + 1;

                if(discNumber1 == 1){
                    additionExample('example1');
                }
                else if(discNumber1 == 2){
                    substractionExample('example1');
                }
                else if(discNumber1 == 3){
                    multiplicationExample('example1');
                }
                else if(discNumber1 == 4){
                    divisionExample('example1');
                }

                if(discNumber2 == 1){
                    additionExample('example2');
                }
                else if(discNumber2 == 2){
                    substractionExample('example2');
                }
                else if(discNumber2 == 3){
                    multiplicationExample('example2');
                }
                else if(discNumber2 == 4){
                    divisionExample('example2');
                }
                
                if(example1 < example2){
                    correctAnswer = "<";
                }
                else if(example1 == example2){
                    correctAnswer = "=";
                }
                else if(example1 > example2){
                    correctAnswer = ">";
                }
            }
            
            /* Kāpināšana / Climbing */
            function climbingExample () {
                
                createClimbingExample();

                exampleField.innerHTML = firstNumber + "  <sup>" + secondNumber + "</sup> = ";
                exampleText = firstNumber + "  <sup>" + secondNumber + "</sup> = ";
            }

            /* Kvadrātsaknes / Square Roots */
            function squareRootExample () {
                
                createSquareRootExample();

                exampleField.innerHTML = '<span>&#8730;</span><span style="border-top: 1px solid black">' + firstNumber + '</span> = ';
                exampleText = '<span>&#8730;</span><span style="border-top: 1px solid black">' + firstNumber + '</span> = ';
            }

            /* Piemēra ģenerēšana / Generating an Example */
            function mathExample () {
                notificationBox.innerHTML = "";
                let inputField = document.getElementById("inputField");
                if(mode == 'variants'){
                    inputField.style.display = "none";
                }

                let exampleField = document.getElementById("exampleField");
                
                inputField.focus();
                
                /* Saskaitīšana / Addition */
                if(discipline.short_name == 'add'){
                    additionExample();
                }
                /* Atņemšana / Substraction */
                else if(discipline.short_name == 'sub'){
                    substractionExample();
                }
                /* Reizināšana / Multiplication */
                else if(discipline.short_name == 'mul'){
                    multiplicationExample();
                }
                /* Dalīšana / Division */
                else if(discipline.short_name == 'div'){
                    divisionExample();
                }
                /* Saskaitīšana un atņemšana / Addition and Substraction */
                else if(discipline.short_name == 'add_sub'){
                    let discNumber = Math.floor(Math.random() * 2) + 1; // Darbības numura ģenerēšana (1, 2) / Generating an Operation Number (1, 2) */
                    if(discNumber == 1){
                        additionExample(); // Saskaitīšana / Addition 
                    }
                    else{
                        substractionExample(); // Atņemšana / Substraction
                    }
                }
                /* Reizināšana un dalīšana / Multiplication and Division */
                else if(discipline.short_name == 'mul_div'){
                    let discNumber = Math.floor(Math.random() * 2) + 1; // Darbības numura ģenerēšana (1, 2) / Generating an Operation Number (1, 2) */
                    if(discNumber == 1){
                        multiplicationExample(); // Reizināšana / Multiplication
                    }
                    else{
                        divisionExample(); // Dalīšana / Division
                    }
                }

                else if(discipline.short_name == 'all'){
                    let discNumber = Math.floor(Math.random() * 4) + 1; // Darbības numura ģenerēšana (1-4) / Generating an Operation Number (1-4) */
                    if(discNumber == 1){
                        additionExample(); // Saskaitīšana / Addition
                    }
                    else if(discNumber == 2){
                        substractionExample(); // Atņemšana / Substraction
                    }
                    else if(discNumber == 3){
                        multiplicationExample(); // Reizināšana / Multiplication
                    }
                    else{
                        divisionExample(); // Dalīšana / Division
                    }
                }
                else if(discipline.short_name == 'com'){
                    comparisonExample(); // Salīdzināšana / Comparison
                }
                else if(discipline.short_name == 'cli'){
                    climbingExample(); // Kāpināšana / Climbing
                }
                else if(discipline.short_name == 'squ'){
                    squareRootExample(); // Kvadrātsaknes / Square Roots
                }

                /* Ja ir izvēlēts variantu režīms / If the Variants Mode is selected */
                if(mode == 'variants'){
                    let arrayOfVariants = []; // Masīvs no variantiem / An Array of Variants

                    correctVariant = correctAnswer; // Pareizais atbilžu variants / Correct Answer Variant
                    correctVariantNum = Math.floor(Math.random() * 2) + 1; // Pareizā atbilžu varianta numurs / Correct Answer Variant Number

                    /* Citu nepareizo piemēru ģenerēšana / Generating Other Incorrect Examples */
                    function createIncorrectExample(){
                        if(discipline.short_name == 'add'){
                            createAdditionExample(); // Saskaitīšāna / Addition
                        }
                        else if(discipline.short_name == 'sub'){
                            createSubstractionExample(); // Atņemšana / Substraction
                        }
                        else if(discipline.short_name == 'mul'){
                            createMultiplicationExample(); // Reizināšana / Multiplication
                        }
                        else if(discipline.short_name == 'div'){
                            createDivisionExample(); // Dalīšana / Division
                        }
                        else if(discipline.short_name == 'add_sub'){
                            let discNumber = Math.floor(Math.random() * 2) + 1;
                            if(discNumber == 1){
                                createAdditionExample(); // Saskaitīšana / Addition
                            }
                            else{
                                createSubstractionExample(); // Atņemšana / Substraction
                            }
                        }
                        else if(discipline.short_name == 'mul_div'){
                            let discNumber = Math.floor(Math.random() * 2) + 1;
                            if(discNumber == 1){
                                createMultiplicationExample(); // Reizināšana / Multiplication
                            }
                            else{
                                createDivisionExample(); // Dalīšana / Division
                            }
                        }
                        else if(discipline.short_name == 'all'){
                            let discNumber = Math.floor(Math.random() * 4) + 1;
                            if(discNumber == 1){
                                createAdditionExample(); // Saskaitīšana / Addition
                            }
                            else if(discNumber == 2){
                                createSubstractionExample(); // Atņemšana / Substraction
                            }
                            else if(discNumber == 3){
                                createMultiplicationExample(); // Reizināšana / Multiplication
                            }
                            else{
                                createDivisionExample(); // Dalīšana / Division
                            }
                        }
                        else if(discipline.short_name == 'cli'){
                            createClimbingExample(); // Kāpināšana / Climbing
                        }
                        else if(discipline.short_name == 'squ'){
                            createSquareRootExample(); // Kvadrātsaknes / Square Roots
                        }
                    }

                    /* Masīvs no visiem atbilžu variantiem / Array of All Answer Variants */
                    function createArrayOfVariants() {
                        for(let i = 0; i < variants.length; i++){
                            if(i != correctVariantNum){
                                createIncorrectExample();
                                let incorrectVariant = correctAnswer;
                                arrayOfVariants[i] = incorrectVariant;
                            }
                            else{
                                arrayOfVariants[i] = correctVariant;
                            }
                        }
                    }

                    createArrayOfVariants();

                    // Atkārtojošo variantu skaits // Count of Repeated Variants
                    let equalVariants = 0;

                    // Atkārtojošo variantu pārbaude // Checking Repeated Variants
                    function checkEqualVariants(){
                        for(i = 0; i < arrayOfVariants.length; i++){
                            for(j = 1; j < arrayOfVariants.length; j++){
                                if(i < j){
                                    if(arrayOfVariants[i] == arrayOfVariants[j]){
                                        equalVariants++;
                                    }
                                }
                            }
                        }
                    }

                    // checkEqualVariants();

                    /* Ja tika atrasti atkārtojoši varianti, vēlreiz no jauna ģenerēt citus nepareizos variantus, cik nepieciešams /
                        If Repeated Variants are found, Generate other Incorrect Variants as neccesary  */
                    for(i = 0; i < Infinity; i++){
                        checkEqualVariants();

                        if(equalVariants != 0){
                            createArrayOfVariants();
                            equalVariants = 0;
                        }
                        else{
                            break;
                        }
                    }
                    
                    // Parādīt visus variantus spēles sekcijā // Show All Variants on Game Section
                    for(let i = 0; i < arrayOfVariants.length; i++){
                        variants[i].innerHTML = arrayOfVariants[i];
                    }

                }
            }

            mathExample();

            /* Atbildes ievade / Input an Answer */

            /* Ja nospiesta tastatūras poga "Enter", pārbaudīt atbildi /
               If the "Enter" Button on a Keyboard is pressed, check an Answer */
            inputField.addEventListener("keyup", function(e){
                if (e.keyCode === 13) {
                    checkExample();
                }
            });

            /* Atbildes ievades lauka vērtība / Answer Input Field Value */
            let inputFieldValue = document.getElementById("inputField").value;


            /* Darbības ar ekrānā redzamajām pogām / Actions with On-Screen Buttons */

            /* Ja ir izvēlēta salīdzināšanas disciplīna / If the Comparision Discipline is Selected */
            if(discipline.short_name == 'com'){
                // Poga "<" / Button "<"
                let keyboardLess = document.getElementById("keyboard<");
                keyboardLess.addEventListener("click", function () {
                    document.getElementById("inputField").value = '<';
                    checkExample(); // Pārbaudīt atbildi / Check an Example
                });
                // Poga "=" / Button "="
                let keyboardEqual = document.getElementById("keyboard=");
                keyboardEqual.addEventListener("click", function () {
                    document.getElementById("inputField").value = '=';
                    checkExample(); // Pārbaudīt atbildi / Check an Example
                });
                // Poga ">" / Button ">"
                let keyboardMore = document.getElementById("keyboard>");
                keyboardMore.addEventListener("click", function () {
                    document.getElementById("inputField").value = '>';
                    checkExample(); // Pārbaudīt atbildi / Check an Example
                });
            }
            /* Ja ir izvēlēts variantu režīms / If the Variants Mode is Selected */
            else if(mode == 'variants'){
                for(let i = 0; i < variants.length; i++){
                    variants[i].addEventListener("click", function () {
                        selectedVariantNum = i; // Izvēlētā varianta numurs / Selected Variant Number
                        checkExample(); // Pārbaudīt atbildi / Check an Example
                    })
                }
            } 
            else{
                // Poga "0" / Button "0"
                let keyboard0 = document.getElementById("keyboard0");
                keyboard0.addEventListener("click", function () {
                    document.getElementById("inputField").value += '0';
                });
                // Poga "1" / Button "1"
                let keyboard1 = document.getElementById("keyboard1");
                keyboard1.addEventListener("click", function () {
                    document.getElementById("inputField").value += '1';
                });
                // Poga "2" / Button "2"
                let keyboard2 = document.getElementById("keyboard2");
                keyboard2.addEventListener("click", function () {
                    document.getElementById("inputField").value += '2';
                });
                // Poga "3" / Button "3"
                let keyboard3 = document.getElementById("keyboard3");
                keyboard3.addEventListener("click", function () {
                    document.getElementById("inputField").value += '3';
                });
                // Poga "4" / Button "4"
                let keyboard4 = document.getElementById("keyboard4");
                keyboard4.addEventListener("click", function () {
                    document.getElementById("inputField").value += '4';
                });
                // Poga "5" / Button "5"
                let keyboard5 = document.getElementById("keyboard5");
                keyboard5.addEventListener("click", function () {
                    document.getElementById("inputField").value += '5';
                });
                // Poga "6" / Button "6"
                let keyboard6 = document.getElementById("keyboard6");
                keyboard6.addEventListener("click", function () {
                    document.getElementById("inputField").value += '6';
                });
                // Poga "7" / Button "7"
                let keyboard7 = document.getElementById("keyboard7");
                keyboard7.addEventListener("click", function () {
                    document.getElementById("inputField").value += '7';
                });
                // Poga "8" / Button "8"
                let keyboard8 = document.getElementById("keyboard8");
                keyboard8.addEventListener("click", function () {
                    document.getElementById("inputField").value += '8';
                });
                // Poga "9" / Button "9"
                let keyboard9 = document.getElementById("keyboard9");
                keyboard9.addEventListener("click", function () {
                    document.getElementById("inputField").value += '9';
                });
                // Poga "OK" / Button "OK"
                let keyboardOK = document.getElementById("keyboardOK");
                keyboardOK.addEventListener("click", function () {
                    checkExample();
                });
                // Poga "Dzēst" / Button "Delete"
                let keyboardClear = document.getElementById("keyboardClear");
                keyboardClear.addEventListener("click", function () {
                    let inputValue = document.getElementById("inputField").value;
                    inputValue = inputValue.slice(0,-1);
                    document.getElementById("inputField").value = inputValue;
                });
    
                // Ja izvēlētais skaitļu tips ir veselie skaitļi / If the Selected Numbers Type is Integer Numbers
                if(discipline.numbers_type == 'integer'){
                    // Poga "-" / Button "-"
                    let keyboardMinus = document.getElementById("keyboardMinus");
                    keyboardMinus.addEventListener("click", function () {
                        document.getElementById("inputField").value += '-';
                    });
                }

                // Ja izvēlētais skaitļu tips ir decimālskaitļi / If the Selected Numbers Type is Decimal Numbers
                if(discipline.numbers_type == 'decimal'){
                    // Poga "," / Button "," (".")
                    let keyboardComma = document.getElementById("keyboardComma");
                    keyboardComma.addEventListener("click", function () {
                        if(document.getElementById("inputField").value == ''){
                            document.getElementById("inputField").value += '0,';
                        }
                        else{
                        document.getElementById("inputField").value += ',';
                        }
                    });
                }
            }

            /* Atbildes pārbaudīšana / Checking an Answer */

            function checkExample () {

                // Ievadītā atbildes lauka vērtība // The Value of the Answer Input Field
                let yourAnswer = document.getElementById("inputField").value;

                // Ja ir izvēlēts variantu režīms / If the Variants Mode is Selected
                if(mode == 'variants'){
                    // Ja ir ievadīta nepareiza atbilde / If the Answer is Incorrect
                    if(selectedVariantNum != correctVariantNum){
                        minusPoints(); // Punktu noņemšana / Removing Points
                        notificationBox.innerHTML = "Kļūda. Pareizā atbilde: " + correctVariant; // Paziņojuma rādīšana ekrānā / Showing a Notification on a Screen
                        notificationBox.style.color = "red";
                        exampleField.innerHTML = "";

                        let errorObject = {
                            "level": yourLevel,
                            "example": exampleText,
                            "yourAnswer": variants[selectedVariantNum].innerHTML,
                            "correctAnswer": correctVariant
                        } // Informācija par pieļauto kļūdu un pareizo atbildi / Information about an Error and the Correct Answer
                        
                        arrayOfErrors.push(errorObject); // Informācijas pievienošāna kopējā pieļauto kļūdu masīvā // Adding Information into the Array of Errors

                        setTimeout(restartExample, 1000); // Palaist nākamo piemēru pēc 1 sek. / Run Another Example within 1 second

                        function restartExample() {
                            mathExample();
                            inputField.focus();
                        }
                    }
                    // Ja ir ievadīta pareiza atbilde / If the Answer is Correct
                    else{
                        plusPoints(); // Punktu pievienošana / Adding Points
                        mathExample(); // Palaist nākamo piemēru / Run Another Example
                    }
                }
                // Ja ir izvēlēts cits režīms / If Another Mode is Selected
                else{
                    // Ja ir ievadīta nepareiza atbilde / If the Answer is Incorrect 
                    if(yourAnswer != correctAnswer){
                        minusPoints(); // Punktu noņemšana / Removing Points
                        
                        // Ja ir izvēlēta salīdzināšanas disciplīna // If the Comparison Discipline is Selected
                        if(discipline.short_name == "com"){
                            notificationBox.innerHTML = "Kļūda. Pareizā atbilde: " + example1 + correctAnswer + example2; // Paziņojuma rādīšana ekrānā (piemēram, 45<64) / Showing a Notification on a Screen (e.g. 45<64)
                        }
                        // Ja ir izvēlētas disciplīnas
                        else{
                            notificationBox.innerHTML = "Kļūda. Pareizā atbilde: " + correctAnswer; // Paziņojuma rādīšana ekrānā / Showing a Notification on a Screen
                        }

                        notificationBox.style.color = "red";

                        if(discipline.short_name == 'com'){
                            compNum1Field.innerHTML = "";
                            compNum2Field.innerHTML = "";
                        }
                        else{
                            exampleField.innerHTML = "";
                        }

                        inputField.style.display = "none";

                        // Ja ir izvēlēts sprinta režīms, samazināt līmeni uz leju / If the Sprint Mode is Selected, then level down
                        if(mode == 'sprint'){
                            correctAnswersCount = 0;
                            if(yourLevel != 1){
                                yourLevel--;
                                yourLevelText.innerHTML = yourLevel;
                            }
                        }

                        let errorObject = {
                            "level": yourLevel,
                            "example": exampleText,
                            "yourAnswer": yourAnswer,
                            "correctAnswer": correctAnswer
                        } // Informācija par pieļauto kļūdu un pareizo atbildi / Information about an Error and the Correct Answer

                        arrayOfErrors.push(errorObject); // Informācijas pievienošāna kopējā pieļauto kļūdu masīvā // Adding Information into the Array of Errors

                        setTimeout(restartExample, 1000); // Palaist nākamo piemēru pēc 1 sek. / Run Another Example within 1 second

                        function restartExample() {
                            mathExample();
                            inputField.style.display = "inline-block";
                            inputField.focus();
                        }

                        document.getElementById("inputField").value = "";
                    }
                    else{
                        plusPoints(); // Punktu pievienošana / Adding Points
                        
                        /* Ja ir izvēlēts sprinta režīms, pēc 5 pareizajām atbildēm palielināt līmeni uz augšu /
                           If the Sprint Mode is selected, after 5 correct answers level up */ 
                        if(mode == 'sprint'){
                            correctAnswersCount++;
                            if(correctAnswersCount == 5 && yourLevel != maxLevel){
                                yourLevel++;
                                correctAnswersCount = 0;
                                yourLevelText.innerHTML = yourLevel;
                            }
                        }

                        mathExample(); // Palaist nākamo piemēru / Run Another Example
                        document.getElementById("inputField").value = "";
                    }

                    
                }

                exampleText = '';
                    
                    /* Punktu noņemšana par nepareizu atbildi / Removing points for an incorrect answer */
                    function minusPoints(){
                        if(yourLevel == 1){
                            yourPoints -= 2;
                        }
                        else if(yourLevel == 2){
                            yourPoints -= 5;
                        }
                        else if(yourLevel == 3){
                            yourPoints -= 10;
                        }
                        else if(yourLevel == 4){
                            yourPoints -= 17;
                        }
                        else if(yourLevel == 5){
                            yourPoints -= 26;
                        }
                        else if(yourLevel == 6){
                            yourPoints -= 37;
                        }
                        else if(yourLevel == 7){
                            yourPoints -= 50;
                        }
                        else if(yourLevel == 8){
                            yourPoints -= 65;
                        }
                        else if(yourLevel == 9){
                            yourPoints -= 85;
                        }
                        yourPointsText.innerHTML = yourPoints;
                        document.getElementById("inputPoints").value = yourPoints;
                    }

                    /* Punktu piešķiršana par pareizu atbildi / Adding Points for a Correct Answer */
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
                        yourPointsText.innerHTML = yourPoints;
                        document.getElementById("inputPoints").value = yourPoints;
                    }
                }

                



                console.log(yourPoints);

                yourLevelText.innerHTML = yourLevel;
                                
                /* Taimera intervāls / Timer Interval */
                let timerInterval = setInterval(function () {
                    timer--; // Ik pa sekundi atjaunināt laika atskaiti / Refresh the timer every second
                    timeText.innerHTML = timer;

                    /* Iegūto punktu skaita pārbaude raunda beigās / Checking points at the end of a round */
                    /* Normālajā un variantu režīmā (ja visi līmeņi) / In normal or variants mode (if all levels) */
                    if(level == 'all'){
                        if(timer == 0){
                            // Ja visi raundi nav izieti / If All Rounds are not completed
                            if(completedRounds != maxRounds){
                                completedRounds++; 
                                roundsCount--;
                                timer+=45;
                                // Ja ir savākts nepieciešamo punktu skaits raundā / If Neccesary Points are collected in the Current Round
                                if(yourPoints >= neededPoints){
                                    yourLevel++;
                                    notificationBox.innerHTML = "Ļoti labi! Jūs tiekat nākamajā līmenī.";
                                    notificationBox.style.color = "blue";
                                    //exampleBox.style.display = "none";
                                    setTimeout(function() {
                                        notificationBox.innerHTML = "";
                                        notificationBox.style.color = "black";
                                        //exampleBox.style.display = "flex";
                                        //inputField.focus();
                                    }, 1000);
                                    // Nepieciešamo punktu skaita palielināšana nākamajā raundā / Increasing Neccesary Points in the Next Round
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
                                        neededPoints = yourPoints;
                                    }
                                }
                                // Ja nav savākts nepieciešamo punktu skaits raundā / If Neccesary Points are not collected in the Current Round
                                else{
                                    notificationBox.innerHTML = "Nepietiek punktu, lai pārietu nākamajā līmenī.";
                                    notificationBox.style.color = "red";
                                    //exampleBox.style.display = "none";
                                    setTimeout(function() {
                                        notificationBox.innerHTML = "";
                                        notificationBox.style.color = "black";
                                        //exampleBox.style.display = "flex";
                                        //inputField.focus();
                                    }, 1000);
                                    // Nepieciešamo punktu skaita palielināšana nākamajā raundā / Increasing Neccesary Points in the Next Round
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
                                        neededPoints = yourPoints;
                                    }
                                }
                                yourLevelText.innerHTML = yourLevel;
                                neededPointsText.innerHTML = ' / ' + neededPoints;
                                maxLevelText.innerHTML = ' / ' + maxLevel;
                                roundsCountText.innerHTML = roundsCount;
                            }
                            // Ja visi raundi ir izieti / If All Rounds are completed
                            else if(completedRounds == maxRounds){
                                // Spēles pabeigšana / Finishing the Game
                                document.getElementById('finishButton').click();
                                
                                //alert('Laiks beidzies!');
                            }
                            console.log(completedRounds);
                        }
                    }
                }, 1000);

                
                document.getElementById("inputLevel").value = level;
                //document.getElementById("inputErrors").value = JSON.stringify(arrayOfErrors);
                
        }

        // Atgriezties uz starta sekciju / Returning to Start Section
        function returnFunction() {
            location.reload();
        }
    </script>
</body>
</html>
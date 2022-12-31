<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $race->name }} - Matemīla.lv</title>
    <link rel="stylesheet" type="text/css" href="/css/trainingGame.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body id="body">
    <section class="startSection" id="startSection">
        <h2 class="title">{{ $race->name }}</h2>

        <div class="instructionBox">
            <h2>Īsa instrukcija</h2>
            <ul>
                <li>Ņemiet vērā, ka šo sacensību ilgums ir <b>{{ $race->minutes }} minūtes</b>, lai varētu uzsākt kādu no tālāk norādītajām disciplīnām.</li>
                <li>Sacensību spēlē tiek parādīts <b>sacensību taimeris</b>. Ja taimerim ir beidzies laiks un vēl veicat kādu no disciplīnām, neuztraucieties, spēle netiek apturēta līdz brīdim, 
                    kad <i>tiek nospiesta poga "Pabeigt" vai ir izpildīti visi raundi</i>.</li>
                <li>Katrai disciplīnai tiek ieskaitīts <b>labākā mēģinājuma rezultāts</b>.</li>
                <li>Iesakām uzreiz iziet visas disciplīnas un tad var mēģināt uzlabot savus rezultātus jebkādā disciplīnā! 😎</li>
                <li><b>Vēlam veiksmi un izcilus rezultātus! 😊</b></li>
            </ul>    
        </div>

        @if($totalRaceResult->points % 10 == 1 && $totalRaceResult->points != 11)
        <h3 class="totalPointsText">Kopējais rezultāts: {{ $totalRaceResult->points }} punkts</h3>
        @else
        <h3 class="totalPointsText">Kopējais rezultāts: {{ $totalRaceResult->points }} punkti</h3>
        @endif

        @foreach($raceDisciplines as $raceDiscipline)
        <div class="raceDisciplineBox">
            <div class="leftSide">
                <a href="{{ route('doRaceDiscipline', [$race->id, $raceDiscipline->id]) }}">{{ $raceDiscipline->name }}</a>
                <p class="infoText">
                    @if($raceDiscipline->numbers_type == 'natural')
                    Naturālie skaitļi,
                    @elseif($raceDiscipline->numbers_type == 'integer')
                    Veselie skaitļi,
                    @elseif($raceDiscipline->numbers_type == 'decimal')
                    Decimālskaitļi,
                    @endif
                    @if($raceDiscipline->mode == 'normal')
                    standarta režīms
                    @elseif($raceDiscipline->mode == 'sprint')
                    sprinta režīms
                    @elseif($raceDiscipline->mode == 'variants')
                    variantu režīms
                    @endif
                    ({{ $raceDiscipline->levelCount }} līm.)</p>
            </div>
            <div class="rightSide">
                <p class="pointsText">
                    {{ $raceResults->where('race_discipline_id','=',$raceDiscipline->id)->first()->points ?? '0' }}
                </p>
            </div>
        </div>
        @endforeach

    </section>
</body>
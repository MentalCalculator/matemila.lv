<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jūsu rezultāts - Matemīla.lv</title>
    <link rel="stylesheet" type="text/css" href="/css/trainingGame.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body id="body">
    <section class="startSection" id="startSection">
        @if(session('message'))
        <h2 class="title">{{ session('message') }}</h2>
        @else
        <h2 class="title">😲 Nekas netika darīts, saņemieties!</h2>
        @endif
        <p class="disciplineInfo">
            {{ $raceDiscipline->name }}
            @if($raceDiscipline->mode == 'normal')
                normālajā režīmā
            @elseif($raceDiscipline->mode == 'sprint')
                sprinta režīmā
            @elseif($raceDiscipline->mode == 'variants')
                variantu režīmā
            @endif
        </p>
        @if(session('points'))
            @if((session('points') % 10 == 1) && (session('points') != 11))
                <p class="pointsInfo">Jūs esat ieguvis <span>{{ session('points') }}</span> punktu.</p>
            @else
                <p class="pointsInfo">Jūs esat ieguvis <span><b>{{ session('points') }}</b></span> punktus.</p>
            @endif
        @endif
        <a class="backToRaceButton" href="{{ route('doRace', $race->id) }}">Atgriezties uz sacensībām</a>
        <div class="line"></div>
        <p class="copyrightText">&copy; 2023 Matemīla.lv - versija 0.1.0</p>
    </section>
</body>
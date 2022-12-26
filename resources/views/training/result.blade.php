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
            <h2 class="title">Nekas nav saglabāts.</h2>
        @endif
        @if(session('discipline') && session('mode') && session('level') && session('points'))
            <p class="disciplineInfo">
                {{ \Illuminate\Support\Facades\DB::table('disciplines')->where('id', session('discipline'))->value('name') }}
                @if(session('mode') == 'normal')
                    normālajā režīmā
                @elseif(session('mode') == 'sprint')
                    sprintu režīmā
                @elseif(session('mode') == 'variants')
                    variantu režīmā
                @endif
                @if(session('level') == 'all')
                    (visi līmeņi)
                @else
                    ({{session('level')}}.līmenis)
                @endif
            </p>
            @if((session('points') % 10 == 1) && (session('points') != 11))
                <p class="pointsInfo">Jūs esat ieguvis <span>{{ session('points') }}</span> punktu.</p>
            @else
                <p class="pointsInfo">Jūs esat ieguvis <span><b>{{ session('points') }}</b></span> punktus.</p>
            @endif
        @endif
        @if(session('errors'))
            <p>{{ session('errors') }}</p>
        @endif
        <div class="line"></div>
        <p class="copyrightText">&copy; 2023 Matemīla.lv - versija 0.1.0</p>
    </section>
</body>
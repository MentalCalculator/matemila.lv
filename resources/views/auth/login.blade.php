@extends('layouts.main')

@section('title', 'Ieiet sistēmā - Matemīla.lv')

@section('content')

<div class="purplePageHeader" data-aos="fade-down"
     data-aos-anchor-placement="top-bottom">
    <h1>Ieiet sistēmā</h1>
</div>

<div class="loginBox" data-aos="zoom-in">
    <form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">E-pasta adrese</label><br>
    <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus /><br>
    @if ($errors->has('email'))
            <p class="text-danger">&#10071; {{ $errors->first('email') }}</p><br>
    @endif

    <label for="password">Parole</label><br>
    <input id="password" type="password" name="password" autocomplete="current-password" /><br>
    @if ($errors->has('password'))
            <p class="text-danger">&#10071; {{ $errors->first('password') }}</p><br>
    @endif    
    <button>Ieiet</button><br>
    <a class="forgotPasswordLink" href="{{ route('password.request') }}">Aizmirsi paroli?</a>
    </form>
</div>

<div class="secondLoginBox" data-aos="zoom-in">
    <div class="firstPart">
        <h2>Vai tev vēl nav sava Matemīlas konta? <i class='bx bx-shocked'></i></h2>
        <ul>
            <li>Trenējoties ātrrēķināšanā, tavi labākie rezultāti tiks automātiski saglabāti.</li>
            <li>Tev būs iespēja piedalīties ātrrēķināšanas sacensībās.</li>
            <li>Tu varēsi apgūt dažādas matemātikas tēmas un pildīt uzdevumus jaunā formātā.</li>
            <li>Tu varēsi uzdot jautājumus un atbildēt uz jautājumiem mūsu forumā.</li>
            <li>Mīlestību par naudu nenopirksi, tāpēc Matemīla ir bezmaksas. <i class='bx bxs-heart' ></i></li>
        </ul>
    </div>
    <div class="secondPart">
        <a class="registerLink" href="{{ route('register') }}"><i class='bx bxs-select-multiple'></i> Reģistrēties</a>
    </div>
</div>


@endsection



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Basic -->
	<title>{{ config('app.name', 'Cabal Hype') }}</title>
    <meta charset="UTF-8">
    <title>Cabal Darknees  - Servidor Privado de Cabal Online</title>
    <meta name="title" content="Cabal Darknees - Servidor Privado de Cabal Online">
    <meta name="description" content="⚔️Prepare-se para uma grande batalha!">
    <meta name="keywords" content="Cabal online, Cabal Darknees, Cabal Hype, Cabal Cabal Darknees, Cabal Privado, Private Cabal, Cabal Private, Servidor de Cabal, Servidor Privado de Cabal, Cabal, Cabal Download, Cabal Cadastro, Cabal Brasil, Cabal brasileiro">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://cabaldarknees.com.br">
    <meta property="og:title" content="Cabal Darknees - Servidor Privado de Cabal Online">
    <meta property="og:description" content="⚔️Prepare-se para uma grande batalha!">
    <meta property="og:image" content="#">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="#">
    <meta property="twitter:title" content="Cabal Darknees - Servidor Privado de Cabal Online">
    <meta property="twitter:description" content="⚔️Prepare-se para uma grande batalha!">
    <meta property="twitter:image" content="#">
    <link rel="icon" href="#" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/vertical-rhythm.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

</head>

<body class="appear-animate">

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <!-- End Page Loader -->

    <!-- Page Wrap -->
    <div class="page" id="top">

        @include('web.sections.section-01')

        @include('web.components.navbar')

        @include('web.sections.section-02')

        {{-- @include('web.sections.section-03') --}}

        <!-- Divider -->
        <hr class="mt-0 mb-0 "/>
        <!-- End Divider -->

        @include('web.sections.section-04')

        @include('web.sections.section-05')

        {{-- @include('web.sections.section-06') --}}

        {{-- @include('web.sections.section-07') --}}

        @include('web.sections.section-08')

        @include('web.sections.section-09')

        @include('web.sections.section-10')

        @include('web.sections.section-11')

        @include('web.components.footer')

    </div>
    <!-- End Page Wrap -->

    @include('web.components.scripts')

</body>
</html>

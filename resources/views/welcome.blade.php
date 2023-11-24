<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CountServe</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Styles -->
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    </head>
    <body class="antialiased">

        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo"><img src="img/countServeLogo.jpeg" width="65px" alt="" srcset=""></a>
                @if (Route::has('login'))
                <ul class="right hide-on-med-and-down">
                    <li>
                        @auth
                        <a href="{{ url('/dashboard') }}" class="black-text">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        @else
                        <a href="{{ route('login') }}" class="black-text">
                            Login in
                        </a>
                    </li>
                    <li>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="black-text">
                            Register
                        </a>
                        @endif
                        @endauth
                    </li>
                @endif
                </ul>

            <ul id="nav-mobile" class="sidenav">
                @if (Route::has('login'))
                <li>
                    @auth
                    <a href="{{ url('/dashboard') }}" class="blue-text text-darken-2">
                        Dashboard
                    </a>
                </li>
                <li>
                    @else
                    <a href="{{ route('login') }}">
                        Login in
                    </a>
                </li>
                <li>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                    @endif
                    @endauth
                </li>
                @endif
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <!-- Incrementado -->
        <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center black-text text-lighten-2">CountServe</h1>
        <div class="row center">
          <!-- <h5 class="header col s12 light">Otimização de Serviços Alimentares</h5> -->
        </div>
        <!-- <div class="row center">
          <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
        </div> -->
        <br><br>

      </div>
    </div>
    <div class="parallax">
        <img src="img/bannerHome.jpg" alt="Unsplashed background img 1">
    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="medium material-symbols-outlined">nutrition</i></h2>
            <h5 class="center">O que é a CountServe ?</h5>

            <p class="light">A CountServe é uma aplicação web a que foi desenvolvida para melhorar a gestão dos refeitórios nas unidades escolares, permitindo assim que nossos clientes possam reduzir o desperdício de alimentos e melhorar a eficiência de seu atendimento.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="medium material-symbols-outlined">
              person_alert
            </i></h2>
            <h5 class="center">Problema ou Necessidade</h5>

            <p class="light">Após pesquisas notamos que existe um grande desperdício de alimentos nos refeitórios devido à falta de controle sobre a quantidade de pessoas que frequentam a unidade escolar.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="medium material-symbols-outlined">terminal</i></h2>
            <h5 class="center">Solução</h5>

            <p class="light"> Nossa aplicação oferece uma solução simples e eficaz que realiza uma contagem precisa de pessoas, possibilitando aos profissionais da área preparar a quantidade certa de refeições, diminuindo perdas e reduzindo custos.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">“Desperdício de quem tem é a fome de alguém... Consuma o suficiente! ” - Filipe Inácio Matias</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/background1.png" alt="Unsplashed background img 2"></div>
  </div>

  <!-- <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
        </div>
      </div>

    </div>
  </div> -->


  <!-- <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">“Sustentabilidade começa no prato!” - Lucas Rafael de Marco</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="./assets/img/food-waste-GettyImages-187676687.jpg" alt="Unsplashed background img 3">
    </div>
  </div> -->

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Técnicos desenvolvedores</h5>
          <p class="grey-text text-lighten-4">Bruno Ramos, Bruno Torres, Caua Pimenta, David Santo, Jullia Mautoni, Juliene Campos e Vitor Magalhães</p>


        </div>
        <div class="col l6 s12 center">
          <img  src="img/faetecLogo.png" width="300px" alt="" srcset="">
        </div>

        <!-- <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div> -->
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2023 Copyright FAETEC - ETE Amaury César Vieira <a class="brown-text text-lighten-3" href="http://materializecss.com"></a>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

    </body>
</html>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/navbar.css') }}">

<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark rounded">
  <a class="navbar-brand" href="{{ route('home') }}">
    <i class="fa fa-phone"></i>
      Telzir
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if($current=='home') active @endif ">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fa fa-home"></i>
          Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item @if($current=='charge') active @endif ">
        <a class="nav-link" href="{{ route('tarifas') }}">
          <i class="fa fa-dollar-sign"></i>
          Tabela de tarifas
        </a>
      </li>
      <li class="nav-item @if($current=='falemais') active @endif ">
        <a class="nav-link" href="{{ route('falemais') }}">
        <i class="fa fa-file-invoice-dollar"></i>
          Planos FaleMais
        </a>
      </li>
      <li class="nav-item @if($current=='about') active @endif ">
        <a class="nav-link" href="{{ route('about') }}">
          <i class="fa fa-passport"></i>
          Sobre a Telzir
        </a>
      </li>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if($current=='home') active @endif ">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if($current=='charge') active @endif ">
        <a class="nav-link" href="/charge">Tabela de tarifas</a>
      </li>
      <li class="nav-item @if($current=='falemais') active @endif ">
        <a class="nav-link" href="/falemais">Planos Fale Mais</a>
      </li>
      <li class="nav-item @if($current=='about') active @endif ">
        <a class="nav-link" href="/about">Sobre a Telzir</a>
      </li>
  </div>
</nav>
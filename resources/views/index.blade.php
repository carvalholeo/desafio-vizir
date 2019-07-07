@extends('layout.app', ["current" => "home"])

@section('title')
Telzir - Diminuindo distâncias
@endsection

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Preços padrão</h5>
                        <p class="card-text">
                        Confira as tarifas padrão por ligação efetuada com o nosso código.
                        </p>
                        <a href="{{ route('tarifas') }}" class="btn btn-primary">Tabela de tarifas</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Planos FaleMais</h5>
                        <p class="card-text">
                        Quer falar muito mais com todo o país pagando bem menos? Entra aqui pra ver mais essa novidade da Telzir.
                        </p>
                        <a href="{{ route('falemais') }}" class="btn btn-primary">FaleMais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layout.app', ["current" => "falemais"])

@section('title')
Telzir - Planos FaleMais
@endsection

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Planos FaleMais da Telzir</h5>
        <p class="text-left">Com os novos planos FaleMais da Telzir, você pode falar com várias cidades sem pagar pelo minuto que estiver dentro da sua franquia.</p>
        <p class="text-left">Depois de esgotar sua franquia, você continua fazendo ligações, pagando a tarifa padrão de cada minuto + uma taxa de 10% pelo excendente.</p>
        <p class="text-left">Pensando na nossa relação de transparência com você, colocamos abaixo um simulador pra saber quanto você vai pagar na ligação usando nosso plano. É só clicar no botão abaixo!</p>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="tabelaPlanos">
                <thead class="text-center">
                    <tr>
                        <th scope="col">DDD de Origem</th>
                        <th scope="col">DDD de Destino</th>
                        <th scope="col">Tempo (em minutos)</th>
                        <th scope="col">Plano FaleMais</th>
                        <th scope="col">Com FaleMais</th>
                        <th scope="col">Sem FaleMais</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
        <div id="dlgError">

        </div>
    <div class="card-footer">
        <button class="btn btn-primary" role="button" onClick="newQuery()">Faça uma simulação!</button>
    </div>

    <div class="card-body">
        <p class="text-left">Você sabe como funciona o tempo de tarifação de ligações?
        De acordo com as regras da Anatel, o tempo fazer a cobrança das ligações são: </p>
        <ul>
            <li>Até 3 segundos, a ligação não é cobrada.</li>
                <ul>
                    <li>Se em um período de 120 segundos houver 4 ou mais ligações com duração menor ou igual à 3 segundos para o mesmo número, as ligações são juntadas e tarifadas como uma só.</li>
                </ul>
            <li>Após os 3 segundos, é cobrado uma tarifa referente a 30 segundos, mesmo que ela dure menos do que isso.</li>
            <li>Passado este tempo inicial, a ligação é cobrada a cada 6 segundos.</li>
        </ul>

        <p class="text-left">Depois que a sua ligação acaba, nosso sistema soma o tempo de ligação e multiplica pelo valor da tarifa por minuto, baseado em informações do seu DDD de origem e o DDD de destino. Assim, conseguimos fazer com que sua ligação seja cobrada de maneira justa, sem susto na conta telefônica.</p>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgPlan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formPlano">
                <div class="modal-header">
                    <h5 class="modal-title">Simulação de preços - Planos FaleMais</h5>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="dddOrigem" class="control-label">DDD de Origem</label>
                        <div class="input-group">
                           <select class="form-control" id="dddOrigem" required>
                                <option value="11">11</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dddDestino" class="control-label">DDD de Destino</label>
                        <div class="input-group">
                            <select class="form-control" id="dddDestino" required>
                                <option value="11">11</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="minutosGastos" class="control-label">Tempo (em minutos)</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="minutosGastos" placeholder="Quantidade de Minutos" min="0" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="planoEscolhido" class="control-label">Plano FaleMais</label>
                        <div class="input-group">
                            <select class="form-control" id="planoEscolhido" required>
                                <option value="30">FaleMais 30</option>
                                <option value="60">FaleMais 60</option>
                                <option value="120">FaleMais 120</option>
                            </select>
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simular</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    function apiRoute() {
        return "{{ route('api.falemais') }}";
    }
</script>
<script src="{{ asset('js/extended.js') }}" type="text/javascript"></script>
@endsection
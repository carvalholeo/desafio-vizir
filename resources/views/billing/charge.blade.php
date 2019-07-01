@extends('layout.app', ["current" => "charge"])

@section('title')
Telzir - Tabela de tarifas
@endsection

@section('body')
<div class="card border">
    <div class="card-body">
        <p class="text text-body">A Telzir tem as melores tarifas para você ligar, do Oiapoque ao Chuí, sem tomar aquele
            susto na conta telefônica. Confira abaixo as nossas tarifas!</p>
        <h5 class="card-title">Tabela de Tarifas</h5>
        <table class="table table-ordered table-hover" id="costsTable">
            <thead>
                <tr>
                    <th>DDD de Origem</th>
                    <th>DDD de Destino</th>
                    <th>R$/minuto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11</td>
                    <td>16</td>
                    <td>1,90</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>17</th>
                    <td>1,70</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>18</td>
                    <td>0,90</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>11</td>
                    <td>2,90</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>11</td>
                    <td>2,70</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>11</td>
                    <td>1,90</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <p class="text text-body">Você sabe como funciona o tempo de tarifação de ligações?
        De acordo com as regras da Anatel, o tempo fazer a cobrança das ligações são: </p>
        <ul>
            <li>Até 3 segundos, a ligação não é cobrada.</li>
                <ul>
                    <li>Se em um período de 120 segundos houver 4 ou mais ligações com duração menor ou igual à 3 segundos para o mesmo número, as ligações são juntadas e tarifadas como uma só.</li>
                </ul>
            <li>Após os 3 segundos, é cobrado uma tarifa referente a 30 segundos, mesmo que ela dure menos do que isso.</li>
            <li>Passado este tempo inicial, a ligação é cobrada a cada 6 segundos.</li>
        </ul>

        <p class="text text-body">Depois que a sua ligação acaba, nosso sistema soma o tempo de ligação e multiplica pelo valor da tarifa por minuto, baseado em informações do seu DDD de origem e o DDD de destino. Assim, conseguimos fazer com que sua ligação seja cobrada de maneira justa, sem susto na conta telefônica.</p>
    </div>
</div>

@endsection
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
})

function newQuery() {
    $('#dddOrigem').val('');
    $('#dddDestino').val('');
    $('#minutosGastos').val('');
    $('#planoEscolhido').val('');

    $('#dlgPlan').modal('show');
}

function montarLinha(plano) {
    var linha = "<tr>" +
        "<td>" + plano.dddOrigem + "</td>" +
        "<td>" + plano.dddDestino + "</td>" +
        "<td>" + plano.minutosGastos + "</td>" +
        "<td>FaleMais " + plano.planoEscolhido + "</td>" +
        "<td>" + plano.precoComPlano + "</td>" +
        "<td>" + plano.precoSemPlano + "</td>" +
        "</tr>";

    return linha;
}

function Query() {
    plano = {
        dddOrigem:  $('#dddOrigem').val(),
        dddDestino: $('#dddDestino').val(),
        minutosGastos: $('#minutosGastos').val(),
        planoEscolhido: $('#planoEscolhido').val()
    };

    $.ajax({
        type: "POST",
        url: "/api/plano/",
        context: this,
        data: plano,
        success: function (data) {
            produto = JSON.parse(data);
            linha = montarLinha(produto);
            $('#tabelaPlanos>tbody').append(linha);
        },
        error: function (error) {
            show = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='alertError'>" +
                        error.responseText +
                        "<button type='cancel' class='close' data-dismiss='alert' aria-label='Close'>" +
                            "<span aria-hidden=\"true\">&times;</span>" +
                        "</button>" +
                    "</div>";
            $('div>#dlgError').append(show);
            $('#alertError').alert('dispose');
        }
    });
}

$('#formPlano').submit(function (event) {
    event.preventDefault();
        Query();
    $("#dlgPlan").modal('hide');

})

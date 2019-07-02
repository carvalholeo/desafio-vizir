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

function carregarProdutos() {
    $.getJSON('/api/produtos', function (plano) {
        for (i = 0; i < plano.length; i++) {
            linha = montarLinha(plano[i]);
            $('#tabelaProdutos>tbody').append(linha);
        }
    })
}

function montarLinha(plano) {
    var linha = "<tr>" +
        "<td>" + plano.dddOrigem + "</td>" +
        "<td>" + plano.dddDestino + "</td>" +
        "<td>" + plano.minutosGastos + "</td>" +
        "<td>" + plano.planoEscolhido + "</td>" +
        "<td>" + plano.precoComPlano + "</td>" +
        "<td>" + plano.precoSemPlano + "</td>" +
        "</tr>";

    return linha;
}

function createQuery() {
    plano = {
        "dddOrigem": $('#dddOrigem').val(),
        "dddDestino": $('#dddDestino').val(),
        "minutosGastos": $('#minutosGastos').val(),
        "planoEscolhido": $('#planoEscolhido').val()
    }

    $.post("/api/plano", plan, function (data) {
        produto = JSON.parse(data);
        linha = montarLinha(plano);
        $('#tabelaProdutos>tbody').append(linha);

    })
}

function editQuery() {
    plano = {
        dddOrigem:  $('#dddOrigem').val(),
        dddDestino: $('#dddDestino').val(),
        minutosGastos: $('#minutosGastos').val(),
        planoEscolhido: $('#planoEscolhido').val()
    };

    $.ajax({
        type: "PUT",
        url: "/api/produtos/",
        context: this,
        data: plano,
        success: function (data) {
            plano = JSON.parse(data);
            linhas = $("#tabelaPlanos>tbody>tr");
            e = linhas.filter(function (i, elemento) {
                return elemento.cells[0].textContent == plano.dddOrigem;
            });
            if (e) {
                e[0].cells[0].textContent = plano.dddOrigem;
                e[0].cells[1].textContent = plano.dddDestino;
                e[0].cells[2].textContent = plano.minutosGastos;
                e[0].cells[3].textContent = plano.planoEscolhido;
                e[0].cells[4].textContent = plano.precoComPlano;
                e[0].cells[5].textContent = plano.precoSemPlano;
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}

$('#formPlano').submit(function (event) {
    event.preventDefault();
    if ($("#dddOrigem").val() != '') {
        editQuery();
    } else {
        createQuery();
    }
    $("#dlgPlan").modal('hide');

})

$(function () {
    carregarProdutos();
})
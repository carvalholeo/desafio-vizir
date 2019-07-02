var contador = 0;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
})

function newQuery() {
    if (contador) {
        linhas = $("#tabelaProdutos>tbody>tr");
        e = linhas.filter(function (i, elemento) {
            return elemento.cells[0].textContent == prod.id;
        });
        e[0].cells[0].textContent = "";
        e[0].cells[1].textContent = "";
        e[0].cells[2].textContent = "";
        e[0].cells[3].textContent = "";
        e[0].cells[4].textContent = "";
    }
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

function criarProduto() {
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

function salvarProduto() {
    prod = {
        id: $('#id').val(),
        nome: $('#nomeProduto').val(),
        estoque: $('#quantidade').val(),
        preco: $('#preco').val(),
        categoria_id: $('#categoria').val()
    };

    $.ajax({
        type: "PUT",
        url: "/api/produtos/" + prod.id,
        context: this,
        data: prod,
        success: function (data) {
            prod = JSON.parse(data);
            linhas = $("#tabelaProdutos>tbody>tr");
            e = linhas.filter(function (i, elemento) {
                return elemento.cells[0].textContent == prod.id;
            });
            if (e) {
                e[0].cells[0].textContent = prod.id;
                e[0].cells[1].textContent = prod.nome;
                e[0].cells[2].textContent = prod.estoque;
                e[0].cells[3].textContent = prod.preco;
                e[0].cells[4].textContent = prod.categoria_id;
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}

$('#formProduto').submit(function (event) {
    event.preventDefault();
    if ($("#id").val() != '') {
        salvarProduto();
    } else {
        criarProduto();
    }
    $("#dlgProdutos").modal('hide');

})

$(function () {
    carregarProdutos();
})
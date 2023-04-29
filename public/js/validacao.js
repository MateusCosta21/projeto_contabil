$(document).ready(function () {
    $('#telefone').mask('(00) 00000-0000');
});

$(document).ready(function () {
    //$('#cnpj').mask('00.000.000/0000-00');
});


// Obter o modal
var modal = document.getElementById("modal-cadastro");

// Obter o botão que abre o modal
var btn = document.getElementById("btn-cadastro");

// Obter o botão de fechar o modal
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clicar no botão, abrir o modal
btn.onclick = function () {
    modal.style.display = "block";
}

// Quando o usuário clicar no botão de fechar, fechar o modal
span.onclick = function () {
    modal.style.display = "none";
}

// Quando o usuário clicar fora do modal, fechar o modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


function deleteItem(url) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(url, {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': token
      }
    })
    .then(response => {
      console.log(response);
      alert("Item excluído com sucesso!");
      location.reload();
    })
    .catch(error => {
      console.error(error);
    });
  }

  function preencherEndereco() {
    var cnpj = $("#cnpj").val();
    $.ajax({
      url: "/buscacnpj/" + cnpj,
      type: "GET",
      dataType: "json",
      success: function(data) {
        $("#bairro").val(data.bairro || "");
        $("#cidade").val(data.cidade || "");
        $("#estado").val(data.estado || "");
        $("#cep").val(data.cep || "");
        $("#rua").val(data.rua || "");
        $("#numero").val(data.numero || "");
        $("#razao_social").val(data.razao_social || "");
        $("#nome").val(data.razao_social || "");
        $("#telefone").val(data.telefone || "");
        $("#email").val(data.email || "");
        $("#cnpj").val(data.cnpj || "");
      },
      error: function(xhr, status, error) {
        console.log("Error: " + error);
      }
    });
  }
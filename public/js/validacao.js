$(document).ready(function(){
    $('#telefone').mask('(00) 00000-0000');
  });

  $(document).ready(function(){
    $('#cnpj').mask('00.000.000/0000-00');
  });


    // Obter o modal
    var modal = document.getElementById("modal-cadastro");

    // Obter o botão que abre o modal
    var btn = document.getElementById("btn-cadastro");

    // Obter o botão de fechar o modal
    var span = document.getElementsByClassName("close")[0];

    // Quando o usuário clicar no botão, abrir o modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quando o usuário clicar no botão de fechar, fechar o modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Quando o usuário clicar fora do modal, fechar o modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }



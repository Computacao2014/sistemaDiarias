/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// Função que faz as requisição Ajax ao arquivo PHP
function pegaDados()
{
    $.ajax({
    type: "POST",
    url: "buscar_servidores.php",
    data: {
      matricula: $('#matricula').val(),
      nome: $('#nome').val()
    },
    success: function(data) {
      $('body').html(data);
    }
  });
}

function deletar() {
  $.ajax({
    type: "POST",
    url: "buscar_servidores.php",
    data: {
      matricula: $('#matricula').val()
    },
    success: function(data) {
      $('body').html(data);
    }
  });
}
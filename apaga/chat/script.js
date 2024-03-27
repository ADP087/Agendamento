var receitas = {
    "15/03": "Receita do Dia 15/03: Lasanha de Frango",
    "16/03": "Receita do Dia 16/03: Salmão Grelhado",
    "17/03": "Receita do Dia 17/03: Risoto de Cogumelos",
    "18/03": "Receita do Dia 18/03: Frango Assado com Batatas",
    "19/03": "Receita do Dia 19/03: Espaguete à Carbonara"
  };
  
  // Adicionando event listener para as datas
  document.addEventListener('DOMContentLoaded', function () {
    var dates = document.querySelectorAll('.date');
    dates.forEach(function(date) {
      date.addEventListener('click', function() {
        var selectedDate = this.getAttribute('data-date');
        exibirReceita(selectedDate);
      });
    });
  });
  
  // Função para exibir a receita associada a uma data selecionada
  function exibirReceita(dataSelecionada) {
    var receita = receitas[dataSelecionada];
    var receitaDoDia = document.getElementById('receitaDoDia');
    receitaDoDia.innerText = receita || "Não há receita para esta data.";
  }



    // Função para tornar a célula clicada vermelha ou retornar à cor original
    function makeTableInteractive() {
      // Obtém a tabela pelo ID
      var table = document.getElementById("myTable");
      // Obtém todas as células da tabela
      var cells = table.getElementsByTagName("td");
      
      // Percorre todas as células
      for (var i = 0; i < cells.length; i++) {
          var currentCell = cells[i];
          // Define a função de clique para cada célula
          currentCell.onclick = function() {
              // Verifica se a cor de fundo atual é vermelha
              if (this.style.backgroundColor === "red") {
                  // Se for vermelha, redefine a cor de fundo para a cor original (branco)
                  this.style.backgroundColor = "";
              } else {
                  // Se não for vermelha, define a cor de fundo como vermelha
                  this.style.backgroundColor = "red";
              }
          };
      }
  }

  // Chama a função para tornar a tabela interativa
  makeTableInteractive();
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
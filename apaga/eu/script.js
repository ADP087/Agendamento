function marcaHorario(checkbox) {
    var td = checkbox.parentNode;

    if(checkbox.checked) {
        td.classList.add('selected');
    }
    else {
        td.classList.remove('selected');
    }
}

function limparSelecao() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false; //Isso desmarca todos os checkboxes, removendo sua seleção.
        var td = checkbox.parentNode; //manipulando o elemento pai do checkbox, como adicionar ou remover classes CSS
        td.classList.remove('selected'); //Ela fornece métodos para adicionar, remover, verificar a presença e alternar classes em um elemento.
    });

    var horariosSelecionados = document.getElementById('horarioSelecionado');
    horariosSelecionados.innerHTML = "";
}

function mostrarHorario() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var HorarioSelecionado = document.getElementById('horarioSelecionado');

    if (checkboxes.length === 0) { //é comumente usado para determinar o número de elementos retornados
        alert("Por favor, selecione pelo menos um horário.");
        return;
    }

    HorarioSelecionado.innerHTML = "<h2>Você selecionou o horário para:</h2>";
    checkboxes.forEach(function(checkbox) { //é uma maneira conveniente de percorrer todos os elementos de uma lista 
        HorarioSelecionado.innerHTML += checkbox.value + "<br>";
    });
}
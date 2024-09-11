//Aqui ele deixa o td (checkbox) SELECIONADO
function marcaHorario(checkbox) {
    var td = checkbox.parentNode;

    if(checkbox.checked) {
        td.classList.add('selected');
    }
    else {
        td.classList.remove('selected');
    }
}

//Quando uma célula é clicada, o estado do checkbox dentro da célula é alternado e a função marcaHorario é chamada para atualizar o estilo da célula.
var tds = document.querySelectorAll('#tabela td');
tds.forEach(function(td) {
    td.addEventListener('click', function(event) {
        if (event.target.tagName !== 'INPUT') { // Verifica se o clique não é diretamente no checkbox
            var checkbox = td.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;
            marcaHorario(checkbox);
        }
    });
});

//Limpa a exibição de horários selecionados.
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

//Esta função exibe os horários selecionados pelo usuário.
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



//Conectando ao PHP usando FETCH
function enviarHorario(horario) {
    fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ horario: horario })
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Erro:', error);
    });
}

function mostrarHorario() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var HorarioSelecionado = document.getElementById('horarioSelecionado');

    if (checkboxes.length === 0) {
        alert("Por favor, selecione pelo menos um horário.");
        return;
    }

    HorarioSelecionado.innerHTML = "<h2>Você selecionou o horário para:</h2>";
    checkboxes.forEach(function(checkbox) {
        HorarioSelecionado.innerHTML += checkbox.value + "<br>";
        enviarHorario(checkbox.value); // Envia o horário selecionado para o backend
    });
}
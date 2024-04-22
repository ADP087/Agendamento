function marcaHorario(checkbox) {
    var td = checkbox.parentNode;

    if(checkbox.checked) {
        td.classList.add('selected');
    }
    else {
        td.classList.remove('selected');
    }
}

function mostrarHorario() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var HorarioSelecionado = document.getElementById('horarioSelecionado');

    HorarioSelecionado.innerHTML = "<h2>Você selecionou o horário para:</h2>";
    checkboxes.forEach(function(checkbox) { //é uma maneira conveniente de percorrer todos os elementos de uma lista 
        HorarioSelecionado.innerHTML += checkbox.value + "<br>";
    });
}
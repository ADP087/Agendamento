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
    var horarioSelecionado = document.getElementById('horarioSelecionado');

    horarioSelecionado.innerHTML = "<h2>Você selecionou o horário para:</h2>";
}
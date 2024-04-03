function marcarHorario(checkbox) {
    var td = checkbox.parentNode;
    if (checkbox.checked) {
        td.classList.add('selected');
    } 
    else {
        td.classList.remove('selected');
    }
}

function mostrarHorariosSelecionados() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var horariosSelecionados = document.getElementById('horariosSelecionados');
    horariosSelecionados.innerHTML = "<h2>Horários Selecionados:</h2>";
    checkboxes.forEach(function(checkbox) {
        horariosSelecionados.innerHTML += checkbox.value + "<br>";
    });
}
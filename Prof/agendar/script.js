let horarioSelecionado = null;
let idHorarioSelecionado = null;
let idDiaSelecionado = null;

// Atualizar a tabela de horários ao selecionar uma nova sala
function atualizarTabelaHorarios() {
    if (idDiaSelecionado !== null) {
        selecionarData(idDiaSelecionado);
    }
}

// Função para selecionar uma data específica
function selecionarData(id_dia) {
    idDiaSelecionado = id_dia;
    var id_sala = document.getElementById("sala").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "buscar_horarios.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.querySelector("#tabela_horarios").innerHTML = xhr.responseText;
        }
    };
    xhr.send("id_dia=" + id_dia + "&id_sala=" + id_sala);
}
// Atualizar a tabela de horários ao selecionar uma nova sala
function atualizarTabelaHorarios() {
    if (idDiaSelecionado !== null) {
        selecionarData(idDiaSelecionado);
    }
}

// Função para selecionar uma data específica
function selecionarData(id_dia) {
    idDiaSelecionado = id_dia;
    var id_sala = document.getElementById("sala").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "buscar_horarios.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.querySelector("#tabela_horarios").innerHTML = xhr.responseText;
        }
    };
    xhr.send("id_dia=" + id_dia + "&id_sala=" + id_sala);
}

// Capturar o horário selecionado
function selecionarHorario(id, horario, elemento) {
    if (horarioSelecionado !== null) {
        horarioSelecionado.classList.remove('selected');
    }

    idHorarioSelecionado = id;
    horarioSelecionado = elemento;
    horarioSelecionado.classList.add('selected');
}

// Função para agendar o horário com confirmação
function agendarHorario() {
    if (!idHorarioSelecionado) {
        alert("Por favor, selecione um horário.");
        return;
    }

    var confirmarAgendamento = confirm("Você quer agendar este horário?");
    if (!confirmarAgendamento) {
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "agendar_horario.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert("Horário agendado com sucesso!");
            selecionarData(idDiaSelecionado);
        }
    };
    xhr.send("id_horario=" + idHorarioSelecionado);
}
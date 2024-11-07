function selecionarData(elemento) {
    // Obter o id_dia e id_sala
    var id_dia = elemento.getAttribute('data-id_dia');
    var id_sala = document.getElementById("sala").value;

    // Enviar requisição AJAX para buscar horários de acordo com a sala e o dia selecionado
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "buscar_horarios.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Atualizar a tabela com os horários recebidos
            document.querySelector("#tabela_horarios").innerHTML = xhr.responseText;
        }
    };
    xhr.send("id_dia=" + id_dia + "&id_sala=" + id_sala);
}


let horarioSelecionado = null;
let idHorarioSelecionado = null;

// Capturar o horário selecionado
function selecionarHorario(id, horario, elemento) {
    // Remover a seleção anterior, se houver
    if (horarioSelecionado !== null) {
        horarioSelecionado.classList.remove('selected');
    }

    // Marcar o novo horário selecionado
    idHorarioSelecionado = id;
    horarioSelecionado = elemento;

    // Adicionar a classe 'selected' para deixar a célula vermelha
    horarioSelecionado.classList.add('selected');
}

// Função para agendar o horário com confirmação
function agendarHorario() {
    if (!idHorarioSelecionado) {
        alert("Por favor, selecione um horário.");
        return;
    }

    // Mostrar o balão de confirmação
    var confirmarAgendamento = confirm("Você quer agendar este horário?");
    if (!confirmarAgendamento) {
        return;
    }

    // Enviar a requisição AJAX para agendar o horário
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "agendar_horario.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Você pode opcionalmente verificar a resposta aqui
            alert("Horário agendado com sucesso!");
            // Redirecionar para o novo arquivo
            window.location.href = "../index.php";
        }
    };
    // Enviar o id do horário selecionado para o servidor
    xhr.send("id_horario=" + idHorarioSelecionado);
}

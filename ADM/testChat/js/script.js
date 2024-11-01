document.addEventListener('DOMContentLoaded', function() {
    carregarHorarios();
});

function marcaHorario(checkbox) {
    var td = checkbox.parentNode;

    if (checkbox.checked) {
        td.classList.add('selected');
    } else {
        td.classList.remove('selected');
    }
}

function carregarHorarios() {
    fetch('php/carrega_horarios.php')
    .then(response => response.json())
    .then(data => {
        for (const horario in data) {
            const checkbox = document.querySelector(`input[value="${horario}"]`);
            if (checkbox) {
                checkbox.checked = data[horario].status == 1;
                if (data[horario].status == 1) {
                    checkbox.disabled = true;
                    checkbox.parentElement.innerHTML += ` - Agendado por ${data[horario].agendado_por}`;
                }
            }
        }
    })
    .catch((error) => {
        console.error('Erro ao carregar horários:', error);
    });
}

function mostrarHorario() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const horariosSelecionados = [];

    if (checkboxes.length === 0) {
        alert("Por favor, selecione pelo menos um horário.");
        return;
    }

    checkboxes.forEach((checkbox) => {
        horariosSelecionados.push(checkbox.value);
    });

    enviarHorario(horariosSelecionados);
}

function enviarHorario(horarios) {
    fetch('php/processa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ horarios }),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        carregarHorarios();
    })
    .catch((error) => {
        console.error('Erro:', error);
    });
}

function limparSelecao() {
    fetch('php/limpar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        carregarHorarios();
    })
    .catch((error) => {
        console.error('Erro:', error);
    });
}

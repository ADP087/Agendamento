document.addEventListener('DOMContentLoaded', function() {
    carregarHorarios();
});

function carregarHorarios() {
    fetch('carrega_horarios.php')
    .then(response => response.json())
    .then(data => {
        for (const horario in data) {
            const checkbox = document.querySelector(`input[name="horario"][value="${horario}"]`);
            if (checkbox) {
                checkbox.checked = data[horario] == 1;
            }
        }
    })
    .catch((error) => {
        console.error('Erro ao carregar horários:', error);
    });
}

function enviarHorarios() {
    const checkboxes = document.querySelectorAll('input[name="horario"]:checked');
    const horariosSelecionados = [];

    checkboxes.forEach((checkbox) => {
        horariosSelecionados.push(checkbox.value);
    });

    fetch('processa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ horarios: horariosSelecionados }),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch((error) => {
        console.error('Erro:', error);
    });
}

function limparHorarios() {
    fetch('limpar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        // Recarregar os horários após limpar
        carregarHorarios();
    })
    .catch((error) => {
        console.error('Erro:', error);
    });
}

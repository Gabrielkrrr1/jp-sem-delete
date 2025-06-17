// Espera o DOM carregar totalmente
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const userInput = document.getElementById('userInput');
    const pwInput = document.getElementById('pwInput');

    // Coloca o foco no campo de usuário ao carregar
    userInput.focus();

    form.addEventListener('submit', function (event) {
        // Verifica se os campos estão preenchidos
        if (userInput.value.trim() === '' || pwInput.value.trim() === '') {
            event.preventDefault(); // Impede o envio do formulário ao apertar enter 
            alert('Por favor, preencha todos os campos!');
            return;
        }


        // Exemplo para uso futuro: AJAX
        /*
        event.preventDefault();
        const formData = new FormData(form);
        fetch('caminho/para/controller', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'ok') {
                window.location.href = 'index.php';
            } else {
                alert('Usuário ou senha inválidos');
            }
        });
        */
    });
});
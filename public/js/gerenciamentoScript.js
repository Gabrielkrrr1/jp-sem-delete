var formControl = document.getElementsByClassName("form-control");
var modalAtual = document.getElementById("addModal");
var modalAddStyle = document.getElementById("modalCancelar");
var modalRemoveStyle = document.getElementsByClassName("modal-remove-style");
var modalDescartar = document.getElementById("descartarModal");

//Limpa o doc ao trocar o tipo de documento
function clearDoc(idDoc) {
    document.getElementById(idDoc).value = '';
}

//Limpa tudo da pagina de gerenciamento
function clearAll() {
    for (let i = 0; i < formControl.length; i++) {
        formControl[i].value = '';
    }
}

//Coisa de modal
modalAddStyle.addEventListener('click', function () {
    modalAtual.style.zIndex = "1039";
});

for (let i = 0; i < modalRemoveStyle.length; i++) {
    modalRemoveStyle[i].addEventListener('click', function () {
        modalAtual.style.zIndex = "1041";
    });
}

modalDescartar.addEventListener('click', function () {
    $('#addModal, #cancelModal').modal('hide');
    clearAll();
});
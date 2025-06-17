const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");
const prevFicha = document.querySelectorAll(".btn-prev-ficha");
const nextFicha = document.querySelectorAll(".btn-next-ficha");
const extraFichas = document.querySelectorAll(".extra-ficha");
const qnt = document.getElementById("qntInput");

let formStepsNum = 0;
let fichaNum = 0;

nextFicha.forEach((btn) => {
    btn.addEventListener("click", () => {
      fichaNum++;
      validateFicha();
      updateFicha();
    });
  });
  
prevFicha.forEach((btn) => {
    btn.addEventListener("click", () => {
      fichaNum--;
      validateFicha();
      updateFicha();
    });
  });


function updateFicha(){
    extraFichas.forEach((extraFicha) => {
        extraFicha.classList.contains("extra-ficha-active") &&
        extraFicha.classList.remove("extra-ficha-active");
      });
      extraFichas[fichaNum].classList.add("extra-ficha-active");

}

function validateFicha(){
    
    if(fichaNum<(0))
        fichaNum=0;
    else if(fichaNum>(qnt.value-2))
        fichaNum=(qnt.value-2);
}

// Quantidade de hóspedes
function changeQnt(){
    if(qnt.value>9)
        qnt.value=9;
    else if(qnt.value<1)
        qnt.value=1;
    validateFicha();
    updateFicha();
}

// Número do documento
function clearDoc(idDoc){
    document.getElementById(idDoc).value='';
}

// Páginas
nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}


// Barra de progresso
function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}


function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}



$('#qntInput').on('change', function() {
  if($(this).val() != ''){
    $("#btnNextFicha").show()
    $("#btnPrevFicha").show()
  }
});

$(document).ready(function()
{
  $("#btnNextFicha").hide()
  $("#btnPrevFicha").hide()
});
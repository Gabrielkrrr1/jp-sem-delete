const prevBtns = document.querySelectorAll(".btn-prev")
const nextBtns = document.querySelectorAll(".btn-next")
const progress = document.getElementById("progress")
const formSteps = document.querySelectorAll(".form-step")
const progressSteps = document.querySelectorAll(".progress-step")
const prevFicha = document.querySelectorAll(".btn-prev-ficha")
const nextFicha = document.querySelectorAll(".btn-next-ficha")
const extraFichas = document.querySelectorAll(".extra-ficha")
const qnt = document.getElementById("qntInput")

let formStepsNum = 0
let fichaNum = 0

nextFicha.forEach((btn) => {
  btn.addEventListener("click", () => {
    fichaNum++
    validateFicha()
    updateFicha()
  })
})

prevFicha.forEach((btn) => {
  btn.addEventListener("click", () => {
    fichaNum--
    validateFicha()
    updateFicha()
  })
})

function updateFicha() {
  extraFichas.forEach((extraFicha) => {
    extraFicha.classList.contains("extra-ficha-active") && extraFicha.classList.remove("extra-ficha-active")
  })
  if (extraFichas[fichaNum]) {
    extraFichas[fichaNum].classList.add("extra-ficha-active")
  }
}

function validateFicha() {
  if (fichaNum < 0) fichaNum = 0
  else if (fichaNum > qnt.value - 2) fichaNum = qnt.value - 2
}

// Quantidade de hóspedes
function changeQnt() {
  if (qnt.value > 9) qnt.value = 9
  else if (qnt.value < 1) qnt.value = 1
  validateFicha()
  updateFicha()
}

// Número do documento
function clearDoc(idDoc) {
  document.getElementById(idDoc).value = ""
}

// Páginas
nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (formStepsNum < formSteps.length - 1) {
      formStepsNum++;
      updateFormSteps();
      updateProgressbar();

      if (formStepsNum === 2) { // sua última etapa
        mostrarResumo();
      }
    } else {
      enviarFormulario();
    }
  });
});


prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (formStepsNum > 0) {
      formStepsNum--;
      updateFormSteps();
      updateProgressbar();
    }
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") && formStep.classList.remove("form-step-active")
  })

  formSteps[formStepsNum].classList.add("form-step-active")
}

// Barra de progresso
function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active")
    } else {
      progressStep.classList.remove("progress-step-active")
    }
  })

  const progressActive = document.querySelectorAll(".progress-step-active")

  progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%"
}

function isNumberKey(evt) {
  var charCode = evt.which ? evt.which : evt.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57)) return false
  return true
}

// Mostrar resumo dos dados
function mostrarResumo() {
  const resumoDiv = document.getElementById("resumo")
  const dados = coletarDadosFormulario()

  let html = `
    <div class="card ">
      <div class="card-body">
        <h5 class="card-title">Resumo do Atendimento</h5>
        
        <h6>Cliente Principal:</h6>
        <p><strong>Nome:</strong> ${dados.nome}</p>
        <p><strong>Data Nascimento:</strong> ${dados.data_nascimento}</p>
        <p><strong>Fiador:</strong> ${dados.fiador}</p>
        <p><strong>Contato:</strong> ${dados.contato}</p>
        <p><strong>Documento:</strong> ${getTipoDocumento(dados.tipo_documento)} - ${dados.documento}</p>
        
        <h6>Agendamento:</h6>
        <p><strong>Check-in:</strong> ${dados.check_in}</p>
        <p><strong>Check-out:</strong> ${dados.check_out}</p>
        <p><strong>Quarto:</strong> ${dados.quarto_nome}</p>
        
        <h6>Hóspedes Extras:</h6>
        <ul>
  `

  dados.clientes_extras.forEach((cliente, index) => {
    if (cliente.nome) {
      html += `<li>${cliente.nome} - ${getTipoDocumento(cliente.tipo_documento)} ${cliente.documento}</li>`
    }
  })

  html += `
        </ul>
      </div>
    </div>
    <div style="text-align: center; margin-top: 20px;">
      <button id="btnConfirm" type="submit" class="btn btn-light btn-prim">Confirmar</button>
    </div>
  `

  resumoDiv.innerHTML = html
}

// Coletar dados do formulário
function coletarDadosFormulario() {
  const dados = {
    // Cliente principal
    nome: document.getElementById("nameInput").value,
    data_nascimento: document.getElementById("dateInput").value,
    fiador: document.getElementById("payInput").value,
    contato: document.getElementById("contInput").value,
    tipo_documento: document.getElementById("typeInput").value,
    documento: document.getElementById("docInput").value,
    obs: document.getElementById("obsInput").value,

    // Agendamento
    check_in: document.getElementById("checkInInput").value,
    check_out: document.getElementById("checkOutInput").value,
    id_quarto: document.getElementById("roomInput").value,
    quarto_nome: document.getElementById("roomInput").selectedOptions[0]?.text || "",
    obs_agendamento: document.getElementById("obsRoomInput").value,

    // Clientes extras
    clientes_extras: [],
  }

  // Coletar dados dos clientes extras
  const qntHospedes = Number.parseInt(document.getElementById("qntInput").value) || 1
  for (let i = 2; i <= qntHospedes; i++) {
    const nomeExtra = document.getElementById(`name${i}Input`)?.value || ""
    const tipoExtra = document.getElementById(`type${i}Input`)?.value || ""
    const docExtra = document.getElementById(`doc${i}Input`)?.value || ""
    const obsExtra = document.getElementById(`obs${i}Input`)?.value || ""

    if (nomeExtra || docExtra) {
      dados.clientes_extras.push({
        nome: nomeExtra,
        tipo_documento: tipoExtra,
        documento: docExtra,
        obs: obsExtra,
      })
    }
  }

  return dados
}

// Enviar formulário
async function enviarFormulario() {
  try {
    const dados = coletarDadosFormulario()

    // Validar dados obrigatórios
    const erros = validarDados(dados)
    if (erros.length > 0) {
      alert("Erros encontrados:\n" + erros.join("\n"))
      return
    }

    const formData = new FormData()
    formData.append("action", "create")

    // Adicionar dados do cliente principal
    Object.keys(dados).forEach((key) => {
      if (key !== "clientes_extras" && key !== "quarto_nome") {
        formData.append(key, dados[key])
      }
    })

    // Adicionar clientes extras
    dados.clientes_extras.forEach((cliente, index) => {
      Object.keys(cliente).forEach((key) => {
        formData.append(`clientes_extras[${index}][${key}]`, cliente[key])
      })
    })

    const response = await fetch("../controller/atendimentoController.php", {
      method: "POST",
      body: formData,
    })

    const result = await response.json()

    if (result.success) {
      alert(result.message)
      // Redirecionar ou limpar formulário
      window.location.reload()
    } else {
      alert("Erro: " + result.message)
    }
  } catch (error) {
    console.error("Erro ao enviar formulário:", error)
    alert("Erro ao processar atendimento. Tente novamente.")
  }
}

// Validar dados
function validarDados(dados) {
  const erros = []

  if (!dados.nome) erros.push("Nome é obrigatório")
  if (!dados.data_nascimento) erros.push("Data de nascimento é obrigatória")
  if (!dados.fiador) erros.push("Fiador é obrigatório")
  if (!dados.contato) erros.push("Contato é obrigatório")
  if (!dados.tipo_documento) erros.push("Tipo de documento é obrigatório")
  if (!dados.documento) erros.push("Número do documento é obrigatório")
  if (!dados.check_in) erros.push("Data de check-in é obrigatória")
  if (!dados.check_out) erros.push("Data de check-out é obrigatória")
  if (!dados.id_quarto) erros.push("Quarto é obrigatório")

  // Validar datas
  if (dados.check_in && dados.check_out) {
    const checkIn = new Date(dados.check_in)
    const checkOut = new Date(dados.check_out)
    const hoje = new Date()

    if (checkIn < hoje) {
      erros.push("Data de check-in não pode ser anterior a hoje")
    }

    if (checkOut <= checkIn) {
      erros.push("Data de check-out deve ser posterior ao check-in")
    }
  }

  return erros
}

// Utilitários
function getTipoDocumento(tipo) {
  const tipos = {
    1: "RG",
    2: "CPF",
    3: "Passaporte",
  }
  return tipos[tipo] || "N/A"
}

document.querySelector('form').addEventListener('submit', function (event) {
  event.preventDefault();  // evita o reload e envio normal

  enviarFormulario();      // chama sua função ajax de envio
});

$("#btnConfirm").on('click', function () {
  message("Dados salvos com sucesso!")
})

// jQuery ready
$(document).ready(() => {
  $("#btnNextFicha").hide()
  $("#btnPrevFicha").hide()

  $("#qntInput").on("change", function () {
    if ($(this).val() != "" && $(this).val() > 1) {
      $("#btnNextFicha").show()
      $("#btnPrevFicha").show()
    } else {
      $("#btnNextFicha").hide()
      $("#btnPrevFicha").hide()
    }
  })
})

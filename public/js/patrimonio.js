document.addEventListener("DOMContentLoaded", function () {
  // Envio do formulário
  document.getElementById("formPatrimonio").addEventListener("submit", function (e) {
    e.preventDefault();
    const dados = new FormData(this);
    dados.append("action", "add");

    fetch("../controller/gerenpatrimonioController.php", {
      method: "POST",
      body: dados
    })
    .then(res => res.json())
    .then(data => {
      alert(data.msg);
      if (data.status === "ok") {
        location.reload();
      }
    })
    .catch(err => alert("Erro ao cadastrar: " + err));
  });

  // Excluir patrimônio
  document.querySelectorAll(".btn-deletar-patrimonio").forEach(btn => {
    btn.addEventListener("click", function () {
      const id = this.getAttribute("data-id");
      if (confirm("Tem certeza que deseja excluir?")) {
        const dados = new FormData();
        dados.append("action", "delete");
        dados.append("id", id);

        fetch("../controller/gerenpatrimonioController.php", {
          method: "POST",
          body: dados
        })
        .then(res => res.json())
        .then(data => {
          alert(data.msg);
          if (data.status === "ok") {
            location.reload();
          }
        })
        .catch(err => alert("Erro ao excluir: " + err));
      }
    });
  });
});

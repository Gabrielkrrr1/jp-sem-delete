<?php
require_once __DIR__ . '/../controller/loginController.php';
require_once __DIR__ . '/../controller/atendimentoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    LoginController::autenticar($usuario, $senha);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet">
    <title>Atendimento - Hotel Winner</title>
    <script src="../js/atendimentoScript.js" defer></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
</head>
<!-- width: 50rem; margin: 20px; -->

<body>
    <?php include('navbar.php'); ?>
    <!-- Passos 1, 2, 3 -->
    <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Cadastro"></div>
        <div class="progress-step" data-title="Agendamento"></div>
        <div class="progress-step" data-title="Resumo"></div>
    </div>
    <!-- Formulario 1: Ficha de hospedagem -->
    <form>
        <div class="form-step form-step-active flex flex-row col-md-12" id="step1">
            <div class="card-group ">
                <!-- Lado esquerdo -->
                <div class="card col-6 ms-5 " style="width: 10rem; border-right: none;">
                    <div class="card-body ">
                        <h5 class="card-title">Ficha de hospedagem</h5>
                        <div class="mb-3 ">
                            <label for="nameInput" class="form-label">Nome completo*</label>
                            <input type="text" class="form-control" id="nameInput">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="dateInput" class="form-label">Data de nascimento*</label>
                            <input type="date" class="form-control" id="dateInput" max='2025-01-01'>
                        </div>
                        <div class="mb-3">
                            <label for="payInput" class="form-label">Fiador*</label>
                            <input type="text" class="form-control" id="payInput">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="contInput" class="form-label">Contato*</label>
                            <input type="text" class="form-control" id="contInput">
                        </div>
                    </div>
                </div>
                <!-- Lado direito -->
                <div class="card" style="width: 10rem; border-left: none;">
                    <div class="card-body">
                        <h5 class="card-title"><br></h5>
                        <div class="mb-3 row">
                            <div class="col-lg-9"><label for="qntInput" class="form-label">Quantidade de
                                    hóspedes*</label>
                            </div>
                            <div class="col-lg-3"><input type="number" class="form-control" min=1 max=9 default=1
                                    id="qntInput" onchange="changeQnt()"></div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="typeInput" class="form-label">Tipo de documento*</label>
                            <select id="typeInput" class="form-select" onchange="clearDoc('docInput')"
                                aria-label="Tipo de documento">
                                <option selected disabled>Selecione</option>
                                <option value="1">RG</option>
                                <option value="2">CPF</option>
                                <option value="3">Passaporte</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="docInput" class="form-label">Número do Documento*</label>
                            <input type="text" class="form-control" id="docInput" min=0>
                        </div>
                        <div class="mb-3">
                            <label for="obsInput" class="form-label">Observações</label>
                            <textarea class="form-control" id="obsInput" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-light btn-next btn-prim">Próximo</button>




                <!-- Fichas extras, esse código é péssimo por enquanto, é até triste de olhar, mas clonar o HTML é horrível -->

                <div id="fichasExtras" class="col-4">
                    <button type="button" class="ms-3 btn btn-secondary btn-prev-ficha" id="btnPrevFicha">
                        <span class="material-symbols-outlined ">arrow_back_ios</span>
                    </button>

                    <!-- Ficha 2 -->
                    <div id="divExFicha1" class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 2</h5>
                            <div class="mb-3">
                                <label for="name2Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name2Input">
                            </div>
                            <div class="mb-3">
                                <label for="type2Input" class="form-label">Tipo de documento*</label>
                                <select id="type2Input" class="form-select" onchange="clearDoc('doc2Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc2Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc2Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs2Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs2Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 3</h5>
                            <div class="mb-3">
                                <label for="name3Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name3Input">
                            </div>
                            <div class="mb-3">
                                <label for="type3Input" class="form-label">Tipo de documento*</label>
                                <select id="type3Input" class="form-select" onchange="clearDoc('doc3Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc3Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc3Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs3Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs3Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 4</h5>
                            <div class="mb-3">
                                <label for="name4Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name4Input">
                            </div>
                            <div class="mb-3">
                                <label for="type4Input" class="form-label">Tipo de documento*</label>
                                <select id="type4Input" class="form-select" onchange="clearDoc('doc4Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc4Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc4Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs4Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs4Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 5</h5>
                            <div class="mb-3">
                                <label for="name5Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name5Input">
                            </div>
                            <div class="mb-3">
                                <label for="type5Input" class="form-label">Tipo de documento*</label>
                                <select id="type5Input" class="form-select" onchange="clearDoc('doc5Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc5Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc5Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs5Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs5Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 6</h5>
                            <div class="mb-3">
                                <label for="name6Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name6Input">
                            </div>
                            <div class="mb-3">
                                <label for="type6Input" class="form-label">Tipo de documento*</label>
                                <select id="type6Input" class="form-select" onchange="clearDoc('doc6Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc6Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc6Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs6Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs6Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 7</h5>
                            <div class="mb-3">
                                <label for="name7Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name7Input">
                            </div>
                            <div class="mb-3">
                                <label for="type7Input" class="form-label">Tipo de documento*</label>
                                <select id="type7Input" class="form-select" onchange="clearDoc('doc7Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc7Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc7Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs7Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs7Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 8</h5>
                            <div class="mb-3">
                                <label for="name8Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name8Input">
                            </div>
                            <div class="mb-3">
                                <label for="type8Input" class="form-label">Tipo de documento*</label>
                                <select id="type8Input" class="form-select" onchange="clearDoc('doc8Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc8Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc8Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs8Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs8Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card extra-ficha" style="width: 25rem; margin: 20px;">
                        <div class="card-body" style="width: 25rem">
                            <h5 class="card-title">Ficha do hóspede 9</h5>
                            <div class="mb-3">
                                <label for="name9Input" class="form-label">Nome completo*</label>
                                <input type="text" class="form-control" id="name9Input">
                            </div>
                            <div class="mb-3">
                                <label for="type9Input" class="form-label">Tipo de documento*</label>
                                <select id="type9Input" class="form-select" onchange="clearDoc('doc9Input')"
                                    aria-label="Tipo de documento">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">RG</option>
                                    <option value="2">CPF</option>
                                    <option value="3">Passaporte</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="doc9Input" class="form-label">Número do Documento*</label>
                                <input type="number" class="form-control" id="doc9Input">
                            </div>
                            <div class="mb-3">
                                <label for="obs9Input" class="form-label">Observações</label>
                                <textarea class="form-control" id="obs9Input" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-next-ficha" id="btnNextFicha"><span
                            class="material-symbols-outlined">arrow_forward_ios</span></button>
                </div>
            </div>
        </div>





        <!-- Página 2 -->


        <!-- Contêiner que centraliza tudo -->
        <div style="display: flex; justify-content: center; align-items: center;">
            <div class="form-step" id="step2">
                <div class="card-group" style="width: 60rem; margin: 20px 0;">
                    <div class="card" style="width: 15rem; border-right: none;">
                        <div class="card-body" style="width: 15rem; justify-content:c">
                            <h5 class="card-title">Agendamento</h5>
                            <div class="mb-3">
                                <label for="checkInInput" class="form-label">Data de Check-in*</label>
                                <input type="date" class="form-control" id="checkInInput">
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 15rem; border-left: none;">
                        <div class="card-body" style="width: 15rem">
                            <h5 class="card-title"><br></h5>
                            <div class="mb-3">
                                <label for="checkOutInput" class="form-label">Data de Check-out*</label>
                                <input type="date" class="form-control" id="checkOutInput">
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 15rem; border-right: none;">
                        <div class="card-body" style="width: 15rem">
                            <h5 class="card-title"><br></h5>
                            <div class="mb-3">
                                <label for="typeRoomInput" class="form-label">Tipo de quarto*</label>
                                <select id="typeRoomInput" class="form-select" aria-label="Tipo de quarto">
                                    <option selected disabled>Selecione</option>
                                    <option value="1">Standard</option>
                                    <option value="2">Suíte</option>
                                    <option value="3">Luxo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="roomInput" class="form-label">Quarto*</label>
                                <select id="roomInput" class="form-select" aria-label="Quarto">
                                    <option disabled selected>Selecione</option>

                                    <?php
                                    $j = 1;
                                    foreach ($rooms as $room) {
                                        if ($room['STATUS'] == 0) { ?>
                                            <option value="<?= $j ?>" style="color: green">Quarto <?= $room['NUMERACAO'] ?>
                                            </option>
                                        <?php } else if ($room['STATUS'] == 1) { ?>
                                                <option value="<?= $j ?>" style="color: red" disabled>Quarto
                                                <?= $room['NUMERACAO'] ?></option>
                                        <?php }
                                        $j++;
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 15rem; border-left: none;">
                        <div class="card-body" style="width: 15rem">
                            <h5 class="card-title"><br></h5>
                            <div class="mb-3">
                                <label for="obsRoomInput" class="form-label">Observações</label>
                                <textarea class="form-control" id="obsRoomInput" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de navegação -->
                <div style="text-align: center;">
                    <button type="button" class="btn btn-secondary btn-prev btn-sec">Anterior</button>
                    <button type="button" class="btn btn-light btn-next btn-prim">Próximo</button>
                </div>
            </div>
        </div>

        <!-- Página 3 -->
        <div class="form-step" id="step3" style="margin: 20px">
            <h5>Resumo</h5>
            <button type="button" class="btn btn-secondary btn-prev btn-sec">Anterior</button>
            <button type="submit" class="btn btn-light btn-next btn-prim">Confirmar</button>
        </div>

    </form>


    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
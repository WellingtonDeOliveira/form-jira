<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    session_start();
    /* if (isset($_SESSION['start']) && (time() - $_SESSION['start']) > 30) {
        session_unset();
        session_destroy();
    }*/
    $_SESSION['start'] = time();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Formulário JIRA</title>
</head>

<body>
    <div class="container w-75 my-5 container-form">
        <div class="text-center mb-3">
            <h1>Criação de Issues</h1>
            <h5>Descrição do formulário</h5><br>
        </div>
        <div class="container message">
            <?php
            if (isset($_SESSION['mensagem'])) {
                if ($_SESSION['mensagem'] == 'danger') {
                    echo "<div class='alert alert-danger' role='alert'>Erro ao enviar os dados de " . $_SESSION['quantidade'] . " dos " . $_SESSION['quantidadeMod'] . " modulos selecionados!</div>";
                } else {
                    echo "<div class='alert alert-success' role='alert'>Issues criadas com sucesso!</div>";
                }
                $_SESSION['mensagem'] = null;
            }
            ?>
        </div>
        <form action="./script/submit.php" method="POST" enctype="multipart/form-data">

            <div class="responsivo row">
                <div class="flex-row col-5">
                    <label for="system" class="pb-2"><strong>Selecione o sistema</strong></label>
                    <select id="system" name="system" class="form-control mb-2 ms-1 w-75" required>
                        <option value="PJe-JT" selected>PJe-JT</option>
                        <option value="SIGEP-JT">SIGEP-JT</option>
                    </select>
                    <div class="version">
                        <div class="system-none system-sigep-version mb-2 ms-1">
                            <label for="version" class="pb-2"><strong>SIGEP 1.30.</strong></label>
                        </div>
                        <div class="system-none system-pje-version mb-2 ms-1">
                            <label for="version" class="pb-2"><strong>PJE 2.8.</strong></label>
                        </div>
                    </div>
                </div>
                
                
                <div class="campoPara col-7">
                    <div class="responsavel mb-2 ms-1">
                        <label for="version" class="pb-2"><strong>Responsável</strong></label>
                        <input type="text" id="responsavel" name="responsavel" class="form-control mb-2 ms-1 w-75" placeholder="Adicione um responsável" required>
                    </div>
                    <div class="observadores mb-2 ms-1">
                        <label for="version" class="pb-2"><strong>Acompanhadores</strong></label>
                        <textarea type="text" id="observadores" name="observadores" class="form-control mb-2 ms-1 w-75" placeholder="Adicione observadores"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="system-none system-pje-comment mb-2 ms-1 me-5 col-4">
                    <label for="version" class="pb-2"><strong>Descrição</strong></label>
                    <textarea name="descricao" class="form-control" placeholder="Adicione uma descrição para Issue"></textarea>
                </div>
                <div class="perfil mb-2 ms-5 col-3">
                    <label for="version" class="pb-2"><strong>Perfis Salvos</strong></label>
                    <select id="perfil" name="perfil" class="form-control mb-2 ms-1 w-75"></select>
                </div>
                <div class="save col-3 mt-2">
                    <button id="save" type="button" class="btn btn-primary px-4 py-1 mt-4">salvar</button>
                </div>
            </div>
            
            <div class="system-none system-pje input-group">
                <label for="Modulos PJE" class=""><strong>Modulos PJE</strong></label>
                <div class="d-flex my-2">
                    <div class="form-check-AUD d-flex my-2">
                        <input type="checkbox" id="AUD-checkbox" class="form-check-input listing7" value="AUD" name="module2">
                        <label for="AUD" class="form-check-label mx-2">AUD</label>
                    </div>
                </div>
                <div id="AUD"></div>
                <div class="d-flex my-2">
                    <div class="form-check-JTE d-flex my-2">
                        <input type="checkbox" id="JTE-checkbox" class="form-check-input listing8" value="JTE" name="module3">
                        <label for="JTE" class="form-check-label mx-2">JTE</label>
                    </div>
                </div>
                <div id="JTE"></div>
                <div class="d-flex my-2">
                    <div class="form-check-PjeCalc d-flex my-2">
                        <input type="checkbox" id="PjeCalc-checkbox" class="form-check-input listing9" value="PjeCalc" name="module4">
                        <label for="PjeCalc" class="form-check-label mx-2">PjeCalc</label>
                    </div>
                </div>
                <div id="PjeCalc"></div>
                <div class="d-flex my-2">
                    <div class="form-check-SIF d-flex my-2">
                        <input type="checkbox" class="form-check-input listing10" id="SIF-checkbox" value="SIF" name="module5">
                        <label for="SIF" class="form-check-label mx-2">SIF</label>
                    </div>
                </div>
                <div id="SIF"></div>
            </div>
            <div class="system-none system-sigep input-group input-group-sigep">
                <label for="Modulos SIGEP" class=""><strong>Modulos SIGEP</strong></label>
                <div class="d-flex my-2">
                    <div class="form-check-SIGEP-Modulo d-flex my-2">
                        <input type="checkbox" id="SIGEP-Modulo-checkbox" class="form-check-input listing1" value="SIGEP Principal" name="module1">
                        <label for="SIGEP Principal" class="form-check-label mx-2">SIGEP Módulo Principal</label>
                    </div>
                </div>
                <div id="SIGEP-Modulo"></div>
                <div class="d-flex my-2">
                    <div class="form-check-SIGEP-Online d-flex my-2">
                        <input type="checkbox" id="SIGEP-Online-checkbox" class="form-check-input listing2" value="SIGEP-Online" name="module2">
                        <label for="SIGEP-Online" class="form-check-label mx-2">SIGEP-Online</label>
                    </div>
                </div>
                <div id="SIGEP-Online"></div>
                <div class="d-flex my-2">
                    <div class="form-check-FolhaWeb d-flex my-2">
                        <input type="checkbox" id="FolhaWeb-checkbox" class="form-check-input listing3" value="FolhaWeb" name="module3">
                        <label for="FolhaWeb" class="form-check-label mx-2">FolhaWeb</label>
                    </div>
                </div>
                <div id="FolhaWeb"></div>
                <div class="d-flex my-2">
                    <div class="form-check-SIGS d-flex my-2">
                        <input type="checkbox" id="SIGS-checkbox" class="form-check-input listing4" name="module4" value="SIGS">
                        <label for="SIGS" class="form-check-label mx-2">SIGS</label>
                    </div>
                </div>
                <div id="SIGS"></div>
                <div class="d-flex my-2">
                    <div class="form-check-GEST d-fex my-2">
                        <input type="checkbox" id="GEST-checkbox" class="form-check-input listing5" name="module5" value="GEST">
                        <label for="GEST" class="form-check-label mx-2">GEST</label>
                    </div>
                </div>
                <div id="GEST"></div>
            </div>
            <div class="button-form-div text-end">
                <button type="submit" id="botao" class="btn btn-primary px-4 py-1">Enviar</button>
            </div>
        </form>
    </div>
    <div class="footer container w-75">
        <footer><strong>Versão 1.2.1 - Dev</strong>
            <p class="final-footer">Desenvolvido pelo TRT - 7</p>
        </footer>
    </div>
    <script src="./script/jquery.js"></script>
    <script src="./script/index.js"></script>
</body>

</html>
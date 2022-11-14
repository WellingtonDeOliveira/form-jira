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
                <div class="perfil mb-2 ms-5 col-2">
                    <label for="version" class="pb-2"><strong>Perfis Salvos</strong></label>
                    <select id="perfil" name="perfil" class="form-control mb-2 ms-1"></select>
                </div>
                <div class="per_name mb-2 ms-5 col-2 system-none">
                    <label for="version" class="pb-2"><strong>Nome do perfil</strong></label>
                    <input type="text" id="per_name" name="per_name" class="form-control mb-2 ms-1" placeholder="add nome">
                </div>
                <div class="save col-2 mt-2">
                    <button id="save" type="button" class="btn btn-primary px-4 py-1 mt-4">salvar</button>
                </div>
            </div>
            <!-- PJE -->
            <div class="system-none system-pje input-group">
                <label for="Modulos PJE" class=""><strong>Modulos PJE</strong></label>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-AUD d-flex my-2 form-switch">
                        <input type="checkbox" id="AUD-checkbox" class="form-check-input listing7" value="AUD" name="module2">
                        <label for="AUD" class="form-check-label mx-2">AUD</label>
                    </div>
                </div>
                <div id="AUD"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-JTE d-flex my-2">
                        <input type="checkbox" id="JTE-checkbox" class="form-check-input listing8" value="JTE" name="module3">
                        <label for="JTE" class="form-check-label mx-2">JTE</label>
                    </div>
                </div>
                <div id="JTE"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-PjeCalc d-flex my-2">
                        <input type="checkbox" id="PjeCalc-checkbox" class="form-check-input listing9" value="PjeCalc" name="module4">
                        <label for="PjeCalc" class="form-check-label mx-2">PjeCalc</label>
                    </div>
                </div>
                <div id="PjeCalc"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-SIF d-flex my-2">
                        <input type="checkbox" class="form-check-input listing10" id="SIF-checkbox" value="SIF" name="module5">
                        <label for="SIF" class="form-check-label mx-2">SIF</label>
                    </div>
                </div>
                <div id="SIF"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-EXE-PJE d-flex my-2">
                        <input type="checkbox" class="form-check-input listing11" id="EXE-PJE-checkbox" value="EXE-PJE" name="module6">
                        <label for="EXE-PJE" class="form-check-label mx-2">EXE-PJE</label>
                    </div>
                </div>
                <div id="EXE-PJE"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-Nugep d-flex my-2">
                        <input type="checkbox" class="form-check-input listing12" id="Nugep-checkbox" value="Nugep" name="module7">
                        <label for="Nugep" class="form-check-label mx-2">Nugep</label>
                    </div>
                </div>
                <div id="Nugep"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-Acervo-Digital d-flex my-2">
                        <input type="checkbox" class="form-check-input listing13" id="Acervo-Digital-checkbox" value="Acervo-Digital" name="module8">
                        <label for="Acervo-Digital" class="form-check-label mx-2">Acervo Digital</label>
                    </div>
                </div>
                <div id="Acervo-Digital"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-SHODO d-flex my-2">
                        <input type="checkbox" class="form-check-input listing14" id="SHODO-checkbox" value="SHODO" name="module9">
                        <label for="SHODO" class="form-check-label mx-2">SHODO</label>
                    </div>
                </div>
                <div id="SHODO"></div>
            </div>
            <!-- SIGEP -->
            <div class="system-none system-sigep input-group input-group-sigep">
                <label for="Modulos SIGEP" class=""><strong>Modulos SIGEP</strong></label>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-SIGEP-Modulo d-flex my-2">
                        <input type="checkbox" id="SIGEP-Modulo-checkbox" class="form-check-input listing1" value="SIGEP Principal" name="module1">
                        <label for="SIGEP Principal" class="form-check-label mx-2">SIGEP Módulo Principal</label>
                    </div>
                </div>
                <div id="SIGEP-Modulo"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-SIGEP-Online d-flex my-2">
                        <input type="checkbox" id="SIGEP-Online-checkbox" class="form-check-input listing2" value="SIGEP-Online" name="module2">
                        <label for="SIGEP-Online" class="form-check-label mx-2">SIGEP-Online</label>
                    </div>
                </div>
                <div id="SIGEP-Online"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-FolhaWeb d-flex my-2">
                        <input type="checkbox" id="FolhaWeb-checkbox" class="form-check-input listing3" value="FolhaWeb" name="module3">
                        <label for="FolhaWeb" class="form-check-label mx-2">FolhaWeb</label>
                    </div>
                </div>
                <div id="FolhaWeb"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-SIGS d-flex my-2">
                        <input type="checkbox" id="SIGS-checkbox" class="form-check-input listing4" name="module4" value="SIGS">
                        <label for="SIGS" class="form-check-label mx-2">SIGS</label>
                    </div>
                </div>
                <div id="SIGS"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-GEST d-fex my-2">
                        <input type="checkbox" id="GEST-checkbox" class="form-check-input listing5" name="module5" value="GEST">
                        <label for="GEST" class="form-check-label mx-2">GEST</label>
                    </div>
                </div>
                <div id="GEST"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-Esocial d-flex my-2">
                        <input type="checkbox" class="form-check-input listing15" id="Esocial-checkbox" value="Esocial" name="module6">
                        <label for="Esocial" class="form-check-label mx-2">Esocial</label>
                    </div>
                </div>
                <div id="Esocial"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-TEIID d-flex my-2">
                        <input type="checkbox" class="form-check-input listing16" id="TEIID-checkbox" value="TEIID" name="module7">
                        <label for="TEIID" class="form-check-label mx-2">TEIID</label>
                    </div>
                </div>
                <div id="TEIID"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-Progecom d-flex my-2">
                        <input type="checkbox" class="form-check-input listing17" id="Progecom-checkbox" value="Progecom" name="module8">
                        <label for="Progecom" class="form-check-label mx-2">Progecom</label>
                    </div>
                </div>
                <div id="Progecom"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-EJUD d-flex my-2">
                        <input type="checkbox" class="form-check-input listing18" id="EJUD-checkbox" value="EJUD" name="module9">
                        <label for="EJUD" class="form-check-label mx-2">EJUD</label>
                    </div>
                </div>
                <div id="EJUD"></div>
                <div class="d-flex my-2">
                    <div class="form-switch form-check-Passivos d-flex my-2">
                        <input type="checkbox" class="form-check-input listing19" id="Passivos-checkbox" value="Passivos" name="module10">
                        <label for="Passivos" class="form-check-label mx-2">Passivos</label>
                    </div>
                </div>
                <div id="Passivos"></div>
            </div>
            <div class="button-form-div text-end">
                <button type="submit" id="botao" class="btn btn-primary px-4 py-1">Enviar</button>
            </div>
        </form>
    </div>
    <div class="footer container w-75">
        <footer><strong>Versão 1.3.1 - Dev</strong>
            <p class="final-footer">Desenvolvido pelo TRT - 7</p>
        </footer>
    </div>
    <script src="./script/jquery.js"></script>
    <script src="./script/index.js"></script>
</body>

</html>
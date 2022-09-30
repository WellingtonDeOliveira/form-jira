<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Formulário JIRA</title>
</head>

<body>
    <div class="container w-50 my-5 container-form">
        <div class="text-center mb-3">
            <h1>Criação de Issues</h1>
            <h5>Descrição do formulário</h5><br>
        </div>
        <form action="./script/submit.php" method="POST">
            <div class="flex-row">
                <label for="system" class="pb-2"><strong>Selecione o sistema</strong></label>
                <select id="system" name="system" class="form-control mb-2 ms-1 w-50" required>
                    <option value="PJe-JT" selected>PJe-JT</option>
                    <option value="SIGEP-JT">SIGEP-JT</option>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="version" class=""><strong>SIGEP 1.30.</strong></label>
                <select name="version" id="sigep-required" class="form-control mb-2 ms-1 w-50">
                    <option value="" selected> Selecione a versão </option>
                    <?php for ($i = 0; $i <= 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-pje">
                <label for="version" class=""><strong>PJE 2.8.</strong></label>
                <select name="version" class="form-control mb-2 ms-1 w-50" id="pje-required">
                    <option value="" selected> Selecione a versão </option>
                    <?php for ($i = 0; $i < 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="Modulos SIGEP" class=""><strong>Modulos SIGEP</strong></label>
                <div class=" d-flex my-2">
                    <div class="form-check-SIGEP-Modulo d-flex my-2">
                        <input type="checkbox" id="SIGEP-Modulo-checkbox" class="form-check-input listing1" value="SIGEP Módulo Principal" name="module1">
                        <label for="SIGEP Módulo Principal" class="form-check-label mx-2">SIGEP Módulo Principal</label>
                    </div>
                    <div id="SIGEP-Modulo"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-SIGEP-Online d-flex my-2">
                        <input type="checkbox" id="SIGEP-Online-checkbox" id_input="SIGEP_ONLINE" class="form-check-input listing2" value="SIGEP-Online" name="module2">
                        <label for="SIGEP-Online" class="form-check-label mx-2">SIGEP-Online</label>
                    </div>
                    <div id="SIGEP-Online"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-FolhaWeb d-flex my-2">
                        <input type="checkbox" id="FolhaWeb-checkbox" class="form-check-input listing3" value="FolhaWeb" name="module3">
                        <label for="FolhaWeb" class="form-check-label mx-2">FolhaWeb</label>
                    </div>
                    <div id="FolhaWeb"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-SIGS d-flex my-2">
                        <input type="checkbox" id="SIGS-checkbox" class="form-check-input listing4" name="module4" value="SIGS">
                        <label for="SIGS" class="form-check-label mx-2">SIGS</label>
                    </div>
                    <div id="SIGS"></div>
                </div>
                <div class="d-flex my-2">
                    <div class="form-check-GEST d-fex my-2">
                        <input type="checkbox" id="GEST-checkbox" class="form-check-input listing5" name="module5" value="GEST">
                        <label for="GEST" class="form-check-label mx-2">GEST</label>
                    </div>
                    <div id="GEST"></div>
                </div>
            </div>
            <div class="system-none system-pje input-group">
                <label for="Modulos PJE" class=""><strong>Modulos PJE</strong></label>
                <div class=" d-flex my-2">
                    <div class="form-check-PJE d-flex my-2">
                        <input type="checkbox" id="PJE-checkbox" class="form-check-input listing6" value="PJE" name="module1">
                        <label for="PJE" class="form-check-label mx-2">PJE</label>
                    </div>
                    <div id="PJE"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-AUD d-flex my-2">
                        <input type="checkbox" id="AUD-checkbox" class="form-check-input listing7" value="AUD" name="module2">
                        <label for="AUD" class="form-check-label mx-2">AUD</label>
                    </div>
                    <div id="AUD"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-JTE d-flex my-2">
                        <input type="checkbox" id="JTE-checkbox" class="form-check-input listing8" value="JTE" name="module3">
                        <label for="JTE" class="form-check-label mx-2">JTE</label>
                    </div>
                    <div id="JTE"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-PjeCalc d-flex my-2">
                        <input type="checkbox" id="PjeCalc-checkbox" class="form-check-input listing9" value="PjeCalc" name="module4">
                        <label for="PjeCalc" class="form-check-label mx-2">PjeCalc</label>
                    </div>
                    <div id="PjeCalc"></div>
                </div>
                <div class=" d-flex my-2">
                    <div class="form-check-SIF d-flex my-2">
                        <input type="checkbox" class="form-check-input listing10" id="SIF-checkbox" value="SIF" name="module5">
                        <label for="SIF" class="form-check-label mx-2">SIF</label>
                    </div>
                    <div id="SIF"></div>
                </div>
            </div>
            <div class="button-form-div text-end">
                <button type="submit" class="btn btn-primary px-4 py-1">Enviar</button>
            </div>
        </form>
    </div>
    <script src="./script/jquery.js"></script>
    <script src="./script/index.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
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
                <select id="system" name="system" class="form-control mb-2 w-50" required>
                    <option value="PJe-JT" selected>PJe-JT</option>
                    <option value="SIGEP-JT">SIGEP-JT</option>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="version" class=""><strong>SIGEP 1.30.</strong></label>
                <select name="version" id="sigep-required" class="form-control mb-2 w-75">
                    <option value="" selected> Selecione a versão </option>
                    <?php for ($i = 0; $i <= 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-pje">
                <label for="version" class=""><strong>PJE 2.8.</strong></label>
                <select name="version" class="form-control mb-2 w-75" id="pje-required">
                    <option value="" selected> Selecione a versão </option>
                    <?php for ($i = 0; $i < 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="Modulos SIGEP" class=""><strong>Modulos SIGEP</strong></label>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="SIGEP-Modulo" class="form-check-input listing" value="SIGEP Módulo Principal" name="module1">
                        <label for="SIGEP Módulo Principal" class="form-check-label">SIGEP Módulo Principal</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sigep" name="mod-ver1" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="SIGEP-Online" class="form-check-input listing" value="SIGEP-Online" name="module2">
                        <label for="SIGEP-Online" class="form-check-label">SIGEP-Online</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sigep-online" name="mod-ver2" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="FolhaWeb" class="form-check-input listing" value="FolhaWeb" name="module3">
                        <label for="FolhaWeb" class="form-check-label">FolhaWeb</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-folhaweb" name="mod-ver3" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="SIGS" class="form-check-input listing" name="module4" value="SIGS">
                        <label for="SIGS" class="form-check-label">SIGS</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sigs" name="mod-ver4" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="GEST" class="form-check-input listing" name="module5" value="GEST">
                        <label for="GEST" class="form-check-label">GEST</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-gest" name="mod-ver5" placeholder="Digite a versão do módulo...">
                </div>
            </div>
            <div class="system-none system-pje input-group">
                <label for="Modulos PJE" class=""><strong>Modulos PJE</strong></label>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="PJE" class="form-check-input listing" value="PJE" name="module1">
                        <label for="PJE" class="form-check-label">PJE</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-pje" name="mod-ver1" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="AUD" class="form-check-input listing" value="AUD" name="module2">
                        <label for="AUD" class="form-check-label">AUD</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-aud" name="mod-ver2" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="JTE" class="form-check-input listing" value="JTE" name="module3">
                        <label for="JTE" class="form-check-label">JTE</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-jte" name="mod-ver3" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" id="PjeCalc" class="form-check-input listing" value="PjeCalc" name="module4">
                        <label for="PjeCalc" class="form-check-label">PjeCalc</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-pjeCalc" name="mod-ver4" placeholder="Digite a versão do módulo...">
                </div>
                <div class="d-flex my-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input listing" id="SIF" value="SIF" name="module5">
                        <label for="SIF" class="form-check-label">SIF</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sif" name="mod-ver5" placeholder="Digite a versão do módulo...">
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
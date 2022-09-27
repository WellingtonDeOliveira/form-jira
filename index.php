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
    <div class="container w-50 my-5">
        <div class="title">
            <h1>Criação de Issues</h1>
            <h5>Descrição do formulário</h5><br>
        </div>
        <form action="./script/submit.php" method="POST">
            <div class="flex-row">
                <label for="system" class="pb-2"><strong>SELECIONE O SISTEMA</strong></label>
                <select id="system" name="system" class="form-control mb-2 w-50" required>
                    <option value="PJe-JT" selected>PJe-JT</option>
                    <option value="SIGEP-JT">SIGEP-JT</option>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="version" class=""><strong>SIGEP 1.30.</strong></label>
                <select name="version" class="form-control mb-2 w-75">
                    <option value="" selected> ------- SELECIONE A VERSÃO ------- </option>
                    <?php for ($i = 0; $i <= 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-pje">
                <label for="version" class=""><strong>PJE 2.8.</strong></label>
                <select name="version" class="form-control mb-2 w-75" required>
                    <option value="" selected> ------- SELECIONE A VERSÃO ------- </option>
                    <?php for ($i = 0; $i < 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="Modulos SIGEP" class=""><strong>Modulos SIGEP</strong></label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="SIGEP-Modulo" class="form-check-input listing" name="SIGEP Módulo Principal">
                        <label for="SIGEP Módulo Principal" class="form-check-label">SIGEP Módulo Principal</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sigep" name="SIGEP-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="SIGEP-Online" class="form-check-input listing" name="SIGEP-Online">
                        <label for="SIGEP-Online" class="form-check-label">SIGEP-Online</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sigep-online" name="SIGEP-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="FolhaWeb" class="form-check-input listing" name="FolhaWeb">
                        <label for="FolhaWeb" class="form-check-label">FolhaWeb</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-folhaweb" name="FolhaWeb-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="SIGS" class="form-check-input listing" name="SIGS">
                        <label for="SIGS" class="form-check-label">SIGS</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sigs" name="SIGS-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="GEST" class="form-check-input listing" name="GEST">
                        <label for="GEST" class="form-check-label">GEST</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-gest" name="GEST-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
            </div>
            <div class="system-none system-pje input-group">
                <label for="Modulos PJE" class=""><strong>Modulos PJE</strong></label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="PJE" class="form-check-input listing" name="PJE">
                        <label for="PJE" class="form-check-label">PJE</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-pje" name="PJE-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="AUD" class="form-check-input listing" name="AUD">
                        <label for="AUD" class="form-check-label">AUD</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-aud" name="AUD-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="JTE" class="form-check-input listing" name="JTE">
                        <label for="JTE" class="form-check-label">JTE</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-jte" name="JTE-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="PjeCalc" class="form-check-input listing" name="PjeCalc">
                        <label for="PjeCalc" class="form-check-label">PjeCalc</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-pjeCalc" name="PjeCalc-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input listing" id="SIF" name="SIF">
                        <label for="SIF" class="form-check-label">SIF</label>
                    </div>
                    <input type="text" class="form-control m-2 text-module system-none checked-sif" name="SIF-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary button-form">ENVIAR</button>
            </div>
        </form>
    </div>
    <script src="./script/jquery.js"></script>
    <script src="./script/index.js"></script>
</body>

</html>
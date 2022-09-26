<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">
    <title>Formulário</title>
</head>

<body>
    <div class="container w-50 my-5">
        <div class="title">
            <h1>Criação de Issues</h1>
            <h5>Descrição do formulário</h5><br>
        </div>
        <form action="./script/submit.php" method="POST">
            <div class="flex-row">
                <label for="system" class="pb-2"><strong>SELECIONE O SISTEMA:</strong></label>
                <select id="system" name="system" class="form-control mb-2 w-50" required>
                    <option value="PJe-JT" selected>PJe-JT</option>
                    <option value="SIGEP-JT">SIGEP-JT</option>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="system" class=""><strong>SIGEP 1.30.</strong></label>
                <select name="version" class="form-control mb-2 w-75">
                    <option value="" selected> ------- SELECIONE ------- </option>
                    <?php for ($i = 0; $i <= 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-pje">
                <label for="system" class=""><strong>PJE 2.8.</strong></label>
                <select name="version" class="form-control mb-2 w-75" required>
                    <option value="" selected> ------- SELECIONE ------- </option>
                    <?php for ($i = 0; $i < 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    } ?>
                </select>
            </div>
            <div class="system-none system-sigep">
                <label for="system" class=""><strong>Modulos SIGEP</strong></label>
                <select name="module" class="form-control mb-2 w-75">
                    <option value="" selected> ------- SELECIONE ------- </option>
                    <option value="SIGEP Módulo Principal">SIGEP Módulo Principal</option>
                    <option value="SIGEP-Online">SIGEP-Online</option>
                    <option value="FolhaWeb">FolhaWeb</option>
                    <option value="SIGS">SIGS</option>
                    <option value="GEST">GEST</option>
                </select>
            </div>
            <div class="system-none system-pje input-group">
                <label for="system" class=""><strong>Modulos PJE</strong></label>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="PJE" class="form-check-input listing" name="PJE">
                        <label for="PJE" class="form-check-label">PJE</label>
                    </div>
                    <input type="text" class="form-control system-none" name="PJE-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="AUD" class="form-check-input listing" name="AUD">
                        <label for="AUD" class="form-check-label">AUD</label>
                    </div>
                    <input type="text" class="form-control system-none" name="AUD-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="JTE" class="form-check-input listing" name="JTE">
                        <label for="JTE" class="form-check-label">JTE</label>
                    </div>
                    <input type="text" class="form-control system-none" name="JTE-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" id="PjeCalc" class="form-check-input listing" name="PjeCalc">
                        <label for="PjeCalc" class="form-check-label">PjeCalc</label>
                    </div>
                    <input type="text" class="form-control system-none" name="PjeCalc-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
                <div class="d-flex">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input listing" id="SIF" name="SIF">
                        <label for="SIF" class="form-check-label">SIF</label>
                    </div>
                    <input type="text" class="form-control system-none" name="SIF-mod-ver" placeholder="Digite a versão do módulo..."> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
        </form>
    </div>
    <script src="./script/jquery.js"></script>
    <script src="./script/index.js"></script>
</body>

</html>
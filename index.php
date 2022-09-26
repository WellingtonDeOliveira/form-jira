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
            <div class="system-none system-pje">
                <label for="system" class=""><strong>Modulos PJE</strong></label>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input type="checkbox" id="PJE" class="listing" name="PJE"> 
                    </div>
                    <label for="PJE">PJE</label>
                    <input type="text" class="form-control system-none" name="PJE-mod-ver"> 
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input type="checkbox" id="AUD" class="listing" name="AUD">
                    </div>
                    <label for="AUD">AUD</label>
                    <input type="text" class="form-control system-none" name="AUD-mod-ver"> 
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input type="checkbox" id="JTE" class="listing" name="JTE">
                    </div>
                    <label for="JTE">JTE</label>
                    <input type="text" class="form-control system-none" name="JTE-mod-ver"> 
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input type="checkbox" id="PjeCalc" class="listing" name="PjeCalc">
                    </div>
                    <label for="PjeCalc">PjeCalc</label>
                    <input type="text" class="form-control system-none" name="PjeCalc-mod-ver"> 
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input type="checkbox" class="listing" id="SIF" name="SIF">
                    </div>
                    <label for="SIF">SIF</label>
                    <input type="text" class="form-control system-none" name="SIF-mod-ver"> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
        </form>
    </div>
    <script src="./script/jquery.js"></script>
    <script src="./script/index.js"></script>
</body>

</html>
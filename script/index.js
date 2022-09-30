$("#system").each(function () {
    $('div.system-pje').addClass('system-active');
    $('#pje-required').attr("required", "req");
});

$("#system").change(function () {
    var change = $(this).val();
    if (change == 'SIGEP-JT') {
        $("select#pje-required").val("");
        $(".text-module").val("");
        $('#sigep-required').attr("required", "req");
        $('#pje-required').removeAttr("required");
        $('div.system-pje').removeClass('system-active');
        $('div.system-sigep').addClass('system-active');
        document.querySelector(".listing6").checked = 0; 
        document.querySelector(".listing7").checked = 0; 
        document.querySelector(".listing8").checked = 0; 
        document.querySelector(".listing9").checked = 0; 
        document.querySelector(".listing10").checked = 0;
    } else {
        $("select#sigep-required").val("");
        $(".text-module").val("");
        $('#pje-required').attr("required", "req");
        $('#sigep-required').removeAttr("required");
        $('div.system-pje').addClass('system-active');
        $('div.system-sigep').removeClass('system-active');
        document.querySelector(".listing1").checked = 0; 
        document.querySelector(".listing2").checked = 0; 
        document.querySelector(".listing3").checked = 0; 
        document.querySelector(".listing4").checked = 0; 
        document.querySelector(".listing5").checked = 0; 
    }
});


// PJE
$(".form-check-PJE").change(function () {
    if ($("#PJE-checkbox").prop("checked")) {
        $('div#PJE').append('<input id="PJE-module" type="text" class="form-control m-2 text-module" name="PJE" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#PJE input#PJE-module').remove();
    }
});

$(".form-check-AUD").change(function () {
    if ($("#AUD-checkbox").prop("checked")) {
        $('div#AUD').append('<input id="AUD-module" type="text" class="form-control m-2 text-module" name="AUD" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#AUD input#AUD-module').remove();
    }
});

$(".form-check-JTE").change(function () {
    if ($("#JTE-checkbox").prop("checked")) {
        $('div#JTE').append('<input id="JTE-module" type="text" class="form-control m-2 text-module" name="JTE" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#JTE input#JTE-module').remove();
    }
});

$(".form-check-PjeCalc").change(function () {
    if ($("#PjeCalc-checkbox").prop("checked")) {
        $('div#PjeCalc').append('<input id="PjeCalc-module" type="text" class="form-control m-2 text-module" name="PjeCalc" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#PjeCalc input#PjeCalc-module').remove();
    }
});

$(".form-check-SIF").change(function () {
    if ($("#SIF-checkbox").prop("checked")) {
        $('div#SIF').append('<input id="SIF-module" type="text" class="form-control m-2 text-module" name="SIF" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#SIF input#SIF-module').remove();
    }
});

// SIGEP
$(".form-check-SIGEP-Modulo").change(function () {
    if ($("#SIGEP-Modulo-checkbox").prop("checked")) {
        $('div#SIGEP-Modulo').append('<input id="SIGEP-Modulo-module" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#SIGEP-Modulo input#SIGEP-Modulo-module').remove();
    }
});

$(".form-check-SIGEP-Online").change(function () {
    if ($("#SIGEP-Online-checkbox").prop("checked")) {
        $('div#SIGEP-Online').append('<input id="SIGEP-Online-module" type="text" class="form-control m-2 text-module" name="SIGEP-Online" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#SIGEP-Online input#SIGEP-Online-module').remove();
    }
});

$(".form-check-FolhaWeb").change(function () {
    if ($("#FolhaWeb-checkbox").prop("checked")) {
        $('div#FolhaWeb').append('<input id="FolhaWeb-module" type="text" class="form-control m-2 text-module" name="FolhaWeb" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#FolhaWeb input#FolhaWeb-module').remove();
    }
});

$(".form-check-SIGS").change(function () {
    if ($("#SIGS-checkbox").prop("checked")) {
        $('div#SIGS').append('<input id="SIGS-module" type="text" class="form-control m-2 text-module" name="SIGS" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#SIGS input#SIGS-module').remove();
    }
});

$(".form-check-GEST").change(function () {
    if ($("#GEST-checkbox").prop("checked")) {
        $('div#GEST').append('<input id="GEST-module" type="text" class="form-control m-2 text-module" name="GEST" placeholder="Digite a versão do módulo...">');
    }else{
        $('div#GEST input#GEST-module').remove();
    }
});
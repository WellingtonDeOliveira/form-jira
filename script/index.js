$("#system").each(function () {
    $('div.system-pje').addClass('system-active');
});

$("#system").change(function () {
    var change = $(this).val();
    if (change == 'SIGEP-JT') {
        $('div.system-pje').removeClass('system-active');
        $('div.system-sigep').addClass('system-active');
    } else {
        $('div.system-pje').addClass('system-active');
        $('div.system-sigep').removeClass('system-active');
    }
});

$(".form-check").change(function () {
    var textModuleAud = $("#AUD").prop("checked");
    if (textModuleAud == true) {
        $('.checked-aud').removeClass('system-none');
    }else{
        $('.checked-aud').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleJte = $("#JTE").prop("checked");
    if (textModuleJte == true) {
        $('.checked-jte').removeClass('system-none');
    }else{
        $('.checked-jte').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModulePjeC = $("#PjeCalc").prop("checked");
    if (textModulePjeC == true) {
        $('.checked-pjeCalc').removeClass('system-none');
    }else{
        $('.checked-pjeCalc').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleSif = $("#SIF").prop("checked");
    if (textModuleSif == true) {
        $('.checked-sif').removeClass('system-none');
    }else{
        $('.checked-sif').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModulePje = $("#PJE").prop("checked");
    if (textModulePje == true) {
        $('.checked-pje').removeClass('system-none');
    }else{
        $('.checked-pje').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleSigepM = $("#SIGEP-Modulo").prop("checked");
    if (textModuleSigepM == true) {
        $('.checked-sigep').removeClass('system-none');
    }else{
        $('.checked-sigep').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleSigepO = $("#SIGEP-Online").prop("checked");
    if (textModuleSigepO == true) {
        $('.checked-sigep-online').removeClass('system-none');
    }else{
        $('.checked-sigep-online').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleFolhaWeb = $("#FolhaWeb").prop("checked");
    if (textModuleFolhaWeb == true) {
        $('.checked-folhaweb').removeClass('system-none');
    }else{
        $('.checked-folhaweb').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleSigs = $("#SIGS").prop("checked");
    if (textModuleSigs == true) {
        $('.checked-sigs').removeClass('system-none');
    }else{
        $('.checked-sigs').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var textModuleGest = $("#GEST").prop("checked");
    if (textModuleGest == true) {
        $('.checked-gest').removeClass('system-none');
    } else {
        $('.checked-gest').addClass('system-none');
    }
});
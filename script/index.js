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
    var temp2 = $("#AUD").prop("checked");
    if (temp2 == true) {
        $('.checked-aud').removeClass('system-none');
    }else{
        $('.checked-aud').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp3 = $("#JTE").prop("checked");
    if (temp3 == true) {
        $('.checked-jte').removeClass('system-none');
    }else{
        $('.checked-jte').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp4 = $("#PjeCalc").prop("checked");
    if (temp4 == true) {
        $('.checked-pjeCalc').removeClass('system-none');
    }else{
        $('.checked-pjeCalc').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp5 = $("#SIF").prop("checked");
    if (temp5 == true) {
        $('.checked-sif').removeClass('system-none');
    }else{
        $('.checked-sif').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp1 = $("#PJE").prop("checked");
    if (temp1 == true) {
        $('.checked-pje').removeClass('system-none');
    }else{
        $('.checked-pje').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp6 = $("#SIGEP-Modulo").prop("checked");
    if (temp6 == true) {
        $('.checked-sigep').removeClass('system-none');
    }else{
        $('.checked-sigep').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp7 = $("#SIGEP-Online").prop("checked");
    if (temp7 == true) {
        $('.checked-sigep-online').removeClass('system-none');
    }else{
        $('.checked-sigep-online').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp8 = $("#FolhaWeb").prop("checked");
    if (temp8 == true) {
        $('.checked-folhaweb').removeClass('system-none');
    }else{
        $('.checked-folhaweb').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp9 = $("#SIGS").prop("checked");
    if (temp9 == true) {
        $('.checked-sigs').removeClass('system-none');
    }else{
        $('.checked-sigs').addClass('system-none');
    }
});

$(".form-check").change(function () {
    var temp10 = $("#GEST").prop("checked");
    if (temp10 == true) {
        $('.checked-gest').removeClass('system-none');
    } else {
        $('.checked-gest').addClass('system-none');
    }
});
$("#system").each(function () {
    $('div.system-pje').addClass('system-active');
    $('div.system-pje-version').addClass('system-active');
    $('#pje-required').attr("required", "req");
    document.querySelector(".listing6").checked = 1;
    $('div#PJE').append('<label id="PJE-module-label" class="ms-2 mt-2">Versão</label>');
    $('div#PJE').append('<input id="PJE-module" type="text" class="form-control m-2 text-module" name="PJE" placeholder="Ex.: 2.8" required>');
    $('div#PJE').append('<label id="PJE-module-label" class="ms-2">Descrição</label>');
    $('div#PJE').append('<textarea id="PJE-module-body" type="text" class="form-control m-2 text-module" name="PJE-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    $('.system-pje-version').append('<select name="version" class="form-control mb-2 ms-1 w-50 new-append-pje" id="pje-required"></select>');
    $('.new-append-pje').append('<option value="" selected> Selecione a versão </option>');
    for(let i = 0; i < 10; i++){
        $('.new-append-pje').append('<option value="' + i + '">' + i + '</option>');
    }
});

// $(document).ready(function () {
//     $("form").submit(function (event) {
//       var formData = {
//         system: $("#system").val(),
//         version: $("#version").val(),
//       };

//       $.ajax({
//         type: "POST",
//         url: "submit.php",
//         data: formData,
//         dataType: "json",
//         encode: true,
//       }).done(function (data) {
//         console.log(data);
//       });

//       event.preventDefault();
//     });
//   });

$("#system").change(function () {
    var change = $(this).val();
    if (change == 'SIGEP-JT') {
        $('.system-sigep-version').append('<select name="version" class="form-control mb-2 ms-1 w-50 new-append-sigep" id="sigep-required"></select>');
        $('.new-append-sigep').append('<option value="" selected> Selecione a versão </option>');
        for(let i = 0; i <= 10; i++){
            $('.new-append-sigep').append('<option value="' + i + '">' + i + '</option>');
        }
        $('div#PJE input#PJE-module').remove();
        $('div#PJE label#PJE-module-label').remove();
        $('div#PJE textarea#PJE-module-body').remove();
        $('div#AUD input#AUD-module').remove();
        $('div#AUD label#AUD-module-label').remove();
        $('div#AUD textarea#AUD-module-body').remove();
        $('div#JTE input#JTE-module').remove();
        $('div#JTE label#JTE-module-label').remove();
        $('div#JTE textarea#JTE-module-body').remove();
        $('div#PjeCalc input#PjeCalc-module').remove();
        $('div#PjeCalc label#PjeCalc-module-label').remove();
        $('div#PjeCalc textarea#PjeCalc-module-body').remove();
        $('div#PjeCalc input#formFileMultiple').remove();
        $('div#SIF input#SIF-module').remove();
        $('div#SIF label#SIF-module-label').remove();
        $('div#SIF textarea#SIF-module-body').remove();
        $("select#pje-required").val("");
        $(".text-module").val("");
        $('#sigep-required').attr("required", "req");
        $('#pje-required').removeAttr("required");
        $('div.system-pje').removeClass('system-active');
        $('div.system-pje-version').removeClass('system-active');
        $('div.system-sigep-version').addClass('system-active');
        $('div.system-sigep').addClass('system-active');
        document.querySelector(".listing1").checked = 1;
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGEP-Modulo').append('<input id="SIGEP-Modulo-module" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo" placeholder="Ex.: 2.8" required>');
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2">Descrição</label>');
        $('div#SIGEP-Modulo').append('<textarea id="SIGEP-Modulo-module-body" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        document.querySelector(".listing6").checked = 0;
        document.querySelector(".listing7").checked = 0;
        document.querySelector(".listing8").checked = 0;
        document.querySelector(".listing9").checked = 0;
        document.querySelector(".listing10").checked = 0;
        $('.system-pje-version .new-append-pje').remove();
    } else {
        $('.system-pje-version').append('<select name="version" class="form-control mb-2 ms-1 w-50 new-append-pje" id="pje-required"></select>');
        $('.new-append-pje').append('<option value="" selected> Selecione a versão </option>');
        for(let i = 0; i < 10; i++){
            $('.new-append-pje').append('<option value="' + i + '">' + i + '</option>');
        }
        $('div#SIGEP-Modulo input#SIGEP-Modulo-module').remove();
        $('div#SIGEP-Modulo label#SIGEP-Modulo-module-label').remove();
        $('div#SIGEP-Modulo textarea#SIGEP-Modulo-module-body').remove();
        $('div#SIGEP-Online input#SIGEP-Online-module').remove();
        $('div#SIGEP-Online label#SIGEP-Online-module-label').remove();
        $('div#SIGEP-Online textarea#SIGEP-Online-module-body').remove();
        $('div#FolhaWeb input#FolhaWeb-module').remove();
        $('div#FolhaWeb label#FolhaWeb-module-label').remove();
        $('div#FolhaWeb textarea#FolhaWeb-module-body').remove();
        $('div#SIGS input#SIGS-module').remove();
        $('div#SIGS label#SIGS-module-label').remove();
        $('div#SIGS textarea#SIGS-module-body').remove();
        $('div#GEST input#GEST-module').remove();
        $('div#GEST label#GEST-module-label').remove();
        $('div#GEST textarea#GEST-module-body').remove();
        $("select#sigep-required").val("");
        $(".text-module").val("");
        $('#pje-required').attr("required", "req");
        $('#sigep-required').removeAttr("required");
        $('div.system-pje').addClass('system-active');
        $('div.system-pje-version').addClass('system-active');
        $('div.system-sigep').removeClass('system-active');
        $('div.system-sigep-version').removeClass('system-active');
        document.querySelector(".listing6").checked = 1;
        $('div#PJE').append('<label id="PJE-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#PJE').append('<input id="PJE-module" type="text" class="form-control m-2 text-module" name="PJE" placeholder="Ex.: 2.8" required>');
        $('div#PJE').append('<label id="PJE-module-label" class="ms-2">Descrição</label>');
        $('div#PJE').append('<textarea id="PJE-module-body" type="text" class="form-control m-2 text-module" name="PJE-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        document.querySelector(".listing1").checked = 0;
        document.querySelector(".listing2").checked = 0;
        document.querySelector(".listing3").checked = 0;
        document.querySelector(".listing4").checked = 0;
        document.querySelector(".listing5").checked = 0;
        $('.system-sigep-version .new-append-sigep').remove();
    }
});

$(".input-group").change(function () {
    $(".message .alert-warning").remove();
    var check1 = document.querySelector(".listing1").checked;
    var check2 = document.querySelector(".listing2").checked;
    var check3 = document.querySelector(".listing3").checked;
    var check4 = document.querySelector(".listing4").checked;
    var check5 = document.querySelector(".listing5").checked;
    var check6 = document.querySelector(".listing6").checked;
    var check7 = document.querySelector(".listing7").checked;
    var check8 = document.querySelector(".listing8").checked;
    var check9 = document.querySelector(".listing9").checked;
    var check10 = document.querySelector(".listing10").checked;
    $("#botao").attr("disabled", false);
    if (!(check1 == 1 || check2 == 1 || check3 == 1 || check4 == 1 || check5 == 1 ||
        check6 == 1 || check7 == 1 || check8 == 1 || check9 == 1 || check10 == 1)) {
        $(".message").append("<div class='alert alert-warning' role='alert'>Selecione pelo menos um modulo!</div>");
        $("#botao").attr("disabled", true);
    }
});


// PJE
$(".form-check-PJE").change(function () {
    if ($("#PJE-checkbox").prop("checked")) {
        $('div#PJE').append('<label id="PJE-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#PJE').append('<input id="PJE-module" type="text" class="form-control m-2 text-module" name="PJE" placeholder="Ex.: 2.8" required>');
        $('div#PJE').append('<label id="PJE-module-label" class="ms-2">Descrição</label>');
        $('div#PJE').append('<textarea id="PJE-module-body" type="text" class="form-control m-2 text-module" name="PJE-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#PJE input#PJE-module').remove();
        $('div#PJE label#PJE-module-label').remove();
        $('div#PJE textarea#PJE-module-body').remove();
    }
});

$(".form-check-AUD").change(function () {
    if ($("#AUD-checkbox").prop("checked")) {
        $('div#AUD').append('<label id="AUD-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#AUD').append('<input id="AUD-module" type="text" class="form-control m-2 text-module" name="AUD" placeholder="Ex.: 2.8" required>');
        $('div#AUD').append('<label id="AUD-module-label" class="ms-2">Descrição</label>');
        $('div#AUD').append('<textarea id="AUD-module-body" type="text" class="form-control m-2 text-module" name="AUD-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#AUD input#AUD-module').remove();
        $('div#AUD label#AUD-module-label').remove();
        $('div#AUD textarea#AUD-module-body').remove();
    }
});

$(".form-check-JTE").change(function () {
    if ($("#JTE-checkbox").prop("checked")) {
        $('div#JTE').append('<label id="JTE-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#JTE').append('<input id="JTE-module" type="text" class="form-control m-2 text-module" name="JTE" placeholder="Ex.: 2.8" required>');
        $('div#JTE').append('<label id="JTE-module-label" class="ms-2">Descrição</label>');
        $('div#JTE').append('<textarea id="JTE-module-body" type="text" class="form-control m-2 text-module" name="JTE-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#JTE input#JTE-module').remove();
        $('div#JTE label#JTE-module-label').remove();
        $('div#JTE textarea#JTE-module-body').remove();
    }
});

$(".form-check-PjeCalc").change(function () {
    if ($("#PjeCalc-checkbox").prop("checked")) {
        $('div#PjeCalc').append('<label id="PjeCalc-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#PjeCalc').append('<input id="PjeCalc-module" type="text" class="form-control m-2 text-module" name="PjeCalc" placeholder="Ex.: 2.8" required>');
        $('div#PjeCalc').append('<label id="PjeCalc-module-label" class="ms-2">Descrição</label>');
        $('div#PjeCalc').append('<textarea id="PjeCalc-module-body" type="text" class="form-control m-2 text-module" name="PjeCalc-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#PjeCalc').append('<input class="form-control" type="file" id="formFileMultiple" multiple />');
    } else {
        $('div#PjeCalc input#PjeCalc-module').remove();
        $('div#PjeCalc label#PjeCalc-module-label').remove();
        $('div#PjeCalc textarea#PjeCalc-module-body').remove();
        $('div#PjeCalc input#formFileMultiple').remove();
    }
});

$(".form-check-SIF").change(function () {
    if ($("#SIF-checkbox").prop("checked")) {
        $('div#SIF').append('<label id="SIF-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIF').append('<input id="SIF-module" type="text" class="form-control m-2 text-module" name="SIF" placeholder="Ex.: 2.8" required>');
        $('div#SIF').append('<label id="SIF-module-label" class="ms-2">Descrição</label>');
        $('div#SIF').append('<textarea id="SIF-module-body" type="text" class="form-control m-2 text-module" name="SIF-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#SIF input#SIF-module').remove();
        $('div#SIF label#SIF-module-label').remove();
        $('div#SIF textarea#SIF-module-body').remove();
    }
});

// SIGEP
$(".form-check-SIGEP-Modulo").change(function () {
    if ($("#SIGEP-Modulo-checkbox").prop("checked")) {
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGEP-Modulo').append('<input id="SIGEP-Modulo-module" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo" placeholder="Ex.: 2.8" required>');
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2">Descrição</label>');
        $('div#SIGEP-Modulo').append('<textarea id="SIGEP-Modulo-module-body" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#SIGEP-Modulo input#SIGEP-Modulo-module').remove();
        $('div#SIGEP-Modulo label#SIGEP-Modulo-module-label').remove();
        $('div#SIGEP-Modulo textarea#SIGEP-Modulo-module-body').remove();
    }
});

$(".form-check-SIGEP-Online").change(function () {
    if ($("#SIGEP-Online-checkbox").prop("checked")) {
        $('div#SIGEP-Online').append('<label id="SIGEP-Online-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGEP-Online').append('<input id="SIGEP-Online-module" type="text" class="form-control m-2 text-module" name="SIGEP-Online" placeholder="Ex.: 2.8" required>');
        $('div#SIGEP-Online').append('<label id="SIGEP-Online-module-label" class="ms-2">Descrição</label>');
        $('div#SIGEP-Online').append('<textarea id="SIGEP-Online-module-body" type="text" class="form-control m-2 text-module" name="SIGEP-Online-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#SIGEP-Online input#SIGEP-Online-module').remove();
        $('div#SIGEP-Online label#SIGEP-Online-module-label').remove();
        $('div#SIGEP-Online textarea#SIGEP-Online-module-body').remove();
    }
});

$(".form-check-FolhaWeb").change(function () {
    if ($("#FolhaWeb-checkbox").prop("checked")) {
        $('div#FolhaWeb').append('<label id="FolhaWeb-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#FolhaWeb').append('<input id="FolhaWeb-module" type="text" class="form-control m-2 text-module" name="FolhaWeb" placeholder="Ex.: 2.8" required>');
        $('div#FolhaWeb').append('<label id="FolhaWeb-module-label" class="ms-2">Descrição</label>');
        $('div#FolhaWeb').append('<textarea id="FolhaWeb-module-body" type="text" class="form-control m-2 text-module" name="FolhaWeb-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#FolhaWeb input#FolhaWeb-module').remove();
        $('div#FolhaWeb label#FolhaWeb-module-label').remove();
        $('div#FolhaWeb textarea#FolhaWeb-module-body').remove();
    }
});

$(".form-check-SIGS").change(function () {
    if ($("#SIGS-checkbox").prop("checked")) {
        $('div#SIGS').append('<label id="SIGS-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGS').append('<input id="SIGS-module" type="text" class="form-control m-2 text-module" name="SIGS" placeholder="Ex.: 2.8" required>');
        $('div#SIGS').append('<label id="SIGS-module-label" class="ms-2">Descrição</label>');
        $('div#SIGS').append('<textarea id="SIGS-module-body" type="text" class="form-control m-2 text-module" name="SIGS-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#SIGS input#SIGS-module').remove();
        $('div#SIGS label#SIGS-module-label').remove();
        $('div#SIGS textarea#SIGS-module-body').remove();
    }
});

$(".form-check-GEST").change(function () {
    if ($("#GEST-checkbox").prop("checked")) {
        $('div#GEST').append('<label id="GEST-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#GEST').append('<input id="GEST-module" type="text" class="form-control m-2 text-module" name="GEST" placeholder="Ex.: 2.8" required>');
        $('div#GEST').append('<label id="GEST-module-label" class="ms-2">Descrição</label>');
        $('div#GEST').append('<textarea id="GEST-module-body" type="text" class="form-control m-2 text-module" name="GEST-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
    } else {
        $('div#GEST input#GEST-module').remove();
        $('div#GEST label#GEST-module-label').remove();
        $('div#GEST textarea#GEST-module-body').remove();
    }
});
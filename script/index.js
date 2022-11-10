$("#system").each(function () {
    $('div.system-pje').addClass('system-active');
    $('div.system-pje-version').addClass('system-active');
    $('div.system-pje-comment').addClass('system-active');
    $('.system-pje-version').append('<select name="version-pje" class="form-control mb-2 ms-1 w-75 new-append-pje"></select>');
    $('.new-append-pje').append('<option value="" selected> Selecione a versão </option>');
    for (let i = 0; i < 10; i++) {
        $('.new-append-pje').append('<option value="' + i + '">' + i + '</option>');
    }
    $.get("http://localhost:8085/formulario-Jira/perfil.json", function (data) {
        for (let i = 0; i < data.perfis.length; i++) {
            $('#perfil').append('<option value="perfil_' + (i + 1) + '">perfil_' + data.perfis[i][2] + '</option>');
        }
        $('#perfil').append('<option value="perfil_novo">perfil_novo</option>');
        $("#responsavel").val(data.perfis[0][0]);
        var str = "";
        var tam = 0;
        for (let i = 0; i < data.perfis[0][1].length; i++) {
            str += data.perfis[0][1][i] + ",";
            tam = str.length;
        }
        $("#save").attr("disabled", true);
        $("#observadores").val(str.substring(0, (tam - 1)));
    })
});

$("#perfil").change(function () {
    var per = $(this).val();
    console.log(per);
    var info = per.substring(7, (8));
    $("#save").attr("disabled", true);
    $("#responsavel").val("");
    $("#observadores").val("");
    $('div.per_name').addClass('system-none');
    //console.log(info)
    $.get("http://localhost:8085/formulario-Jira/perfil.json", function (data) {
        $("#responsavel").val(data.perfis[(info - 1)][0] != undefined ? data.perfis[(info - 1)][0] : "");
        var str = "";
        var tam = 0;
        for (let i = 0; i < data.perfis[(info - 1)][1].length; i++) {
            str += data.perfis[(info - 1)][1][i] + " ,";
            tam = str.length;
        }
        $("#observadores").val(str.substring(0, (tam - 1)));
    })
    if(per == 'perfil_novo'){
        $('div.per_name').removeClass('system-none');
    }
})

$("#responsavel").change(function () {
    var per = $("#perfil").val();
    if (per == 'perfil_novo' && $("responsavel").val() != '') {
        $("#save").attr("disabled", false);
    } else {
        $("#save").attr("disabled", true);
    }
})


$("#save").click(function () {

    // convertendo os observadores para array
    let temp = $("#observadores").val();
    let temp_name = $("#per_name").val();
    let temp_array = temp.split('');
    let array_conteudo = [];
    let email_conteudo = '';
    for (let i = 0; i < temp_array.length; i++) {
        if (temp_array[i] == ',') {
            array_conteudo.push(email_conteudo);
            email_conteudo = '';
        } else {
            email_conteudo += temp_array[i];
        }
    }
    array_conteudo.push(email_conteudo);
    console.log(array_conteudo);

    // Criar uma parte do json novo, onde terar o novo perfil
    var newConteudo = '[["' + $('#responsavel').val() + '"],[';
    for (let i = 0; i < array_conteudo.length; i++) {
        newConteudo += JSON.stringify(array_conteudo[i]) + ',';
    }
    newConteudo = newConteudo.substring(0, (newConteudo.length - 1));
    newConteudo += '],["'+temp_name+'"]';
    newConteudo += ']';
    $.get("http://localhost:8085/formulario-Jira/perfil.json", function (data) {
        var conteudo = '{';
        conteudo += '"perfis": [';
        // acresentando valor do novo perfil
        for (let i = 0; i < data.count; i++) {
            conteudo += JSON.stringify(data.perfis[i]) + ',';
        }
        conteudo += newConteudo;
        conteudo += '], "count": ' + (data.count + 1);
        conteudo += '}';
        console.log(conteudo);
        console.log('primeiro');
        $.ajax({
            url: './script/saveJson.php',
            type: 'POST',
            data: { data: conteudo },
            success: function (result) {
                // Retorno se tudo ocorreu normalmente
                console.log("Deu certo");
                console.log(result);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Retorno caso algum erro ocorra
                console.log("Não deu certo")
                console.log(jqXHR)
            }
        });
    })
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
        $('.system-sigep-version').append('<select name="version-sigep" class="form-control mb-2 ms-1 w-75 new-append-sigep" id="sigep-required"></select>');
        $('.new-append-sigep').append('<option value="" selected> Selecione a versão </option>');
        for (let i = 0; i <= 10; i++) {
            $('.new-append-sigep').append('<option value="' + i + '">' + i + '</option>');
        }
        $('div#PJE input#PJE-module').remove();
        $('div#PJE label#PJE-module-label').remove();
        $('div#PJE textarea#PJE-module-body').remove();
        $('div#AUD input#AUD-module').remove();
        $('div#AUD label#AUD-module-label').remove();
        $('div#AUD textarea#AUD-module-body').remove();
        $('div#AUD input#AUDFile').remove();
        $('div#JTE input#JTE-module').remove();
        $('div#JTE label#JTE-module-label').remove();
        $('div#JTE textarea#JTE-module-body').remove();
        $('div#JTE input#JTEFile').remove();
        $('div#PjeCalc input#PjeCalc-module').remove();
        $('div#PjeCalc label#PjeCalc-module-label').remove();
        $('div#PjeCalc textarea#PjeCalc-module-body').remove();
        $('div#PjeCalc input#PjeCalcFile').remove();
        $('div#SIF input#SIF-module').remove();
        $('div#SIF label#SIF-module-label').remove();
        $('div#SIF textarea#SIF-module-body').remove();
        $('div#SIF input#SIFFile').remove();
        $(".text-module").val("");
        $('#sigep-required').attr("required", "req");
        $('div.system-pje').removeClass('system-active');
        $('div.system-pje-version').removeClass('system-active');
        $('div.system-pje-comment').removeClass('system-active');
        $('div.system-sigep-version').addClass('system-active');
        $('div.system-sigep').addClass('system-active');
        $('div.perfil').addClass('perfil-sigep');
        document.querySelector(".listing1").checked = 1;
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGEP-Modulo').append('<input id="SIGEP-Modulo-module" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo" placeholder="Ex.: 2.8" required>');
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2">Descrição</label>');
        $('div#SIGEP-Modulo').append('<textarea id="SIGEP-Modulo-module-body" class="form-control m-2 text-module" name="SIGEP-Modulo-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#SIGEP-Modulo').append('<input class="form-control m-2 w-50" name="SIGEP-ModuloFile" type="file" id="SIGEP-ModuloFile" accept=".jpg, .jpeg, .png, .pdf" />');
        document.querySelector(".listing7").checked = 0;
        document.querySelector(".listing8").checked = 0;
        document.querySelector(".listing9").checked = 0;
        document.querySelector(".listing10").checked = 0;
    } else {
        $('.system-sigep-version .new-append-sigep').remove();
        $('.system-pje-version .new-append-pje').remove();
        $('.system-pje-version').append('<select name="version-pje" class="form-control mb-2 ms-1 w-75 new-append-pje"></select>');
        $('.new-append-pje').append('<option value="" selected> Selecione a versão </option>');
        for (let i = 0; i < 10; i++) {
            $('.new-append-pje').append('<option value="' + i + '">' + i + '</option>');
        }
        $('div#SIGEP-Modulo input#SIGEP-Modulo-module').remove();
        $('div#SIGEP-Modulo label#SIGEP-Modulo-module-label').remove();
        $('div#SIGEP-Modulo textarea#SIGEP-Modulo-module-body').remove();
        $('div#SIGEP-Modulo input#SIGEP-ModuloFile').remove();
        $('div#SIGEP-Online input#SIGEP-Online-module').remove();
        $('div#SIGEP-Online label#SIGEP-Online-module-label').remove();
        $('div#SIGEP-Online textarea#SIGEP-Online-module-body').remove();
        $('div#SIGEP-Online input#SIGEP-OnlineFile').remove();
        $('div#FolhaWeb input#FolhaWeb-module').remove();
        $('div#FolhaWeb label#FolhaWeb-module-label').remove();
        $('div#FolhaWeb textarea#FolhaWeb-module-body').remove();
        $('div#FolhaWeb input#FolhaWebFile').remove();
        $('div#SIGS input#SIGS-module').remove();
        $('div#SIGS label#SIGS-module-label').remove();
        $('div#SIGS textarea#SIGS-module-body').remove();
        $('div#SIGS input#SIGSFile').remove();
        $('div#GEST input#GEST-module').remove();
        $('div#GEST label#GEST-module-label').remove();
        $('div#GEST textarea#GEST-module-body').remove();
        $('div#GEST input#GESTFile').remove();
        $("select#sigep-required").val("");
        $(".text-module").val("");
        $('#sigep-required').removeAttr("required");
        $('div.system-pje').addClass('system-active');
        $('div.system-pje-version').addClass('system-active');
        $('div.system-pje-comment').addClass('system-active');
        $('div.system-sigep').removeClass('system-active');
        $('div.system-sigep-version').removeClass('system-active');
        $('div.perfil').removeClass('perfil-sigep');
        document.querySelector(".listing1").checked = 0;
        document.querySelector(".listing2").checked = 0;
        document.querySelector(".listing3").checked = 0;
        document.querySelector(".listing4").checked = 0;
        document.querySelector(".listing5").checked = 0;
    }
});

$(".input-group-sigep").change(function () {
    $(".message .alert-warning").remove();
    var check1 = document.querySelector(".listing1").checked;
    var check2 = document.querySelector(".listing2").checked;
    var check3 = document.querySelector(".listing3").checked;
    var check4 = document.querySelector(".listing4").checked;
    var check5 = document.querySelector(".listing5").checked;
    $("#botao").attr("disabled", false);
    if (!(check1 == 1 || check2 == 1 || check3 == 1 || check4 == 1 || check5 == 1)) {
        $(".message").append("<div class='alert alert-warning' role='alert'>Selecione pelo menos um modulo!</div>");
        $("#botao").attr("disabled", true);
    }
});


// PJE
// $(".form-check-PJE").change(function () {
//     if ($("#PJE-checkbox").prop("checked")) {
//         $('div#PJE').append('<label id="PJE-module-label" class="ms-2 mt-2">Versão</label>');
//         $('div#PJE').append('<input id="PJE-module" type="text" class="form-control m-2 text-module" name="PJE" placeholder="Ex.: 2.8" required>');
//         $('div#PJE').append('<label id="PJE-module-label" class="ms-2">Descrição</label>');
//         $('div#PJE').append('<textarea id="PJE-module-body" type="text" class="form-control m-2 text-module" name="PJE-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
//     } else {
//         $('div#PJE input#PJE-module').remove();
//         $('div#PJE label#PJE-module-label').remove();
//         $('div#PJE textarea#PJE-module-body').remove();
//     }
// });

$(".form-check-AUD").change(function () {
    if ($("#AUD-checkbox").prop("checked")) {
        $('div#AUD').append('<label id="AUD-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#AUD').append('<input id="AUD-module" type="text" class="form-control m-2 text-module" name="AUD" placeholder="Ex.: 2.8" required>');
        $('div#AUD').append('<label id="AUD-module-label" class="ms-2">Descrição</label>');
        $('div#AUD').append('<textarea id="AUD-module-body" type="text" class="form-control m-2 text-module" name="AUD-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#AUD').append('<input class="form-control m-2 w-50" name="AUDFile[]" type="file" id="AUDFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#AUD input#AUD-module').remove();
        $('div#AUD label#AUD-module-label').remove();
        $('div#AUD textarea#AUD-module-body').remove();
        $('div#AUD input#AUDFile').remove();
    }
});

$(".form-check-JTE").change(function () {
    if ($("#JTE-checkbox").prop("checked")) {
        $('div#JTE').append('<label id="JTE-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#JTE').append('<input id="JTE-module" type="text" class="form-control m-2 text-module" name="JTE" placeholder="Ex.: 2.8" required>');
        $('div#JTE').append('<label id="JTE-module-label" class="ms-2">Descrição</label>');
        $('div#JTE').append('<textarea id="JTE-module-body" type="text" class="form-control m-2 text-module" name="JTE-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#JTE').append('<input class="form-control m-2 w-50" name="JTEFile[]" type="file" id="JTEFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#JTE input#JTE-module').remove();
        $('div#JTE label#JTE-module-label').remove();
        $('div#JTE textarea#JTE-module-body').remove();
        $('div#JTE input#JTEFile').remove();
    }
});

$(".form-check-PjeCalc").change(function () {
    if ($("#PjeCalc-checkbox").prop("checked")) {
        $('div#PjeCalc').append('<label id="PjeCalc-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#PjeCalc').append('<input id="PjeCalc-module" type="text" class="form-control m-2 text-module" name="PjeCalc" placeholder="Ex.: 2.8" required>');
        $('div#PjeCalc').append('<label id="PjeCalc-module-label" class="ms-2">Descrição</label>');
        $('div#PjeCalc').append('<textarea id="PjeCalc-module-body" type="text" class="form-control m-2 text-module" name="PjeCalc-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#PjeCalc').append('<input class="form-control m-2 w-50" name="PjeCalcFile[]" type="file" id="PjeCalcFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple" />');
    } else {
        $('div#PjeCalc input#PjeCalc-module').remove();
        $('div#PjeCalc label#PjeCalc-module-label').remove();
        $('div#PjeCalc textarea#PjeCalc-module-body').remove();
        $('div#PjeCalc input#PjeCalcFile').remove();
    }
});

$(".form-check-SIF").change(function () {
    if ($("#SIF-checkbox").prop("checked")) {
        $('div#SIF').append('<label id="SIF-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIF').append('<input id="SIF-module" type="text" class="form-control m-2 text-module" name="SIF" placeholder="Ex.: 2.8" required>');
        $('div#SIF').append('<label id="SIF-module-label" class="ms-2">Descrição</label>');
        $('div#SIF').append('<textarea id="SIF-module-body" type="text" class="form-control m-2 text-module" name="SIF-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#SIF').append('<input class="form-control m-2 w-50" name="SIFFile[]" type="file" id="SIFFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple" />');
    } else {
        $('div#SIF input#SIF-module').remove();
        $('div#SIF label#SIF-module-label').remove();
        $('div#SIF textarea#SIF-module-body').remove();
        $('div#SIF input#SIFFile').remove();
    }
});

// SIGEP
$(".form-check-SIGEP-Modulo").change(function () {
    if ($("#SIGEP-Modulo-checkbox").prop("checked")) {
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGEP-Modulo').append('<input id="SIGEP-Modulo-module" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo" placeholder="Ex.: 2.8" required>');
        $('div#SIGEP-Modulo').append('<label id="SIGEP-Modulo-module-label" class="ms-2">Descrição</label>');
        $('div#SIGEP-Modulo').append('<textarea id="SIGEP-Modulo-module-body" type="text" class="form-control m-2 text-module" name="SIGEP-Modulo-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#SIGEP-Modulo').append('<input class="form-control m-2 w-50" name="SIGEP-ModuloFile[]" type="file" id="SIGEP-ModuloFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#SIGEP-Modulo input#SIGEP-Modulo-module').remove();
        $('div#SIGEP-Modulo label#SIGEP-Modulo-module-label').remove();
        $('div#SIGEP-Modulo textarea#SIGEP-Modulo-module-body').remove();
        $('div#SIGEP-Modulo input#SIGEP-ModuloFile').remove();
    }
});

$(".form-check-SIGEP-Online").change(function () {
    if ($("#SIGEP-Online-checkbox").prop("checked")) {
        $('div#SIGEP-Online').append('<label id="SIGEP-Online-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGEP-Online').append('<input id="SIGEP-Online-module" type="text" class="form-control m-2 text-module" name="SIGEP-Online" placeholder="Ex.: 2.8" required>');
        $('div#SIGEP-Online').append('<label id="SIGEP-Online-module-label" class="ms-2">Descrição</label>');
        $('div#SIGEP-Online').append('<textarea id="SIGEP-Online-module-body" type="text" class="form-control m-2 text-module" name="SIGEP-Online-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#SIGEP-Online').append('<input class="form-control m-2 w-50" name="SIGEP-OnlineFile[]" type="file" id="SIGEP-OnlineFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#SIGEP-Online input#SIGEP-Online-module').remove();
        $('div#SIGEP-Online label#SIGEP-Online-module-label').remove();
        $('div#SIGEP-Online textarea#SIGEP-Online-module-body').remove();
        $('div#SIGEP-Online input#SIGEP-OnlineFile').remove();
    }
});

$(".form-check-FolhaWeb").change(function () {
    if ($("#FolhaWeb-checkbox").prop("checked")) {
        $('div#FolhaWeb').append('<label id="FolhaWeb-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#FolhaWeb').append('<input id="FolhaWeb-module" type="text" class="form-control m-2 text-module" name="FolhaWeb" placeholder="Ex.: 2.8" required>');
        $('div#FolhaWeb').append('<label id="FolhaWeb-module-label" class="ms-2">Descrição</label>');
        $('div#FolhaWeb').append('<textarea id="FolhaWeb-module-body" type="text" class="form-control m-2 text-module" name="FolhaWeb-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#FolhaWeb').append('<input class="form-control m-2 w-50" name="FolhaWebFile[]" type="file" id="FolhaWebFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#FolhaWeb input#FolhaWeb-module').remove();
        $('div#FolhaWeb label#FolhaWeb-module-label').remove();
        $('div#FolhaWeb textarea#FolhaWeb-module-body').remove();
        $('div#FolhaWeb input#FolhaWebFile').remove();
    }
});

$(".form-check-SIGS").change(function () {
    if ($("#SIGS-checkbox").prop("checked")) {
        $('div#SIGS').append('<label id="SIGS-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#SIGS').append('<input id="SIGS-module" type="text" class="form-control m-2 text-module" name="SIGS" placeholder="Ex.: 2.8" required>');
        $('div#SIGS').append('<label id="SIGS-module-label" class="ms-2">Descrição</label>');
        $('div#SIGS').append('<textarea id="SIGS-module-body" type="text" class="form-control m-2 text-module" name="SIGS-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#SIGS').append('<input class="form-control m-2 w-50" name="SIGSFile[]" type="file" id="SIGSFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#SIGS input#SIGS-module').remove();
        $('div#SIGS label#SIGS-module-label').remove();
        $('div#SIGS textarea#SIGS-module-body').remove();
        $('div#SIGS input#SIGSFile').remove();
    }
});

$(".form-check-GEST").change(function () {
    if ($("#GEST-checkbox").prop("checked")) {
        $('div#GEST').append('<label id="GEST-module-label" class="ms-2 mt-2">Versão</label>');
        $('div#GEST').append('<input id="GEST-module" type="text" class="form-control m-2 text-module" name="GEST" placeholder="Ex.: 2.8" required>');
        $('div#GEST').append('<label id="GEST-module-label" class="ms-2">Descrição</label>');
        $('div#GEST').append('<textarea id="GEST-module-body" type="text" class="form-control m-2 text-module" name="GEST-body" placeholder="Adicione uma descrição para Issue" required></textarea>');
        $('div#GEST').append('<input class="form-control m-2 w-50" name="GESTFile[]" type="file" id="GESTFile" accept=".jpg, .jpeg, .png, .pdf" multiple="multiple"/>');
    } else {
        $('div#GEST input#GEST-module').remove();
        $('div#GEST label#GEST-module-label').remove();
        $('div#GEST textarea#GEST-module-body').remove();
        $('div#GEST input#GESTFile').remove();
    }
});
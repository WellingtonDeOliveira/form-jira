$("#system").each(function () {
    $('div.system-pje').addClass('system-active');
});
$("#system").change(function () {
    var change = $(this).val();
    if(change == 'SIGEP-JT'){
        $('div.system-pje').removeClass('system-active');
        $('div.system-sigep').addClass('system-active');
    }else{
        $('div.system-pje').addClass('system-active');
        $('div.system-sigep').removeClass('system-active');
    }
});
$(".listing").is(':checked');
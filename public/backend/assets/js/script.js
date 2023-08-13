$(function(){
    "use strict"
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $("#dataTbl").dataTable();

    $('.select2').select2({
        placeholder: 'Select',
        allowClear: true,
    });
});
setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);
var maxval = 3;
var options = "<option value=''>Select</option><option value='1'>KING</option><option value='2'>BOX-K</option>";
$(function(){
    "use strict"
    $(".nums, .counts").attr("maxlength", maxval);
    $(".sel").html(options);
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $(document).on('click', '.dlt', function(){
        $(this).parent().parent().remove();
    });

    $(".radOption").click(function(){
        if($(this).is(":checked")){
            maxval = $(this).val();
        }
        $(".dlt").parent().parent().remove();
        $(".nums, .counts").attr("maxlength", maxval);
        $(".nums, .counts, .sel").val("");
        if(maxval == 3){
            options = "<option value=''>Select</option><option value='1'>KING</option><option value='2'>BOX-K</option>";            
        }
        if(maxval == 2){
            options = "<option value=''>Select</option><option value='3'>AB</option><option value='4'>BC</option><option value='5'>AC</option>";
        }
        if(maxval == 1){
            options = "<option value=''>Select</option><option value='6'>A</option><option value='7'>B</option><option value='8'>C</option>";
        }
        $(".sel").html(options);
    });

    $(document).on("keypress", ".nums, .counts", function(evt){
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    });
    $(document).on("keyup", ".nums", function(evt){
        var len = $(this).val().length
        if(len == maxval){
            $(this).closest(".numPanel").find(".counts").focus();
        }            
    });
});

function addNumPanel(){
    $(".numPanel").last().after("<div class='row numPanel'><div class='col-5 mb-2'><input type='text' name='numbers[]' id='numbers[]' class='form-control form-control-md nums' placeholder='Number' maxlength="+maxval+" required /></div><div class='col-5 mb-2'><input type='text' name='counts[]' class='form-control form-control-md counts' placeholder='Count' maxlength='3' required /></div><div class='col-1'><a href='javascript:void(0)' class='dlt'>X</a></div></div>");
    $(".nums").last().focus();
}


setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);
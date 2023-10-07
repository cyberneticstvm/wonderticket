var maxval = 3;
var options = "<option value='1'>KING</option><option value='2'>BOX-K</option>";
$(function(){
    "use strict"

    addNumPanel();

    $(".nums, .counts").attr("maxlength", maxval);
    $(".sel").html(options);
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $(document).on('click', '.dlt', function(){
        $(this).parent().parent().remove();
        getTotal($(".sel").val())
    });

    $(".radOption").click(function(){
        if($(this).is(":checked")){
            maxval = $(this).val();
        }
        $(".dlt").parent().parent().remove();
        //$(".nums").attr("max", maxval);
        $(".nums, .counts, .sel").val("");
        if(maxval == 3){
            options = "<option value='1'>KING</option><option value='2'>BOX-K</option>";            
        }
        if(maxval == 2){
            options = "<option value='3'>AB</option><option value='4'>BC</option><option value='5'>AC</option>";
        }
        if(maxval == 1){
            options = "<option value='6'>A</option><option value='7'>B</option><option value='8'>C</option>";
        }
        $(".sel").html(options);
        addNumPanel();
        getTotal($(".sel").val());
    });

    /*$(document).on("keyup", ".nums, .counts", function(evt){
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
        if(isNaN($(this).val())){
            $(this).val("");
            return false;
        }
        return true;
    });*/
    $(document).on("keyup", ".nums", function(evt){
        var len = $(this).val().length
        if(len == maxval){
            $(this).closest(".numPanel").find(".counts").focus();
        }            
    });

    $(document).on("keyup", ".counts", function(){
        getTotal($(".sel").val());          
    });
    
    $(document).on("click", ".btnPlay, .menu-toggler", function(){
        $(".selPlay").val($(this).data("playid"));
        jQuery('.pwa-offcanvas').slideUp(500, function() {
            jQuery(this).removeClass('show');
        });
        setTimeout(function(){
            jQuery('.pwa-backdrop').removeClass('show');
        }, 100);
    })
});

function addNumPanel(){
    $(".numPanel").last().after("<div class='row numPanel'><div class='col-5 mb-2'><input type='number' name='numbers[]' id='numbers[]' class='form-control form-control-md nums' placeholder='Number' maxlength="+maxval+" required /></div><div class='col-5 mb-2'><input type='number' name='counts[]' min='1' max='999' step='1' class='form-control form-control-md counts' placeholder='Count' maxlength='3' required /></div><div class='col-1'><a href='javascript:void(0)' class='dlt'><i class='fa fa-trash'></i></a></div></div>");
    $(".nums").last().focus();
}


setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);

function counter(seconds){
    var timerId = setInterval(countdown, 1000);
    var timeLeft = seconds;
    var elem = document.getElementById('timeLeft');
    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
        } else {
            elem.innerHTML = "Time left for next play <span class='text-success fw-bold'>"+timeLeft + '</span> seconds';
            timeLeft--;
        }
    }
}

function getTotal(type){
    var count = 0; $(".totRs").html("");
    $(".counts").each(function(){
        count += parseInt($(this).val());
    });
    $.ajax({
        type: 'GET',
        url: '/user/item/price/get/'+type+'/'+count,
        dataType: 'json',
        success: function(res){
            $(".totRs").html(parseFloat(res.amount).toFixed(2));
        },
        error: function(err){
            console.log(err);
        }
    });
    $(".totCount").html(count);
}
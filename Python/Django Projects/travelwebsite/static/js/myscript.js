window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
        });
    }, 5000);


$(document).on('submit', '#contact_form',function(e){
    console.log($('#contact_form').val())
})
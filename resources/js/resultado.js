//MAS INFO
$(document).on("click", ".open-Info", function () {
     var Id = $(this).data('id');

    $.ajax({
        type:'POST',
        url:'comparador-mas_info.php',
        data: { varname: Id},
        success:function(response){
           $('.info-modal').html(response);
        }
    });
});

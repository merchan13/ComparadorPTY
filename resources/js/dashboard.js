$(document).on("click", ".open-Info", function () {
     var Id = $(this).data('id');
     $(".modal-body #id-producto").val( Id );

    //e.preventDefault();
    $.ajax({
        type:'POST',
        url:'compty-admin-producto_mas_info.php',
        data: { varname: Id},
        success:function(response){
           $('.modal-body').html(response);
           $(".modal-body #id-producto").val( 'pene' );
        }
    });
});

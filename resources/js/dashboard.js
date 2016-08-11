//MAS INFO
$(document).on("click", ".open-Info", function () {
     var Id = $(this).data('id');

    $.ajax({
        type:'POST',
        url:'compty-admin-producto_mas_info.php',
        data: { varname: Id},
        success:function(response){
           $('.info-modal').html(response);
        }
    });
});

//MODIFICAR
$(document).on("click", ".open-Modif", function () {
     var Id = $(this).data('id');

    $.ajax({
        type:'POST',
        url:'compty-admin-producto_modificar.php',
        data: { varname: Id},
        success:function(response){
            $('.form-modif').empty();
            $('.form-modif').html(response);
        }
    });
});

//ELIMINAR
$(document).on("click", ".open-Eliminar", function () {
     var Id = $(this).data('id');

    $.ajax({
        type:'POST',
        url:'compty-admin-producto_eliminar.php',
        data: { varname: Id},
        success:function(response){
           //$('.eliminar-modal').html(response);
        }
    });
});

//Radio button Marca
$(document).on("click", ".marca-tdc", function () {
    var selAnterior = document.getElementsByName("marca-selec");
    selAnterior[0].setAttribute("name","name");
    $(this).attr("name","marca-selec");
});

//Checkbox Beneficios
$(document).on("click", ".beneficio-tdc", function () {

    if ($(this).attr("name") == "benef-selec" ){
        $(this).attr("name","name");
    } else if ($(this).attr("name") == "name") {
        $(this).attr("name","benef-selec[]");
    }
});

//+ Requerimientos
$(document).on("click", ".agregar-mas-req", function () {

    var newdiv = document.createElement('div');
    newdiv.className = "contenedor-requisito";
    var inputs = $('.contenedor-requisito').length;
    newdiv.setAttribute("id", "contenedor"+inputs);
    newdiv.innerHTML = '<input type="text" class="form-control requisito" id="requisito" placeholder="Requsito para la solicitud del producto" value="" name="requisito[]" oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)" oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')" maxlength="300" required> <a href="#" style="display:inline"> <button type="button" title="Eliminar" class="btn btn-danger btn-fill glyphicon glyphicon-trash borrar-req" data-id="'+inputs+'" style="display:inline"></button></a>';
    document.getElementById("form-requisitos").appendChild(newdiv);
});

// Borrar Requerimiento
$(document).on("click", ".borrar-req", function () {

    var idBoton = $(this).data('id');
    var idChildDiv = "contenedor" + idBoton;
    var child = document.getElementById(idChildDiv);
    child.parentNode.removeChild(child);

});


//RANGES
//compty-admin-producto_modificar.php
//
//tasa interes
function outputUpdate2(vol) {
	document.querySelector('#volume2').value = vol;
}
//tasa mora
function outputUpdate3(vol) {
	document.querySelector('#volume3').value = vol;
}
//seguro vida
function outputUpdate4(vol) {
	document.querySelector('#volume4').value = vol;
}


function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview-foto').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imagen-tdc").change(function(){
    readURL(this);
});

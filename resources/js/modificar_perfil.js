function onBlurDeInputs(inputId) {
    var input = document.getElementById(inputId);

    var auxParaReq = inputId.split("_");
    var textoId = auxParaReq[0];

    if (textoId == "telefono-perfil") {
        regex = new RegExp("^[+ -.()0-9]+$");
    } else if (inputId == "paginaw-perfil") {
        regex = new RegExp("^(http\\:\\/\\/|https\\:\\/\\/)?([a-z0-9][a-z0-9\\-]*\\.)+[a-z0-9][a-z0-9\\-]*(\\/[a-z0-9][a-z0-9._\\-]*)*$");
    } else if (inputId == "correo-perfil") {
        regex = new RegExp("^([\\w-]+(?:\\.[\\w-]+)*)@((?:[\\w-]+\\.)*\\w[\\w-]{0,66})\\.([a-z]{2,6}(?:\\.[a-z]{2})?)$");
    }

    var resultado = regex.test(input.value);

    if (resultado == false && input.value != "") {
        input.style.borderColor = "red";
    }
    else if (resultado == false && input.value == "") {
        input.style.borderColor = "#ccc";
    }
    else {
        input.style.borderColor = "#00FF00"
    }

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

$("#imagen-perfilb").change(function(){
    readURL(this);
});

function onBlurDeInputs(inputId) {
    var input = document.getElementById(inputId);

    var auxParaReq = inputId.split("_");
    var textoId = auxParaReq[0];

    if (textoId == "username") {
        regex = new RegExp("^(?=.*[a-zA-Z]{1,})(?=.*[\\d]{0,})[a-zA-Z ]{1,20}(?!.*[<>'/;`%])$");
    } else if (inputId == "password") {
        regex = new RegExp("^((?=\\S*?[A-Z])(?=\\S*?[a-z])(?=\\S*?[0-9]).{6,})\\S$");
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

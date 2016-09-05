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

$(document).on("click", ".open-Info-Cred", function () {
     var Id = $(this).data('id');

    $.ajax({
        type:'POST',
        url:'comparador-mas_info_cred.php',
        data: { varname: Id},
        success:function(response){
           $('.info-modal').html(response);
        }
    });
});

$(document).on("click", ".open-Info-Save", function () {
     var Id = $(this).data('id');

    $.ajax({
        type:'POST',
        url:'comparador-mas_info_save.php',
        data: { varname: Id},
        success:function(response){
           $('.info-modal').html(response);
        }
    });
});


//Range Salario
function outputUpdate(vol) {
	document.querySelector('#volume').value = vol;
}

$(document).on("change", ".salariodinamico", function () {

    var rangesalario = document.getElementsByClassName('salariodinamico');
    var salario = rangesalario[0].value;

    $.ajax({
        type:'POST',
        url:'comparador_resultado_back.php',
        data: { varname: salario},
        success:function(response){
            $('.tabla-comparador').empty();
            $('.tabla-comparador').html(response);
        }
    });

});

$(document).on("change", ".salariodinamicosave", function () {

    var rangesalario = document.getElementsByClassName('salariodinamicosave');
    var salario = rangesalario[0].value;

    $.ajax({
        type:'POST',
        url:'comparador_resultado_back_save.php',
        data: { varname: salario},
        success:function(response){
            $('.tabla-comparador').empty();
            $('.tabla-comparador').html(response);
        }
    });

});

$(document).on("change", ".salariodinamicocred", function () {

    var rangesalario = document.getElementsByClassName('salariodinamicocred');
    var salario = rangesalario[0].value;

    $.ajax({
        type:'POST',
        url:'comparador_resultado_back_cred.php',
        data: { varname: salario},
        success:function(response){
            $('.tabla-comparador').empty();
            $('.tabla-comparador').html(response);
        }
    });

});

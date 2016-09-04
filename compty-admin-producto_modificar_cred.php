<?php

    session_start();
    //REVISAR!
    $idUser = $_SESSION['id'];
    $password = $_SESSION['password'];

    //Obtener datos y mandar a imprimir
    if (isset($_POST["varname"])){

        $id = $_POST["varname"];

        include ("conexion.php");

        $sql = "SELECT * FROM comparador_producto_cred WHERE producto_cred_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        //Atributos
        $id = $row["producto_cred_id"];
        $usuario = $row["usuario_admin_id"];
        $nombre = $row["producto_cred_nombre"];
        $descripcion = $row["producto_cred_descripcion"];
        $ingresoMin = $row["producto_cred_ingresomin"];
        $seguroVida = $row["producto_cred_segurovida"];
        $montodesde = $row["producto_cred_montodesde"];
        $montohasta = $row["producto_cred_montohasta"];
        $plazodesde = $row["producto_cred_plazodesde"];
        $plazohasta = $row["producto_cred_plazohasta"];
        $tasadesde = $row["producto_cred_tasadesde"];
        $tasahasta = $row["producto_cred_tasahasta"];

        $requisitos = getRequisitosProducto($id);

        imprimirModificar($id,$usuario,$nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,$plazodesde,
            $plazohasta,$tasadesde,$tasahasta,$requisitos);
    }

    //Requisitos del producto.
    function getRequisitosProducto($producto_id){

        include ("conexion.php");
        $sql = "SELECT * FROM comparador_requisito_cred WHERE producto_cred_id = '$producto_id'";
        $result = mysqli_query($mysqli, $sql);

        $requisitos = array();

        while($row = mysqli_fetch_array($result))
        {
            $requisitos[] = $row["requisito_cred_descripcion"];
        }

        return $requisitos;
    }

    //Imprimir ventana modal
    function imprimirModificar($id,$usuario,$nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,
        $plazodesde,$plazohasta,$tasadesde,$tasahasta,$requisitos){
        echo '
        <input type="hidden" name="lospollitosdicencred" value="'.$id.'">
        <input type="hidden" name="piopiopio" value="'.$usuario.'">

        <div class="row">
            <!--NOMBRE-->
            <div class="col-md-9">
                <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre-cred"
                        placeholder="Nombre del producto"
                        value="'.$nombre.'" name="nombre-cred"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        maxlength="80" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!--DESCRIPCION-->
            <div class="col-md-14">
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea rows="10" cols="400" type="text" class="form-control"
                        style="resize: none;"
                        id="descripcion-cred" placeholder="Descripción del producto"
                        name="descripcion-cred" oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        required>'.$descripcion.'
                    </textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <!--INGRESO MINIMO-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ingreso mínimo</label>
                    <input type="text" class="form-control" id="ingmin-cred"
                        placeholder="Ingreso mínimo para el crédito"
                        value="'.$ingresoMin.'" name="ingmin-cred"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        maxlength="10" required>
                </div>
            </div>

            <!--MONTO DESDE-->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Montos</label>
                    <input type="text" class="form-control" id="montodesde-cred"
                        placeholder="Desde"
                        value="'.$montodesde.'" name="montodesde-cred"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

                        maxlength="30" required>
                </div>
            </div>

            <!--MONTO HASTA-->
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" id="montohasta-cred"
                        placeholder="Hasta"
                        value="'.$montohasta.'" name="montohasta-cred"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

                        maxlength="30" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!--PLAZO DESDE-->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Plazos de pago (meses)</label>
                    <input type="text" class="form-control" id="plazodesde-cred"
                        placeholder="Desde"
                        value="'.$plazodesde.'" name="plazodesde-cred"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

                        maxlength="30" required>
                </div>
            </div>

            <!--PLAZO HASTA-->
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" id="plazohasta-cred"
                        placeholder="Hasta"
                        value="'.$plazohasta.'" name="plazohasta-cred"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

                        maxlength="30" required>
                </div>
            </div>

            <!--TEA DESDE-->
            <div class="col-md-3">
                <div class="form-group">
                    <label>TEA desde <label for="income-number">
                        <output for="income" id="volume2" style="display: inline">'.$tasadesde.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min =20 max="35" step ="0.01" value ="'.$tasadesde.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate2(value)"
                        class="range-pct" name="teadesde-cred">
                </div>
            </div>

            <!--TEA HASTA-->
            <div class="col-md-3">
                <div class="form-group">
                    <label>TEA hasta <label for="income-number">
                        <output for="income" id="volume3" style="display: inline">'.$tasahasta.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min =20 max="35" step ="0.01" value ="'.$tasahasta.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate3(value)"
                        class="range-pct" name="teahasta-cred">
                </div>
            </div>
        </div>

        <div class="row">
            <!--SEGURO DE VIDA-->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Seguro de Vida: <label for="income-number">
                        <output for="income" id="volume4" style="display: inline">'.$seguroVida.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min =0 max="10" step ="0.01" value ="'.$seguroVida.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate4(value)"
                        class="range-pct" name="segurovida-cred">
                </div>
            </div>
        </div>

        <div class="row">
            <!--REQUISITOS-->
            <div class="col-md-10" >
                <div class="form-group" id="form-requisitos">
                    <label>Requisitos</label>
                    <a href="#">
                        <button type="button" title="Agregar"
                            class="btn btn-primary btn-fill glyphicon glyphicon-plus agregar-mas-req">
                        </button>
                    </a>
                    ';

                    $nroRequisitos = count($requisitos);

                    for ($i = 0; $i<$nroRequisitos; $i++) {
                        echo '
                        <div class="contenedor-requisito" id="contenedor'.$i.'">
                            <input type="text" class="form-control requisito" id="requisito'.$i.'"
                                placeholder="Requisito para la solicitud del producto"
                                value="'.$requisitos[$i].'" name="requisito[]"
                                oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                                oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                                maxlength="300" required>
                            <a href="#" style="display:inline">
                                <button type="button" title="Eliminar"
                                    class="btn btn-danger btn-fill glyphicon glyphicon-trash borrar-req"
                                    data-id="'.$i.'" style="display:inline">
                                </button>
                            </a>
                        </div>
                        ';
                    }

                    echo'
                    </div>
                </div>
        </div>
        <div class="clearfix"></div>

        <!--BOTON AGREGAR-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-info btn-fill">
                        Modificar
                    </button>
                </div>
            </div>
        </div>
        ';
    }

    //Si hubo una modificacion, insertar e
    if (isset($_POST["nombre-cred"])){
        modificar_producto(
            $_POST["lospollitosdicencred"],
            $_POST["piopiopio"],
            $_POST["nombre-cred"],
            $_POST["descripcion-cred"],
            $_POST["ingmin-cred"],
            $_POST["segurovida-cred"],
            $_POST["montodesde-cred"],
            $_POST["montohasta-cred"],
            $_POST["plazodesde-cred"],
            $_POST["plazohasta-cred"],
            $_POST["teadesde-cred"],
            $_POST["teahasta-cred"],
            $_POST["requisito"]
            );
    }

    //Insertar en BD las modificaciones.
    function modificar_producto($id,$usuario,$nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,
        $plazodesde,$plazohasta,$tasadesde,$tasahasta,$requisitos){

        include ("conexion.php");

        $sql = "UPDATE comparador_producto_cred
                SET producto_cred_nombre = '$nombre',
                 producto_cred_descripcion = '$descripcion',
                 producto_cred_ingresomin = $ingresoMin,
                 producto_cred_segurovida = $seguroVida,
                 producto_cred_montodesde = $montodesde,
                 producto_cred_montohasta = $montohasta,
                 producto_cred_plazodesde = $plazodesde,
                 producto_cred_plazohasta = $plazohasta,
                 producto_cred_tasadesde = $tasadesde,
                 producto_cred_tasahasta = $tasahasta
                WHERE producto_cred_id = $id";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);

            //Eliminar requisitos
            eliminarRequisitos($id);

            //Agregar requisitos
            agregarRequisitos($id, $usuario, $requisitos);

            header("Location: compty-admin-user_dashboard_cred.php?id=$idUser&password=$password&update=666");
            exit;
        } else {
            //print_r(error_get_last());
            header("Location: compty-admin-user_dashboard_cred.php?id=$idUser&password=$password&update=999");
            exit;
        }

    }

    // Eliminar beneficios de un producto.
    function eliminarRequisitos($id){
        include("conexion.php");
        $sql = "DELETE FROM comparador_requisito_cred
                WHERE producto_cred_id = $id";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
        }
    }

    // Agregar requisitos a un producto.
    function agregarRequisitos($id, $usuario, $requisitos){
        include("conexion.php");
        foreach ($requisitos as $requisito) {
            $sql = "INSERT INTO comparador_requisito_cred (requisito_cred_descripcion, producto_cred_id, usuario_admin_id)
                    VALUES ('$requisito', $id, $usuario)";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
 ?>

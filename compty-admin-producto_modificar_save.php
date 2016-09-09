<?php

    session_start();
    //REVISAR!
    $idUser = $_SESSION['id'];
    $password = $_SESSION['password'];

    //Obtener datos y mandar a imprimir
    if (isset($_POST["varname"])){

        $id = $_POST["varname"];

        include ("conexion.php");

        $sql = "SELECT * FROM comparador_producto_save WHERE producto_save_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        //Atributos
        $id = $row["producto_save_id"];
        $usuario = $row["usuario_admin_id"];
        $nombre = $row["producto_save_nombre"];
        $descripcion = $row["producto_save_descripcion"];
        $ingresoMin = $row["producto_save_ingresomin"];
        $tipocuenta = $row["producto_save_tipocuenta"];
        $tasainteres = $row["producto_save_tasainteres"];
        $costo = $row["producto_save_costo"];

        $requisitos = getRequisitosProducto($id);

        imprimirModificar($id, $usuario, $nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo,$requisitos);
    }

    //Requisitos del producto.
    function getRequisitosProducto($producto_id){

        include ("conexion.php");
        $sql = "SELECT * FROM comparador_requisito_save WHERE producto_save_id = '$producto_id'";
        $result = mysqli_query($mysqli, $sql);

        $requisitos = array();

        while($row = mysqli_fetch_array($result))
        {
            $requisitos[] = $row["requisito_save_descripcion"];
        }

        return $requisitos;
    }

    //Imprimir ventana modal
    function imprimirModificar($id,$usuario,$nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo,$requisitos){
        echo '
        <input type="hidden" name="lospollitosdicensave" value="'.$id.'">
        <input type="hidden" name="piopiopio" value="'.$usuario.'">

        <div class="row">
            <!--NOMBRE-->
            <div class="col-md-9">
                <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre-save"
                        placeholder="Nombre del producto"
                        value="'.$nombre.'" name="nombre-save"
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
                        id="descripcion-save" placeholder="Descripción del producto"
                        name="descripcion-save" oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
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
                    <label>Monto de apertura</label>
                    <input type="text" class="form-control" id="ingmin-save"
                        placeholder="Monto para apertura de la cuenta"
                        value="'.$ingresoMin.'" name="ingmin-save"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        maxlength="10" required>
                </div>
            </div>

            <!--COSTO X MES-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Costos por mes</label>
                    <input type="text" class="form-control" id="costo-save"
                        placeholder="Cargos mensuales cobrados"
                        value="'.$costo.'" name="costo-save"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

                        maxlength="30" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!--TIPO CUENTA-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tipo de cuenta</label>
                    <input type="text" class="form-control" id="tipo-save"
                        placeholder="Tipo de cuenta de ahorros"
                        value="'.$tipocuenta.'" name="tipo-save"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        maxlength="80" required>
                </div>
            </div>

            <!--TASA DE INTERES-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tasa de Interés: <label for="income-number">
                        <output for="income" id="volume2" style="display: inline">'.$tasainteres.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min=0 max=5 step ="0.01" value ="'.$tasainteres.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate2(value)"
                        class="range-pct" name="tinteres-save">
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
    if (isset($_POST["nombre-save"])){
        modificar_producto(
            $_POST["lospollitosdicensave"],
            $_POST["piopiopio"],
            $_POST["nombre-save"],
            $_POST["descripcion-save"],
            $_POST["ingmin-save"],
            $_POST["tipo-save"],
            $_POST["tinteres-save"],
            $_POST["costo-save"],
            $_POST["requisito"]
            );
    }

    //Insertar en BD las modificaciones.
    function modificar_producto($id, $usuario, $nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo,
    $requisitos){

        include ("conexion.php");

        $sql = "UPDATE comparador_producto_save
                SET producto_save_nombre = '$nombre',
                 producto_save_descripcion = '$descripcion',
                 producto_save_ingresomin = $ingresoMin,
                 producto_save_tipocuenta = '$tipocuenta',
                 producto_save_tasainteres = $tasainteres,
                 producto_save_costo = $costo
                WHERE producto_save_id = $id";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);

            //Eliminar requisitos
            eliminarRequisitos($id);

            //Agregar requisitos
            agregarRequisitos($id, $usuario, $requisitos);

            header("Location: compty-admin-user_dashboard_save.php?id=$idUser&password=$password&update=666");
            exit;
        } else {
            header("Location: compty-admin-user_dashboard_save.php?id=$idUser&password=$password&update=999");
            exit;
        }

    }

    // Eliminar beneficios de un producto.
    function eliminarRequisitos($id){
        include("conexion.php");
        $sql = "DELETE FROM comparador_requisito_save
                WHERE producto_save_id = $id";

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
            $sql = "INSERT INTO comparador_requisito_save (requisito_save_descripcion, producto_save_id, usuario_admin_id)
                    VALUES ('$requisito', $id, $usuario)";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
 ?>

<?php

    //
    // Imprimir ventana de confirmacion
    // (al presionar el boton de eliminar)
    if (isset($_POST["varname"])){

        include ("conexion.php");

        $id = $_POST["varname"];
        $sql = "SELECT * FROM comparador_producto_tdc WHERE producto_tdc_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        //Atributos
        $id = $row["producto_tdc_id"];
        $usuario = $row["usuario_admin_id"];
        $nombre = $row["producto_tdc_nombre"];

        echo '
            <input type="hidden" name="lospollitosdicen" value="'.$id.'">
            <input type="hidden" name="piopiopio" value="'.$usuario.'">
            <p style="text-align:center">
                Está seguro que quiere eliminar <strong>'.$nombre.'</strong>?
                <br><br>
                Una vez confirmada ésta acción no se puede deshacer.
            <p>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-danger btn-fill eliminarbtn">
                            ELIMINAR
                        </button>
                    </div>
                </div>
            </div>
        ';

    }

    //* * *
    //Eliminar Producto
    //* * *
    if (isset($_POST["lospollitosdicen"])){

        $id = $_POST["lospollitosdicen"];
        $usuario = $_POST["piopiopio"];

        include("conexion.php");
        //Delete de la tabla Producto
        $sql = "DELETE FROM comparador_producto_tdc WHERE producto_tdc_id = $id";

        //Delete de la tabla NN de Beneficios
        $sql2 = "DELETE FROM comparador_producto_beneficio WHERE producto_tdc_id = $id";

        //Delete de la tabla de Requisito
        $sql3 = "DELETE FROM comparador_requisito_tdc WHERE producto_tdc_id = $id";

        if ($stmt = mysqli_prepare($mysqli, $sql2)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);

            if ($stmt = mysqli_prepare($mysqli, $sql3)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);

                if ($stmt = mysqli_prepare($mysqli, $sql)) {
                    mysqli_stmt_execute($stmt);
                    $error_sql = mysqli_stmt_error($stmt);
                    mysqli_stmt_close($stmt);

                    header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&delete=666");
                    exit;
                } else {
                    header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&delete=999");
                    exit;
                }
            }
        }
    }

 ?>

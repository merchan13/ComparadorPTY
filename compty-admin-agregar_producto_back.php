<?php

    //INSERTAR TDC
    if (isset($_POST["lospollitosdicen"])){
        $usuarioId = $_POST["lospollitosdicen"];
        $usuarioPass = $_POST["piopiopio"];
        $nombre = $_POST["nombre-tdc"];
        $descripcion = $_POST["descripcion-tdc"];
        $marca = $_POST["marca-tdc"];
        $beneficios = $_POST["beneficio-tdc"];
        $ingresoMin = $_POST["ingmin-tdc"];
        $cargosMes = $_POST["cargmens-tdc"];
        $tasaInteres = $_POST["tinteres-tdc"];
        $tasaMora = $_POST["tmora-tdc"];
        $seguroVida = $_POST["segurovida-tdc"];
        $requisitos = $_POST["requisito"];

        include("conexion.php");

        if(isset($_FILES['imagen-tdc'])){
            $imagenUrl = $_FILES['imagen-tdc']['name'];
            $imagenTemp = $_FILES['imagen-tdc']['tmp_name'];
            $imageType = $_FILES['imagen-tdc']['type'];

            if($imagenTemp){
                move_uploaded_file($imagenTemp, "resources/images/tdc/$imagenUrl");

                $sql = "INSERT INTO comparador_producto_tdc (usuario_admin_id, producto_tdc_nombre, producto_tdc_descripcion,
                        producto_tdc_ingresoMin, producto_tdc_tasaInteres, producto_tdc_cargosMes, producto_tdc_seguroVida,
                        producto_tdc_tasaMora, producto_tdc_imagenUrl, fk_marca_tdc_id)
                        VALUES ($usuarioId, '$nombre', '$descripcion', $ingresoMin, $tasaInteres, $cargosMes, $seguroVida,
                        $tasaMora, 'resources/images/tdc/$imagenUrl', $marca)";

                if ($stmt = mysqli_prepare($mysqli, $sql)) {
                    mysqli_stmt_execute($stmt);
                    $error_sql = mysqli_stmt_error($stmt);
                    mysqli_stmt_close($stmt);

                    $sql = "SELECT MAX(producto_tdc_id) FROM comparador_producto_tdc";
                    $result = mysqli_query($mysqli, $sql);
                    $row = mysqli_fetch_array($result);

                    $idNuevoProducto = $row["MAX(producto_tdc_id)"];

                    //Insertar requisitos
                    insertarRequisitos($idNuevoProducto, $usuarioId, $requisitos);

                    //Insertar beneficios
                    insertarBeneficios($idNuevoProducto, $usuarioId, $beneficios);

                    header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&add=666");
                    exit;
                } else {
                    header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&add=999");
                    exit;
                }
            } else {
                header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&add=999");
                exit;
            }
        }
    } elseif (isset($_POST["lospollitosdicensave"])) {

        $usuarioId = $_POST["lospollitosdicensave"];
        $usuarioPass = $_POST["piopiopio"];
        $nombre = $_POST["nombre-save"];
        $descripcion = $_POST["descripcion-save"];
        $ingresoMin = $_POST["ingmin-save"];
        $costo = $_POST["costo-save"];
        $tipo = $_POST["tipo-save"];
        $tasaInteres = $_POST["tinteres-save"];
        $requisitos = $_POST["requisito"];

        include("conexion.php");

        $sql = "INSERT INTO comparador_producto_save (usuario_admin_id, producto_save_nombre,
            producto_save_descripcion, producto_save_ingresomin, producto_save_tipocuenta, producto_save_tasainteres,
            producto_save_costo)
            VALUES ($usuarioId, '$nombre', '$descripcion', $ingresoMin, '$tipo', $tasaInteres, $costo)";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);

            $sql = "SELECT MAX(producto_save_id) FROM comparador_producto_save";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($result);

            $idNuevoProducto = $row["MAX(producto_save_id)"];

            //Insertar requisitos
            insertarRequisitosSave($idNuevoProducto, $usuarioId, $requisitos);

            header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&add=666");
            exit;
        } else {
            header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&add=999");
            exit;
        }
    } elseif (isset($_POST["lospollitosdicencred"])) {

    } else {
        //Do nothing
    }


    // Insertar requisitos TDC
    function insertarRequisitos($idNuevoProducto, $usuarioId, $requisitos){
        include("conexion.php");
        foreach ($requisitos as $requisito) {
            $sql = "INSERT INTO comparador_requisito_tdc (requisito_tdc_descripcion, producto_tdc_id, usuario_admin_id)
                    VALUES ('$requisito', $idNuevoProducto, $usuarioId)";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }

    // Insertar requisitos AHORROS
    function insertarRequisitosSave($idNuevoProducto, $usuarioId, $requisitos){
        include("conexion.php");
        foreach ($requisitos as $requisito) {
            $sql = "INSERT INTO comparador_requisito_save (requisito_save_descripcion, producto_save_id, usuario_admin_id)
                    VALUES ('$requisito', $idNuevoProducto, $usuarioId)";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }

    // Insertar requisitos CREDITO
    function insertarRequisitosCred($idNuevoProducto, $usuarioId, $requisitos){
        include("conexion.php");
        foreach ($requisitos as $requisito) {
            $sql = "INSERT INTO comparador_requisito_cred (requisito_cred_descripcion, producto_cred_id, usuario_admin_id)
                    VALUES ('$requisito', $idNuevoProducto, $usuarioId)";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }

    // Insertar beneficios TDC
    function insertarBeneficios($idNuevoProducto, $usuarioId, $beneficios){
        include("conexion.php");
        foreach ($beneficios as $beneficio) {

            $sql = "SELECT * FROM comparador_beneficio_tdc WHERE beneficio_tdc_nombre = '$beneficio'";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($result);

            $beneficioId = $row["beneficio_tdc_id"];

            $sql = "INSERT INTO comparador_producto_beneficio (producto_tdc_id, usuario_admin_id, beneficio_tdc_id)
                    VALUES ($idNuevoProducto, $usuarioId, $beneficioId)";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }

 ?>

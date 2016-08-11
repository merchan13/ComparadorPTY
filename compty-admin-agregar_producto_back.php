<?php

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
                        $tasaMora, '$imagenUrl', $marca)";

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
            } else {
                header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&delete=999");
                exit;
            }
        }
    }

 ?>

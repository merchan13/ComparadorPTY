<?php
    session_start();
    include ("conexion.php");

    $id = $_SESSION['id'];
    $password = $_SESSION['password'];

    $telefono = $_POST["telefono-perfil"];
    $pagina = $_POST["paginaw-perfil"];
    $correo = $_POST["correo-perfil"];

    if(isset($_FILES['imagen-perfil'])){
      $imagenUrl = $_FILES['imagen-perfil']['name'];
      $imagenTemp = $_FILES['imagen-perfil']['tmp_name'];
      $imageType = $_FILES['imagen-perfil']['type'];

      if($imagenTemp){
        move_uploaded_file($imagenTemp, "resources/images/$imagenUrl");

        $sql = "UPDATE comparador_usuario_admin
                SET usuario_admin_imagenUrl = 'resources/images/$imagenUrl'
                WHERE usuario_admin_id = $id;";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
        }
      }
    }

    $sql = "UPDATE comparador_usuario_admin
            SET usuario_admin_telefono = '$telefono',
             usuario_admin_pagina = '$pagina',
             usuario_admin_correo = '$correo'
            WHERE usuario_admin_id = $id;";

    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_execute($stmt);
        $error_sql = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);

        $_SESSION['logo'] = 'resources/images/'.$imagenUrl;

        header("Location: compty-admin-perfil_usuario.php?id=$id&password=$password&update=666");
        exit;
    } else {
        header("Location: compty-admin-perfil_usuario.php?id=$id&password=$password&update=999");
        exit;
    }
 ?>

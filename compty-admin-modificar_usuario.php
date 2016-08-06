<?php
    session_start();
    include ("conexion.php");

    $id = $_SESSION['id'];
    $password = $_SESSION['password'];

    $imagenUrl = $_POST["imagen-perfil"];
    $telefono = $_POST["telefono-perfil"];
    $pagina = $_POST["paginaw-perfil"];
    $correo = $_POST["correo-perfil"];

/*

    Agregar URL de foto - NO IMPLEMENTADO!

    $sql = "UPDATE comparador_usuario_admin
            SET usuario_admin_nombre = '$nombre',
             usuario_admin_password = '$password',
             usuario_admin_telefono = '$telefono',
             usuario_admin_pagina = '$pagina',
             usuario_admin_correo = '$correo',
             usuario_admin_imagenUrl = '$imagenUrl'
            WHERE usuario_admin_id = $id;";
*/

    $sql = "UPDATE comparador_usuario_admin
            SET usuario_admin_telefono = '$telefono',
                usuario_admin_pagina = '$pagina',
                usuario_admin_correo = '$correo'
            WHERE usuario_admin_id = $id;";

    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_execute($stmt);
        $error_sql = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        header("Location: compty-admin-user_dashboard.php?id=$id&password=$password");
        exit;
    } else {
        header("Location: compty-admin-perfil_usuario.php?id=$id&password=$password");
        exit;
    }
 ?>

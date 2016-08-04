<?php
    include ("conexion.php");

    $user = $_POST["username"];
    $pwd = $_POST["password"];

    $sql = "SELECT *
            FROM comparador_usuario_admin
            WHERE usuario_admin_nombre = '$user'
            AND usuario_admin_password = '$pwd'";

    $result = mysqli_query($mysqli, $sql);

    // Row count is different for different databases
    // Mysql currently returns the number of rows found
    // this could change in the future!!
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['user'] = $row['usuario_admin_nombre'];
        $_SESSION['password'] = $row['usuario_admin_password'];
        $_SESSION['id'] = $row['usuario_admin_id'];
        $_SESSION['logo'] = $row['usuario_admin_imagenUrl'];
        $_SESSION['logged'] = TRUE;
        header("Location: compty-admin-user_dashboard.php"); // Modify to go to the page you would like
        $_SESSION['unsuccess'] = false;
        $_SESSION['intento'] = 1;
        exit;
    }else{
        session_start();
        $_SESSION['unsuccess'] = TRUE;
        header("Location: compty-admin.php");
        exit;
    }
?>

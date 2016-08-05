<?php

    session_start();

    if(!$_SESSION['logged']){

		header("Location: compty-admin.php");
		exit;

	} else {

        include("conexion.php");

        $id = $_SESSION['id'];

        $sql = "SELECT * FROM comparador_usuario_admin WHERE usuario_admin_id = '$id'";
		$result = mysqli_query($mysqli, $sql);

		$row = mysqli_fetch_array($result);

        $nombre = $row["usuario_admin_nombre"];
        $telefono = $row["usuario_admin_telefono"];
        $pagina = $row["usuario_admin_pagina"];
        $correo = $row["usuario_admin_correo"];
        $imagenUrl = $row["usuario_admin_imagenUrl"];
	}

 ?>

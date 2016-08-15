<?php

    session_start();
    if (isset($_POST["nombres"])){
        $correo_usuario = $_SESSION["email"];
        $productos = $_SESSION["solicitar"];

        $nombres_form = $_POST["nombres"];
        $apellidos_form = $_POST["apellidos"];
        $telefono_form = $_POST["telefono"];
        $correo_form = $_POST["correo"];

        foreach ($productos as $producto) {
            $correo_banco = getCorreoBanco($producto);
            $nombre = getProducto($producto);
            enviarCorreo($correo_banco, $correo_usuario, $apellidos_form, $nombres_form, $telefono_form,
                $correo_form, $nombre);
        }

        header("Location: index.php");
        exit;
    }



    //
    //Correo del banco
    //
    function getCorreoBanco($producto){

        include ("conexion.php");

        $sql = "SELECT U.usuario_admin_correo
                FROM comparador_usuario_admin U, comparador_producto_tdc P
                WHERE U.usuario_admin_id = P.usuario_admin_id
                AND P.producto_tdc_id = $producto";

        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        $correo = $row["usuario_admin_correo"];

        return $correo;
    }



    //
    //Nombre del producto
    //
    function getProducto($producto){

        include ("conexion.php");

        $sql = "SELECT producto_tdc_nombre
                FROM comparador_producto_tdc
                WHERE producto_tdc_id = $producto";

        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        $nombre = $row["producto_tdc_nombre"];

        return $nombre;
    }



    //
    //Enviar correo al banco
    //
    function enviarCorreo($correo_banco, $correo_usuario, $apellidos_form, $nombres_form, $telefono_form,
        $correo_form, $producto){

        $to = $correo_banco;
        $subject = "Solicitud de TDC";

        $message = "
        <html>
        <head>
            <title>Solicitud de Tarjeta de Crédito:</title>
        </head>

        <body>
            <h3>Datos del solicitante</h3>
            <strong><p>Nombre:</p></strong>
            <p>".$apellidos_form." ".$nombres_form."</p><br>
            <strong><p>Teléfono de contacto:</p></strong>
            <p>".$telefono_form."</p><br>
            <strong><p>Correo electrónico:</p></strong>
            <p>".$correo_form."</p><br>
            <h4>Producto: <strong>".$producto."</strong></h4>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <comparadorpty@innovacion.com>' . "\r\n";
        //$headers .= 'Cc: '.$correo_usuario."\r\n";

        $enviado = mail($to,$subject,$message,$headers);
    }

 ?>

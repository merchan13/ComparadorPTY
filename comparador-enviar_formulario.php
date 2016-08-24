<?php

    session_start();
    if (isset($_POST["nombres"])){
        $correo_usuario = $_SESSION["email"];
        $productos = $_SESSION["solicitar"];

        $nombres_form = $_POST["nombres"];
        $apellidos_form = $_POST["apellidos"];
        $telefono_form = $_POST["telefono"];
        $correo_form = $_POST["correo"];

        $id_bancos = array("0");
        foreach ($productos as $producto) {
            $aux = explode("@",$producto);
            array_push($id_bancos, $aux[1]);
        }

        $bancos = array_unique($id_bancos);
        unset($bancos[0]);

        foreach ($bancos as $banco) {

            $productos_banco = array("0");

            foreach ($productos as $producto) {
                $aux = explode("@",$producto);
                if ($aux[1] == $banco){
                    array_push($productos_banco, getProducto($aux[0]));
                }
            }

            unset($productos_banco[0]);

            $correo_banco = getCorreoBanco($banco);

            $productos_string = "";
            foreach ($productos_banco as $producto) {
                $productos_string.= $producto;
            }

            enviarCorreo($correo_banco, $correo_usuario, $apellidos_form, $nombres_form, $telefono_form,
                $correo_form, $productos_string);
        }

        header("Location: index.php");
        exit;
    }



    //
    //Correo del banco
    //
    function getCorreoBanco($banco){

        include ("conexion.php");

        $sql = "SELECT usuario_admin_correo
                FROM comparador_usuario_admin
                WHERE usuario_admin_id = $banco";

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
        $correo_form, $productos_string){

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
            <h4>Productos: <strong>".$productos_string."</strong></h4>
        </body>
        </html>
        ";

        $message = wordwrap($message, 70, "\r\n");

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <comparadorpty@innovacion.com>' . "\r\n";
        //$headers .= 'Cc: '.$correo_usuario."\r\n";

        $enviado = mail($to,$subject,$message,$headers);
    }
 ?>

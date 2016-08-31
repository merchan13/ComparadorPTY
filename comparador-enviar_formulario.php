<?php

    session_start();
    if (isset($_POST["nombres"])){
        $correo_usuario = $_SESSION["email"];
        $productos = $_SESSION["solicitar"];

        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $edocivil = $_POST["edocivil"];
        $dependientes = $_POST["dependientes"];
        $nivelacademico = $_POST["nivelacademico"];
        $residencia = $_POST["residencia"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $celular = $_POST["celular"];
        $vivienda = $_POST["vivienda"];
        $ciudad = $_POST["ciudad"];
        $provincia = $_POST["provincia"];
        $distrito = $_POST["distrito"];
        $corregimiento = $_POST["corregimiento"];
        $barriada = $_POST["barriada"];
        $calleav = $_POST["calleav"];
        $edificio = $_POST["edificio"];
        $nrocasaapt = $_POST["nrocasaapt"];
        $familiarexpuesto = $_POST["familiarexpuesto"];

        $tipocontrato = $_POST["tipocontrato"];
        $profesion = $_POST["profesion"];
        $lugartrabajo = $_POST["lugartrabajo"];
        $ciudadtrabajo = $_POST["ciudad-trabajo"];
        $provinciatrabajo = $_POST["provincia-trabajo"];
        $distritotrabajo = $_POST["distrito-trabajo"];
        $corregimientotrabajo = $_POST["corregimiento-trabajo"];
        $barriadatrabajo = $_POST["barriada-trabajo"];
        $calleavtrabajo = $_POST["calleav-trabajo"];
        $edificiotrabajo = $_POST["edificio-trabajo"];
        $nrocasaapttrabajo = $_POST["nrocasaapt-trabajo"];
        $telefonooficina = $_POST["telefonooficina"];
        $salario = $_POST["salario"];

        $nombrereferencia = $_POST["nombre-referencia"];
        $parentescoreferencia = $_POST["parentesco-referencia"];
        $telefonoreferencia = $_POST["telefono-referencia"];
        $celularreferencia = $_POST["celular-referencia"];

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
                    $tipoProducto = $aux[2];
                    array_push($productos_banco, getProducto($aux[0],$tipoProducto));
                }
            }

            unset($productos_banco[0]);

            $correo_banco = getCorreoBanco($banco);

            $productos_string = "";
            foreach ($productos_banco as $producto) {
                $productos_string.= $producto."<br>";
            }

            $x = enviarCorreo($correo_banco, $correo_usuario, $productos_string, $nombres, $apellidos, $edocivil, $dependientes,
                    $nivelacademico, $residencia, $correo, $telefono, $celular, $vivienda, $ciudad, $provincia,
                    $distrito, $corregimiento, $barriada, $calleav, $edificio, $nrocasaapt, $familiarexpuesto,
                    $tipocontrato, $profesion, $lugartrabajo, $ciudadtrabajo, $provinciatrabajo, $distritotrabajo,
                    $corregimientotrabajo, $barriadatrabajo, $calleavtrabajo, $edificiotrabajo, $nrocasaapttrabajo,
                    $telefonooficina, $salario, $nombrereferencia, $parentescoreferencia, $telefonoreferencia,
                    $celularreferencia);
        }

        //print_r(error_get_last());

        if ($x == 1){
            header("Location: index.php?send=666");
            exit;
        } else{
            header("Location: index.php?send=999");
            exit;
        }
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
    function getProducto($producto, $tipo){

        include ("conexion.php");
        $nombre = "";

        if($tipo == 'tdc'){
            //TDC
            $sql = "SELECT producto_tdc_nombre FROM comparador_producto_tdc WHERE producto_tdc_id = $producto";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($result);
            $nombre = $row["producto_tdc_nombre"];
        }elseif ($tipo == 'save') {
            //AHORROS
            $sql = "SELECT producto_save_nombre FROM comparador_producto_save WHERE producto_save_id = $producto";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($result);
            $nombre = $row["producto_save_nombre"];
        } elseif ($tipo == 'cred') {
            //CREDITOS
            $sql = "SELECT producto_cred_nombre FROM comparador_producto_cred WHERE producto_cred_id = $producto";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($result);
            $nombre = $row["producto_cred_nombre"];
        }

        return $nombre;
    }

    //
    //Enviar correo al banco
    //
    function enviarCorreo($correo_banco, $correo_usuario, $productos_string, $nombres, $apellidos, $edocivil, $dependientes,
            $nivelacademico, $residencia, $correo, $telefono, $celular, $vivienda, $ciudad, $provincia,
            $distrito, $corregimiento, $barriada, $calleav, $edificio, $nrocasaapt, $familiarexpuesto,
            $tipocontrato, $profesion, $lugartrabajo, $ciudadtrabajo, $provinciatrabajo, $distritotrabajo,
            $corregimientotrabajo, $barriadatrabajo, $calleavtrabajo, $edificiotrabajo, $nrocasaapttrabajo,
            $telefonooficina, $salario, $nombrereferencia, $parentescoreferencia, $telefonoreferencia,
            $celularreferencia){

        $to = $correo_banco;
        $subject = "ComparadorPTY - Solicitud de producto";

        $message = "
        <html>
        <head>
            <title>Solicitud de Tarjeta de Crédito:</title>
        </head>

        <body>
            <h2>Solicitud de Producto</h2>
            <h3>Productos: <strong><br>".$productos_string."</strong></h3>

            <h3>Información básica</h3>
            <p><strong>Nombre: </strong>".$apellidos." ".$nombres."</p><br>

            <p><strong>Estado civil: </strong>".$edocivil."</p><br>

            <p><strong>Dependientes: </strong>".$dependientes."</p><br>

            <p><strong>Nivel académico: </strong>".$nivelacademico."</p><br>

            <p><strong>Reside en Panamá: </strong>".$residencia."</p><br>

            <p><strong>Correo electrónico: </strong>".$correo."</p><br>

            <p><strong>Teléfonos de contacto</strong></p>
            <p>Principal: ".$telefono."</p>
            <p>Celular: ".$celular."</p><br>

            <strong><p>Vivienda</p></strong>
            <p>".$vivienda."</p>
            <p>".$ciudad.", ".$provincia.", ".$distrito.", ".$corregimiento.", ".$barriada."</p>
            <p> Calle: ".$calleav.", Edificio: ".$edificio.", nro ".$nrocasaapt."</p><br>

            <strong><p>Algún familiar, allegado o yo mismo, es considerado persona políticamente expuesta</p></strong>
            <p>".$familiarexpuesto."</p><br>

            <hr>
            <h3>Información laboral</h3>
            <p>".$tipocontrato."</p>
            <p><strong>Profesion: </strong>".$profesion." - <strong>Lugar de trabajo:</strong> ".$lugartrabajo."</p>
            <p>".$ciudadtrabajo.", ".$provinciatrabajo.", ".$distritotrabajo.", ".$corregimientotrabajo.", ".$barriadatrabajo."</p>
            <p> Calle: ".$calleavtrabajo.", Edificio: ".$edificiotrabajo.", nro ".$nrocasaapttrabajo."</p><br>
            <p><strong>Teléfono de oficina: </strong>".$telefonooficina."</p>
            <p><strong>Salario: </strong>$".$salario."</p>

            <hr>
            <h4>Referencias personales</h4>
            <p>".$nombrereferencia." (".$parentescoreferencia.")</p>
            <p>Principal: ".$telefonoreferencia."</p>
            <p>Celular: ".$celularreferencia."</p><br>

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

        return $enviado;
    }
 ?>

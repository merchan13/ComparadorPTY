<?php

    session_start();
    $idUser = $_SESSION['id'];
    $password = $_SESSION['password'];

    // * * *
    //Obtener datos
    // * * *
    if (isset($_POST["varname"])){

        $id = $_POST["varname"];

        include ("conexion.php");

        $sql = "SELECT * FROM comparador_producto_tdc WHERE producto_tdc_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        //Atributos
        $id = $row["producto_tdc_id"];
        $nombre = $row["producto_tdc_nombre"];
        $descripcion = $row["producto_tdc_descripcion"];
        $ingresoMin = $row["producto_tdc_ingresoMin"];
        $tasaInteres = $row["producto_tdc_tasaInteres"];
        $cargosMes = $row["producto_tdc_cargosMes"];
        $seguroVida = $row["producto_tdc_seguroVida"];
        $tasaMora = $row["producto_tdc_tasaMora"];
        $imagenUrl = $row["producto_tdc_imagenUrl"];
        //Foreign Keys
        $marca_id = $row["fk_marca_tdc_id"];
        //[0]: nombre
        //[1]: imagenUrl
        $marca = getMarcaProducto($marca_id);
        //[...] beneficio1, beneficio2, ...
        $beneficios = getBeneficiosProducto($id);
        $requisitos = getRequisitosProducto($id);

        imprimirModificar($id, $nombre, $descripcion, $ingresoMin, $tasaInteres, $cargosMes, $seguroVida, $tasaMora,
            $imagenUrl, $marca, $beneficios, $requisitos);
    }

    //Marca de la TDC
    //Recibe el id de la marca.
    function getMarcaProducto($marca_id){

        include ("conexion.php");
        $sql = "SELECT * FROM comparador_marca_tdc WHERE marca_tdc_id = $marca_id";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($result);

        return array($row["marca_tdc_nombre"], $row["marca_tdc_imagenUrl"]);
    }

    //Beneficios de la TDC
    //Recibe el id del producto.
    function getBeneficiosProducto($producto_id){

        include ("conexion.php");
        $sql = "SELECT B.beneficio_tdc_nombre
                FROM comparador_beneficio_tdc B, comparador_producto_beneficio PB
                WHERE B.beneficio_tdc_id = PB.beneficio_tdc_id AND PB.producto_tdc_id = '$producto_id'";
        $result = mysqli_query($mysqli, $sql);

        $beneficios = array();

        while($row = mysqli_fetch_array($result))
        {
            $beneficios[] = $row["beneficio_tdc_nombre"];
        }

        return $beneficios;
    }

    //Requisitos de la TDC
    //Recibe el id del producto.
    function getRequisitosProducto($producto_id){

        include ("conexion.php");
        $sql = "SELECT *
            FROM comparador_requisito_tdc
            WHERE producto_tdc_id = '$producto_id'";
        $result = mysqli_query($mysqli, $sql);

        $requisitos = array();

        while($row = mysqli_fetch_array($result))
        {
            $requisitos[] = $row["requisito_tdc_descripcion"];
        }

        return $requisitos;
    }

    //* * *
    //Imprimir ventana modal
    //* * *
    function imprimirModificar($id, $nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,$imagenUrl,
        $marca,$beneficios,$requisitos){
        echo '
        <input type="hidden" name="lospollitosdicen" value="'.$id.'">

        <!--IMAGEN-->
        <div class="imagen-perfil" style="margin-left: 33%; margin-bottom: 5%;">
            <img src="'.$imagenUrl.'" alt=""
                style="width:300px; height: 200px;"/>
            <input type="file" name="imagen-tdc" value="">
        </div>

        <div class="row">
            <!--NOMBRE-->
            <div class="col-md-9">
                <div class="form-group" style="margin-left:35%;">
                    <label>Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre-tdc"
                        placeholder="Nombre del producto"
                        value="'.$nombre.'" name="nombre-tdc"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        maxlength="80" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!--DESCRIPCION-->
            <div class="col-md-14">
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea rows="10" cols="400" type="text" class="form-control"
                        style="resize: none;"
                        id="descripcion-tdc" placeholder="Página web de contacto del Banco"
                        name="descripcion-tdc" oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        required>'.$descripcion.'
                    </textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <!--MARCA-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Marca</label>
                    <ul>
                        <li>
                            <img src="resources/images/visa-icon.gif" alt=""
                            class="tdc-icon"/>
                            <input type="radio" class="marca-tdc" value="1"
                            ';
                            if ($marca[0] == "Visa"){
                                echo 'name="marca-selec" checked';
                            }else{
                                echo 'name="name"';
                            }  echo'>
                        </li>
                        <li>
                            <img src="resources/images/mastercard-icon.gif" alt=""
                            class="tdc-icon"/>
                            <input type="radio" class="marca-tdc" value="2"
                            ';
                            if ($marca[0] == "Mastercard"){
                                echo 'name="marca-selec" checked';
                            }else {
                                echo 'name="name"';
                            } echo'>
                        </li>
                    </ul>
                </div>
            </div>

            <!--BENEFICIOS-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Beneficios</label>
                    <ul>
                        <li>
                            Millas
                            <input type="checkbox" value="Millas" class="beneficio-tdc"
                            ';
                            if (in_array("Millas", $beneficios)){
                                echo 'name="benef-selec[]" checked';
                            }else {
                                echo 'name="name"';
                            } echo'>
                        </li>
                        <li>
                            Puntos
                            <input type="checkbox" value="Puntos" class="beneficio-tdc"
                            ';
                            if (in_array("Puntos", $beneficios)){
                                echo 'name="benef-selec[]" checked';
                            }else {
                                echo 'name="name"';
                            } echo'>
                        </li>
                        <li>
                            Descuentos
                            <input type="checkbox" value="Descuentos" class="beneficio-tdc"
                            ';
                            if (in_array("Descuentos", $beneficios)){
                                echo 'name="benef-selec[]" checked';
                            }else {
                                echo 'name="name"';
                            } echo'>
                        </li>
                        <li>
                            Reembolsos
                            <input type="checkbox" value="Reembolsos" class="beneficio-tdc"
                            ';
                            if (in_array("Reembolsos", $beneficios)){
                                echo 'name="benef-selec[]" checked';
                            }else {
                                echo 'name="name"';
                            } echo'>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <!--INGRESO MINIMO-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ingreso Mínimo</label>
                    <input type="text" class="form-control" id="ingmin-tdc"
                        placeholder="Página web de contacto del Banco"
                        value="'.$ingresoMin.'" name="ingmin-tdc"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                        maxlength="10" required>
                </div>
            </div>

            <!--CARGOS MENSUALES-->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cargos Mensuales</label>
                    <input type="text" class="form-control" id="cargmens-tdc"
                        placeholder="Correo de contacto del banco para los formularios"
                        value="'.$cargosMes.'" name="cargmens-tdc"
                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

                        maxlength="30" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!--TASA DE INTERES-->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tasa de Interés: <label for="income-number" style="">
                        <output for="income" id="volume" style="display: inline">'.$tasaInteres.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min =600 max="20000" step ="100" value ="'.$tasaInteres.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate(value)"
                        class="range-pct" name="tinteres-tdc">
                </div>
            </div>

            <!--TASA DE MORA-->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tasa de Mora: <label for="income-number" style="">
                        <output for="income" id="volume" style="display: inline">'.$tasaMora.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min =600 max="20000" step ="100" value ="'.$tasaMora.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate(value)"
                        class="range-pct" name="tmora-tdc">
                </div>
            </div>

            <!--SEGURO DE VIDA-->
            <div class="col-md-4">
                <div class="form-group">
                    <label>Seguro de Vida: <label for="income-number" style="">
                        <output for="income" id="volume" style="display: inline">'.$seguroVida.'</output>
                        %
                    </label></label>
                    <input type="range"  id="income" min =600 max="20000" step ="100" value ="'.$seguroVida.'"
                        onchange="prueba.value = income.value" oninput="outputUpdate(value)"
                        class="range-pct" name="segurovida-tdc">
                </div>
            </div>
        </div>

        <div class="row">
            <!--REQUISITOS-->
            <div class="col-md-10" >
                <div class="form-group">
                    <label>Requisitos</label>
                    ';

                    $nroRequisitos = count($requisitos);

                    for ($i = 0; $i<$nroRequisitos; $i++) {
                        echo '
                        <div class="requisito">
                            <input type="text" class="form-control requisito" id="requisito'.$i.'"
                                placeholder="Página web de contacto del Banco"
                                value="'.$requisitos[$i].'" name="requisito[]"
                                oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
                                oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

                                maxlength="80" required>
                            <a href="#" style="display:inline">
                                <button type="button" title="Más Info"
                                    title="Eliminar" class="btn btn-danger btn-fill glyphicon glyphicon-trash"
                                    data-id="'.$i.'" style="display:inline">
                                </button>
                            </a>
                        ';
                        if ($i == ($nroRequisitos-1)){
                            echo'
                            <a href="#">
                                <button type="button" title="Más Info"
                                    title="Agregar" class="btn btn-primary btn-fill glyphicon glyphicon-plus"
                                    data-id="'.$i.'">
                                </button>
                            </a>
                            ';
                        }
                        echo'
                        </div>
                        ';
                    }

                    echo'
                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-info btn-fill"
                        style="width: 300px; height: 50px; margin-left:70%;">
                        Modificar
                    </button>
                </div>
            </div>
        </div>
        ';
    }

    //Si hubo una modificacion, insertar en BD
    if (isset($_POST["nombre-tdc"])){
        modificar_producto(
            $_POST["lospollitosdicen"],
            $_FILES['imagen-tdc']['name'],
            $_FILES['imagen-tdc']['tmp_name'],
            $_FILES['imagen-tdc']['type'],
            $_POST["nombre-tdc"],
            $_POST["descripcion-tdc"],
            $_POST["marca-selec"],
            $_POST["benef-selec"],
            $_POST["ingmin-tdc"],
            $_POST["cargmens-tdc"],
            $_POST["tinteres-tdc"],
            $_POST["tmora-tdc"],
            $_POST["segurovida-tdc"],
            $_POST["requisito"]
            );
    }

    //* * *
    //Insertar en BD las modificaciones.
    //* * *
    function modificar_producto($id, $imagenUrl, $imagenTemp, $imageType, $nombre, $descripcion, $marca, $beneficios,
        $ingresoMin, $cargosMes, $tasaInteres, $tasaMora, $seguroVida, $requisitos){

        include ("conexion.php");

        if($imagenTemp){
            move_uploaded_file($imagenTemp, "resources/images/tdc/$imagenUrl");

            $sql = "UPDATE comparador_producto_tdc
                    SET producto_tdc_imagenUrl = 'resources/images/tdc/$imagenUrl'
                    WHERE producto_tdc_id = $id";

            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_execute($stmt);
                $error_sql = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }

        }

        $sql = "UPDATE comparador_producto_tdc
                SET producto_tdc_nombre = '$nombre',
                 producto_tdc_descripcion = '$descripcion',
                 producto_tdc_ingresoMin = $ingresoMin,
                 producto_tdc_tasaInteres = $tasaInteres,
                 producto_tdc_cargosMes = $cargosMes,
                 producto_tdc_seguroVida = $seguroVida,
                 producto_tdc_tasaMora = $tasaMora,
                 fk_marca_tdc_id = $marca
                WHERE producto_tdc_id = $id";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_execute($stmt);
            $error_sql = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);

            // !!!!
            //Para update de requisitos y beneficios, BORRAR todo registro asociado al id del producto tanto
            // en la NN como en la entidad debil y registrarlos de nuevo.
            // !!!!

            header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&update=666");
            exit;
        } else {
            header("Location: compty-admin-user_dashboard.php?id=$idUser&password=$password&update=999");
            exit;
        }

    }

 ?>

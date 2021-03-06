<?php
    session_start();
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
        $banco = getDuenoProducto($row["usuario_admin_id"]);

        imprimirMasInfo($nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,$imagenUrl,
            $marca,$beneficios,$requisitos,$banco);
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

    //Banco dueño del producto
    //Recibe el id del banco.
    function getDuenoProducto($banco_id){

        include ("conexion.php");
        $sql = "SELECT * FROM comparador_usuario_admin WHERE usuario_admin_id = $banco_id";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($result);

        return $row["usuario_admin_nombre"];
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

    //Imprimir en la ventana modal toda la info del producto
    //Recibe la informacion pertinente del producto.
    function imprimirMasInfo($nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,
        $imagenUrl,$marca,$beneficios,$requisitos,$banco){
        echo '
        <div class="info-img">
            <img src="'.$imagenUrl.'" alt="" />
        </div>
        <div class="info-descripcion">
            <h3><strong>'.$nombre.'</strong></h3>
            <p align="justify">
                '.$descripcion.'
            </p>
            <hr>
        </div>
        <div class="info-secundaria">
            <div class="info-fila1">
                <div class="info-fila1-elemento-line">
                    <div class="info-fila1-elemento">
                        <strong>Institución Bancaria:</strong>
                        <p>
                            '.$banco.'
                        </p>
                    </div>
                    <div class="info-fila1-elemento">
                        <strong>Marca:</strong>
                        <img src="'.$marca[1].'" alt="" />
                    </div>
                    <div class="info-fila1-elemento">
                        <strong>Ingreso Mínimo:</strong>
                        <p>
                            $'.$ingresoMin.'
                        </p>
                    </div>
                </div>
                <div class="info-fila1-elemento-line">
                    <div class="info-fila1-elemento">
                        <strong>Beneficios:</strong>
                        <ul>';
                        foreach ($beneficios as &$beneficio) {
                            switch ($beneficio) {
                                case 'Millas':
                                    echo '<li>'.$beneficio.'<i class="fa fa-plane" aria-hidden="true"></i></li>';
                                    break;
                                case 'Puntos':
                                    echo '<li>'.$beneficio.'<i class="fa fa-plus-circle" aria-hidden="true"></i></li>';
                                    break;
                                case 'Descuentos':
                                    echo '<li>'.$beneficio.'<i class="fa fa-tags" aria-hidden="true"></i></li>';
                                    break;
                                case 'Reembolsos':
                                    echo '<li>'.$beneficio.'<i class="fa fa-money" aria-hidden="true"></i></li>';
                                    break;
                                default:
                                    echo '<li>'.$beneficio.'<i class="fa fa-code" aria-hidden="true"></i></li>';
                                    break;
                            }
                        }

            echo '
                        </ul>
                    </div>
                </div>
            </div>
            <div class="info-fila2">
                <div class="info-fila2-elemento">
                    <strong>Tasa de Interés:</strong>
                    <p>
                        '.$tasaInteres.'%
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>Cargos Mensuales:</strong>
                    <p>
                        $'.$cargosMes.'
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>Seguro de Vida:</strong>
                    <p>
                        '.$seguroVida.'%
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>Tasa de Mora:</strong>
                    <p>
                        '.$tasaMora.'%
                    </p>
                </div>
            </div>
            <div class="info-requisitos">
                <strong>Requisitos:</strong>
                <ul>';

                foreach ($requisitos as $requisito) {
                    echo '
                    <li>
                        <p>
                        '.$requisito.'.
                        </p>
                    </li>
                    ';
                }

                echo'
                </ul>
            </div>
        </div>
        ';
    }

 ?>

<?php
    session_start();
    if (isset($_POST["varname"])){

        $id = $_POST["varname"];

        include ("conexion.php");

        $sql = "SELECT * FROM comparador_producto_save WHERE producto_save_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        //Atributos
        //Atributos
        $id = $row["producto_save_id"];
        $bancoId = $row["usuario_admin_id"];
        $nombre = $row["producto_save_nombre"];
        $descripcion = $row["producto_save_descripcion"];
        $ingresoMin = $row["producto_save_ingresomin"];
        $tipocuenta = $row["producto_save_tipocuenta"];
        $tasainteres = $row["producto_save_tasainteres"];
        $costo = $row["producto_save_costo"];
        $requisitos = getRequisitosProducto($id);

        $banco = getDuenoProducto($bancoId);

        imprimirMasInfo($nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo,$requisitos,$banco);
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

    function getRequisitosProducto($producto_id){

        include ("conexion.php");
        $sql = "SELECT * FROM comparador_requisito_save WHERE producto_save_id = '$producto_id'";
        $result = mysqli_query($mysqli, $sql);

        $requisitos = array();

        while($row = mysqli_fetch_array($result))
        {
            $requisitos[] = $row["requisito_save_descripcion"];
        }

        return $requisitos;
    }

    //Imprimir en la ventana modal toda la info del producto
    //Recibe la informacion pertinente del producto.
    function imprimirMasInfo($nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo,$requisitos,$banco){
        echo '
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
                        <strong>Monto de apertura:</strong>
                        <p>
                            $'.$ingresoMin.'
                        </p>
                    </div>
                </div>
            </div>
            <div class="info-fila2">
                <div class="info-fila2-elemento">
                    <strong>Tipo de cuenta:</strong>
                    <p>
                        '.$tipocuenta.'
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>Tasa de interes:</strong>
                    <p>
                        '.$tasainteres.'%
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>Costo por mes:</strong>
                    <p>
                        '.$costo.'%
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

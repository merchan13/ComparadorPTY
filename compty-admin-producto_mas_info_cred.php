<?php
    session_start();
    if (isset($_POST["varname"])){

        $id = $_POST["varname"];

        include ("conexion.php");

        $sql = "SELECT * FROM comparador_producto_cred WHERE producto_cred_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        $row = mysqli_fetch_array($result);

        //Atributos
        $id = $row["producto_cred_id"];
        $bancoId = $row["usuario_admin_id"];
        $nombre = $row["producto_cred_nombre"];
        $descripcion = $row["producto_cred_descripcion"];
        $ingresoMin = $row["producto_cred_ingresomin"];
        $seguroVida = $row["producto_cred_segurovida"];
        $montodesde = $row["producto_cred_montodesde"];
        $montohasta = $row["producto_cred_montohasta"];
        $plazodesde = $row["producto_cred_plazodesde"];
        $plazohasta = $row["producto_cred_plazohasta"];
        $tasadesde = $row["producto_cred_tasadesde"];
        $tasahasta = $row["producto_cred_tasahasta"];

        $requisitos = getRequisitosProducto($id);
        $banco = $_SESSION["user"];

        imprimirMasInfo($nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,$plazodesde,$plazohasta,
            $tasadesde,$tasahasta,$requisitos,$banco);
    }


    function getRequisitosProducto($producto_id){

        include ("conexion.php");
        $sql = "SELECT * FROM comparador_requisito_cred WHERE producto_cred_id = '$producto_id'";
        $result = mysqli_query($mysqli, $sql);

        $requisitos = array();

        while($row = mysqli_fetch_array($result))
        {
            $requisitos[] = $row["requisito_cred_descripcion"];
        }

        return $requisitos;
    }

    //Imprimir en la ventana modal toda la info del producto
    //Recibe la informacion pertinente del producto.
    function imprimirMasInfo($nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,$plazodesde,$plazohasta,
        $tasadesde,$tasahasta,$requisitos,$banco){
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
                        <strong>Ingreso Mínimo:</strong>
                        <p>
                            $'.$ingresoMin.'
                        </p>
                    </div>
                </div>
            </div>
            <div class="info-fila2">
                <div class="info-fila2-elemento">
                    <strong>Seguro de Vida:</strong>
                    <p>
                        '.$seguroVida.'%
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>Monto:</strong>
                    <p>
                        Desde: '.$montodesde.'
                    </p>
                    <p>
                        Hasta: '.$montohasta.'
                    </p>
                </div>
                <div class="info-fila2-elemento">
                    <strong>TEA x plazos:</strong>
                    <p>
                        '.$plazodesde.' a '.$plazohasta.' meses
                    </p>
                    <p>
                        Desde: '.$tasadesde.'%
                    </p>
                    <p>
                        Hasta: '.$tasahasta.'%
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

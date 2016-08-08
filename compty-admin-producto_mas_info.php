<?php
    //session_start();
    if (isset($_POST["varname"])){

        $id = $_POST["varname"];

        include ("conexion.php");

        $sql = "SELECT * FROM comparador_producto_tdc WHERE producto_tdc_id = '$id'";
        $result = mysqli_query($mysqli, $sql);

        while($row = mysqli_fetch_array($result))
        {
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

            echo $id."<hr>";
            echo $nombre."<hr>";
            echo $descripcion."<hr>";
            echo $ingresoMin."<hr>";
            echo $tasaInteres."<hr>";
            echo $cargosMes."<hr>";
            echo $seguroVida."<hr>";
            echo $tasaMora."<hr>";
            echo $imagenUrl."<hr>";
        }
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

?>

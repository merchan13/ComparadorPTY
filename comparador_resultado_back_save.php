<?php

    if (isset($_POST["varname"])){
?>

    <div class="comparator-result-table">
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                    <th>Banco</th>
                    <th>Producto</th>
                    <th>Costo por mes</th>
                    <th>Monto apertura</th>
                    <th>Mas Información</th>
                    <th>Solicitar</th>
                </thead>
                <tbody>
                    <?php
                        getInfoProductos($_POST["varname"]);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <button type="submit" class="btn btn-warning btn-fill pull-right"
        style="width: 120px; margin-right: 1%;">Solicitar</button>

<?php
    }

    //
	//Informacion de los Productos
	//
	function getInfoProductos($minimo){
		include ("conexion.php");

		$sql = "SELECT * FROM comparador_producto_save WHERE producto_save_ingresomin <= $minimo";
		$result = mysqli_query($mysqli, $sql);

		while($row = mysqli_fetch_array($result))
		{
			//Atributos
			$id = $row["producto_save_id"];
			$bancoId = $row["usuario_admin_id"];
			$nombre = $row["producto_save_nombre"];
			$descripcion = $row["producto_save_descripcion"];
			$ingresoMin = $row["producto_save_ingresomin"];
            $tipocuenta = $row["producto_save_tipocuenta"];
            $tasainteres = $row["producto_save_tasainteres"];
            $costo = $row["producto_save_costo"];

			$banco = getBanco($bancoId);

			//Imprimir tabla
			printInformacionProducto($id,$banco,$nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo);
		}

		mysqli_close($mysqli);

		return true;
	}

	//
	//Banco dueño del producto
	//Recibe el id del banco
	//
	function getBanco($bancoId){

		include ("conexion.php");
		$sql = "SELECT usuario_admin_imagenUrl, usuario_admin_telefono, usuario_admin_pagina
				FROM comparador_usuario_admin WHERE usuario_admin_id = $bancoId";
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_array($result);

		return array($row["usuario_admin_imagenUrl"], $row["usuario_admin_telefono"], $row["usuario_admin_pagina"], $bancoId);
	}


	//
	//Imprimir HTML
	//Recibe toda la informacion de la tarjeta
	//
	function printInformacionProducto($id,$banco,$nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo){
		echo'
		<tr>
			<!--BANCO-->
			<td>
				<div class="elemento-banco">
					<img src="'.$banco[0].'" alt="" class="imagen-banco" />
				</div>
			</td>

			<!--PRODUCTO-->
			<td>
				<div class="elemento-producto">
					<p>'.$nombre.'</p>
				</div>
			</td>

			<!--COSTO POR MES-->
			<td>
				<div class="elemento-segurovida">
					<p>$'.$costo.'</p>
				</div>
			</td>

			<!--MONTO APERTURA-->
			<td>
				<div class="elemento-montos">
					<p>$'.$ingresoMin.'</p>
				</div>
			</td>

			<!--MAS INFO-->
			<td>
				<div class="elemento-masinfo-padre">
					<p>'.$nombre.'</p>
					<img src="'.$banco[0].'" alt="" class="imagen-banco" />
					<p class="elemento-masinfo">'.$banco[1].'</p>
					<a href="'.$banco[2].'" target="_blank">
						<button type="button" title="Ir a sitio" id="prueba"
							class="btn btn-success btn-fill elemento-masinfo">
							Ir a sitio
						</button>
					</a>
					<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#infoModal"
						data-id="'.$id.'" class="btn btn-primary btn-fill open-Info-Save elemento-masinfo">
						Ver más
					</button>
				</div>
			</td>

			<!--CHECKBOX-->
			<td>
				<div class="elemento-check">
					<span class="label label-primary">
						Haz click! <input type="checkbox" name="solicitar[]" value="'.$id.'@'.$banco[3].'@save">
					</span>
					<span class="label label-primary responsive-span">
						Solicitar <input type="checkbox" name="solicitar[]" value="'.$id.'@'.$banco[3].'@save">
					</span>
				</div>
			</td>

		</tr>';
	}

?>

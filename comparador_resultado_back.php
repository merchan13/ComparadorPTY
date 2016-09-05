<?php

    if (isset($_POST["varname"])){
?>

     <div class="comparator-result-table">
         <div class="content table-responsive table-full-width">
             <table class="table table-hover">
                 <thead>
                     <th>Banco</th>
                     <th>Producto</th>
                     <th>Marca</th>
                     <th>Tasa</th>
                     <th>Cargos Mensuales</th>
                     <th>Beneficios</th>
                     <th>Mas Información</th>
                     <th>Solicitar</th>
                 </thead>
                 <tbody id="infomaciontabla">
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

		$sql = "SELECT * FROM comparador_producto_tdc WHERE producto_tdc_ingresoMin <= $minimo";
		$result = mysqli_query($mysqli, $sql);

		while($row = mysqli_fetch_array($result))
		{

			//Atributos
			$id = $row["producto_tdc_id"];
			$bancoId = $row["usuario_admin_id"];
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

			$banco = getBanco($bancoId);

			//Imprimir tabla
			printInformacionProducto($id,$banco,$nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,
				$tasaMora,$imagenUrl,$marca,$beneficios);
		}

		mysqli_close($mysqli);

		return true;
	}

	//
	//Marca de la TDC
	//Recibe el id de la marca.
	//
	function getMarcaProducto($marca_id){

		include ("conexion.php");
		$sql = "SELECT * FROM comparador_marca_tdc WHERE marca_tdc_id = $marca_id";
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_array($result);

		return array($row["marca_tdc_nombre"], $row["marca_tdc_imagenUrl"]);
	}


	//
	//Beneficios de la TDC
	//Recibe el id del producto.
	//
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
	function printInformacionProducto($id,$banco,$nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,
		$tasaMora,$imagenUrl,$marca,$beneficios){
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
					<img src="'.$imagenUrl.'" alt="" class="imagen-producto" />
				</div>
			</td>

			<!--MARCA-->
			<td>
				<div class="elemento-marca">
					<img src="'.$marca[1].'" alt="" class="imagen-marca"/>
				</div>
			</td>

			<!--TASA INTERES-->
			<td>
				<div class="elemento-tasa">
					'.$tasaInteres.'%
				</div>
			</td>

			<!-CARGOS MENSUALES-->
			<td>
				<div class="elemento-cargos">
					<i class="fa fa-usd" aria-hidden="true"></i>'.$cargosMes.'
				</div>
			</td>

			<!--BENEFICIOS-->
			<td>
				<div class="elemento-beneficios">
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
			echo'
					</ul>
				</div>
			</td>

			<!--MAS INFO-->
			<td>
				<div class="elemento-masinfo-padre">
					<p>'.$nombre.'</p>
					<img src="'.$banco[0].'" alt="" class="imagen-banco" />
					<img src="'.$imagenUrl.'" alt="" class="imagen-producto" />
					<p class="elemento-masinfo">'.$banco[1].'</p>
					<a href="'.$banco[2].'" target="_blank">
						<button type="button" title="Ir a sitio" id="prueba"
							class="btn btn-success btn-fill elemento-masinfo">
							Ir a sitio
						</button>
					</a>
					<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#infoModal"
						data-id="'.$id.'" class="btn btn-primary btn-fill open-Info elemento-masinfo">
						Ver más
					</button>
				</div>
			</td>

			<!--CHECKBOX-->
			<td>
				<div class="elemento-check">
					<span class="label label-primary">
						Haz click! <input type="checkbox" name="solicitar[]" value="'.$id.'@'.$banco[3].'@tdc">
					</span>
					<span class="label label-primary responsive-span">
						Solicitar <input type="checkbox" name="solicitar[]" value="'.$id.'@'.$banco[3].'@tdc">
					</span>
				</div>
			</td>

		</tr>';
	}

?>

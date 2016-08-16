<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Resultado</title>

		<!-- Bootstrap core CSS -->
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<!--/Styles-->

		<!--JavaScript-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="resources/js/resultado.js" type="text/javascript"></script>
		<script src="resources/js/fb.js" type="text/javascript"></script>
		<script src="resources/js/google.js" type="text/javascript"></script>
		<!--/JavaScript-->

	</head>
	<body>

		<div class="flex-container">
			<header>
				<a href="index.php"><img class="logo" src="resources/images/logo.png" alt=""/></a>
				<ul>
					<li><a href="#"><img src="resources/images/banesco-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/facebook-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/instagram-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/twitter-icon.jpg" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/snapchat-icon.png" alt="" /></a></li>
				</ul>
			</header>

			<!--MODAL MAS INFO-->
			<div id="infoModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

			    	<!-- Modal content-->
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			        		<h4 class="modal-title">Información detallada</h4>
			      		</div>
			      		<div class="modal-body info-modal" name="modal-body info">
							<!-- comparador-mas_info.php -->
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      		</div>
			    	</div>
			  	</div>
			</div>

			<div class="comparator-result">
                <div class="comparator-product-image-top">
                    <img src="resources/images/credit_card.png" alt=""/>
                </div>
				<form class="tabla-comparador" action="comparador_formulario.php" method="post">
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
								<tbody>
									<?php
										if (isset($_POST["income"])){
											getInfoProductos($_POST["income"]);
										} else if (isset($_GET["income"])){
											getInfoProductos($_GET["income"]);
										}
									?>
								</tbody>
							</table>
						</div>
	                </div>
					<button type="submit" class="btn btn-warning btn-fill pull-right"
						style="width: 120px; margin-right: 1%;">Solicitar</button>
				</form>
			</div>

			<footer>
				<p style="float: left;">© Javier Merchán - UCAB 2016</p>
				<p style="float: right;"><a href="#">Back to top</a></p>
			</footer>
		</div>
	</body>
</html>


<?php

	session_start();
	$_SESSION["email"] = $_POST["email"];

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

		return array($row["usuario_admin_imagenUrl"], $row["usuario_admin_telefono"], $row["usuario_admin_pagina"]);
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
					<p class="elemento-masinfo">'.$banco[1].'<p/>
					<a href="'.$banco[2].'" target="_blank" style="display:block">
						<button type="button" title="Ir a sitio" id="prueba"
							class="btn btn-success btn-fill elemento-masinfo">
							Ir a sitio
						</button>
					</a>
					<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#infoModal"
						data-id="'.$id.'" class="btn btn-primary btn-fill open-Info elemento-masinfo" style="display:block">
						Ver más
					</button>
				</div>
			</td>

			<!--CHECKBOX-->
			<td>
				<div class="elemento-check">
					<span class="label label-primary">
						Haz click! <input type="checkbox" name="solicitar[]" value="'.$id.'">
					</span>
				</div>
			</td>

		</tr>';
	}
 ?>

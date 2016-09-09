<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Resultado Creditos</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<link rel="stylesheet" type="text/css" href="resources/css/style_cred.css">
		<link rel="stylesheet" type="text/css" href="resources/css/resultado.css">
		<!--/Styles-->

		<!--JavaScript-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="resources/js/resultado.js" type="text/javascript"></script>
		<!--/JavaScript-->

	</head>
	<body>

		<div class="flex-container">
			<header>
				<a href="index.php"><img class="logo" src="resources/images/logo2.png" alt=""/></a>
				<ul>
					<li>
						<a href="https://banesco.com.pa/" target="_blank">
							<img src="resources/images/banesco-icon.png" alt="" />
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/BanescoPanama/?fref=ts" target="_blank">
							<img src="resources/images/facebook-icon.png" alt="" />
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/banescopanama/" target="_blank">
							<img src="resources/images/instagram-icon.png" alt="" />
						</a>
					</li>
					<li>
						<a href="https://twitter.com/BanescoPanama" target="_blank">
							<img src="resources/images/twitter-icon.jpg" alt="" />
						</a>
					</li>
					<li>
						<a href="#" target="_blank">
							<img src="resources/images/snapchat-icon.png" alt="" />
						</a>
					</li>
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
                    <img src="resources/images/credit.png" alt=""/>
                </div>

				<div class="form-group">
				  <label class="control-label col-sm-2" for="income" style="padding-top: 0;">Salario</label>
				  <div class="col-sm-4 range-input">
					<input type="range"  id="income" name="income" min =600 max="10000" step ="200"
						value = <?php echo $_POST["income"]; ?>
						onchange="prueba.value = income.value" oninput="outputUpdate(value)"
						class="salariodinamicocred">
				  </div>
				  <label class="label-blanco" for="income-number">
					  $
					  <output for="income" id="volume" style="display: inline">
						  <?php echo $_POST["income"]; ?>
					  </output>
				  </label>
				</div>

				<form class="tabla-comparador credit-table" action="comparador_formulario.php" method="post">
	                <div class="comparator-result-table">
						<div class="content table-responsive table-full-width">
							<table class="table table-hover">
								<thead>
									<th>Banco</th>
									<th>Producto</th>
									<th>Seguro de Vida</th>
									<th>Monto</th>
									<th>TEA por plazo</th>
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

		$sql = "SELECT * FROM comparador_producto_cred WHERE producto_cred_ingresomin <= $minimo";
		$result = mysqli_query($mysqli, $sql);

		while($row = mysqli_fetch_array($result))
		{
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

			$banco = getBanco($bancoId);

			//Imprimir tabla
			printInformacionProducto($id,$banco,$nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,
				$plazodesde,$plazohasta,$tasadesde,$tasahasta);
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
	function printInformacionProducto($id,$banco,$nombre,$descripcion,$ingresoMin,$seguroVida,$montodesde,$montohasta,
		$plazodesde,$plazohasta,$tasadesde,$tasahasta){
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

			<!--SEGURO VIDA-->
			<td>
				<div class="elemento-segurovida">
					<p>'.$seguroVida.'%</p>
				</div>
			</td>

			<!--MONTO-->
			<td>
				<div class="elemento-montos">
					<p>Desde: $'.$montodesde.'</p>
					<p>Hasta: $'.$montohasta.'</p>
				</div>
			</td>

			<!--TEA X PLAZOS-->
			<td>
				<div class="elemento-teaxplazos">
					<p>'.$plazodesde.' a '.$plazohasta.' meses</p>
					<p>Desde: '.$tasadesde.'%</p>
					<p>Hasta: '.$tasahasta.'%</p>
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
						data-id="'.$id.'" class="btn btn-primary btn-fill open-Info-Cred elemento-masinfo">
						Ver más
					</button>
				</div>
			</td>

			<!--CHECKBOX-->
			<td>
				<div class="elemento-check">
					<span class="label label-primary">
						Haz click! <input type="checkbox" name="solicitar[]" value="'.$id.'@'.$banco[3].'@cred">
					</span>
					<span class="label label-primary responsive-span">
						Solicitar <input type="checkbox" name="solicitar[]" value="'.$id.'@'.$banco[3].'@cred">
					</span>
				</div>
			</td>

		</tr>';
	}
 ?>

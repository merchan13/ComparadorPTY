<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="#">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ComparadorPty - Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="resources/css/dashboard.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS -->
    <link href="resources/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="resources/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />



</head>
<body>

<?php
	session_start();
	if(!$_SESSION['logged']){
    	header("Location: compty-admin.php");
    	exit;
	}
 ?>

<div class="wrapper">

    <?php include("compty-admin-sidebar.php"); ?>

    <div class="main-panel">

		<?php include("compty-admin-navbar.php"); ?>

		<!-- Modal Mas Info-->
		<div id="infoModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Tarjeta de Crédito</h4>
		      		</div>
		      		<div class="modal-body info-modal" name="modal-body info">
						<!-- compty-admin-producto_mas_info.php -->
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>

		<!-- Modal Modificar-->
		<div id="modifModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Modificar Tarjeta de Crédito</h4>
		      		</div>
		      		<div class="modal-body modificar-modal" name="modal-body modificar">
						<!-- compty-admin-producto_modificar.php -->
						<div class="content">
				            <div class="container-fluid">
				                <div class="row">
									<div class="col-md-14">
				                        <div class="card">
				                            <div class="content" style="">
												<form action="compty-admin-producto_modificar.php" method="post"
													enctype="multipart/form-data" class="form-modif">

												</form>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>

		<!-- Modal Eliminar-->
		<div id="elimModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Eliminar Tarjeta de Crédito</h4>
		      		</div>
		      		<div class="modal-body eliminar-modal" name="modal-body eliminarmodal">
						<!-- compty-admin-producto_eliminar.php -->
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>

		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Productos</h4>
                                <p class="category">Tarjetas de Créditos</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Producto</th>
                                    	<th>Marca</th>
                                    	<th>Tasa</th>
                                    	<th>Cargos X Mes</th>
                                    	<th>Beneficios</th>
										<th>Mas Información</th>
										<th>Acciones</th>
                                    </thead>
                                    <tbody>
										<?php getInfoProductosUsuario($id); //Hacer que tome el valor!?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                © Javier Merchán - UCAB 2016
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>

</body>

	<!--JavaScript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="resources/js/dashboard.js" type="text/javascript"></script>
	<!--/JavaScript-->

    <!--   Core JS Files   -->
    <script src="resources/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="resources/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="resources/assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="resources/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="resources/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="resources/assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="resources/assets/js/demo.js"></script>

</html>

<?php

	//Informacion de los Productos
	//Recibe el id del usuario dueño de los productos
	function getInfoProductosUsuario($usuario_id){

		include ("conexion.php");

		$sql = "SELECT * FROM comparador_producto_tdc WHERE usuario_admin_id = '$usuario_id'";
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

			//Imprimir tabla
			printInformacionProducto($id,$nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,
			$imagenUrl,$marca,$beneficios);
		}

		mysqli_close($mysqli);

		return true;
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


	//Imprimir HTML
	//Recibe toda la informacion de la tarjeta
	function printInformacionProducto($id,$nombre,$descripcion,$ingresoMin,$tasaInteres,$cargosMes,$seguroVida,$tasaMora,
	$imagenUrl,$marca,$beneficios){
		echo'
		<tr>
			<td>
				<p>'.$nombre.'</p>
				<img src="'.$imagenUrl.'"
					alt="" class="imagen-producto" />
			</td>
			<td><img src="'.$marca[1].'" alt="" /></td>
			<td>'.$tasaInteres.'%</td>
			<td>$'.$cargosMes.'</td>
			<td>
				<ul>';
					foreach ($beneficios as &$beneficio) {
						echo '<li>'.$beneficio.'</li>';
					}
		echo'
				</ul>
			</td>
			<td>
				<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#infoModal"
					data-id="'.$id.'"
					class="btn btn-info btn-block btn-fill open-Info">
					Ver más
				</button>
			</td>
			<td>
				<ul class="actions">
					<li>
						<a href="#">
							<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#modifModal"
								title="Modificar" class="btn btn-primary btn-fill glyphicon glyphicon-pencil open-Modif"
								data-id="'.$id.'"></button>
						</a>
					</li>
					<li>
						<a href="#">
							<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#elimModal"
								title="Eliminar" class="btn btn-danger btn-fill glyphicon glyphicon-trash open-Eliminar"
								data-id="'.$id.'"></button>
						</a>
					</li>
				</ul>
			</td>
		</tr>';
	}
 ?>

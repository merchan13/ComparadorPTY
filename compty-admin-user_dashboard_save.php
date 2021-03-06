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


    <!-- Animation library for notifications   -->
    <link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS -->
    <link href="resources/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	<link href="resources/css/dashboard_save.css" rel="stylesheet">

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

		<!-- Modal MAS INFO-->
		<div id="infoModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Ahorros</h4>
		      		</div>
		      		<div class="modal-body info-modal" name="modal-body info">
						<!-- compty-admin-producto_mas_info.php -->
		      		</div>
		      		<div class="modal-footer majinfo">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>

		<!-- Modal MODIFICAR-->
		<div id="modifModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Modificar producto Ahorro</h4>
		      		</div>
		      		<div class="modal-body modificar-modal" name="modal-body modificar">
						<!-- compty-admin-producto_modificar.php -->
						<div class="content">
				            <div class="container-fluid">
				                <div class="row">
									<div class="col-md-14">
				                        <div class="card">
				                            <div class="content" style="">
												<form action="compty-admin-producto_modificar_save.php" method="post"
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

		<!-- Modal ELIMINAR-->
		<div id="elimModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

		    	<!-- Modal content-->
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Eliminar producto Ahorro</h4>
		      		</div>
		      		<div class="modal-body eliminar-modal" name="modal-body eliminarmodal">
						<!-- compty-admin-producto_eliminar.php -->
						<div class="content">
				            <div class="container-fluid">
				                <div class="row">
									<div class="col-md-14">
				                        <div class="card">
				                            <div class="content" style="">
												<form action="compty-admin-producto_eliminar_save.php" method="post"
													enctype="multipart/form-data" class="form-eliminar">

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

		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Productos</h4>
                                <p class="category">Ahorros</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
										<th>Producto</th>
										<th>Costo por mes</th>
										<th>Monto apertura</th>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="resources/js/dashboard_save.js" type="text/javascript"></script>
	<!--/JavaScript-->

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

		$sql = "SELECT * FROM comparador_producto_save WHERE usuario_admin_id = $usuario_id";
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

			//Imprimir tabla
			printInformacionProducto($id,$nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo);
		}

		mysqli_close($mysqli);

		return true;
	}

	//Imprimir HTML
	//Recibe toda la informacion de la tarjeta
	function printInformacionProducto($id,$nombre,$descripcion,$ingresoMin,$tipocuenta,$tasainteres,$costo){
		echo'
		<tr>
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
					<button type="button" title="Más Info" id="prueba" data-toggle="modal" data-target="#infoModal"
						data-id="'.$id.'"
						class="btn btn-info btn-block btn-fill open-Info">
						Ver más
					</button>
				</div>
			</td>

			<!--ACCIONES-->
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

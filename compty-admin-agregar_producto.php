<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="#">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ComparadorPty - Agregar Producto</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
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

		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Agregar Nuevo Producto</h4>
                            </div>
                            <div class="content">
                                <form action="compty-admin-user_dashboard.php">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="tipo-producto">Producto:</label>
                                                <select class="form-control" id="tipo-producto">
                                                    <option>-Seleccione un tipo de producto-</option>
                                                    <option>Tarjeta de Crédito</option>
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <div class="tipo-marca" style="">
                                                    <ul>
                                                        <li>
                                                            <img src="resources/images/visa-icon.gif" alt="" />
                                                            <input type="radio" name="name" value="">
                                                        </li>
                                                        <li>
                                                            <img src="resources/images/mastercard-icon.gif" alt="" />
                                                            <input type="radio" name="name" value="">
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre del producto">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tasa</label>
                                                <input type="range" class="form-control"
													placeholder="Nombre del producto"
													 min ="800" max="100000" step ="100" value ="800">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cargos por mes</label>
                                                <input type="range" class="form-control"
													placeholder="Nombre del producto"
													 min ="800" max="100000" step ="100" value ="800">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Beneficios</label>
                                                <ul>
                                                    <li>
                                                        <label for="">Millas</label>
                                                        <input type="checkbox" name="name" value="">
                                                    </li>
                                                    <li>
                                                        <label for="">Puntos</label>
                                                        <input type="checkbox" name="name" value="">
                                                    </li>
                                                    <li>
                                                        <label for="">Descuento</label>
                                                        <input type="checkbox" name="name" value="">
                                                    </li>
                                                    <li>
                                                        <label for="">Reembolso</label>
                                                        <input type="checkbox" name="name" value="">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Agregar</button>
                                    <div class="clearfix"></div>
                                </form>
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

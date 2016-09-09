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
	<link href="resources/css/agregar_producto.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="resources/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	<link href="resources/css/agregar_producto.css" rel="stylesheet">

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

	$id = $_SESSION["id"];
	$password = $_SESSION["password"];
?>

<div class="wrapper">

	<?php include("compty-admin-sidebar.php"); ?>

    <div class="main-panel">

		<?php include("compty-admin-navbar.php"); ?>

		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Agregar Nuevo Producto Ahorros</h4>
                            </div>
                            <div class="content">
								<form action="compty-admin-agregar_producto_back.php" method="post"
									enctype="multipart/form-data" class="form-agregar">

							        <input type="hidden" name="lospollitosdicensave" value="<?php echo $id; ?>">
							        <input type="hidden" name="piopiopio" value="<?php echo $password; ?>">

							        <div class="row">
							            <!--NOMBRE-->
							            <div class="col-md-9">
							                <div class="form-group">
							                    <label>Nombre del Producto</label>
							                    <input type="text" class="form-control" id="nombre-save"
							                        placeholder="Nombre del producto"
							                        value="" name="nombre-save"
							                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                        maxlength="80" required>
							                </div>
							            </div>
							        </div>

							        <div class="row">
							            <!--DESCRIPCION-->
							            <div class="col-md-14">
							                <div class="form-group">
							                    <label>Descripción</label>
							                    <textarea rows="10" cols="400" type="text" class="form-control"
							                        style="resize: none;"
							                        id="descripcion-save" placeholder="Descripción del producto"
							                        name="descripcion-save" oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                        required></textarea>
							                </div>
							            </div>
							        </div>

							        <div class="row">
							            <!--INGRESO MINIMO-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Monto de apertura</label>
							                    <input type="text" class="form-control" id="ingmin-save"
							                        placeholder="Monto para apertura de la cuenta"
							                        value="" name="ingmin-save"
							                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                        maxlength="10" required>
							                </div>
							            </div>

							            <!--COSTO X MES-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Costos por mes</label>
							                    <input type="text" class="form-control" id="costo-save"
							                        placeholder="Cargos mensuales cobrados"
							                        value="" name="costo-save"
							                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

							                        maxlength="30" required>
							                </div>
							            </div>
							        </div>

							        <div class="row">
										<!--TIPO CUENTA-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Tipo de cuenta</label>
							                    <input type="text" class="form-control" id="tipo-save"
							                        placeholder="Tipo de cuenta de ahorros"
							                        value="" name="tipo-save"
							                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                        maxlength="80" required>
							                </div>
							            </div>

							            <!--TASA DE INTERES-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Tasa de Interés: <label for="income-number">
							                        <output for="income" id="volume2" style="display: inline">0</output>
							                        %
							                    </label></label>
							                    <input type="range"  id="income" min=0 max=5 step ="0.01" value ="0"
							                        onchange="prueba.value = income.value" oninput="outputUpdate2(value)"
							                        class="range-pct" name="tinteres-save">
							                </div>
							            </div>
							        </div>

							        <div class="row">
							            <!--REQUISITOS-->
							            <div class="col-md-10" >
							                <div class="form-group" id="form-requisitos">
							                    <label>Requisitos</label>
							                    <a href="#">
							                        <button type="button" title="Agregar"
							                            class="btn btn-primary btn-fill glyphicon glyphicon-plus agregar-mas-req">
							                        </button>
							                    </a>
							                        <div class="contenedor-requisito" id="contenedor0">
							                            <input type="text" class="form-control requisito" id="requisito0"
							                                placeholder="Requisito para la solicitud del producto"
							                                value="" name="requisito[]"
							                                oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                                oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                                maxlength="300" required>
							                            <a href="#" style="display:inline">
							                                <button type="button" title="Eliminar"
							                                    class="btn btn-danger btn-fill glyphicon glyphicon-trash borrar-req"
							                                    data-id="0" style="display:inline">
							                                </button>
							                            </a>
							                        </div>
							                    </div>
							                </div>
							        </div>
									<div class="clearfix"></div>

									<!--BOTON AGREGAR-->
							        <div class="row">
							            <div class="col-md-6">
							                <div class="form-group">
							                    <br>
							                    <button type="submit" class="btn btn-info btn-fill">
							                        Agregar
							                    </button>
							                </div>
							            </div>
							        </div>

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

	<!--JavaScript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="resources/js/agregar_producto.js" type="text/javascript"></script>
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

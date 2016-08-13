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
                                <h4 class="title">Agregar Nuevo Producto</h4>
                            </div>
                            <div class="content">
								<form action="compty-admin-agregar_producto_back.php" method="post"
									enctype="multipart/form-data" class="form-agregar">

							        <input type="hidden" name="lospollitosdicen" value="<?php echo $id; ?>">
							        <input type="hidden" name="piopiopio" value="<?php echo $password; ?>">

							        <!--IMAGEN-->
							        <div class="imagen-perfil" style="margin-left: 33%; margin-bottom: 5%;">
							            <img src="" alt=""
							                style="width:300px; height: 200px;"/>
							            <input type="file" name="imagen-tdc" value="">
							        </div>

							        <div class="row">
							            <!--NOMBRE-->
							            <div class="col-md-9">
							                <div class="form-group" style="margin-left:35%;">
							                    <label>Nombre del Producto</label>
							                    <input type="text" class="form-control" id="nombre-tdc"
							                        placeholder="Nombre del producto"
							                        value="" name="nombre-tdc"
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
							                        id="descripcion-tdc" placeholder="Descripción del producto"
							                        name="descripcion-tdc" oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                        required></textarea>
							                </div>
							            </div>
							        </div>

							        <div class="row">
							            <!--MARCA-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Marca</label>
							                    <ul>
							                        <li>
							                            <img src="resources/images/visa-icon.gif" alt=""
							                            class="tdc-icon"/>
							                            <input type="radio" class="marca-tdc" value="1" name="marca-tdc">
							                        </li>
							                        <li>
							                            <img src="resources/images/mastercard-icon.gif" alt=""
							                            class="tdc-icon"/>
							                            <input type="radio" class="marca-tdc" value="2" name="marca-tdc">
							                        </li>
							                    </ul>
							                </div>
							            </div>

							            <!--BENEFICIOS-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Beneficios</label>
							                    <ul>
							                        <li>
							                            Millas <i class="fa fa-plane" aria-hidden="true"></i>
							                            <input type="checkbox" value="Millas"
															class="beneficio-tdc" name="beneficio-tdc[]">
							                        </li>
							                        <li>
							                            Puntos <i class="fa fa-plus-circle" aria-hidden="true"></i>
							                            <input type="checkbox" value="Puntos"
															class="beneficio-tdc" name="beneficio-tdc[]">
							                        </li>
							                        <li>
							                            Descuentos <i class="fa fa-tags" aria-hidden="true"></i>
							                            <input type="checkbox" value="Descuentos"
															class="beneficio-tdc" name="beneficio-tdc[]">
							                        </li>
							                        <li>
							                            Reembolsos <i class="fa fa-money" aria-hidden="true"></i>
							                            <input type="checkbox" value="Reembolsos"
															class="beneficio-tdc" name="beneficio-tdc[]">
							                        </li>
							                    </ul>
							                </div>
							            </div>
							        </div>

							        <div class="row">
							            <!--INGRESO MINIMO-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Ingreso Mínimo</label>
							                    <input type="text" class="form-control" id="ingmin-tdc"
							                        placeholder="Ingreso mínimo o salario mínimo"
							                        value="" name="ingmin-tdc"
							                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com\')"

							                        maxlength="10" required>
							                </div>
							            </div>

							            <!--CARGOS MENSUALES-->
							            <div class="col-md-6">
							                <div class="form-group">
							                    <label>Cargos Mensuales</label>
							                    <input type="text" class="form-control" id="cargmens-tdc"
							                        placeholder="Cargos mensuales cobrados"
							                        value="" name="cargmens-tdc"
							                        oninput="setCustomValidity(\'\')" onblur="onBlurDeInputs(this.id)"
							                        oninvalid="setCustomValidity(\'Debe introducir un correo válido.\nEj: ejemplo@dominio.com\')"

							                        maxlength="30" required>
							                </div>
							            </div>
							        </div>

							        <div class="row">
							            <!--TASA DE INTERES-->
							            <div class="col-md-4">
							                <div class="form-group">
							                    <label>Tasa de Interés: <label for="income-number" style="">
							                        <output for="income" id="volume" style="display: inline">0,00</output>
							                        %
							                    </label></label>
							                    <input type="range"  id="income" min =600 max="20000" step ="100" value ="0"
							                        onchange="prueba.value = income.value" oninput="outputUpdate(value)"
							                        class="range-pct" name="tinteres-tdc">
							                </div>
							            </div>

							            <!--TASA DE MORA-->
							            <div class="col-md-4">
							                <div class="form-group">
							                    <label>Tasa de Mora: <label for="income-number" style="">
							                        <output for="income" id="volume" style="display: inline">0,00</output>
							                        %
							                    </label></label>
							                    <input type="range"  id="income" min =600 max="20000" step ="100" value ="0"
							                        onchange="prueba.value = income.value" oninput="outputUpdate(value)"
							                        class="range-pct" name="tmora-tdc">
							                </div>
							            </div>

							            <!--SEGURO DE VIDA-->
							            <div class="col-md-4">
							                <div class="form-group">
							                    <label>Seguro de Vida: <label for="income-number" style="">
							                        <output for="income" id="volume" style="display: inline">0,00</output>
							                        %
							                    </label></label>
							                    <input type="range"  id="income" min =600 max="20000" step ="100" value ="0"
							                        onchange="prueba.value = income.value" oninput="outputUpdate(value)"
							                        class="range-pct" name="segurovida-tdc">
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
							                    <button type="submit" class="btn btn-info btn-fill"
							                        style="width: 300px; height: 50px; margin-left:70%;">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="resources/js/agregar_producto.js" type="text/javascript"></script>
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

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="#">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ComparadorPty - Perfil Usuario</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

    <!-- Animation library for notifications   -->
    <link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="resources/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="resources/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	<!--JavaScript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="resources/js/modificar_perfil.js" type="text/javascript"></script>
	<!--/JavaScript-->

</head>
<body>

<?php
	session_start();
	if(!$_SESSION['logged']){
		header("Location: compty-admin.php");
		exit;
	} else{
		$_SESSION['id'] = $_GET["id"];
		$_SESSION['password'] = $_GET["password"];
	}
?>

<div class="wrapper">

    <?php include("compty-admin-sidebar.php"); ?>

    <div class="main-panel">

		<?php include("compty-admin-navbar.php"); ?>
		<?php include("compty-admin-consultar_usuario.php"); ?>

		<div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
                        <div class="card">
                            <div class="content" style="">
								<form action="compty-admin-modificar_usuario.php" method="post"
									enctype="multipart/form-data">

									<?php
										if (isset($_GET['update'])){
											if ($_GET['update'] == 666){

												echo'
												<div class="login-alert-error">
													<div  class="alert alert-success fade in">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Éxito!</strong>
														 Perfil modificado exitosamente!
													</div>
												</div>
												';
											} else if ($_GET['update'] == 999) {
												echo'
												<div class="login-alert-error">
													<div  class="alert alert-danger fade in">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Error!</strong>
														 Ocurrió un error en el proceso, por favor intente de nuevo.
													</div>
												</div>
												';
											}
										}
									?>

									<!--LOGO-->
									<div class="imagen-perfil" style="margin-left: 33%; margin-bottom: 5%;">
										<img src="<?php echo $imagenUrl; ?>" alt=""
											style="max-width:200px; max-height: 200px;"/>
										<input type="file" name="imagen-perfil" value="">
									</div>
									<div class="row">

										<!--NOMBRE-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Nombre del Banco</label>
												<input type="text" class="form-control" placeholder="Nombre del producto"
													value="<?php echo $nombre; ?>"
													disabled="TRUE" name="nombre-perfil">
											</div>
										</div>

										<!--TELÉFONO-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Teléfono de Contacto</label>
												<input type="text" class="form-control" id="telefono-perfil"
													placeholder="Teléfono de contacto del Banco"
													value="<?php echo $telefono; ?>" name="telefono-perfil"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>
									</div>
									<div class="row">

										<!--PÁGINA WEB-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Página de Contacto</label>
												<input type="text" class="form-control" id="paginaw-perfil"
													placeholder="Página web de contacto del Banco"
													value="<?php echo $pagina; ?>" name="paginaw-perfil"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe introducir una dirección de portal web válido.\nEj: https://tupaginaweb.com')"
													pattern="^(http\:\/\/|https\:\/\/)?([a-z0-9][a-z0-9\-]*\.)+[a-z0-9][a-z0-9\-]*(\/[a-z0-9][a-z0-9._\-]*)*$"
													maxlength="80" required>
											</div>
										</div>

										<!--CORREO-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Correo de Contacto</label>
												<input type="text" class="form-control" id="correo-perfil"
													placeholder="Correo de contacto del banco para los formularios"
													value="<?php echo $correo; ?>" name="correo-perfil"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe introducir un correo válido.\nEj: ejemplo@dominio.com')"
													pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"
													maxlength="30" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<br>
												<button type="submit" class="btn btn-info btn-fill"
													style="width: 200px; margin-left:70%; margin-top: -10%;">
													Guardar
												</button>
											</div>
										</div>
									</div>

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

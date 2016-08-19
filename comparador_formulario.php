<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Resultado</title>

		<!-- Bootstrap core CSS     -->
	    <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<!--/Styles-->

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
		<!--/JavaScript-->

	</head>
	<body>
		<div class="flex-container">
			<header>
				<a href="index.php"><img class="logo" src="resources/images/logo2.png" alt=""/></a>
				<ul>
					<li><a href="#"><img src="resources/images/banesco-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/facebook-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/instagram-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/twitter-icon.jpg" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/snapchat-icon.png" alt="" /></a></li>
				</ul>
			</header>

			<div class="comparator-result">
				<div class="comparator-product-image-top">
                    <img src="resources/images/credit_card.png" alt=""/>
                </div>
			</div>

			<div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
                        <div class="card">
                            <div class="content" style="">
								<form action="comparador-enviar_formulario.php" method="post"
									enctype="multipart/form-data">

									<div class="row">

										<!--NOMBRE(S)-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Nombre(s)</label>
												<input type="text" class="form-control" placeholder="Introduzca su nombre"
													value="" name="nombres">
											</div>
										</div>

										<!--APELLIDOS-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Apellidos</label>
												<input type="text" class="form-control" placeholder="Introduzca sus apellidos"
													value="" name="apellidos">
											</div>
										</div>

									</div>
									<div class="row">

										<!--TELÉFONO-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Teléfono de Contacto</label>
												<input type="text" class="form-control" id="telefono-perfil"
													placeholder="Teléfono de contacto"
													value="" name="telefono"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>

										<!--CORREO-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Correo de Contacto</label>
												<input type="text" class="form-control" id="correo-perfil"
													placeholder="Correo electrónico de contacto"
													value="" name="correo"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe introducir un correo válido.\nEj: ejemplo@dominio.com')"
													pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"
													maxlength="30" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group empujar-izq">
												<br>
												<button type="submit" class="btn btn-primary btn-fill">
													Solicitar
													<i class="fa fa-envelope" aria-hidden="true"></i>
												</button>
												<button type="submit" class="btn btn-danger btn-fill">
													Cancelar
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

			<footer>
				<p style="float: left;">© Javier Merchán - UCAB 2016</p>
				<p style="float: right;"><a href="#">Back to top</a></p>
			</footer>
		</div>
	</body>
</html>


<?php
	foreach ($_POST["solicitar"] as $producto) {
		echo $producto.'<br>';
	}

	session_start();
	$_SESSION["email"] = $_SESSION["email"];

	$_SESSION["solicitar"] = $_POST["solicitar"];

 ?>

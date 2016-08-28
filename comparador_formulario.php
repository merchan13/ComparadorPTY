<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Resultado</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--/JavaScript-->

	</head>
	<body>

<?php
	session_start();
	$_SESSION["email"] = $_SESSION["email"];

	$_SESSION["solicitar"] = $_POST["solicitar"];
?>

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
									<h4>Información básica</h4>
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
									<hr>
									<div class="row">
										<!--ESTADO CIVIL-->
										<div class="col-md-12">
											<div class="form-group">
												<label>Estado Civil</label>
												<input type="radio" class="edocivil" value="Soltero" name="edocivil" checked="true">
												<label>Soltero</label><br>

												<input type="radio" class="edocivil" value="Casado" name="edocivil">
												<label>Casado</label><br>

												<input type="radio" class="edocivil" value="Unido" name="edocivil">
												<label>Unido</label><br>

												<input type="radio" class="edocivil" value="Viudo" name="edocivil">
												<label>Viudo</label><br>
											</div>
										</div>
									</div>
									<div class="row">
										<!--NRO DEPENDIENTES-->
										<div class="col-md-12">
											<div class="form-group">
												<label>Cantidad de Dependientes</label>
												<input type="number" class="form-control dependientes" value="0" name="dependientes">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<!-- NIVEL ACADEMICO -->
										<div class="col-md-12">
											<div class="form-group">
												<label>NIVEL ACADÉMICO</label>
												<input type="radio" class="nivelacademico" value="Primaria"
													name="nivelacademico" checked="true">
												<label>Primaria</label><br>

												<input type="radio" class="nivelacademico" value="Secundaria"
													name="nivelacademico">
												<label>Secundaria</label><br>

												<input type="radio" class="nivelacademico" value="Licenciatura"
													name="nivelacademico">
												<label>Licenciatura</label><br>

												<input type="radio" class="nivelacademico" value="Maestria"
													name="nivelacademico">
												<label>Maestría</label><br>

												<input type="radio" class="nivelacademico" value="Doctorado"
													name="nivelacademico">
												<label>Doctorado</label><br>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<!--RESIDE EN PANAMA-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Reside en Panamá?</label>
												<input type="radio" class="residencia" value="Si"
													name="residencia" checked="true">
												<label>Si</label>

												<input type="radio" class="residencia" value="No"
													name="residencia">
												<label>No</label>
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
										<!--TELÉFONO-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Teléfono principal</label>
												<input type="text" class="form-control" id="telefono-perfil"
													placeholder="Teléfono de contacto"
													value="" name="telefono"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>
										<!--CELULAR-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Celular</label>
												<input type="text" class="form-control" id="celular-perfil"
													placeholder="Teléfono de contacto"
													value="" name="celular"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>
									</div>
									<div class="row">
										<!--TIPO DE VIVIENDA-->
										<div class="col-md-12">
											<div class="form-group">
												<label>Tipo de vivienda</label>
												<input type="radio" class="vivienda" value="Propia"
													name="vivienda" checked="true">
												<label>Propia</label>

												<input type="radio" class="vivienda" value="Alquilada"
													name="vivienda">
												<label>Alquilada</label>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<!--CIUDAD-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Ciudad</label>
												<input type="text" class="form-control" placeholder="Ciudad de residencia"
													value="" name="ciudad">
											</div>
										</div>
										<!--PROVINCIA-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Provincia</label>
												<input type="text" class="form-control" placeholder="Provincia"
													value="" name="provincia">
											</div>
										</div>
									</div>
									<div class="row">
										<!--DISTRITO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Distrito</label>
												<input type="text" class="form-control" placeholder="Distrito"
													value="" name="distrito">
											</div>
										</div>
										<!--CORREGIMIENTO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Corregimiento</label>
												<input type="text" class="form-control" placeholder="Corregimiento"
													value="" name="corregimiento">
											</div>
										</div>
										<!--BARRIADA-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Barriada/Urbanización</label>
												<input type="text" class="form-control" placeholder="Barriada"
													value="" name="barriada">
											</div>
										</div>
									</div>
									<div class="row">
										<!--CALLE-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Calle/Ave</label>
												<input type="text" class="form-control" placeholder="Calle o Avenida"
													value="" name="calleav">
											</div>
										</div>
										<!--EDIFICIO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Edificio</label>
												<input type="text" class="form-control" placeholder="Edificio"
													value="" name="edificio">
											</div>
										</div>
										<!--NRO CASA O APTO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>№ de Casa/Apartamento</label>
												<input type="text" class="form-control" placeholder="Nro de Casa/Apartamento"
													value="" name="nrocasaapt">
											</div>
										</div>
									</div>
									<div class="row">
										<!--FAMILIAR EXPUESTO-->
										<div class="col-md-12">
											<div class="form-group" style="">
												<label>Algún familiar, allegado o yo mismo, es considerado persona políticamente expuesta</label>
												<input type="radio" class="familiarexpuesto" value="No"
													name="familiarexpuesto" checked="true">
												<label>No</label>

												<input type="radio" class="familiarexpuesto" value="Si"
													name="familiarexpuesto">
												<label>Si</label>
											</div>
										</div>
									</div>
									<h4>Información laboral</h4>
									<div class="row">
										<!--TIPO DE CONTRATO-->
										<div class="col-md-12">
											<div class="form-group" style="">
												<label>Tipo de contrato actual</label>
												<input type="radio" class="tipocontrato" value="Asalariado"
													name="tipocontrato" checked="true">
												<label>Asalariado</label><br>

												<input type="radio" class="tipocontrato" value="Independiente"
													name="tipocontrato">
												<label>Independiente</label><br>

												<input type="radio" class="tipocontrato" value="Jubilado"
													name="tipocontrato">
												<label>Jubilado</label><br>

											</div>
										</div>
									</div>
									<div class="row">
										<!--PROFESION-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Profesión</label>
												<input type="text" class="form-control" placeholder="Profesión"
													value="" name="profesion">
											</div>
										</div>
										<!--LUGAR DE TRABAJO-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Lugar de trabajo</label>
												<input type="text" class="form-control" placeholder="Lugar de trabajo"
													value="" name="lugartrabajo">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<!--(TRABAJO) CIUDAD-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Ciudad</label>
												<input type="text" class="form-control" placeholder="Ciudad"
													value="" name="ciudad-trabajo">
											</div>
										</div>
										<!--(TRABAJO) PROVINCIA-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Provincia</label>
												<input type="text" class="form-control" placeholder="Provincia"
													value="" name="provincia-trabajo">
											</div>
										</div>
									</div>
									<div class="row">
										<!--(TRABAJO) DISTRITO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Distrito</label>
												<input type="text" class="form-control" placeholder="Distrito"
													value="" name="distrito-trabajo">
											</div>
										</div>
										<!--(TRABAJO) CORREGIMIENTO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Corregimiento</label>
												<input type="text" class="form-control" placeholder="Corregimiento"
													value="" name="corregimiento-trabajo">
											</div>
										</div>
										<!--(TRABAJO) BARRIADA-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Barriada/Urbanización</label>
												<input type="text" class="form-control" placeholder="Barriada"
													value="" name="barriada-trabajo">
											</div>
										</div>
									</div>
									<div class="row">
										<!--(TRABAJO) CALLE-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Calle/Ave</label>
												<input type="text" class="form-control" placeholder="Calle o Avenida"
													value="" name="calleav-trabajo">
											</div>
										</div>
										<!--(TRABAJO) EDIFICIO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>Edificio</label>
												<input type="text" class="form-control" placeholder="Edificio"
													value="" name="edificio-trabajo">
											</div>
										</div>
										<!--(TRABAJO) NRO CASA O APTO-->
										<div class="col-md-4">
											<div class="form-group" style="">
												<label>№ de Casa/Apartamento</label>
												<input type="text" class="form-control" placeholder="Nro de Casa/Apartamento"
													value="" name="nrocasaapt-trabajo">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<!--(TRABAJO) TELEFONO OFICINA-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Teléfono de oficina</label>
												<input type="text" class="form-control" id="telefonooficina"
													placeholder="Teléfono de oficina"
													value="" name="telefonooficina"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>
										<!--(TRABAJO) SALARIO-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Salario mensual ($)</label>
												<input type="number" class="form-control" value="0" name="salario">
											</div>
										</div>
									</div>
									<h4>Referencias personales</h4>
									<div class="row">
										<!--(REFERENCIA) NOMBRE-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Nombre del referido</label>
												<input type="text" class="form-control" placeholder="Nombre"
													value="" name="nombre-referencia">
											</div>
										</div>
										<!--(REFERENCIA) PARENTESCO-->
										<div class="col-md-6">
											<div class="form-group" style="">
												<label>Parentesco</label>
												<input type="text" class="form-control" placeholder="Parentesco"
													value="" name="parentesco-referencia">
											</div>
										</div>
									</div>
									<div class="row">
										<!--(REFERENCIA) TELÉFONO-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Teléfono principal</label>
												<input type="text" class="form-control" id="telefono-referencia"
													placeholder="Teléfono de contacto"
													value="" name="telefono-referencia"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>
										<!--(REFERENCIA) CELULAR-->
										<div class="col-md-6">
											<div class="form-group">
												<label>Celular</label>
												<input type="text" class="form-control" id="celular-refencia"
													placeholder="Celular"
													value="" name="celular-referencia"
													oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
													oninvalid="setCustomValidity('Debe contener únicamente caracteres numéricos, no puede contener letras. \nEj: +507 111-1111.')"
													pattern="^[+ -.()0-9]+$"
													maxlength="14" required>
											</div>
										</div>
									</div>
									<hr>
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

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Login</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/login.css">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
		<!--/Styles-->

		<!--JavaScript-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
		<script src="resources/js/login.js" type="text/javascript"></script>
		<!--/JavaScript-->
	</head>
	<body>
		<div class="flex-container">
			<header>
				<a href="index.php"><img class="logo" src="resources/images/logo.png" alt=""/></a>
			</header>

			<div class="admin-login">
                <div class="admin-titulo">
                    <h1>ComparadorPTY - Administración</h1>
                </div>

				<?php
					session_start();

					if (isset($_SESSION['unsuccess'])){
						if ($_SESSION['unsuccess'] == TRUE){

							if ($_SESSION['intento'] > 2){
								echo'
								<div class="login-alert-error">
									<div  class="alert alert-danger fade in">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Error!</strong>
										 3 INTENTOS! BLOQUEAR!
									</div>
								</div>
								';
							} else{
								$_SESSION['intento'] = $_SESSION['intento']+1;
								echo'
								<div class="login-alert-error">
									<div  class="alert alert-danger fade in">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Error!</strong>
										 Usuario o Password incorrecta, por favor intente de nuevo.
										 Recuerde que usted dispone de 3 intentos para ingresar.
									</div>
								</div>
								';
							}
						}
					} else {
						$_SESSION['intento'] = 1;
					}
				?>
                <div class="admin-form">
                    <form class="login" action="compty-admin-verificar_login.php" method="POST">
                        <fieldset>
                            <legend class="legend">Login</legend>

                            <div class="input">
                            	<input type="text" id="username" name="username" placeholder="Usuario"
								oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
								oninvalid="setCustomValidity('Debe contener únicamente caracteres alfabéticos, no puede contener números ni caracteres especiales.')"
								pattern="^(?=.*[a-zA-Z]{1,})(?=.*[\d]{0,})[a-zA-Z ]{1,20}(?!.*[<>'/;`%])$"
								maxlength="15" required />
                              	<span><i class="fa fa-user"></i></span>
                            </div>

                            <div class="input">
                            	<input type="password" id="password" name="password" placeholder="Password"
									oninput="setCustomValidity('')" onblur="onBlurDeInputs(this.id)"
	                            	oninvalid="setCustomValidity('Debe contener mínimo 7 caracteres, al menos 1 caracter numérico y una letra en mayúscula')"
	                            	pattern="^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$"
	                            	maxlength="15" required />
                              	<span><i class="fa fa-lock"></i></span>
                            </div>

                            <button type="submit" name="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
                        </fieldset>
                    </form>
                </div>
				<br><br>
			</div>

			<footer>
				<p style="float: left;">© Javier Merchán - UCAB 2016</p>
				<p style="float: right;"><a href="#">Back to top</a></p>
			</footer>
		</div>
	</body>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="resources/js/index.js"></script>

</html>

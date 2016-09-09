<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="resources/assets/css/animate.min.css" rel="stylesheet"/>

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<!--/Styles-->

		<!--JavaScript-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

			<div class="products">
					<?php
						if (isset($_GET['send'])){
							if ($_GET['send'] == 666){

								echo'
								<div class="login-alert-error">
									<div  class="alert alert-success fade in">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Éxito!</strong>
										 Solicitud de producto enviada exitosamente!
										 <br>
										 Se le estará contactando lo más
										 pronto posible, lo invitamos a seguir comparando, gracias!
										 <i class="fa fa-check-circle fa-ex" aria-hidden="true"></i>
									</div>
								</div>
								';
							} else if ($_GET['send'] == 999) {
								echo'
								<div class="login-alert-error">
									<div  class="alert alert-danger fade in">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Oh no!</strong>
										 Ocurrió un error en el proceso, por favor intente de nuevo.
										 <br>
										 <i class="fa fa-frown-o fa-ex" aria-hidden="true"></i>
									</div>
								</div>
								';
							}
						}
					?>
					<div class="title">
							<h1>Elija un producto para comparar</h1>
							<br>
					</div>

					<div class="product-images">

						<div class="credit-cards">
							<a href="comparador.php?tipo-producto=tdc">
								<img src="resources/images/credit_card.png" alt=""/>
								<p><strong>Tarjeta de Crédito</strong></p>
							</a>
						</div>

						<div class="savings">
							<a href="comparador.php?tipo-producto=save">
								<img src="resources/images/savings.png" alt=""/>
								<p><strong>Ahorro</strong></p>
							</a>
						</div>

						<div class="credit">
							<a href="comparador.php?tipo-producto=cred">
								<img src="resources/images/credit.png" alt=""/>
								<p><strong>Créditos</strong></p>
							</a>
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

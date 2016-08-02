<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Datos</title>

		<!-- Bootstrap core CSS -->
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
		<!--/Styles-->

		<!--JavaScript-->
		<script type="text/javascript" src="resources/js/range_value.js"></script>
		<!--/JavaScript-->

	</head>
	<body>
		<div class="flex-container">
			<header>
				<a href="index.php"><img class="logo" src="resources/images/logo.png" alt=""/></a>
				<ul>
					<li><a href="#"><img src="resources/images/banesco-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/facebook-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/instagram-icon.png" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/twitter-icon.jpg" alt="" /></a></li>
					<li><a href="#"><img src="resources/images/snapchat-icon.png" alt="" /></a></li>
				</ul>
			</header>

			<div class="comparator">
                <div class="comparator-product-image">
                    <img src="resources/images/credit_card.png" alt="" />
                </div>
                <div class="comparator-form">
                    <form class="form-horizontal" role="form" action="comparador_resultado.php">

                        <!--Income-->
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="income" style="padding-top: 0;">Salario</label>
                          <div class="col-sm-5" style="display: inline;">
                            <input type="range"  id="income" min =600 max="50000" step ="100" value ="800"
								onchange="prueba.value = income.value" oninput="outputUpdate(value)"
								style="display: inline">
                          </div>
						  <label for="income-number" style="display: inline;">
							  $
							  <output for="income" id="volume" style="display: inline">600</output>
						  </label>
                        </div>

                        <!--Email-->
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Email</label>
                          <div class="col-sm-3">
                            <input type="email" class="form-control" id="income"
								placeholder="Ingrese correo electrónico" disabled="true">
                          </div>
                        </div>

                        <!--Remember Me-->
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-3">
                            <div class="checkbox">
                              <label><input type="checkbox">Recordarme</label>
                            </div>
                          </div>
                        </div>

                        <!--Submit Button-->
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" class="btn btn-default">Comparar</button>
                          </div>
                        </div>

                    </form>
                </div>
			</div>

			<footer>
				<hr>
				<p style="float: left;">© Javier Merchán - UCAB 2016</p>
				<p style="float: right;"><a href="#">Back to top</a></p>
			</footer>
		</div>
	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Datos</title>

		<!-- Bootstrap core CSS -->
		<link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	    <link href="resources/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

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
                    <form class="form-horizontal" role="form" action="comparador_resultado.php" method="post">

                        <!--Income-->
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="income" style="padding-top: 0;">Salario</label>
                          <div class="col-sm-4">
                            <input type="range"  id="income" name="income" min =600 max="10000" step ="200" value ="1000"
								onchange="prueba.value = income.value" oninput="outputUpdate(value)">
                          </div>
						  <label for="income-number" style="margin-left: -45%;">
							  $
							  <output for="income" id="volume" style="display: inline">1000</output>
						  </label>
                        </div>

                        <!--Email-->
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Email</label>
                          <div class="col-sm-4">
                            <input type="email" class="form-control" id="email" name="email"
								placeholder="Ingrese correo electrónico">
                          </div>
                        </div>

                        <!--Remember Me-->
                        <div class="form-group" style="display: none">
                          <div class="col-sm-offset-2 col-sm-3">
                            <div class="checkbox">
                              <label><input type="checkbox">Recordarme</label>
                            </div>
                          </div>
                        </div>

                        <!--Submit Button-->
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-4">
							  <br>
							  <button type="submit" class="btn btn-warning btn-fill"
  								style="width: 200px; height: 55px; font-size:120%">
  								<i class="fa fa-credit-card fa-spin" style="margin-right:5%;"></i>Comparar ahora!
  							</button>
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

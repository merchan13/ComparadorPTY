<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ComparadorPty - Login</title>

		<!-- Bootstrap core CSS -->
		<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!--Styles-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/login.css">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
		<!--/Styles-->

		<!--JavaScript-->
        <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
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
                <div class="admin-form">
                    <form class="login" action="compty-admin-verificar_login.php" method="POST">
                        <fieldset>
                            <legend class="legend">Login</legend>

                            <div class="input">
                            	<input type="text" name="username" placeholder="Usuario" required />
                              	<span><i class="fa fa-user"></i></span>
                            </div>

                            <div class="input">
                            	<input type="password" name="password" placeholder="Password" required />
                              	<span><i class="fa fa-lock"></i></span>
                            </div>

                            <button type="submit" name="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
                        </fieldset>
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

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="resources/js/index.js"></script>

</html>

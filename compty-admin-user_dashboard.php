<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="#">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ComparadorPty - Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="vendors/bootstrap/css/bootstrap.css" rel="stylesheet">

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

<div class="wrapper">
    <div class="sidebar" data-color="banesco-blue" data-image="resources/assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
				<img src="resources/images/banesco-icon.png" alt="" />
                <a href="compty-admin-perfil_usuario.php" class="simple-text">
                    Banesco
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="compty-admin-user_dashboard.php">
                        <i class="pe-7s-diamond"></i>
                        <p>Productos</p>
                    </a>
                </li>
				<li class="active">
                    <a href="compty-admin-agregar_producto.php">
                        <i class="pe-7s-plus"></i>
                        <p>Agregar Nuevo</p>
                    </a>
                </li>
				<li class="active">
                    <a href="compty-admin-perfil_usuario.php">
                        <i class="pe-7s-id"></i>
                        <p>Perfil</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only" style="color:white">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="resources/images/logo.png" alt=""
						style="max-width: 150px; max-height: 150px; float: left; margin: auto;"/></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="compty-admin.php" style="color: white">
                               		Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

		<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Productos</h4>
                                <p class="category">Tarjetas de Créditos</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Producto</th>
                                    	<th>Marca</th>
                                    	<th>Tasa</th>
                                    	<th>Cargos X Mes</th>
                                    	<th>Beneficios</th>
										<th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>Visa Premium</td>
                                        	<td><img src="resources/images/visa-icon.gif" alt="" /></td>
                                        	<td>27,8%</td>
                                        	<td>$9999</td>
                                        	<td>
												<ul>
													<li>Millas</li>
													<li>Puntos</li>
                                        		</ul>
											</td>
											<td>
												<ul class="actions">
													<li><a title="Modificar"
														class="btn btn-primary glyphicon glyphicon-pencil"
														style=""
														href="#"></a>
													</li>
													<li><a title="Eliminar"
														class="btn btn-danger glyphicon glyphicon-remove"
														style=""
														href="#"></a>
													</li>
												</ul>
											</td>
                                        </tr>
                                        <tr>
                                        	<td>Visa Pópular</td>
                                        	<td><img src="resources/images/visa-icon.gif" alt="" /></td>
                                        	<td>30%</td>
                                        	<td>$9999</td>
                                        	<td>
												<ul>
													<li>Descuentos</li>
													<li>Puntos</li>
                                        		</ul>
											</td>
											<td>
												<ul class="actions">
													<li><a title="Modificar"
														class="btn btn-primary glyphicon glyphicon-pencil"
														style=""
														href="#"></a>
													</li>
													<li><a title="Eliminar"
														class="btn btn-danger glyphicon glyphicon-remove"
														style=""
														href="#"></a>
													</li>
												</ul>
											</td>
                                        </tr>
                                        <tr>
                                        	<td>MasterCard Plus</td>
                                        	<td><img src="resources/images/mastercard-icon.gif" alt="" /></td>
                                        	<td>27,8%</td>
                                        	<td>$9999</td>
                                        	<td>
												<ul>
													<li>Puntos</li>
												</ul>
											</td>
											<td>
												<ul class="actions">
													<li><a title="Modificar"
														class="btn btn-primary glyphicon glyphicon-pencil"
														style=""
														href="#"></a>
													</li>
													<li><a title="Eliminar"
														class="btn btn-danger glyphicon glyphicon-remove"
														style=""
														href="#"></a>
													</li>
												</ul>
											</td>
                                        </tr>
                                        <tr>
                                        	<td>MasterCard Simple</td>
                                        	<td><img src="resources/images/mastercard-icon.gif" alt="" /></td>
                                        	<td>31,23%</td>
                                        	<td>$9999</td>
                                        	<td>
												<ul>
													<li>Millas</li>
													<li>Puntos</li>
													<li>Descuentos</li>
                                        		</ul>
											</td>
											<td>
												<ul class="actions">
													<li><a title="Modificar"
														class="btn btn-primary glyphicon glyphicon-pencil"
														style=""
														href="#"></a>
													</li>
													<li><a title="Eliminar"
														class="btn btn-danger glyphicon glyphicon-remove"
														style=""
														href="#"></a>
													</li>
												</ul>
											</td>
                                        </tr>
                                    </tbody>
                                </table>

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

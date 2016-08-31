<?php
	session_start();

	$usuario = $_SESSION['user'];
	$password = $_SESSION['password'];
	$id = $_SESSION['id'];
	$logo = $_SESSION['logo'];
 ?>

<div class="sidebar" data-color="banesco-blue" data-image="resources/assets/img/sidebar-7.png">

    <div class="sidebar-wrapper">
        <div class="logo">
            <?php
                echo '
                    <img src="'.$logo.'" alt="" />
                    <a href="compty-admin-perfil_usuario.php?id='.$id.'&password='.$password.'" class="simple-text">
                    '.$usuario.'
                    </a>';
            ?>
        </div>

        <ul class="nav">
            <li class="active">
				<a data-toggle="collapse" href="#componentsExamples" class="collapsed" aria-expanded="false">
					<i class="pe-7s-diamond"></i>
					<p>Productos
					   <b class="caret"></b>
					</p>
				</a>
				<div class="collapse" id="componentsExamples" aria-expanded="false" style="height: 0px;">
					<ul class="nav">
						<li>
							<?php
				                echo '
									<a href="compty-admin-user_dashboard.php?id='.$id.'&password='.$password.'">
										<i class="pe-7s-credit"></i>
										<p>TDC</p>
									</a>';
				            ?>
						</li>
						<li>
							<?php
				                echo '
									<a href="compty-admin-user_dashboard_save.php?id='.$id.'&password='.$password.'">
										<i class="pe-7s-piggy"></i>
										<p>Ahorros</p>
									</a>';
				            ?>
						</li>
						<li>
							<?php
				                echo '
									<a href="compty-admin-user_dashboard_cred.php?id='.$id.'&password='.$password.'">
										<i class="pe-7s-cash"></i>
										<p>Créditos</p>
									</a>';
				            ?>
						</li>
					</ul>
				</div>
            </li>
            <li class="active">
				<?php
	                echo '
						<a href="compty-admin-agregar_producto.php?id='.$id.'&password='.$password.'">
							<i class="pe-7s-plugin"></i>
							<p>Agregar Nuevo</p>
						</a>';
	            ?>
            </li>
            <li class="active">
				<?php
	                echo '
						<a href="compty-admin-perfil_usuario.php?id='.$id.'&password='.$password.'">
							<i class="pe-7s-id"></i>
							<p>Perfil</p>
						</a>';
	            ?>
            </li>

        </ul>
    </div>
</div>

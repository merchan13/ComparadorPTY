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
				<?php
	                echo '
						<a href="compty-admin-user_dashboard.php?id='.$id.'&password='.$password.'">
							<i class="pe-7s-diamond"></i>
							<p>Productos</p>
						</a>';
	            ?>
            </li>
            <li class="active">
				<?php
	                echo '
						<a href="compty-admin-agregar_producto.php?id='.$id.'&password='.$password.'">
							<i class="pe-7s-plus"></i>
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

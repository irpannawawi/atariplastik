<?php require 'template/header.php'; ?>

<div class="container-fluid bg-dark" style="min-height: 1500px;">
	<div class="row">
		<div class="col-4 bg-light" style="padding: 15px; margin:0px auto; margin-top: 150px; border-radius: 10px;">
			<h2 align="center">Login</h2>
		<?=form_open('Auth/login_act'); ?>
			<input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus>
			<input type="password" name="password" class="form-control" placeholder="Password">
			<input type="submit" name="submit" class="form-control btn btn-primary" value="Login">
		<?=form_close(); ?>		
		</div>
	</div>
</div>




<?php require 'template/footer.php'; ?>
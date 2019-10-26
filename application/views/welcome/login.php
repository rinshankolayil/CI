<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<br><br>
	<div class="container">
		<h3>Login</h3>
		<div class="row">
			<div class="col">
				<?php
					if(isset($login_message) && $login_message != ''){
						?>
						<div class="alert alert-warning" role="alert">
  							<?=$login_message;?>
						</div>
				<?php
					}
				?>
				<form action="<?=site_url('welcome/login')?>" method="post">
				  <div class="form-group">
				    <label for="username">User name</label>
				    <input type="text" class="form-control" name="username" placeholder="Enter user name" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="password" placeholder="Password" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
		<h3>New user (For my simplification and security (You have not listed to add user in documentation) )</h3>
		<div class="row">
			<div class="col">
				<?php
					if(isset($message) && $message !=''){
						?>
						<div class="alert alert-warning" role="alert">
  							<?=$message;?>
						</div>
				<?php
					}
				?>
				<form action="<?=site_url('welcome/register')?>" method="post">
				  <div class="form-group">
				    <label for="username">User name</label>
				    <input type="text" class="form-control" name="username_reg" placeholder="Enter user name" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="password_reg" placeholder="Password" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Add user</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		// alert(1)
	});
</script>
</html>
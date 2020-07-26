<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<?php include '../includes/styles_js_importer.php'; ?>
</head>
<body class="bg-primary p-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 shadow-sm p-4 mb-5 bg-white rounded">
			<h4 class="text-center text-primary">Sign Up</h4>
			<?php 
		       if (isset($_GET['error'])) {
		       	?>
		       	<h5 class="text-center text-danger"><?php echo $_GET['error']?></h5>
		       	<?php
		       }
		         if (isset($_GET['signup'])) {
		       	?>
		       	<h5 class="text-center text-success"><?php echo $_GET['signup']?></h5>
		       	<?php
		       }
			?>
			<hr>
				<form method="post" action="parent_includes/sign_up.inc.php">
					<div class="form-group">
		                <label  for="firstName">First Name</label>
		                <input class="form-control" type="text" name="firstName"  required>
	                </div>
	                <div class="form-group">
		                <label  for="lastName">Last Name</label>
		                <input class="form-control" type="text" name="lastName" required>
	                </div>
	                <div class="form-group">
		                <label  for="email">Email</labe>
	                    <input class="form-control" type="email" name="email"  required>
	                </div>
	                <div class="form-group">
		                <label  for="phoneNumber">PhoneNumber</label>
		                <input class="form-control" type="text" name="phoneNumber"  required>
	                </div>
	                <div class="form-group">
		                <label  for="pwd">Password</label>
		                <input class="form-control" type="password" name="pwd"  required>
	                </div>
	                <div class="form-group">
		                <label  for="pwd2">Confirm Password</label>
		                <input class="form-control" type="password" name="pwd2"  required>
	                </div>
	                <button type="submit" name="signup" class="btn btn-success">Register</button>
				</form><br>
                <a href="index.php" class="btn btn-primary" style="float: right; position: relative; bottom: 10%;">Login</a>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php include '../includes/styles_js_importer.php'; ?>
</head>
<body class="bg-primary">
	<div class="container p-5">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 shadow-sm p-3 mb-5 bg-white rounded">
					<?php 
				       if (isset($_GET['error'])) {
				       	?>
				       	<h5 class="text-center text-danger"><?php echo $_GET['error']?></h5>
				       	<?php
				       }
					?>
				<h4 class="text-center text-primary">Login</h4><hr>
			     <form method="post" action="children_includes/sign_in.inc.php">
				  <div class="form-group">
                    <label  for="phoneNumber">PhoneNumber</label>
                   <input class="form-control"  type="text" name="phoneNumber"  required>
                  </div>
                   <div class="form-group">
                    <label  for="password"> Password</label>
                    <input  class="form-control" type="password" name="password"  required>
                  </div>
                   <button type="submit" name="signin" class="btn btn-success" style="width: 100%;">Login</button>
	            </form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Loin</title>
	 <?php include '../includes/styles_js_importer.php'; ?>
</head>
<body class="bg-primary">
	<div class="container p-5">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 shadow-sm p-3 mb-5 bg-white rounded">
				<h4 class="text-center text-primary">Login</h4><hr>
				<form method="post" action="parent_includes/sign_in.inc.php">
				  <div class="form-group">
                    <label  for="email"> Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Enter Email" required><br>
                  </div>
                   <div class="form-group">
                    <label  for="pwd"> Password</label>
                    <input class="form-control" type="password" name="pwd" placeholder="Enter Password" required><br><br>
                  </div>
                   <button type="submit" name="signin" class="btn btn-success">Login</button>
	            </form>
				<a href="sign_up.php" class="btn btn-primary" style="float: right; position: relative; bottom: 10%;">Register</a>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>
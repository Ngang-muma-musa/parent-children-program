
<?php
require "../includes/db.inc.php";
session_start();
 $email =  $_SESSION['email'];
$phoneNumber =  $_SESSION['phoneNumber'];
if (!isset($email)&&!isset($phoneNumber)) {
	header("Location:index.php");
	exit();
}
else {
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Parent</title>
		<?php include '../includes/styles_js_importer.php'; ?>
		<style type="text/css">
			.btnn{
				width: 20%;
				position: relative;
				left: 30%;
			}
			.home{
				position: relative;
				top: 50%;
				left: 50%;
			}
			p{
				margin-top: 20px;
			}
			.white{
				background-color: white;
			}
			.col-md-6 {
				margin-top: 20px
			}

		</style>
</head>
<body class="bg-primary p-4">
	<div class="container">
		<?php
          include"header.php";
		?>
		<p class="text-center" style="color: white;" >Choose any of the options bellow to get started</p>

		<div class="row ">
			  <div class="col-md-6 text-center">
                <div class="card">
		              <div class="card-img">
		                <img src="../images/createchild.jpg" alt="image" class="img-responsive p-4 " height="200">
		              </div>
		              <div class="card-body">
		                <h3 class="card-title">CREATE CHILD</h3>
		                <hr>
		                <a href="create_child.php" class="btn btn-success py-2 px-8">TAP TO CREATE</a>
		              </div>
	            </div>
              </div>

			  <div class="col-md-6 text-center">
                <div class="card">
		              <div class="card-img">
		                <img src="../images/lessons-icon.png" alt="image" class="img-responsive p-4 " height="200" width="300">
		              </div>
		              <div class="card-body">
		                <h3 class="card-title">Upload lessons for children</h3>
		                <hr>
		                <a href="lesson_upload.php" class="btn btn-success py-2 px-8">TAP TO UPLOAD</a>
		              </div>
	            </div>
              </div>
			  <div class="col-md-6 text-center">
                <div class="card">
		              <div class="card-img">
		                <img src="../images/questions4.png" alt="image" class="img-responsive p-4 " height="200" width="400">
		              </div>
		              <div class="card-body">
		                <h3 class="card-title">Upload questions for children</h3>
		                <hr>
		                <a href="question_upload.php" class="btn btn-success py-2 px-8">TAP TO UPLOAD</a>
		              </div>
	            </div>
              </div>
			  <div class="col-md-6 text-center">
                <div class="card">
		              <div class="card-img">
		                <img src="../images/result-png-hi.png" alt="image" class="img-responsive p-4 " height="200">
		              </div>
		              <div class="card-body">
		                <h3 class="card-title">View Results</h3>
		                <hr>
		                <a href="allchildren.php" class="btn btn-success py-2 px-8">TAP TO View</a>
		              </div>
	            </div>
              </div>
		</div>
	</div>


	
<?php
$sql = "SELECT * FROM parents WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];
}
?>

</body>
</html>


<?php
}
?>


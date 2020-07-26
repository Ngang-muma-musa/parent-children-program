<?php
session_start();
$parent_id = $_SESSION['phoneNumber'];
$email = $_SESSION['email'];

if (!isset($email) && !isset($parent_id)) {
  header("Location:index.php");
  exit();
}
else{
	require "../includes/db.inc.php";
	?>
	<?php
       $sql = "SELECT * FROM children where phoneNumber = $parent_id";
       $result = mysqli_query($conn,$sql);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Children</title>
		<?php include '../includes/styles_js_importer.php'; ?>
		<style type="text/css">
			.col-md-4{
				margin-top: 20px;
			}
		</style>
	</head>
	<body class="bg-primary p-4">
	<div class="container">
		<?php
          include"header.php";
        ?>
		<div class="row">
			<?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  	$name = $row['child_name'];
                  	$id = $row['id'];
                  	?>
                    <div class="col-md-4 text-center">
                        <div class="card">
		                    <div class="card-img">
		                        <img src="../images/login_signup.png" alt="image" class="img-responsive p-4 " height="200">                
		                    </div>
		                    <div class="card-body">
		                         <h3 class="card-title"><?php echo strtoupper($name) ; ?></h3>
		                         <hr>
		                         <a href="results.php?child_id=<?php echo($id);?>" class="btn btn-primary py-2 px-8">VIEW RESULTS</a>
		                    </div>
                       </div>

                    </div>
                  	<?php
                  }
			?>
		</div>

	</div>
	</body>
	</html>
	<?php
}
?>
<?php
require "../../includes/db.inc.php";
session_start();
$ans_id = $_SESSION['id'];
$child_id = $_SESSION['child_id'];
// die($ans_id);
if (isset($_SESSION['type'])) {
	$type = $_SESSION['type'];
}
if (isset($_POST['correct'])) {
     if ($type=="IMAGE") {
        $id = $_POST['id'];
	    $sql = "UPDATE answer SET status='CORRECT',corrections='NONE' WHERE id = $id AND child_id = $child_id ";
		$result = mysqli_query($conn,$sql);
		header("Location:../results.php");
		exit();

     }
     else{
	    $sql = "UPDATE answer SET status='CORRECT',corrections='NONE' WHERE id = $ans_id AND child_id = $child_id ";
		$result = mysqli_query($conn,$sql);
		header("Location:../results.php");
		exit();
     }
	
}
elseif (isset($_POST['submit_cor'])) {
	$cor = $_POST['correction'];
	$sql = "UPDATE answer SET status='WRONG', corrections=? WHERE id = $ans_id";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location:../results.php");
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$cor);
		mysqli_stmt_execute($stmt);
	}
	header("Location:../result_display.php?succes=Correction Succesful");
	exit();
}
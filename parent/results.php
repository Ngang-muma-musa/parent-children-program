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
 $sql = "SELECT * FROM questions WHERE status = 'ANSWERED'";
 $result = mysqli_query($conn,$sql);
 
 if (isset($_GET['child_id'])) {
  $child_id = $_GET['child_id'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Corrections</title>
  <?php include '../includes/styles_js_importer.php'; ?>
  <style type="text/css">
    h1{
      color: white;
    }
  </style>
</head>
<body class="bg-primary p-4">
  <div class="container">
             <?php
          include"header.php";
        ?><br>
    <h1 class="text-center">VIEW RESULTS</h1>
     <div class="row p-4">
   <?php 
      while ($row =  mysqli_fetch_assoc($result)) {
        $question_id  = $row['question_id'];
        $parent_id  = $row['parent_id'];
        $question_type  = $row['question_type'];
        $question_instructions  = $row['question_description'];
        ?>
           
            <div class="col-md-4 text-center">
              <div class="card">
                <div class="card-img">
                <img src="../images/<?php if($question_type == 'IMAGE' ){
                  echo 'img.jpg';
                }elseif($question_type == 'VIDEO'){
                  echo 'video.png';
                }elseif($question_type == 'YOUTUBE'){
                   echo 'youtube.png';
                }else{
                  echo 'text.jpg';
                } ?>" alt="image" class="img-responsive p-4 " height="200"> 
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?php if (strlen($question_instructions)) {
                      echo substr($question_instructions, 0, 16) . "...";
                    }else{
                      echo $question_instructions;
                    } ?></h3>
                    <hr>
                    <a href="result_display.php?id=<?php echo $parent_id.$question_id;?>&type=<?php echo $question_type;?>&question_id=<?php echo $question_id?>&child_id=<?php echo $child_id?>" class="btn btn-primary py-2 px-8">View Questions</a>
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
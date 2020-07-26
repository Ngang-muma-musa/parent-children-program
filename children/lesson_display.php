<?php 
require "../includes/db.inc.php";
if (isset($_GET['type'])&&isset($_GET['id'])) {
    $id = $_GET['id'];

    $type  = $_GET['type'];

    $lesson_id =  $_GET['lesson_id'];

    $sql = "SELECT * FROM lesson_content WHERE lesson_id = '$id' ";
    $result = mysqli_query($conn,$sql);

    $sql2 = "SELECT lesson_description FROM lessons WHERE lesson_id = $lesson_id";
    $result2 = mysqli_query($conn,$sql2);

    while ($row  = mysqli_fetch_assoc($result2)) {
    	$instruction = $row['lesson_description'];
    }

    ?>


    <!DOCTYPE html>
    <html>
    <head>
    	<title>Answer Questions</title>
    	<?php include '../includes/styles_js_importer.php'; ?>
    	<style type="text/css">
    		body{
    			padding-top: 1rem;
    		}
    		.videoembed{
    			position: relative;
    			padding-bottom: 56.25%;
    			padding-top: 25px;
    			height: 0px;
    		}
    		.videoembed embed{
    			position: absolute;
    			left: 0px;
    			top: 0px;
    			right: 0px;
    			bottom: 0px;
    			height: 100%;
    			width: 100%;
    		}
    		.videoembed video{
    			position: absolute;
    			left: 0px;
    			top: 0px;
    			right: 0px;
    			bottom: 0px;
    			height: 100%;
    			width: 100%;
    		}
    		.left{
    			float:right;
    		}
    		.btnn{
    			width: 100%;
    		}
    		#hide{
    			display: none;
    		}
    	</style>
    </head>
    <body class="bg-primary">
    <div class="container">
    	<?php
          if ($type == "TEXT") {
          	while ($row  = mysqli_fetch_assoc($result)) {
             $id = $row['id'];
             $timestamp_id = $row['timestamp_id'];
        	   $question_id = $row['lesson_id'];
        	   $content = $row['content'];
             
        	   ?>
        	   <div class="row">
        	   	<div class="col-md-2"></div>
        	   	<div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
        	   		<h1 class="text-center"><?php echo $instruction; ?></h1><br>
        	   		<h5 class="text-center"><?php echo $content;?></h5><br>
        	   	</div>
        	   	<div class="col-md-2"></div>
        	   </div><br><br>
        	   <?php
            }
                  // $_SESSION['id'] = $id;
                  // $_SESSION['lesson_id'] = $question_id ;
                  // $_SESSION['timestamp_id'] = $timestamp_id;
                  // $_SESSION['lesson_content_id'] =  $question_content_id;
          }
          elseif($type == "YOUTUBE"){
            while ($row  = mysqli_fetch_assoc($result)) {
               $id = $row['id'];
               $timestamp_id = $row['timestamp_id'];
          	   $question_id = $row['lesson_id'];
          	   $content = $row['content'];
          	   $content = preg_replace("#.*youtube\.com/watch\?v=#", "", $content);
          	  
          	   ?>
          	   <div class="row">
          	   	<div class="col-md-2"></div>
          	   	<div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
          	   		<h1 class="text-center"><?php echo $instruction; ?></h1><br>
          	   		<div class="videoembed">
          	   			<embed src="https://www.youtube.com/embed/<?php echo $content?>"></embed>
          	   		</div><br>
          	   	</div>
          	   	<div class="col-md-2"></div>
          	   </div>
              
          	   <?php
            } 
                // $_SESSION['id'] = $id;
                // $_SESSION['lesson_id'] = $question_id ;
                // $_SESSION['timestamp_id'] = $timestamp_id;
                $_SESSION['lesson_content_id'] =  $question_content_id;
          }
          elseif($type == "VIDEO"){
            while ($row  = mysqli_fetch_assoc($result)) {
               $id = $row['id'];
               $timestamp_id = $row['timestamp_id'];
          	   $lesson_id = $row['lesson_id'];
          	   $content = $row['content'];
          	   ?>
          	   <div class="row">
          	   	<div class="col-md-2"></div>
          	   	<div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
          	   		<h1 class="text-center"><?php echo $instruction; ?></h1><br>
          	   		<div class="videoembed">
          	   			<video src="../uploads/<?php echo $content; ?>"  controls></video>
          	   		</div><br>
          	   		<div class="button">
          	   			<button class="btn btn-primary">  < PREVIOUS </button>
          	   			<button class="btn btn-primary">  NEXT > </button>
          	   		</div>
          	   	</div>
          	   	<div class="col-md-2"></div>
          	   </div>
          	   <?php
            }
                // $_SESSION['id'] = $id;
                // $_SESSION['lesson_id'] = $question_id ;
                // $_SESSION['timestamp_id'] = $timestamp_id;
                // $_SESSION['lesson_content_id'] =  $question_content_id;
          }
          elseif($type == "IMAGE"){

             ?>
               <div class="row">
          	   	<div class="col-md-2"></div>
               
          	 <div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
                    <h1 class="text-center"><?php echo $instruction; ?></h1><br>
                    <div class="videoembed">

                    <!-- carouel starts -->

                    <div id="demo" class="carousel slide" data-ride="carousel" data-interval="false">   

                      <!-- Indicators -->
                  <ul class="carousel-indicators id">
                    <?php 
                       $i=0;
                       foreach ($result as $row) {
                        $active = '';
                        if($i == 0){
                             $active = 'active';
                        }
                    ?>
                    
                      <li data-target="#demo" data-slide-to="<?php echo $i;?>" class="<?php echo $active;?>"></li>
                     <?php $i++;}?>
                    </ul>

                      <!-- The slideshow -->
                      <div class="carousel-inner">
                      <?php 
                         $i=0;
                         foreach($result as $row){
                            $id = $row['id'];
                            $array[$i] = $id;
                            $content = $row['content'];
                            $timestamp_id = $row['timestamp_id'];
                            $question_content_id = $row['lesson_id'];
                            $active = '';
                            if($i == 0){
                               $active = 'active';
                            }
                      ?>
                          <?php echo$id;?>
                        <div class="carousel-item <?= $active;?>">
                          <img src="../uploads/<?= $row['content'];?>" id="<?php echo $active; ?>" class="img-responsive" height="400" width="100%">
                        </div>
                       <?php $i++;}?>
                      </div>
                    </div>

                      <!-- carousel ends -->

                    </div><br>
                    <div class="button">
                        <button class="btn btn-primary" id="prevbtn"  data-value="[<?php echo implode(',', $array); ?>]" >  < PREVIOUS </button>
                        <button class="btn btn-primary" id="nextbtn"  data-value="[<?php echo implode(',', $array); ?>]" >  NEXT > </button>
                        <button onclick="myHide()" class="btn btn-primary left"> ANSWER QUESTION </button>
                    </div><br>
                    <div id="hide">
                  
                    <form class="md-form" method="post" action="children_includes/question_display.inc.php">
                        <div class="form-grop">
                          <!-- <input type='text' id="qId" value="<?php echo $array[0];?>" name="id" > -->
                        <label for="question_description">Type Answer Here</label>
                        <textarea class="form-control" id="answer" name="answer" rows="3" placeholder="type answer..." ></textarea>
                        </div><br>
                          <button class="btn btn-primary btnn" type="submit" name="submit_ans">SUBMIT</button>
                      </form>
                    </div>   
                </div>
          	   	<div class="col-md-2"></div>
          	   </div>
             <?php
          }
    	?>
    </div>

    <script type="text/javascript">	
    	function myHide() {
    		const x = document.getElementById("hide");
    		if(x.style.display == "none"){
                x.style.display="block";
    		}else{
    			x.style.display="none";
    		}
    	}

      var x;
      $(document).ready(function(){
        $("#demo").carousel();

        $("#nextbtn").on('click', function(e){
          $("#demo").carousel("next");
          var arrParam = $(this).data("value")
          console.log("Array: "+ arrParam + " LEngth: "+arrParam.length);

          var indicatorId = $('.carousel-indicators > li.active').data('slide-to');
          console.log("current indicatorId: "+ indicatorId + " question_id: "+ arrParam[indicatorId]);  
          var qid = document.getElementById('qId');
          qId.value = arrParam[indicatorId];
          if (indicatorId === arrParam.length) {
            indicatorId = 0;
          } else { 
            indicatorId++;
          }

          $('.carousel-indicators > li.active').removeClass('active');
          $('.carousel-indicators > li[data-slide-to="' + indicatorId + '"]').addClass('active');
        });
      });


      $(document).ready(function(){
        $("#demo").carousel();

        $("#prevbtn").on('click', function(e){
          $("#demo").carousel("prev");
          var arrParam = $(this).data("value")
          console.log("Array: "+ arrParam + " LEngth: "+arrParam.length);

          var indicatorId = $('.carousel-indicators > li.active').data('slide-to');
          console.log("current indicatorId: "+ indicatorId + " question_id: "+ arrParam[indicatorId]);  
          var qid = document.getElementById('qId');
          qId.value = arrParam[indicatorId];
          if (indicatorId === arrParam.length) {
            indicatorId = 0;
          } else { 
            indicatorId--;
          }

          $('.carousel-indicators > li.active').removeClass('active');
          $('.carousel-indicators > li[data-slide-to="' + indicatorId + '"]').addClass('active');
        });
      });

    </script>
    </body>
    </html>


    <?php

}else{
	header("Location:questions.php");
	exit();
}
?>
<?php 
session_start();
$child_id = $_SESSION['child_id'];
require "../includes/db.inc.php";
if (isset($_GET['type'])&&isset($_GET['id'])) {
    $id = $_GET['id'];

    $type  = $_GET['type'];

    $question_id =  $_GET['question_id'];
    

    $sql = "SELECT * FROM question_content WHERE question_id = '$id' ";
    $result = mysqli_query($conn,$sql);

    $sql2 = "SELECT question_description FROM questions WHERE question_id = $question_id";
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT * FROM answer WHERE child_id = $child_id";
    $result3 = mysqli_query($conn,$sql3);

    $sql4 = "SELECT * FROM answer where question_id =  $question_id AND child_id = $child_id";
    $result4 = mysqli_query($conn,$sql4);

    // die(print_r($result4));

    while ($row  = mysqli_fetch_assoc($result2)) {
    	$instruction = $row['question_description'];
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
         .col-md-4{
        margin-bottom: 20px;
      }
      .wrong{
        float: right;
      }
    	/*	#hide{
    			display: none;
    		}*/
        #hidden{
          display: none;
        }
        h2{
          color: white;
        }
   
    	</style>
    </head>
    <body class="bg-primary">
      <div class="container">
        <div class="row p-4">
    <div class="col-md-4">
        <div class="pray text-center  shadow-sm p-3 mb-5 bg-white rounded">
          <img src="../images/home1.png" alt="image" height="120px"><br><br>
          <a href="childrenUI.php" class="btn btn-primary py-2 px-8">HOME</a>
        </div>
    </div>
       <div class="col-md-4">
        <div class="pray text-center  shadow-sm p-3 mb-5 bg-white rounded">
          <img src="../images/tick.webp" alt="image" height="120px"><br><br>
          <a href="questions.php" class="btn btn-primary py-2 px-8"> QUESTIONS</a>
        </div>
    </div>
      <div class="col-md-4">
        <div class="pray text-center  shadow-sm p-3 mb-5 bg-white rounded">
          <img src="../images/cross.png" alt="image" height="120px"><br><br>
          <a href="results.php" class="btn btn-primary py-2 px-8">CORRECTION</a>
        </div>
    </div>
    </div>
    
    	<?php
          if ($type == "TEXT") {
          	while ($row  = mysqli_fetch_assoc($result)) {
               $id = $row['id']; 
          	   $question_content_id = $row['question_id'];
               $timestamp_id = $row['timestamp_id'];
          	   $content = $row['content'];
          	   ?>
          	   <div class="row">
                <?php 
                $sql3 = "SELECT * FROM answer WHERE id = $id AND child_id = $child_id";
                $result3 = mysqli_query($conn,$sql3);
                while($rows = mysqli_fetch_assoc($result3)){
                  // die("error");
                $answer = $rows['answer'];
                $status = $rows['status'];
                $cor = $rows['corrections'];
                }

                ?>
                <?php
                   if (!isset($status)) {
                     $status = "normal";
                   }
                ?>
          	   	<div class="col-md-2"></div>
          	   	<div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
          	   		<h1 class="text-center"><?php echo $instruction; ?></h1><br>
          	   		<h5 class="text-center"><?php echo $content;?></h5><br>
                    <?php
                    if (isset($status)) {
                         if ($status == "WRONG") {
                         ?>
                         <h4 class="text-danger text-center">WRONG</h4>
                         <?php
                       }
                         elseif ($status == "CORRECT") {
                         ?>
                         <h4 class="text-success text-center">CORRECT</h4>
                         <?php
                       }
                          else {
                         ?>
                         <h4 class="text-center">NOT MARKED</h4>
                         <?php
                       }
                    
                    } 
                 
                    ?>
          	   		<div class="button">
          	   			<!-- <button onclick="myHide()" class="btn btn-primary left"> VIEW ANSWER</button> -->
          	   		</div><br>
          	   		<div id="hide">
                    <label for="question_description">ANSWER</label>
                 
                    <textarea class="form-control" id="answer" name="answer" rows="3"  ><?php if(isset($answer)){ echo($answer);} ?></textarea><br>
                    <?php
                    if (isset($status)) {
                       if ($status == "WRONG") {
                         ?>
                         <button class="btn btn-danger wrong"   onclick="correction()">VIEW CORRECTION</button>
                         <?php
                       }
                    }
                      
                    ?>
                    <br><form class="md-form" method="post" action="parent_includes/result_display.inc.php">

                    
          	       <div class="form-group">
                    <div id="hidden">
                      <label for="question_description"></label>
                      <textarea class="form-control" id="correction" name="correction" rows="3"  ><?php echo $cor; ?></textarea><br>
                     
                    </div>
                    </div>

                  	</form>
                          </div><br>
                  	   		</div>
                  	   	</div>
                  	   	<div class="col-md-2"></div>
                  	   </div><br><br>
          	   <?php
            }
            
          
        


          }
          elseif($type == "YOUTUBE"){
            while ($row  = mysqli_fetch_assoc($result)) {
               $id = $row['id']; 
          	   $question_content_id = $row['question_id'];
               $timestamp_id = $row['timestamp_id'];
          	   $content = $row['content'];
          	   $content = preg_replace("#.*youtube\.com/watch\?v=#", "", $content);
          	  
          	   ?>
          	   <div class="row">
                <?php 
                
                $sql3 = "SELECT * FROM answer WHERE id = $id AND child_id = $child_id";
                $result3 = mysqli_query($conn,$sql3);
                while($rows = mysqli_fetch_assoc($result3)){
                $answer = $rows['answer'];
                }

                ?>
          	   	<div class="col-md-2"></div>
          	   	<div class="col-md-8 shadow-sm p-3 mb-5 <?php echo($status);?> rounded">
          	   		<h1 class="text-center"><?php echo $instruction; ?></h1><br>
          	   		<div class="videoembed">
          	   			
          	   			<embed src="https://www.youtube.com/embed/<?php echo $content?>"></embed>
          	   			
          	   		</div><br>
          	   		<div class="button">
          	   			<button onclick="myHide()" class="btn btn-primary left"> VIEW ANSWER</button>
          	   		</div><br>
          	   		<div id="hide">
                  <label for="question_description">ANSWER</label>

                  <textarea class="form-control" id="ans" name="answer" rows="3" placeholder=""><?php echo $answer ?></textarea><br>

                  <form class="md-form" method="post" action="parent_includes/result_display.inc.php">
                  <button class="btn btn-success" type="submit" name="correct">CORRECT</button>
                    <?php
                       if ($status == "WRONG") {
                         ?>
                         <button class="btn btn-danger wrong"   onclick="correction()">Wrong</button>
                         <?php
                       }
                    ?>
                  
                	<div class="form-grop">
                    <div id="hidden">
                      <label for="question_description">Type Answer Here</label>
                      <textarea class="form-control" id="answer" name="answer" rows="3" placeholder="type answer..." ></textarea>
                      <button class="btn btn-primary btnn" type="submit" name="submit_ans">SUBMIT</button>
                      </div><br>
                    </div>
          	   		</form>
          	   		</div>
          	   	</div>
          	   	<div class="col-md-2"></div>
          	   </div>
          	   <?php
            }
           
          }
          elseif($type == "VIDEO"){
            while ($row  = mysqli_fetch_assoc($result)) {
               $id = $row['id']; 
          	   $question_content_id = $row['question_id'];
               $timestamp_id = $row['timestamp_id'];
          	   $content = $row['content'];
          	   ?>
          	   <div class="row">
               <?php 
                
                $sql3 = "SELECT * FROM answer WHERE id = $id AND child_id = $child_id";
                $result3 = mysqli_query($conn,$sql3);
                while($rows = mysqli_fetch_assoc($result3)){
                $answer = $rows['answer'];
                $status = $rows['status'];
                $cor = $rows['corrections'];
                }

                ?>
          	   	<div class="col-md-2"></div>
          	   	<div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
          	   		<h1 class="text-center"><?php echo $instruction; ?></h1><br>
                   <?php
                    if (isset($status)) {
                         if ($status == "WRONG") {
                         ?>
                         <h4 class="text-danger text-center">WRONG</h4>
                         <?php
                       }
                         elseif ($status == "CORRECT") {
                         ?>
                         <h4 class="text-success text-center">CORRECT</h4>
                         <?php
                       }
                          else {
                         ?>
                         <h4 class="text-center">NOT MARKED</h4>
                         <?php
                       }
                    
                    } 
                 
                    ?>
          	   		<div class="videoembed">
          	   			<video src="../uploads/<?php echo $content; ?>"  controls></video>
          	   		</div><br>
          	   
          	   		                  <label for="question_description">ANSWER</label>
                  <textarea class="form-control" id="answer" name="answer" rows="3"  ><?php if(isset($answer)){ echo($answer);} ?></textarea><br>
                    <div class="button">
                    </div>
                       <?php
                    if (isset($status)) {
                       if ($status == "WRONG") {
                         ?>
                         <button class="btn btn-danger wrong"   onclick="correction()">VIEW CORRECTION</button>
                         <?php
                       }
                    }
                      
                    ?>
                    <div id="hidden">

          	   			<div class="form-grop">
        						<label for="question_description">Type Answer Here</label>
        						<textarea class="form-control" id="answer" name="answer" rows="3" placeholder="type answer..." ><?php echo $cor; ?></textarea>
        				   	</div><br>

          	   		  </div>
          	   	</div>
          	   	<div class="col-md-2"></div>
          	   </div>
          	   <?php
            }



          }
      


      elseif($type == "IMAGE"){
      $array = array();

             ?>
               <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 shadow-sm p-3 mb-5 bg-white rounded">
                    <h1 class="text-center"><?php echo $instruction; ?></h1><br>
                    <h4 class="text-center" id="status"></h4>
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
                            $question_content_id = $row['question_id'];
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
                
                    <div id="hide">
                     <label for="question_description">ANSWER</label>
                       <?php 
                       
                        $i = 0;
                        $foundFirst = 0;
                        $answer = "";
                        if (mysqli_num_rows($result4)>0) {
                          
                          while ($row = mysqli_fetch_assoc($result4)) {
                          $id = $row['id'];
                          $ans_id = $row['answer_id'];
                          // die("error");
                          if($foundFirst == 0){
                            $answer = $row['answer'];
                            $status = $row['status'];
                            $cor = $row['corrections'];
                            $foundFirst = 1;
                          }
                          $newArray["$id"] = $row['answer'];
                          // die(print_r($newArray));
                          $newArray_status["$id"] = $row['status'];
                          $newArray_correction["$id"] = $row['corrections'];
                          $ans_array[$i] = $id;
                        ?>
                        <?php
                        $i++;
                      }
                          $encodeJson = htmlspecialchars(json_encode($newArray));
                          $encodeJson_status = htmlspecialchars(json_encode($newArray_status));
                          $encodeJson_correction = htmlspecialchars(json_encode($newArray_correction));


                          $jsonString = "\"$encodeJson\"";
                          $jsonString_status = "\"$encodeJson_status\"";
                          $jsonString_correction = "\"$encodeJson_correction\"";


                        }
               
                      ?>
                       <textarea class="form-control" id="ans" name="answer" rows="3" placeholder=""><?php echo $answer ?></textarea><br>
                        <div class="button">
                        <button class="btn btn-primary" id="prevbtn"  data-value="<?= $encodeJson ?>" data-status="<?= $encodeJson_status ?>" data-correction="<?= $encodeJson_correction?>" > < PREVIOUS </button>
                        <button class="btn btn-primary " id="nextbtn"  data-value="<?= $encodeJson ?>" >  NEXT > </button>
                        <button onclick="correction()" class="btn btn-primary left"> VIEW correction </button>
                        </div><br>    
                     
                     
                    <div id="hidden">
                       <div class="form-grop">
                        <input type='text' id="qId" value="<?php echo $array[0];?>" name="id" style="display:none;">
                        <label for="question_description">Type Answer Here</label>
                        <textarea class="form-control" id="correction" name="answer" rows="3" placeholder="type answer..." ></textarea>
                        </div><br>
                    </div>

                    </div>   
                </div>
                <div class="col-md-2"></div>
               </div>
            <?php
       
          }
    	?>
    </div>

    <script type="text/javascript">	

        function correction() {
        const x = document.getElementById("hidden");
        if(x.style.display == "none"){
                x.style.display="block";
        }else{
          x.style.display="none";
        }
      }

      // Next and Prev
      var x;
      $(document).ready(function(){
        $("#demo").carousel();

        $("#nextbtn").on('click', function(e){
          $("#demo").carousel("next");
          var jsonObj = $(this).data("value");
          var status = $(this).data("status");
          var correction = $(this).data("correction");
          var arrParam = Object.keys(jsonObj);

          console.log("Array: "+  Object.values(jsonObj) + " LEngth: "+arrParam.length);
           
          var indicatorId = $('.carousel-indicators > li.active').data('slide-to');
          console.log("current indicatorId: "+ indicatorId + " question_id: "+ arrParam[indicatorId]);  
          var qid = document.getElementById('qId');
          qId.value = arrParam[indicatorId];

          var answerField = document.getElementById('ans');
          var correctionField = document.getElementById('correction');
          console.log("AnswerId: "+qId.value+" Answer: "+ jsonObj[""+qId.value+""])
          answerField.value = jsonObj[qId.value];
          correctionField.value = correction[qId.value];
          if (indicatorId === arrParam.length) {
            indicatorId = 0;
          } else { 
            indicatorId++;
          }

          $('.carousel-indicators > li.active').removeClass('active');
          $('.carousel-indicators > li[data-slide-to="' + indicatorId + '"]').addClass('active');

          // $("#demo").carousel("prev");
        });   
      });

      $(document).ready(function(){
        $("#demo").carousel();

        $("#prevbtn").on('click', function(e){
          $("#demo").carousel("prev");
          var jsonObj = $(this).data("value");
         var arrParam = Object.keys(jsonObj);

          console.log("Array: "+  Object.values(jsonObj) + " LEngth: "+arrParam.length);

          var indicatorId = $('.carousel-indicators > li.active').data('slide-to');
          console.log("current indicatorId: "+ indicatorId + " question_id: "+ arrParam[indicatorId]);  
          var qid = document.getElementById('qId');
          qId.value = arrParam[indicatorId];
          var answerField = document.getElementById('ans');
          console.log("AnswerId: "+qId.value+" Answer: "+ jsonObj[""+qId.value+""]); 
          answerField.value = jsonObj[qId.value];
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
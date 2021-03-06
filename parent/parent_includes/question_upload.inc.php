 <?php
 session_start();
if (isset($_POST['submit'])){
	    
    require "../../includes/db.inc.php";
 //    session_start();
    // $parent_id = $_SESSION['phoneNumber'];
    $parent_id = $_SESSION['phoneNumber']; 
    // receiving and checking video type 
    if (isset($_POST['type'])&& $_POST['type']!=null) {
    	
    	$type = $_POST['type'];

    	$timestamp = mktime();

    	$question_content_id = $parent_id . $timestamp;
         
          // RECEIVING AND STORING VIDEO FILES
	     if($type=="VIDEO") {
                
            if (empty($_FILES['video_file']['name'])||empty($_POST['description'])) {
            	
            	header("Location:../question_upload.php?Error=Please Upload File(s) And Try Again");
		        exit();
            }
            else{
            $status = $_POST['status'];  
            $name = $_FILES['video_file']['name'];
			$size = $_FILES['video_file']['size'];
			$fileType = $_FILES['video_file']['type'];
			$tmp_name = $_FILES['video_file']['tmp_name'];
			$error = $_FILES['video_file']['error'];

			$description = $_POST['description'];
			
			$filecount = count($name);

			for ($i=0; $i < $filecount; $i++) { 

				$name = $_FILES['video_file']['name'][$i];
				$size = $_FILES['video_file']['size'][$i];
				$fileType = $_FILES['video_file']['type'][$i];
				$tmp_name = $_FILES['video_file']['tmp_name'][$i];
				$error = $_FILES['video_file']['error'][$i];

				$fileEX = strtolower(pathinfo($name , PATHINFO_EXTENSION));

				$maxSize = 1024 * 1024 * 20;
				$accepted = array("mkv","avi","mp4");
				$dir = "../../uploads/";

				if (!$error === 0) {
		        	header("Location:../question_upload.php?Error=File Upload Error Please Try Again");
		            exit();
		        }
				elseif ($size > $maxSize) {
					header("Location:../question_upload.php?Error=File is to large");
		            exit();
				}
				elseif (! in_array($fileEX,$accepted)){
				   header("Location:../question_upload.php?Error=Unaccepted File accepted Files are MKV AVI MP$");
		           exit();
				}
				else{
		            $sql = "INSERT INTO question_content (question_id,content,status,timestamp_id) VALUES (?,?,?,?)";

					$stmt  = mysqli_stmt_init($conn);
					 if (!mysqli_stmt_prepare($stmt,$sql)) {
							header("Location:../question_upload.php?Error=File Upload Error");
							exit();
						}
						else{
							
							mysqli_stmt_bind_param($stmt,"ssss",$question_content_id,$name,$status,$timestamp);
							mysqli_stmt_execute($stmt);	
						}
					move_uploaded_file($tmp_name,$dir.$name);	
				}
			}
  
             $sql = "INSERT INTO questions (question_id,parent_id,question_type,question_description,status) VALUES (?,?,?,?,?)";

			$stmt  = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location:../question_upload.php?Error=File Upload Error");
				exit();
			}
			else{
				
				mysqli_stmt_bind_param($stmt,"sssss",$timestamp,$parent_id,$type,$description,$status);
				mysqli_stmt_execute($stmt);	
			}

			header("Location:../question_upload.php?succes=Files Uploaded Succesfully");
			exit();
            }
	    }

        // receiving and storing image files;
    	elseif ($type=="IMAGE") {
    	 	
    	 	if (empty($_FILES['image_file']['name'])||empty($_POST['description'])) {

    	 		header("Location:../question_upload.php?Error=Please Upload File(s) And Try Again");
			    exit();
    	 	}
    	 	else{
            $status = $_POST['status'];   
            $name = $_FILES['image_file']['name'];
			$size = $_FILES['image_file']['size'];
			$fileType = $_FILES['image_file']['type'];
			$tpm_name = $_FILES['image_file']['tmp_name'];
			$error = $_FILES['image_file']['error'];

			$description = $_POST['description'];

			$filecount = count($name);

			for ($i=0; $i < $filecount  ; $i++) { 
				
				$name = $_FILES['image_file']['name'][$i];
				$size = $_FILES['image_file']['size'][$i];
				$fileType = $_FILES['image_file']['type'][$i];
				$tmp_name = $_FILES['image_file']['tmp_name'][$i];
				$error = $_FILES['image_file']['error'][$i];

				$fileEX = strtolower(pathinfo($name , PATHINFO_EXTENSION));

				$maxSize = 1024 * 1024 * 20;
				$accepted = array("jpg","jpeg","webp","png","mpeg");
				$dir = "../../uploads/";

				if (!$error === 0) {
		        	header("Location:../question_upload.php?Error=File Upload Error Please Try Again");
		            exit();
		        }
				elseif ($size > $maxSize) {
					header("Location:../question_upload.php?Error=File is to large");
		            exit();
				}
				elseif (! in_array($fileEX,$accepted)){
				   header("Location:../question_upload.php?Error=Unaccepted File accepted Files are JPG JPEG WEBP PNG MPEG");
		           exit();
				}
				else{
		            $sql = "INSERT INTO question_content (question_id,content,status,timestamp_id) VALUES (?,?,?,?)";

					$stmt  = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
						header("Location:../question_upload.php?Error=File Upload Error");
						exit();
					}
					else{
						
					mysqli_stmt_bind_param($stmt,"ssss",$question_content_id,$name,$status,$timestamp);
					mysqli_stmt_execute($stmt);
						
					}
					move_uploaded_file($tmp_name,$dir.$name);	
				}
			}

            $sql = "INSERT INTO questions (question_id,parent_id,question_type,question_description,status) VALUES (?,?,?,?,?)";

			$stmt  = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location:../question_upload.php?Error=File Upload Error");
				exit();
			}
			else{
				
				mysqli_stmt_bind_param($stmt,"sssss",$timestamp,$parent_id, $type,$description,$status);
				mysqli_stmt_execute($stmt);	
			}

			header("Location:../question_upload.php?succes=Files Uploaded Succesfully");
			exit();
    	 	}
	    }

	   

	    // RECEIVING AND STORING TEXT FILES

	    else if($type=="TEXT") {
             
	      if (empty($_POST['text'])||empty($_POST['description'])) {
	        header("Location:../question_upload.php?Error=Please Upload File(s) And Try Again");
		    exit();
	        }
	        else{
	        	$status = $_POST['status'];
	            $description = $_POST['description'];
				$Text = $_POST['text'];

				$sql = "INSERT INTO questions(question_id,parent_id,question_type,question_description,status) VALUES (?,?,?,?,?)";
                $sql2 = "INSERT INTO question_content(question_id,content,status,timestamp_id) VALUES (?,?,?,?)";

				$stmt  = mysqli_stmt_init($conn);
				$stmt2  = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)||!mysqli_stmt_prepare($stmt2,$sql2)) {
					header("Location:../question_upload.php?Error=Text Upload Error");
					exit();
				}
				else{	
				mysqli_stmt_bind_param($stmt,"sssss",$timestamp,$parent_id,$type,$description,$status);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_param($stmt2,"ssss",$question_content_id,$Text,$status,$timestamp);
				mysqli_stmt_execute($stmt2);	
				}
				header("Location:../question_upload.php?succes=Uploaded Succesfully");
				exit();
	        }
	    }

	    // RECIEVE AND STORE YOUTUBE LINKS

	    else if ($type=="YOUTUBE") {

           if (empty($_POST['Youtube_link'])||empty($_POST['description'])) {
           	header("Location:../question_upload.php?Error=Please Upload File(s) And Try Again");
		    exit();
           }else{
           	    $status = $_POST['status'];
                $description = $_POST['description'];
				$youtube_links = $_POST['Youtube_link'];

				$sql = "INSERT INTO questions(question_id,parent_id,question_type,question_description,status) VALUES (?,?,?,?,?)";
				$sql2 = "INSERT INTO question_content (question_id,content,status,timestamp_id) VALUES (?,?,?,?)";
				$stmt  = mysqli_stmt_init($conn);
				$stmt2  = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)||!mysqli_stmt_prepare($stmt2,$sql2)) {
				header("Location:../question_upload.php?Error=Text Upload Error");
				exit();
				}
				else{
					
				mysqli_stmt_bind_param($stmt,"sssss",$timestamp,$parent_id,$type,$description,$status);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_param($stmt2,"ssss",$question_content_id,$youtube_links,$status,$timestamp);
				mysqli_stmt_execute($stmt2);	
				}
				header("Location:../question_upload.php?succes=Uploaded Succesfully");
				exit();
           }
	    }
	    else{
	    	header("Location:../question_upload.php?Error=Error Choose A File Format And Continue");
	        exit();
	    }
    }
    else{
       header("Location:../question_upload.php?Error=Error Chose A File Format And Continue");
	   exit();
    }    
}	
else{
header("Location:../question_upload.php?Error=Error Please Try Again");
exit();
}
	
	 
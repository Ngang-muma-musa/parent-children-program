<?php
session_start();
$parent_id = $_SESSION['phoneNumber'];
$email = $_SESSION['email'];
if (!isset($email) && !isset($parent_id)) {
  header("Location:index.php");
  exit();
}else{
    ?>
    <!DOCTYPE   html>
    <head>
        <?php include '../includes/styles_js_importer.php'; ?>
        <title>Create Child</title>
    </head>
    <body class="bg-primary">
        <div class="container  bg-primary p-4">
       
            <div    class="row">
                <div class="col-sm-3"></div>
                
                <div class="col-md-6">
                    <div class="jumbotron  bg-white  m-1">
                                 <?php
                                  include"header.php";
                                ?>
                         <small>Please fill in this form to create an account for your child.</small><hr></p>
                         <form name="" method="POST"  action="parent_includes/create_child.inc.php">
                            <div    class="form-group">
                                <label  for="name"> Name:</label>
                                <input  type="text"  class="form-control" placeholder="Enter name"  name="name">
                            </div>
                         <div    class="form-group">
                            <label  for="age">  Age:</label>
                            <input  type="number"  class="form-control" placeholder="Enter Age"  name="age">
                         </div>  
                         <div  class="form-group">
                            <label  for="pwd">  Password:</label>
                            <input  type="password"  class="form-control" placeholder="Password"  name="pwd">
                         </div>
                         <div    class="form-group">
                            <label  for="pwd">  Confirm Password:</label>
                            <input  type="password"  class="form-control" placeholder="Confirm Password"  name="cfm_pwd">
                            </div>  
                        <button type="submit" name="submit" class="btn btn-primary">Create account</button>
                        </form>
                    </div>
                </div>
                
                <div class="col-sm-3">  </div>
            </div>
        </div>
    </body>
</html> 
    <?php
}
?>

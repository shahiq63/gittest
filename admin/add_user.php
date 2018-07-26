<?php include("includes/header.php"); ?>


<?php
$test="";  
if(isset($_POST['add']))
{
  $user = new User();
    $user->username = $_POST['username'];
    $user->password  =$_POST['password'];
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
 

    if ($user->create($_FILES['file_upload'])) {
    
        $test = "File uploaded successfully";

    }
    else
    {
        $test ="Error in uploading file";
    }
    
}
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
         

        <?php include ("includes/top.php");?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include ("includes/side.php"); ?>
        
        </nav>

        <div id="page-wrapper">

              <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add User
                            <small>Subheading</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                            
                                <div class="form-group">
                                  <label for="caption"> UserName</label>  
                                 <input type="text" name="username" class="form-control" required>   
                                </div>

                                 <div class="form-group">
                                      <label for="caption">Password</label>  

                                     <input type="password" name="password" class="form-control" required>   

                                </div>
                                <div class="form-group">
                                      <label for="caption">First Name</label>  

                                     <input type="text" name="firstname" class="form-control" required>   

                                </div>
                                <div class="form-group">
                                      <label for="caption">Last Name</label>  
                                      <input type="text" name="lastname" class="form-control" required>
  
                                </div>
                                
                                 <br>

                                <input type="file" name="file_upload" required>
                                

                                 <div class="info-box-update pull-left ">
                                    <input type="submit" name="add" value="ADD USER" class="btn btn-primary">
                                </div> 

                                <div class="form-group">
                                    <p>
                                        
                                        <?php echo  $test; ?>
                                    </p>

                                </div>

                        </div>

                        
                    </form>
   







                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
<?php include("includes/header.php"); ?>


<?php
     $test="";  


$id = $_GET['id'];

$user = new User();

$res = $user->find_user_by_id($id);

$resarr = mysqli_fetch_assoc($res);

$username = $resarr['username'];

$filename = $resarr['filename'];

$password = $resarr['password'];

$firstname = $resarr['firstname'];

$lastname  = $resarr['lastname'];

if(isset($_POST['add']))
{
 

    
    $user->username = $_POST['username'];
    $user->password  =$_POST['password'];
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];


    if(empty($_FILES['file_upload']['name']))
    {

            $user->filename = $filename;

            $user->update($id);
            $test= "Data updated successfully";
    }
    else
    {
        $tmp_path = $_FILES['file_upload']['tmp_name'];

        $user->filename = $_FILES['file_upload']['name'];

        $filename = $user->filename;

        if(move_uploaded_file($tmp_path,"includes/uploads" .'/'.$user->filename))
        {
            $user->update($id);
            $test= "Data updated successfully";
        }
        else
        {
            $test = "Error in uploading File";
        }
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
                            Edit User
                            <small>Subheading</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                            
                            <div class="form-group">
                                    <img style = "height: 200px; width: 200px;"src="includes/uploads/<?php echo $filename;?>">  
                            </div>


                                <div class="form-group">
                                  <label for="caption"> UserName</label>  
                                 <input type="text" name="username" class="form-control" value="<?php echo $username;  ?>">   
                                </div>

                                 <div class="form-group">
                                      <label for="caption">Password</label>  

                                     <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">   

                                </div>
                                <div class="form-group">
                                      <label for="caption">First Name</label>  

                                     <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">   

                                </div>
                                <div class="form-group">
                                      <label for="caption">Last Name</label>  
                                      <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
  
                                </div>
                                
                                 <br>

                                <input type="file" name="file_upload">
                                <br>

                                 <div class="form-group ">

                                    <input type="submit" name="add" value="Update User" class="btn btn-primary">
                                      <a href="delete_user.php?id=<?php echo $id;  ?>" class="btn btn-danger pull-right"> Delete User</a> 
                                

                                </div> 
                                <br>
                                <br>

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
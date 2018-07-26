<?php include("includes/header.php"); ?>

<?php


if(!$session->is_signed_in())
{

    header("Location: login.php");


}

?>

<?php 

    $test="";

if(isset($_POST['Submit']))
{


    $photos = new Photo();


    if ($photos->create($_FILES['file_upload'])) {
    
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
                            Uploads
                            <small>Subheading</small>
                        </h1>

                        <form action="uploads.php" enctype="multipart/form-data" method="post">

                            <input type="file" name="file_upload" required>


                            <br>
                            <input type="submit" name="Submit">
                            <br>

                            <p>
                                <?php echo $test;  ?>

                            </p>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
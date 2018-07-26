<?php include("includes/header.php"); ?>


<?php
    

    $photos = new Photo();

    $res = $photos->find_photo_by_id($_GET['id']);

    $resshow = mysqli_fetch_assoc($res);

    $title = $resshow['title'];
    $description = $resshow ['description'];
    $filename = $resshow['filename'];
    $type = $resshow['type'];
    $caption = $resshow['caption'];
    $alternate_text = $resshow['alternate_text'];
    $size  = $resshow['size'];

    if(isset($_POST['update']))
    {

            $photos->title= $_POST['title'];
            $photos->description=$_POST['description'];
            $photos->filename = $filename;
            $photos->type = $type;
            $photos->caption = $_POST['caption'];
            $photos->alternate_text = $_POST['alternate_text'];
            $photos->size = $size;

            if($photos->update($_GET['id']))
            {
                echo "Record Updated Successfully";
            }
            else{
                echo "Error in updating Record";
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
                            Photos
                            <small>Subheading</small>
                        </h1>

                        <form action="" method="post">
                        <div class="col-md-8">
                            
                                <div class="form-group">

                                 <input type="text" name="title" class="form-control" value="<?php echo $title;  ?>">   
                                </div>

                                <div class="form-group">
                                    <a class="thumbnail" href="#"><img  src="includes/uploads/<?php echo $filename;?>" alt="photos"  style="height: 200px ; width: 200px;"></a>


                                </div>
                                 <div class="form-group">
                                      <label for="caption">Caption</label>  

                                     <input type="text" name="caption" class="form-control" value="<?php echo $caption;  ?>">   

                                </div>
                                <div class="form-group">
                                      <label for="caption">Alternate Text</label>  

                                     <input type="text" name="alternate_text" class="form-control" value="<?php echo $alternate_text; ?>">   

                                </div>
                                <div class="form-group">
                                      <label for="caption">Description</label>  
            <textarea class="form-control" name ="description" id ="" rows="10" cols="30"><?php echo $description;?></textarea>

  
                                </div>

                        </div>

                         <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                  <p class="text ">
                                    Photo Id: <span class="data photo_id_box"><?php echo $_GET['id']; ?></span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data"> <?php echo $filename; ?> </span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data"> <?php echo $type; ?> </span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data"> <?php echo $size;  ?></span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $_GET['id']; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
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
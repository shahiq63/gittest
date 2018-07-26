<?php include("includes/header.php"); ?>


<?php
    

    $photos = new Photo();

    $res = $photos->find_all_photos();

    $comments = new Comment();

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
                        <div class="col-md-12">
                            <table  class="table table-hover">
                                <thead>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </thead>
                                <tbody>
                                <?php  
                                while ($resshow = mysqli_fetch_assoc($res)) : ?>
                                    
                                
                                <tr>

                                    <td> <img style="height: 200px ; width: 200px"src="includes/uploads/<?php echo $resshow['filename']; ?>" alt ="this is new" >

                                       <div class="pictures_link">
                                        <a href="delete_photo.php?id=<?php echo $resshow['photo_id']; ?>">Delete</a>
                                        <a href="edit.php?id=<?php echo $resshow['photo_id']; ?>">Edit</a>
                                        <a href="../photo.php?id=<?php echo$resshow['photo_id'];?>">View</a>
                                           
                                       </div> 
                                    </td>
                                    <td> <?php echo $resshow['photo_id']; ?></td>
                                    <td><?php echo $resshow['photo_id']; ?></td>
                                    <td><?php echo $resshow['title'] ;?></td>
                                    <td><?php echo $resshow['description']; ?></td>
                                    <td>

                                         <a href="comment_by_id.php?id=<?php echo$resshow['photo_id'];?>">  <?php 

                                        $result = $comments->find_the_comments($resshow['photo_id']);

                                         $rowcount=mysqli_num_rows($result);

                                         echo $rowcount;

                                    ?> </a> 
                                  

                                </td>
                                 </tr>   
                                <?php  endwhile;
                                ?>
                            
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
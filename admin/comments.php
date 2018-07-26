<?php include("includes/header.php"); ?>


<?php
    

   // $photo_arr [] = array();
    $comment = new Comment();

    $res = $comment->find_all_comments();

    $photo = new Photo();

   

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
                            comment
                            <small>Subheading</small>
                        </h1>

                        <div class="col-md-12">
                            <table  class="table table-hover">
                                <thead>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    
                                </thead>
                                <tbody>
                                <?php  
                                while ($resshow = mysqli_fetch_assoc($res)) : ?>
                                    
                                
                                <tr>
                                    <?php


                                        $imagename="";
                                        
                                        $photo_res = $photo->find_photo_by_id($resshow['photo_id']);
            
                                        $get_photo_arr = mysqli_fetch_assoc($photo_res);

                                        if(!empty($get_photo_arr['filename'])){


                                            $imagename = "includes/uploads/".$get_photo_arr['filename'];
                                        }
                                        else
                                        {
                                            $imagename="includes/uploads/placeholder.png";

                                        }

                                      ?>

                                    <td> <img style="height: 200px ; width: 200px"src="<?php echo $imagename; ?>" alt ="Profile Photo" >

                                       <div class="pictures_link">
                                        <a href="delete_comment.php?id=<?php echo $resshow['id']; ?>">Delete</a>
                                        
                                       </div> 
                                    </td>
                                    <td> <?php echo $resshow['id']; ?></td>
                                    <td><?php echo $resshow['author']; ?></td>
                                    <td><?php echo $resshow['body'] ;?></td>
                                    
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
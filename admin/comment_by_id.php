<?php include("includes/header.php"); ?>


<?php
    

    $comment = new Comment();

    $res = $comment->find_the_comments($_GET['id']);

   

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
                            Individul Comments
                            <small>Subheading</small>
                        </h1>

                        <div class="col-md-12">
                            <table  class="table table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                </thead>
                                <tbody>
                                <?php  
                                while ($resshow = mysqli_fetch_assoc($res)) : ?>
                                    
                                
                                <tr>
                                    
                            
                                 
                                    <td> <?php echo $resshow['id']; ?>
                                        
                                         <div class="pictures_link">
                                        <a href="delete_comment.php?id=<?php echo $resshow['id']; ?>">Delete</a>
                                        
                                       </div> 

                                    </td>
                                    <td><?php echo $resshow['author']; ?></td>
                                    <td>

                                        <?php echo $resshow['body'] ;?> 

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
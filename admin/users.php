<?php include("includes/header.php"); ?>


<?php
    

    $users = new User();

    $res = $users->find_all_user();

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
                            users
                            <small>Subheading</small>
                        </h1>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>

                        <div class="col-md-12">
                            <table  class="table table-hover">
                                <thead>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>UserName</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </thead>
                                <tbody>
                                <?php  
                                while ($resshow = mysqli_fetch_assoc($res)) : ?>
                                    
                                
                                <tr>
                                    <?php

                                        $imagename="";

                                        if(empty($resshow['filename']))
                                        {
                                            $imagename="includes/uploads/placeholder.png";

                                        }
                                        else
                                        {
                                            $imagename = "includes/uploads/".$resshow['filename'];
                                        }

                                      ?>

                                    <td> <img style="height: 200px ; width: 200px"src="<?php echo $imagename; ?>" alt ="Profile Photo" >

                                       <div class="pictures_link">
                                        <a href="delete_user.php?id=<?php echo $resshow['id']; ?>">Delete</a>
                                        <a href="edit_user.php?id=<?php echo $resshow['id']; ?>">Edit</a>
                                        <a href="#">View</a>
                                           
                                       </div> 
                                    </td>
                                    <td> <?php echo $resshow['id']; ?></td>
                                    <td><?php echo $resshow['username']; ?></td>
                                    <td><?php echo $resshow['firstname'] ;?></td>
                                    <td><?php echo $resshow['lastname']; ?></td>
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
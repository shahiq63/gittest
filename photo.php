
<?php 
require_once ("admin/includes/init.php");

require_once ("admin/includes/photo.php");
 ?>
<?php


    $fetch_comments = new Comment();

    $comments_res = $fetch_comments->find_the_comments($_GET['id']);

    $test = "";

    if(empty($_GET['id']))
    {
        header("Location: index.php");
    }



    $photo = new Photo();

    $res = $photo->find_photo_by_id($_GET['id']);

    $res_arr = mysqli_fetch_assoc($res);

    $title = $res_arr['title'];

    $description = $res_arr['description'];

    $filename = $res_arr['filename'];

    if(isset($_POST['submit'])){

      $author = $_POST['author_name'];
      $body = $_POST['body'];

      $Comment = new Comment();
      $Comment->photo_id = $_GET['id'];
      $Comment->author = $author;
      $Comment->body = $body; 


     if($Comment->insert_comments()){

        $test = "Your Comment is Posted";

        header("Location: photo.php?id={$_GET['id']}");     

        }
     else
     {
        $test = "Error in Posting Comment";
     }

  }

?>




<?php include("includes/header.php"); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $title;  ?></h1>

                <!-- Author -->

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/includes/uploads/<?php echo $filename; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    <?php echo $description;  ?>

                </p>
    

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->


                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">

                        <div class="form-group">
                            <input type="text" name="author_name" placeholder="Author Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3" required></textarea>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <p> <?php echo $test;  ?></p>
                </div>

                <hr>


                <!-- Posted Comments -->

                <!-- Comment -->
               <?php while ($c_arr = mysqli_fetch_assoc($comments_res)): ?> 
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $c_arr['author']; ?>
                        </h4>
                        <?php  echo $c_arr['body']; ?>
                    </div>
                </div>
                  <?php  endwhile; ?>

                <!-- Comment -->
               

            <!-- Blog Sidebar Widgets Column -->
           <?php include("includes/footer.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php


if(!$session->is_signed_in())
{

    header("Location: login.php");


}

?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
         

        <?php 

        include ("includes/top.php");


          ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                include ("includes/side.php");

              ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

               <?php
                include ("includes/admin_content.php");

              ?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
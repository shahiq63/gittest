<?php 
      require_once  ("init.php");  
 ?>
<div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                            <?php

                                 $photo = new Photo();

                            /*    $photo->title = "new photo";
                                $photo->description = "This is description of new photo";
                                $photo->filename = "new.png";
                                $photo->type = "this is new photo type";
                                $photo->size = 154;

                                $photo->create();    

                            */
                                $p = $photo->find_all_photos();
                                
                                 while ($res = mysqli_fetch_assoc($p)) {

                                       echo $res['title'] ."<br>"; 

                                 }    





                         /*       $obj = array();

                                $user = new User();

                                $res = $user->find_all_user();

                                $resbyid =$user->find_user_by_id(1);

                                while ( $resarr = mysqli_fetch_assoc($resbyid))
                                {


                                    $user1 = new User();

                                    $user1->id = $resarr['id'];

                                    $user1->username = $resarr['username'];
                                
                                    $user1->password = $resarr['password'];

                                    $user1->firstname = $resarr['firstname'];

                                    $user1->lastname =  $resarr['lastname'];

                                    $obj[] = $user1;

                                }

                                for ($i=0; $i <sizeof($obj) ; $i++) { 


                                        echo $obj[$i]->username."<br>" ;
                                      
                                    }    

                                    */
                              ?>

                            <?php
                                /*

                                    $new_user = new User();

                                    $new_user->username = "square63";
                                    $new_user->password = "123456";
                                    $new_user->firstname ="square";
                                    $new_user->lastname ="63";

                                    $new_user->create();


                                    $update_user = new User();

                                    $checkres = $update_user->find_user_by_id(1);

                                    $resarrr = mysqli_fetch_assoc($checkres);

                                    $update_user->username = $resarrr['username'];
                                    $update_user->password = $resarrr['password'];
                                    $update_user->firstname = $resarrr ['firstname'];
                                    $update_user->lastname = "updated";

                                    $update_user->update(1);

                                  */  




                              ?>


                        <ol class="breadcrumb">
                            <li>
                             <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
<?php
require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

    <!-- Left Panel -->
    <?php include 'includes/left_panel.php'; ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php'; ?>
        <!-- Header-->


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <?php if($_SESSION['role']==3){?>

        <div class="content mt-1">
                <div class="col-xl-3 col-lg-6">
                    <?php 
                    $users = $db->runQuery('*', USER, "username='".$_SESSION['username']."'");
                    foreach ($users as $user) {
                    ?> 
                <section class="card">
                    <div class="twt-feed blue-bg">
                        <div class="media">
                            <a href="#">
                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="dist/profile/<?php echo $user['image']?>">
                            </a>
                            <div class="media-body">
                                <h2 class="text-white display-6"><?php echo $user['name'];?></h2>
                                
                            </div>
                        </div>
                    </div>
                    <div class="weather-category twt-category">
                        <ul>
                            <li class="active">
                                <h5>Email</h5>
                                <?php echo $user['username'];?>
                            </li>

                            <li>
                                <h5>Mobile</h5>
                                <?php echo $user['mobile'];?>
                            </li>
                        </ul>
                    </div>

                    <footer class="twt-footer">
                        <a href="#">Department:-</a>
                        <?php echo $user['department'];?>
                        <span class="pull-right">
                         <a href="my-profile.php">View More</a>
                        </span>
                    </footer>
                </section>
                <?php } ?>
            </div>      
            <a href="booking.php"> <div class="col-lg-4 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-laptop"><span>Plan My Trip</span></i>
                    <ul>
                        <li>
                       Plan My Trip
                        
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col--></a>


            <a href="show_newBooking.php">
                <div class="col-lg-4 col-md-6">
                <div class="social-box twitter">
               <i class="fa fa-table"><span>My Booking</span></i>
                    <ul>
                        <li>
                            <?php ?>
                        View My Booking Status
                        <?php 
                        $booking = $db->runQuery('*', booking, "email='".$_SESSION['username']."'");  $userbook = $db->runQuery('*', 'booking', 'voucher=0');

                        $bookinguser = $db->runQuery('*', 'booking', 'voucher="NULL" ');
                        $statusdown = $db->runQuery('*', 'booking', 'status="1" && email="'.$_SESSION['username'].'"' );

                        $statuspend = $db->runQuery('*', 'booking', 'status="NULL" && email="'.$_SESSION['username'].'"' );

                        if($userbook['status']==0){ ?>
                        <span class="badge badge-danger">Pending:<?php echo count($statuspend);?></span>
                        <?php } if($userbook['status']==0) { ?>
                        <span class="badge badge-success">Download:<?php echo count($statusdown);?></span>
                        <?php   }?>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col--></a>
 
            <!--/.col-->
        


        </div> <!-- .content -->
        <?php }?>
         <?php if($_SESSION['role']==2){?>
            <?php 
                    $db->connect();
                    $users = $db->runQuery('*', USER, '1');
                    //print_r($users); die();
                    $books = $db->runQuery('*', 'booking', '1');
                    $userbook = $db->runQuery('*', USER, 'status=0');
                    
                    ?> 
        <div class="content mt-2">
            
            <a href="show_users.php">
                <div class="col-lg-4 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-users"><span>Total User</span></i>
                    <ul>
                        <li>
                        <strong><span class="count"><?php echo count($users);?></span>  <span>User</span></strong>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->
        </a>

        <a href="show_requests.php">
            <div class="col-lg-4 col-md-6">
                <div class="social-box twitter">
               <i class="fa fa-info"><span>Total Inquiries</span></i>
                    <ul>
                        <li>
                    <strong><span class="count"><?php echo count($books);?></span>  <span>Inquiries</span></strong>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->
            </a>
            <a href="pending_inquiry.php">
           <div class="col-lg-4 col-md-6">
                <div class="social-box google-plus">
                       <i class="fa fa-envelope"><span>Pending Inquiries</span></i>
                    <ul>
                        <li>
                           
                            <strong><span class="count"><?php echo count($userbook);?></span>  <span>Inquiries</span></strong>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div>
            <!--/.col-->
        </a>



        </div> <!-- .content -->
                <?php }?>
                 <?php if($_SESSION['role']==1){?>
                     <?php 
                    $db->connect();
                    $users = $db->runQuery('*', USER, '1');
                    //print_r($users); die();
                    $books = $db->runQuery('*', 'booking', '1');
                     $userbook = $db->runQuery('*', USER, 'status=0');
                     
                    ?> 
            <div class="content mt-3">
            
            <div class="col-lg-4 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-users"><span>Total User</span></i>
                    <ul>
                        <li>
                        <strong><span class="count"><?php echo count($users);?></span>  <span>User</span></strong>
                        
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-4 col-md-6">
                <div class="social-box twitter">
               <i class="fa fa-info"><span>Total Inquiries</span></i>
                    <ul>
                        <li>
                    <strong><span class="count"><?php echo count($books);?></span>  <span>Inquiries</span></strong>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->
            
            
              <div class="col-lg-4 col-md-6">
                <div class="social-box google-plus">
                       <i class="fa fa-envelope"><span>Pending Approvals</span></i>
                    <ul>
                        <li>
                     <strong><span class="count"><?php echo count($userbook);?></span> <span>Approvals</span></strong>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div>
            <!--/.col-->



        </div> <!-- .content -->  
        <?php }?>  
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>


    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>


</body>
</html>

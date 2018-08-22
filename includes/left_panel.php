<?php
$username = $_SESSION['username'];

if ($_SESSION['role']==1) {
    $table = ADMIN;
}else if ($_SESSION['role']==2) {
    $table = ADMIN;
}else if ($_SESSION['role']==3) {
    $table = USER;
}

$admin = $db->select('*', $table, "username='$username'");
//echo $admin['first_name'];
?>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand">
                    <?php 
                        if ($_SESSION['role']=='1') { ?>
                            <img src="images/Adminlogo.jpg">
                        <?php }else if ($_SESSION['role']=='2') { ?>
                            <img src="images/bigTravellogo.jpg">
                        <?php }else{ 
                         if(!empty($admin['image'])){ ?>
                           <img src="dist/profile/<?= $admin['image']; ?>">
                        <?php }else{ ?>
                           <img src="images/admin.png">
                        <?php } ?>

                    <?php    }
                    ?>
                </a>
                <a class="navbar-brand">
                    <?= $admin['name']; ?> </a> 
                <a class="navbar-brand hidden" href="">
                    <?php 
                        if ($_SESSION['role']=='1') {  ?>
                            <img src="images/Adminlogo.jpg">
                        <?php }else if ($_SESSION['role']=='2') { ?>
                            <img src="images/Travellogo.jpg">
                        <?php }else{  

                         if(!empty($admin['image'])){ ?>
                           <img src="dist/profile/<?= $admin['image']; ?>">
                        <?php }else{ ?>
                           <img src="images/admin.png">
                        <?php }

                        }
                    ?>
                    
                </a>
                    
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <!-- <h3 class="menu-title">UI elements</h3> --><!-- /.menu-title -->
                    <?php 
                    if ($_SESSION['role'] =='1') { ?>   
                        <li>
                            <a href="show_users.php"> <i class="menu-icon ti-email"></i>Show Users</a>
                        </li>
                        <!-- <li>
                            <a href="show_requests.php"> <i class="menu-icon ti-email"></i>Show Requests</a>
                        </li> -->
                    
                    <?php }
                    ?>

                    <?php 
                    if ($_SESSION['role'] =='2') { ?>   
                        <li>
                            <a href="show_users.php"> <i class="menu-icon ti-email"></i>Total Users</a>
                        </li>
                        <li>
                            <a href="show_requests.php"> <i class="menu-icon ti-email"></i>Total Inquiry</a>
                        </li>
                        <li>
                            <a href="pending_inquiry.php"> <i class="menu-icon fa fa-table"></i>Total Pending Inquiry</a>
                        </li>
                        <li>
                            <a href="reporttrip.php"> <i class="menu-icon fa fa-table"></i>Report</a>
                        </li>
                        
                    
                    <?php }
                    ?>

                    <?php 
                    if ($_SESSION['role'] =='3') { ?>   

                    <li class="menu-item">
                        <a href="booking.php"><div class="menu-icon fa fa-laptop"></div>Plan My Trip  </a>
                    </li>
                    <li class="menu-item">
                        <a href="show_newBooking.php"><div class="menu-icon fa fa-laptop"></div>My Booking</a>
                    </li>
                      
                    <!-- <li class="menu-item">
                        <a href="show_oldBooking.php"><div class="menu-icon fa fa-laptop"></div>Old Booking History</a>
                    </li>  -->
                    
                    <?php }
                    ?>
<li class="menu-item">
                        <a href="logout.php"><div class="menu-icon fa fa-laptop"></div>Log Out</a>
                    </li>

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
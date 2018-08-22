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
    <title>Show Users</title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                        <h1>Show Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li class="active">Show Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="session_username" name="session_username" value="<?= $_SESSION['username']; ?>" hidden="true">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                         <th>Aadhar No</th>
                        <th>Pan Card</th>
                        <th>Last Login</th>
                        <?php 

                        if (!empty($_SESSION['role'])) {

                            if($_SESSION['role'] =='1'){?>
                        <th>Action</th>
                        <?php } } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $count = 1;
                    $users = $db->runQuery('*', USER, "role='3' ");
                    foreach ($users as $user) {
                    ?> 
                      <tr>
                        <td><?= $count; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['mobile']; ?></td>
                        <td><?= $user['adhar_no']; ?></td>
                        <td><?= $user['pancard']; ?></td>
                        <td><?= $user['updated_at']; ?></td>
                        
                        <?php 
                        if (!empty($_SESSION['role'])) {
                            
                           if($_SESSION['role'] =='1'){ ?>
                            <td>
                                <label class="switch switch-3d switch-danger mt-1 size-sm"> 
                                  <input type="checkbox" name="check" class="switch-input" id="<?= $user['user_id']; ?>" onchange="approvel(this)" <?php if($user['status']=='0'){echo " checked='true' ";} ?>> 
                                <span class="switch-label"></span> <span class="switch-handle"></span></label>
                            </td>
                        <?php }

                          }
                        ?>
                      </tr>
                    <?php $count++; } ?>
                    </tbody>
                  </table>
                        </div>
                      
                    </div>
                </div>
 

                </div> 
            </div><!-- .animated --> 
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
        function del(argument) {
            var del_id = $(argument).attr("id");
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: { 
                    'action': 'delete_record',
                    't': 'users',
                    'id': del_id 
                },
                success: function(msg){
                   //alert(msg);
                }
            }); 
        }

        function approvel(obj) {
          var user_id = $(obj).attr("id");
          if($(obj).is(":checked")){
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: { 
                    'action': 'change_status',
                    'status': '0',
                    't': 'user',
                    'id': user_id 
                },
                success: function(msg){
                   alert('Disapproved User');
                }
            }); 
          }else{
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: { 
                    'action': 'change_status',
                    'status': '1',
                    't': 'user',
                    'id': user_id 
                },
                success: function(msg){
                   alert('Approved for login');
                }
            }); 
          }
          
        }
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>




    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


</body>
</html>
<?php
session_start();
if (empty($_SESSION['role'])) {
   echo "<script> document.location.href='login.php';</script>"; 
}

require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();

$username = $_SESSION['username'];

?>

<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking Status</title>
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
                        <h1>Booking Status</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Booking Status</li>
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
                            <a href="booking.php" class="btn btn-primary pull-right" style="margin-left: 10px;">Hotel Booking</a>
                           <!--  <a href="flight.php" class="btn btn-primary pull-right">Travel Booking</a> -->
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sr.</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Download</th>
                        <th>Invoice Id</th>
                        <th>Cancel/Confirm</th>
                        <th>Amendment</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $count = 1;
                    
                    $data = $db->runQuery('*', 'booking', "email='$username'");
                    
                    foreach ($data as $value) {
// pr($value);
                    ?> 
                      <tr>
                        <td><?= $count++; ?></td>
                        <td><?= $value['created_at'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="showDescription(this)" id="<?= $value['booking_msg']; ?>">View</button>
                        </td>
                        <td>
                           <?= $value['voucher'] != '' ? '<a class="btn btn-success" href="downloadVoucher.php?voucher='.$value['voucher'].' ">Download</a>' : '<a class="btn btn-danger">Pending</a>' ?>
                        </td>
                        
                        <td><?= $value['voucher'] != '' ? '<a class="btn btn-success"><i class="fa fa-check"></i></a>' : '<a class="btn btn-danger">Pending</a>' ?></td>
                         <td>
                            <?php if($value['cancellation']==1){?>
                            <a class="btn btn-danger"   href="confirm.php?confirm=<?= $value['book_id'];?>" ><i class="fa fa-times-circle-o"></i></a>
                        <?php } else { ?>
                            <a class="btn btn-success"  href="confirm.php?cancel=<?= $value['book_id'];?>" ><i class="fa fa-check"></i></a>
                        <?php }?>
                         </td>
                         <td><a href="amendment.php?id=<?= $value['book_id'];?>" class="btn btn-info"><i class="fa fa-arrow-right"></i></a></td>
                      </tr>
                    <?php   } ?>
                    </tbody>
                  </table>
                        </div>
                        
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
 

                </div> 
            </div><!-- .animated --> 
        </div><!-- .content -->


    </div><!-- /#right-panel -->


<!-- view description Modal -->
<div class="description modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabelDescription"></h5> Booking Message
                <button type="button" class="close" onclick="modalclose()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div id="description22">  </div>

            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="modalclose()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>

<script type="text/javascript">
    function showDescription(argument) {
            
            var description = $(argument).attr("id");
            
            $('.description').addClass('modal fade show in').attr('aria-hidden', 'false').css('display', 'block');
//            $('#description22').show();
            var ele = document.getElementById('mediumModalLabelDescription');
            console.log(argument.getAttribute('t'));
            ele.textContent = argument.getAttribute('t');
            
            $('#description22').html(description);
        }
        
        function modalclose() {
            $('.description').removeClass('show in').attr('aria-hidden', 'true').css('display', 'none');;
            $('#description22').html();
        }
</script>


    <script type="text/javascript">
        $(document).ready(function (e) {
            $("#uploadForm1").on('submit', (function (e) {

                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: "actions.php",
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        
                        if (response!='false') {
                            $('#alert1').show();
                            $("#alert1").html('The product has been successfully added.').addClass('alert alert-success').fadeOut(3000);
                              setTimeout(function(){ window.location = ''; }, 3000);
                        } else {
                            $('#alert1').show();
                            $("#alert1").html('The product could not be added.').addClass('alert alert-danger').fadeOut(3000);
                        }
                    },
                    error: function () {
                    }
                });
            }));
            
            <?php 
         $username = $_SESSION['username'];
         $products = $db->runQuery('*', PRODUCTS, "username='$username'");
        foreach ($products as $product) {  ?>
            $("#updateProductForm_<?= $product['id']; ?>").on('submit', (function (e) {
                
                e.preventDefault();
                var formData = new FormData($(this)[0]);
               // console.log(formData); return;

                $.ajax({
                    url: "actions.php",
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (returndata) {
                       if (returndata!='false') {
                            $("#alert_" + <?= $product['id']; ?>).show();
                            $("#alert_" + <?= $product['id']; ?>).html('The product has been successfully updated.').addClass('alert alert-success').fadeOut(3000);
                            setTimeout(function(){ window.location = ''; }, 3000);
                       }
                    },
                    error: function () {
                    }
                });
            }));
              <?php } ?>
        });

        function removeFromList(book_id) {
            //var book_id = $(argument).attr("id");
            //alert(book_id);
            var table_name = 'booking';
            $.ajax({
                url: 'actions.php',
                type: 'POST',
                data: { 
                  //  'action': 'delete_record',
                    't': table_name,
                    'book_id': book_id 
                },
                success: function(msg){
                   //alert(msg);
                    //setTimeout(function(){ window.location = ''; }, 100);
                }
            });
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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html>

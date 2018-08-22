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
    <title>Show Requests</title>
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
                        <h1>Show Requests</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Show Requests</li>
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
                                <th>Sr.</th>
                                <th>Email</th>
                                <th>Voucher</th>
                                <th>Add Voucher</th>
                                <th>Confirmation</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $count = 1;
                            $username = $_SESSION['username'];
                            $requests = $db->runQuery('*', 'booking', 'book_id!=0');
                            foreach ($requests as $request) {
        //                    $business = $db->runQuery('*', BUSINESS, "id=".$user['business_id']);
                            ?> 
                              <tr>
                                <td><?= $count; ?></td>
                                <td><?= $request['email'] ?></td>
                                
                                <td>
                                    <?php if($request['status']==''){?>
                                    <a class="btn btn-success" href="downloadVoucher.php?voucher=<?= $request['voucher']; ?>">Uploaded</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="javascript:;">Pending</a>
                                <?php } ?>
                                </td>
                                 <td> 
                                    <button type="button" class="btn btn-success btn-sm" onclick="showDescription(this)" id="<?= $request['book_id']; ?>"><i class="fa fa-plus"></i></button></td>
                                    <td><?php if($request['cancellation']!=0){ ?>
                                         <a class="btn btn-info" href="javascript:;">Yes</a>
                                     <?php } else{ ?>
                                    <a class="btn btn-danger" href="javascript:;">No</a>
                                     <?php }?></td>
                               <!--  <td>
                              
                            <i class="fa fa-pencil text-primary" data-toggle="modal" data-target="#req1_<?= $request['id']; ?>"></i>
                           </td> -->
                          <!-- <a href="" class="fa fa-plus text-success" onclick="removeFromList(this)" id="<?= $request['id']; ?>"></i></td> -->
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
<!-- view description Modal -->
<div class="description modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="mediumModalLabelDescription"></h5> Booking Message
                <button type="button" class="close" onclick="modalclose()">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form method="post" action='' id="uploadvoucher" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="book_id" id="book_id" value="">
                <input type="file" name="voucher" class="form-controller">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="modalclose()">Cancel</button>
            </div>
        </div>
    </div>
</div> 
<div class="message modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabelDescription"></h5> Booking Message
                
            </div>
            <div class="modal-body">
               <div id="messageshow"></div>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="modalcloses()">Cancel</button>
            </div>
        </div>
    </div>
</div>  
    
    <!-- Right Panel -->


<script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
        $(document).ready(function (e) {
            $("#uploadvoucher").on('submit', (function (e) {
              
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                
                $.ajax({
                    url: "voucherUpload.php",
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (returndata) {
                     
                       alert(returndata);
                        $('.description').addClass('modal fade').attr('aria-hidden', 'true').css('display', 'none');
                        
                            
                    },
                    error: function () {
                    }
                });
            }));
        });
    </script>



<script type="text/javascript">
    function showMessage(argument) {

            
            var msgs = $(argument).attr("id");
            var b=document.getElementById('messageshow').innerHTML=msgs;
        
          
            $('.message').addClass('modal fade show in').attr('aria-hidden', 'false').css('display', 'block');
            $('#description223').show();
            var ele = document.getElementById('mediumModalLabelDescription');
            console.log(argument.getAttribute('t'));
            ele.textContent = argument.getAttribute('t');
        }
        function modalcloses() {
            $('.message').removeClass('show in').attr('aria-hidden', 'true').css('display', 'none');;
            $('#description223').html();
        }
        
</script>

<script type="text/javascript">
    function showDescription(argument) {

            
            var description = $(argument).attr("id");
            var a=document.getElementById('book_id').value=description;
          
            $('.description').addClass('modal fade show in').attr('aria-hidden', 'false').css('display', 'block');
            $('#description22').show();
            var ele = document.getElementById('mediumModalLabelDescription');
            console.log(argument.getAttribute('t'));
            ele.textContent = argument.getAttribute('t');
            
           document.getElementById('book_id').value=description;
        }
        
        function modalclose() {
            $('.description').removeClass('show in').attr('aria-hidden', 'true').css('display', 'none');;
            $('#description22').html();
        }
</script>
    <script type="text/javascript">
        //$request
        function approveBusinessChanges(argument) {
            var req_id = $(argument).attr("id");
            var buis_name = $("#buis_name_" + req_id).val();
            var mobile = $("#mobile_" + req_id).val();
            var table_name = $("#table_name_" + req_id).val();
            
            var session_username = $("#session_username").val();
            
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: { 
                    'action': 'update_business_name',
                    'table_name': table_name,
                    'id': req_id,
                    'buis_name': buis_name,
                    'mobile': mobile
                },
                success: function(response){
                   if (response!='false') {
                       // Get Current date
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1; //January is 0!

                        var yyyy = today.getFullYear();
                        if(dd<10){
                            dd='0'+dd;
                        } 
                        if(mm<10){
                            mm='0'+mm;
                        }
                        var today = dd+'/'+mm+'/'+yyyy;
                       
                        var data = {
                            'action': 'add_approved_business_item',
                            'table_name': table_name,
                            'id': req_id,
                            'buis_name': buis_name,
                            'mobile': mobile,
                            'date': today,
                            'username': session_username
                        }
                       addApprovedBusiness(data);
                       removeFromList(argument);
                      
                       $("#alert_" + req_id).show();
                       $("#alert_" + req_id).html(response).addClass('alert alert-success').fadeOut(3000);
                       setTimeout(function(){ window.location = ''; }, 3000);
                   }
                }
            });
        }
        
        function addApprovedBusiness(data) {
//            console.log(data);
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: data,
                success: function(msg){
                   //alert(msg);
                    //setTimeout(function(){ window.location = ''; }, 3000);
                }
            });
        }
        function removeFromList(argument) {
            var req_id = $(argument).attr("id");
            var table_name = 'requests';
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: { 
                    'action': 'delete_record',
                    't': table_name,
                    'id': req_id 
                },
                success: function(msg){
                   //alert(msg);
                    setTimeout(function(){ window.location = ''; }, 3000);
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


</body>
</html>
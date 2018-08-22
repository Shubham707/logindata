<?php
session_start();
if (empty($_SESSION['role'])) {
   echo "<script> document.location.href='login.php';</script>"; 
}

require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();

if ( ($_SESSION['role']=='1') || ($_SESSION['role']=='2') ) {
    $table = ADMIN;
}else{
    $table = USER;
    // $business = $db->get_data("SELECT ".BUSINESS.".* FROM ".USERS." INNER JOIN ".BUSINESS." ON ".USERS.".id = ".BUSINESS.".uid WHERE ".USERS.".id='".$_SESSION['uid']."' ");
}

// if (isset($_GET['b'])) {
//   if ($_GET['b']=='hotel') {
//      $title = 'Hotel Booking'
//   }else if ($_GET['b']=='bus') {
//     # code...
//   }
// }
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Plan Your Trip</title>
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
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"> -->

   <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"> -->
   

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
             $('#datetimepicker').datetimepicker({ minDate: new Date() }); 
        });
    </script>
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
                       <button class="btn btn-info" onClick="window.history.back();">Back</button> <h1>Plan My Trip</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li class="active">Plan My Trip</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Hotel Booking</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">

                            
                              <form action="" method="post" id="uploadForm1">
                                <div class="card-body">
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">City</label>
                                        <input type="text" id="city" name="city" class="form-control"  > 
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">CheckIn</label>
                                        <input type="text" id="date" data-provide="datepicker" name="check_out" class="form-control"  > 
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">CheckOut</label>
                                        <input type="text" id="date1" data-provide="datepicker" name="check_out" class="form-control"  > 
                                    </div>
                                    
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">Training Venue (Hotel)</label>
                                        <input type="text" id="venue_location" name="venue_location" class="form-control"  > 
                                    </div>
                                    <!-- <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">Preferred Arrival Date & Time</label>
                                        <input type="text" id="datetimepicker" name="arrival_date" class="form-control"  > 
                                    </div> -->
                                    <div class="col-sm-12">
                                      <div class="form-group">
                                          <div class="input-group date" id="datetimepicker">
                                              <input type="text" class="form-control" />
                                              <span class="input-group-addon">
                                               <span class="glyphicon-calendar glyphicon"></span>
                                             </span>
                                          </div>
                                      </div>
                                  </div>
                                   


                                    <div id="alert1"> </div>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">Your Requirement</label>
                                        <textarea id="myTextarea" name="booking_msg" class="form-control" style="height: 200px" maxlength="200" > </textarea>
                                        <span style="color: red;" id="counter"></span>
                                        <input st id="booking_for" name="booking_for" type="hidden" value="<?= $_GET['b'] ?>">
                                    </div>
                                     
                                </div>
                                <div class="card-footer">
                                <input type="hidden" name="action" value="booking">
                                <input type="hidden" name="name" value="<?php echo $admin['name'];?>">
                                <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                               
                                </div>
                            </form>
                          </div>

                        </div>
                    </div> <!-- .card -->
                    
                  </div><!--/.col-->

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


  <script src="assets/js/jquery.min.js"></script>
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
                  success: function (returndata) {
                      if (returndata=='true') {
                        $("#alert1").show();
                        $("#alert1").html('Your trip plan has been submitted, TravelDesk will back to you.').addClass('alert alert-success').fadeOut(3000);
                        setTimeout(function(){ window.location = 'booking.php'; }, 3000);
                      } else{
                        $("#alert1").show();
                        $("#alert1").html('some error').addClass('alert alert-danger').fadeOut(3000);  
                      }
                  },
                  error: function ()
                  {
                  }
              });
          }));

          /*$("#uploadForm2").on('submit', (function (e) {
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
                  success: function (returndata) {
                      if (returndata=='true') {
                        $("#alert2").show();
                        $("#alert2").html('Category is Successfully Add.').addClass('alert alert-success').fadeOut(1113000);
                        //setTimeout(function(){ window.location = 'index.php'; }, 1113000);
                      }else{
                        $("#alert2").show();
                        $("#alert2").html('Category is already exists.').addClass('alert alert-danger').fadeOut(1113000);  
                      }
                      
                  },
                  error: function ()
                  {
                  }
              });
          }));*/

         /* $("#uploadForm3").on('submit', (function (e) {
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
                  success: function (returndata) {
                      if (returndata=='true') {
                        $("#alert3").show();
                        $("#alert3").html('Category is Successfully Add.').addClass('alert alert-success').fadeOut(3000);
                        //setTimeout(function(){ window.location = 'index.php'; }, 3000);
                      }else{
                        $("#alert3").show();
                        $("#alert3").html('Category is already exists.').addClass('alert alert-danger').fadeOut(3000);  
                      }
                      
                  },
                  error: function ()
                  {
                  }
              });
          }));*/
      });
$('#myTextarea').keyup(function () {
    var left = 400 - $(this).val().length;
    if (left < 0) {
        left = 0;
    }
    $('#counter').text('Characters left: ' + left);
});

  </script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
      var date = new Date();
        date.setDate(date.getDate());
        $('#date').datepicker({ 
            startDate: date
        });
        $('#date1').datepicker({ 
            startDate: date
        });
        
    </script>
</body>
</html>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="assets/css/datetime.css">
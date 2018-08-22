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
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
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
                        <h1>Plan My Trip</h1>
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
                            <strong class="card-title">Travel Booking</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">

                            
                              <form action="" method="post" id="uploadForm1">
                                <div class="card-body">
                                  <div class="col-lg-12">
                                    <div class="form-group has-success col-lg-4">
                                        <label for="place" class="control-label mb-1">From</label>
                                        <input type="text"  id="booking_from" name="booking" class="form-control date" >
                                    </div>
                                    <div class="form-group has-success col-lg-4">
                                        <label for="place" class="control-label mb-1">To</label>
                                        <input type="text" id="booking_to" name="booking" class="form-control"> 
                                    </div>
                                    <div class="form-group has-success col-lg-4">
                                        <label for="place" class="control-label mb-1">Place</label>
                                        <input type="text" id="booking" name="place" class="form-control"  > 
                                    </div>
                                     </div>
                                    <hr>
                                     <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">Time & Arrivel Date</label>
                                        <input type="text" id="booking" name="Address" class="form-control"  > 
                                    </div>
                                    <div class="card-header">
                                        <strong class="card-title">Hotel Boooking</small></strong>
                                    </div>
                                    <hr>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">CheckIn</label>
                                        <input type="text" id="booking" name="place" class="form-control"  > 
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">CheckOut</label>
                                        <input type="text" id="booking" name="place" class="form-control"  > 
                                    </div>
                                      <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">City</label>
                                        <input type="text" id="booking" name="city" class="form-control"  > 
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">Location Venue</label>
                                        <input type="text" id="booking" name="Address" class="form-control"  > 
                                    </div>
                                    
                                   


                                    <div id="alert1"> </div>
                                    <div class="form-group has-success">
                                        <label for="place" class="control-label mb-1">Description</label>
                                        <textarea id="myTextarea" name="booking" class="form-control" style="height: 200px" maxlength="200" > </textarea>
                                        <span style="color: red;" id="counter"></span>
                                        <input st id="booking_for" name="booking_for" type="hidden" value="<?= $_GET['b'] ?>">
                                    </div>
                                     <input id="booking_for" name="booking_for" type="hidden" value="<?= $_GET['b'] ?>">
                                </div>
                                <div class="card-footer">
                                <input type="hidden" name="action" value="booking">
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
              //console.log(formData);
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
                        //setTimeout(function(){ window.location = 'index.php'; }, 3000);
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

          $("#uploadForm2").on('submit', (function (e) {
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
          }));

          $("#uploadForm3").on('submit', (function (e) {
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
          }));
      });
$('#myTextarea').keyup(function () {
    var left = 200 - $(this).val().length;
    if (left < 0) {
        left = 0;
    }
    $('#counter').text('Characters left: ' + left);
});

  </script>

  <script type="text/javascript">
      
      function setSubCategoryList(id) {
          console.log("Change category " + id);
          
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
                        $("#alert1").html('Category is Successfully Add.').addClass('alert alert-success').fadeOut(3000);
                        //setTimeout(function(){ window.location = 'index.php'; }, 3000);
                      } else{
                        $("#alert1").show();
                        $("#alert1").html('Category is already exists.').addClass('alert alert-danger').fadeOut(3000);  
                      }
                      
                  },
                  error: function ()
                  {
                  }
            });     
      }
      
  function removeAllOptions(sel, removeGrp) {
      var len, groups, par;
      if (removeGrp) {
          groups = sel.getElementsByTagName('optgroup');
          len = groups.length;
          for (var i=len; i; i--) {
              sel.removeChild( groups[i-1] );
          }
      }
      
      len = sel.options.length;
      for (var i=len; i; i--) {
          par = sel.options[i-1].parentNode;
          par.removeChild( sel.options[i-1] );
      }
  }

  function appendDataToSelect(sel, obj) {
      var f = document.createDocumentFragment();
      var labels = [], group, opts;
      
      function addOptions(obj) { 
          var f = document.createDocumentFragment();
          var o;
          
          for (var i=0, len=obj.text.length; i<len; i++) {
              o = document.createElement('option');
              o.appendChild( document.createTextNode( obj.text[i] ) );
              
              if ( obj.value ) {
                  o.value = obj.value[i];
              }
              
              f.appendChild(o);
          }
          return f;
      }
      
      if ( obj.text ) {
          opts = addOptions(obj);
          f.appendChild(opts);
      } else {
          for ( var prop in obj ) {
              if ( obj.hasOwnProperty(prop) ) {
                  labels.push(prop);
              }
          }
          
          for (var i=0, len=labels.length; i<len; i++) {
              group = document.createElement('optgroup');
              group.label = labels[i];
              f.appendChild(group);
              opts = addOptions(obj[ labels[i] ] );
              group.appendChild(opts);
          }
      }
      sel.appendChild(f);
  }

  // anonymous function assigned to onchange event of controlling select list
  document.forms['uploadForm3'].elements['master_category'].onchange = function(e) {
      // name of associated select list
      var relName = 'sb_category';
      
      // reference to associated select list 
      var relList = this.form.elements[relName ];
      
      // get data from object literal based on selection in controlling select list (this.value)
      var obj = Select_List_Data[relName ][this.value ];
      
      // remove current option elements
      removeAllOptions(relList, true);
      
      // call function to add optgroup/option elements
      // pass reference to associated select list and data for new options
      appendDataToSelect(relList, obj);
  };

  // object literal holds data for optgroup/option elements
  var Select_List_Data = {
      
      // name of associated select list
      'sb_category': {

          <?php
          $username = $_SESSION['username'];
          $slect = "SELECT * FROM ".MS_CAT." WHERE username = $username";
          $query_fetch = $conn->query($slect);
       
          while ($result = $query_fetch->fetch_assoc()) {
           ?>
       
          <?= $result['id']; ?>: { text: [ <?php 
              $mid = $result['id'];
              echo $mid;
                $slect3 = "SELECT * FROM sub_categories WHERE mid=$mid AND username=$username"; 
             
                  $query_fetch3 = $conn->query($slect3);
                
                  while ($result3 = $query_fetch3->fetch_assoc()) {
                      echo  "'".$result3['category']."',";
                  } ?> ],

                  value: [ <?php $slect4 = "SELECT * FROM sub_categories WHERE mid=$mid AND username=$username"; 
                  $query_fetch4 = $conn->query($slect4);
                  while ($result4 = $query_fetch4->fetch_assoc()) {
                   echo  "'".$result4['id']."',";
                  } ?> ]
          },
      
        <?php }
        ?>
      }
      
  };

  // populate associated select list when page loads
  window.onload = function() { 
      var form = document.forms['uploadForm3'];
      
      // reference to controlling select list
      var sel = form.elements['master_category'];
      sel.selectedIndex = 0;
      
      // name of associated select list
      var relName = 'sb_category';
      // reference to associated select list
      var rel = form.elements[ relName ];
      // get data for associated select list passing its name
      // and value of selected in controlling select list
      var data = Select_List_Data[ relName ][ sel.value ];
      
      // add options to associated select list
      appendDataToSelect(rel, data);
  };

  </script>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
 <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
   <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script language="javascript">
      $('#booking_to').datetimepicker({
    minDate: moment(1, 'h')
  });
  $('#booking_from').datetimepicker({
      minDate: moment(1, 'h')
  });
</script>
</body>
</html>

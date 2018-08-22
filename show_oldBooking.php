<?php
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
    <title>Show Old Booking Details</title>
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
                        <h1>Show Old Booking Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Show Old Booking Details</li>
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
                            <a href="Booking.php" class="btn btn-primary pull-right">Add Booking</a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sr.</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
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
                        <td><?= $count; ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><button type="button" class="btn btn-primary btn-sm" onclick="showDescription(this)" id="<?= $value['booking_msg']; ?>">View</button></td><td><?= $value['created_at'] ?></td>
                        <td>
                    <a  href="update_product.php?id=<?= $value['book_id']; ?>"><i class="fa fa-pencil text-primary"></i></a>
                    <i class="fa fa-times text-danger" onclick="removeFromList(this)" id="<?= $value['book_id']; ?>"></i></td>
                      </tr>
                    <?php   $count++; } ?>
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

<!-- Add Product Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="uploadForm1">
            <div class="modal-body">
            
            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            <div class="tab-pane fade active show" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add <small> Product</small></strong>
                </div>
                <div class="card-body">
                  <!-- Credit Card -->
                  <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label mb-10">Master Category</label>
                            <select name="ms_category" id="ms_category" class="form-control">

                            <?php
                                $username = $_SESSION['username'];
                                $slect = "SELECT * FROM " . MS_CAT . " WHERE status='1' AND username='$username'";
                                $query_fetch = $conn->query($slect);
                                while ($result = $query_fetch->fetch_assoc()) { 
                                    $id = $result['id'];
                                    $ms_category = $result['category'];
                                    ?>
                                    <option value="<?= $id; ?>"><?= $ms_category; ?></option>        
                                <?php }
                            ?>
                        </select>
                        </div>
                   </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label mb-10">Sub Category</label>  
                        <select name="category" id="category" class="form-control" required="">
                            <!-- js populates -->
                        </select>
                        </div>
                    </div>
                  <div id="pay-invoice">
                        <div class="card-body">
                            <div class="form-group has-success">
                                <label for="master-category" class="control-label mb-1">Product Name</label>
                                <input id="product_name" name="product_name" type="text" class="form-control" required="">
                            </div>
                 
                            <div class="form-group has-success">
                                <label for="master-category" class="control-label mb-1">Price</label>
                                <input id="price" name="price" type="text" class="form-control"required="">
                            </div>
                       
                            <div class="form-group has-success">
                                <label for="file-input" class=" form-control-label">Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                     
                            <div class="form-group has-success">
                                <label for="master-category" class="control-label mb-1">Description</label>
                                <input id="description" name="description" type="text" class="form-control" required="">
                            </div>
                            <div class="form-group has-success">
                                <label for="master-category" class="control-label mb-1">Tags</label>
                                <input id="tags" name="tags" type="text" class="form-control" required="" placeholder="Please separate by commas.">
                            </div>
                        </div>      
                  </div>

                </div>
            </div> 
            </div>
            <div class="col-lg-12"> <div id="alert1"> </div> </div>
            </div>
            </div>
            </div> <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                
                <input type="hidden" name="action" value="add_product">
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
        </form>
        </div>
    </div>
</div>

<!-- view description Modal -->
<div class="description modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabelDescription"></h5>
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

        function removeFromList(argument) {
            var pro_id = $(argument).attr("id");
            var table_name = 'products';
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: { 
                    'action': 'delete_record',
                    't': table_name,
                    'id': pro_id 
                },
                success: function(msg){
                   //alert(msg);
                    setTimeout(function(){ window.location = ''; }, 100);
                }
            });
        }
        
    </script>

<script type="text/javascript">
/*
From JavaScript and Forms Tutorial at dyn-web.com
Find information and updates at http://www.dyn-web.com/tutorials/forms/
*/

// removes all option elements in select list 
// removeGrp (optional) boolean to remove optgroups
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
    
    if (obj.text) {
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
document.forms['uploadForm1'].elements['ms_category'].onchange = function(e) {
    // name of associated select list
    var relName = 'category';
    
    // reference to associated select list 
    var relList = this.form.elements[ relName ];
    
    // get data from object literal based on selection in controlling select list (this.value)
    var obj = Select_List_Data[ relName ][ this.value ];
    
    // remove current option elements
    removeAllOptions(relList, true);
    
    // call function to add optgroup/option elements
    // pass reference to associated select list and data for new options
    appendDataToSelect(relList, obj);
};

// object literal holds data for optgroup/option elements
var Select_List_Data = {
    
    // name of associated select list
    'category': {

        <?php
        $slect = "SELECT * FROM ".MS_CAT."  ";
        $query_fetch = $conn->query($slect);
        while ($result = $query_fetch->fetch_assoc()) {
        //pr($result); 
         ?>
     
        

        <?= $result['id']; ?>: {

            <?php
            $slect2 = "SELECT * FROM ".SB_CAT." WHERE ".SB_CAT.".mid=".$result['id'];
            $query_fetch2 = $conn->query($slect2);
            while ($result2 = $query_fetch2->fetch_assoc()) {
            ?>
            // optgroup label
            '<?= $result2['category']; ?>': {

                text: [ <?php $slect3 = "SELECT * FROM ".CAT." WHERE ".CAT.".sid=".$result2['id']." && ".CAT.".mid=".$result['id']; 
                $query_fetch3 = $conn->query($slect3);
                while ($result3 = $query_fetch3->fetch_assoc()) {
                echo  "'".$result3['category']."',";
                } ?> ],

                value: [ <?php $slect4 = "SELECT * FROM ".CAT." WHERE ".CAT.".sid=".$result2['id']." && ".CAT.".mid=".$result['id']; 
                $query_fetch4 = $conn->query($slect4);
                while ($result4 = $query_fetch4->fetch_assoc()) {
                 echo  "'".$result4['id']."',";
                } ?> ]

            },
            <?php } ?>
        },
    

    <?php        }
    ?>
    }
    
};

// populate associated select list when page loads
window.onload = function() {
    var form = document.forms['uploadForm1'];
    
    // reference to controlling select list
    var sel = form.elements['ms_category'];
    sel.selectedIndex = 0;
    
    // name of associated select list
    var relName = 'category';
    // reference to associated select list
    var rel = form.elements[ relName ];
    
    // get data for associated select list passing its name
    // and value of selected in controlling select list
    var data = Select_List_Data[ relName ][ sel.value ];
    
    // add options to associated select list
    appendDataToSelect(rel, data);
};

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

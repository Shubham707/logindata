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
    <title>Update Products</title>
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
                        <h1>Update Products</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Update Products</li>
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
                    <strong class="card-title">Update Form</strong>
                    <a class="btn btn-primary pull-right" href="javascript:history.back(1)">Back</a>
                </div>
                <div class="card-body">
                <?php
                    $products = $db->runQuery('*', PRODUCTS, "id=".$_GET['id']);
                    $product = $products[0];
                    $mid = $db->select('category', MS_CAT, "id=".$product['mid']);
                    $sid = $db->select('category', SB_CAT, "id=".$product['sid']);
                    $cat_id = $db->select('category', CAT, "id=".$product['cat_id']);
                ?>
                <form action="" method="post" id="uploadForm1">
                <div class="modal-body">
                
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <div class="tab-pane fade active show" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <strong class="card-title">Update <small> Product</small></strong>
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
                                <option value="<?= $id; ?>" <?php if ($id === $product['mid']) {
                                   echo "selected='' ";
                                }?> ><?= $ms_category; ?></option>        
                            <?php }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="control-label mb-10">Category</label>  
                    <select name="category" id="category" class="form-control" required>
                        <!-- js populates -->
                        <option value="<?= $product['sid']; ?>"><?= $sid['category']; ?></option>
                    </select>
                    </div>
                </div>
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="form-group has-success">
                            <label for="master-category" class="control-label mb-1">Product Name</label>
                            <input id="product_name" name="product_name" type="text" class="form-control" value="<?= $product['name']; ?>" required="">
                        </div>
             
                        <div class="form-group has-success">
                            <label for="master-category" class="control-label mb-1">Price</label>
                            <input id="price" name="price" type="text" class="form-control" value="<?= $product['price']; ?>" required="">
                        </div>
                   
                        <div class="form-group has-success">
                            <label for="file-input" class=" form-control-label">Image</label>
                            <div class="clearfix"></div>
                            <img src="dist/products/<?= $product['image']; ?>" class="img-thumbnail pull-left" style="height: 44px">
                            <input type="file" id="image" name="image" class="form-control pull-right" style="width: 90%">
                        </div>
                 
                        <div class="form-group has-success">
                            <label for="master-category" class="control-label mb-1 mt-2">Description</label>
                            <input id="description" name="description" type="text" class="form-control"  value="<?= $product['description']; ?>" required="">
                        </div>
                        <div class="form-group has-success">
                            <label for="master-category" class="control-label mb-1 mt-2">Tags</label>
                            <input id="tags" name="tags" type="text" class="form-control"  value="<?= $product['tags']; ?>" required="" placeholder="Please separate by commas.">
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
                <button type="button" class="btn btn-secondary" onclick="window.location='products.php'">Cancel</button>
                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                <input type="hidden" name="action" value="update_product">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
                </div>
                
                <div class="card-footer">
                    
                </div>
            </div>
            </div>
            </div> 
            </div><!-- .animated --> 
        </div><!-- .content -->


    </div><!-- /#right-panel -->

<!-- js / ajax-->
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
                        if (response='true') {
                            $('#alert1').show();
                            $("#alert1").html('The product has been successfully updated.').addClass('alert alert-success').fadeOut(3000);
                              setTimeout(function(){ window.location = 'products.php'; }, 3000);
                        } else {
                            $('#alert1').show();
                            $("#alert1").html('The product could not be updated.').addClass('alert alert-danger').fadeOut(3000);
                        }
                    },
                    error: function () {
                    }
                });

        }));
    });
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
        $username = $_SESSION['username'];
        $slect = "SELECT * FROM ".MS_CAT." WHERE username='$username' ";
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

</body>
</html>

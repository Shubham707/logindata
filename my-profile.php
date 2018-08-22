<?php
require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();

if ($_SESSION['role']=='1') {
    $table = ADMIN;
}else{
    $table = USERS;
}
$admin = $db->select('*', $table, "username='".$_SESSION['username']."' ");

?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Profile</title>
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
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">My Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

           <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Profile Card</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <?php if($admin['image']==''){ ?>
                                <img class="rounded-circle mx-auto d-block" height="200" src="images/user.jpg" alt="Card image cap">
                            
                        <?php } else{ ?>
                            <img class="rounded-circle mx-auto d-block" src="dist/profile/<?= $admin['image']; ?>" alt="Card image cap">
                            
                        <?php }?>
                            <h5 class="text-sm-center mt-3 mb-2"><?= $admin['name']; ?></h5>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <button type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#smallmodal">
                              Update Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-md-8">
                <h6>
                Full Name : <?= $admin['name']; ?> <br><br>
                Username : <?= $admin['username']; ?> <br><br>
                Aadhar No : <?= $admin['adhar_no']; ?> <br><br>
                Pan Card No : <?= $admin['pancard']; ?> <br><br>
                Mobile : <?= $admin['mobile']; ?> <br><br>
                Department : <?= $admin['mobile']; ?> <br><br>
                Designation : <?= $admin['designation']; ?> <br><br>
            </div>

            <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Update Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form  id="updateForm" method="POST">
                            <div class="modal-body">
                                    <div class="form-group">
                                        <div id="alert"></div>
                                        <label>Name:</label>
                                        <input type="text" name="name" class="form-control" value="<?= $admin['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div id="alert"></div>
                                        <label>Mobile:</label>
                                        <input type="text" name="mobile" class="form-control" value="<?= $admin['mobile']; ?>">
                                    </div>
                                    <!-- <div class="form-group">
                                        <div id="alert"></div>
                                        <label>Password:</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div id="alert"></div>
                                        <label>Confirm Password:</label>
                                        <input type="password"  id="confirmpwd" class="form-control">
                                        <span class="error1" style="color: red;"></span>
                                    </div> -->
                                    <div class="form-group">
                                        <div id="alert"></div>
                                        <label>Upload Profile Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                   <input type="hidden" name="action" value="update_profile" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" id="Submit" value="Save" class="btn btn-primary" />
                            </div>
                            </form>
                        </div>
                    </div>
            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#Submit").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirmpwd").val();
            if (password != confirmPassword) {
                $('.error1').html('Psaaword did not match');
                return false;
            }
            return true;
        });
    });
</script>

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $("#updateForm").on('submit', (function (e) {
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
                 /*       $("#alert").show();
                        $("#alert").html('Record is Successfully Update').addClass('alert alert-success').fadeOut(3000);
                        setTimeout(function(){ window.location = 'my-profile.php'; }, 3000);*/
                    },
                    error: function ()
                    {
                    }
                });
            }));
        });
    </script>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>

</body>
</html>

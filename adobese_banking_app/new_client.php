<?php
if (isset($_POST['submit'])) {
    include("connection/connect.php");
    //generate account number 
    $initial = "303";
    $digits = 5;
    $account_no = $initial . '' . rand(pow(10, $digits - 1), pow(10, $digits) - 1);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $res_address = $_POST['res_address'];

    $balance = 0;
    $connect = con_str();

    $query = 'INSERT INTO clients(firstname, middlename, lastname, account_no, phone, email, res_address, balance) 
                VALUES("' . $firstname . '", "' . $middlename . '","' . $lastname . '","' . $account_no . '","' . $phone . '","' . $email . '","' . $res_address . '","' . $balance . '")';

    $res = mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0) {
        $msg = '<p  style="text-align:center; color:#27c24c; margin-bottom:10px; background:#fff; border:solid thin #27c24c; padding:10px; width:auto;">You have Successfully created a new client</p>';
    } else {
        $msg = '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">An Error occurred...please try again...</p>';

    }
}
?>
<!DOCTYPE html>
<head>
<title>AdoBese New Client</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<?php include("fragment/header.php"); ?>
<!-- header end -->
<!--sidebar start-->
<?php include("fragment/sidebar.html"); ?>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                New Client
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="POST">
                <?php
                if (isset($msg))
                    echo $msg;
                ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name</label required>
                        <div class="col-sm-6">
                            <input name="firstname" type="8text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Middle Name</label required>
                        <div class="col-sm-6">
                            <input name="middlename" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name</label required>
                        <div class="col-sm-6">
                            <input name="lastname" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone Number</label required>
                        <div class="col-sm-6">
                            <input name="phone" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label required>
                        <div class="col-sm-6">
                            <input name="email" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Residential Address</label required>
                        <div class="col-sm-6">
                            <input name="res_address" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button name="submit"class="btn btn-primary">Register Client</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        </div>
        </div>
        <!-- page end-->
        </div>
</section>
 <!-- footer -->
 <?php include("fragment/footer.html"); ?>

  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>

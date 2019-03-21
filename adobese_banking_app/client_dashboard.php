<?php

if (!isset($_GET['acct_no'])) {
    echo '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">Fatal Error</p>';
    exit();
}

if (isset($_GET['id'])) {
    $_SESSION["client_id"] = $_GET["id"];
    setcookie('client_id', $_GET["id"]);
    include("connection/connect.php");
    $connect = con_str();
    $query = 'SELECT * FROM clients WHERE client_id = ' . $_SESSION["client_id"] . '';
    $res = mysqli_query($connect, $query);
    if (mysqli_affected_rows($connect) > 0) {
        $row = mysqli_fetch_assoc($res);

        $account_no = $row["account_no"];
        if ($_GET['acct_no'] == $account_no) {
            $_SESSION['acct_no'] = $_GET['acct_no'];
            setcookie('acct_no', $_GET['acct_no']);
            $account_name = $row["lastname"] . " " . $row["firstname"] . " " . $row["middlename"];
            $balance = $row["balance"];
            $email = $row["email"];
            $phone = $row["phone"];

        } else {
            echo '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">Fatal Error</p>';
            exit();
        }
    } else {
        echo '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">Fatal Error</p>';
        exit();
    }
} else {
    echo '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">Fatal Error</p>';
    exit();
}
?>
<!DOCTYPE html>
<head>
<title>User data</title>
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
		<!-- page start-->
		<div class="mail-w3agile">
        <div class="row">
            <?php include('fragment/transactions.php'); ?>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> 
                       <?php echo $account_name . " - " . $account_no; ?>
                           <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <!-- <input type="text" class="form-control " placeholder="Search Mail"> -->
                            </div>
                        </form>
                       </h4>
                    </header>
                    <div class="panel-body">
                         <!-- <div class="compose-btn pull-right">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Send</button>
                            <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                            <button class="btn btn-sm">Draft</button>
                        </div> -->
                        <div class="compose-mail">
                            <table class="table table-hover table-bordered table-responsive">
                                    
                                        <!-- <tr>
                                            <th>Account Name</th>
                                            <td>Edim Daniel Samuel</td>
                                        </tr>
                                        <tr>
                                            <th>Account No.</th>
                                            <td>30315616</td>
                                        </tr> -->
                                        <tr>
                                            <th>Account Balance</th>
                                            <td><?php echo "&#8358; ".number_format($balance,2); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td><?php echo $phone; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $email; ?></td>
                                        </tr>

                                    
                            </table>
                            <!--<form role="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="to" class="">To:</label>
                                    <input type="text" tabindex="1" id="to" class="form-control">

                                    <div class="compose-options">
                                        <a onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();" href="javascript:;">Cc</a>
                                        <a onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();" href="javascript:;">Bcc</a>
                                    </div>
                                </div>

                                <div class="form-group hidden">
                                    <label for="cc" class="">Cc:</label>
                                    <input type="text" tabindex="2" id="cc" class="form-control">
                                </div>

                                <div class="form-group hidden">
                                    <label for="bcc" class="">Bcc:</label>
                                    <input type="text" tabindex="2" id="bcc" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="">Subject:</label>
                                    <input type="text" tabindex="1" id="subject" class="form-control">
                                </div>

                                <div class="compose-editor">
                                    <textarea class="wysihtml5 form-control" rows="9"></textarea>
                                    <input type="file" class="default">
                                </div>
                                <div class="compose-btn">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Send</button>
                                    <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                                    <button class="btn btn-sm">Draft</button>
                                </div>

                            </form> -->
                        </div>
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

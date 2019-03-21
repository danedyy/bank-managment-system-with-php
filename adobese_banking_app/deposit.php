<?php

    include("connection/connect.php");
    $connect = con_str();
    $query = 'SELECT * FROM clients WHERE client_id = ' . $_COOKIE["client_id"] . '';
    $res = mysqli_query($connect, $query);
    if (mysqli_affected_rows($connect) > 0) {
        $row = mysqli_fetch_assoc($res);

        $account_no = $row["account_no"];
        {
            $account_name = $row["lastname"] . " " . $row["firstname"] . " " . $row["middlename"];
            $balance=$row["balance"];
        }
    } else {
        echo '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">Fatal Error</p>';
        exit();
    }
    //deposit action
    if(isset($_POST["deposit"])){
       $amount=$_POST["amount"];
       $dep_name=$_POST["dep_name"];
       $dep_phone=$_POST["dep_phone"];

       $new_balance=$balance + $amount;

       $sql ='UPDATE clients SET balance = '.$new_balance.' WHERE client_id= '.$_COOKIE["client_id"].'';
       $res =mysqli_query($connect, $sql) or die(mysqli_error($connect));

       //record in transaction
       $tquery ='INSERT INTO transactions(account_no,type, amount ,date) VALUES('.$account_no.', "deposit", '.$amount.', now())';
       $res=mysqli_query($connect, $tquery)or die(mysqli_error($connect));


       if(mysqli_affected_rows($connect)>0){
           header("Location:client_dashboard.php?id=".$row["client_id"]."&account_no=".$row["account_no"]."");
       }
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

                <?php include("fragment/transactions.php");?>

            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                            <?php echo "Deposit:"." ". $account_name . " - " . $account_no; ?>
                       <h4 class="gen-case">
                           <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">

                            </div>
                        </form>
                       </h4>
                    </header>



                        <div class="compose-mail">
                            <form role="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="to" class="" style="width:200px;">Amount:</label>
                                    <input type="number" tabindex="1" id="to" class="form-control" required name="amount">
                                </div>



                                <div class="form-group">
                                    <label for="subject" class="" style="width:200px">Depositor's Name:</label>
                                    <input type="text" tabindex="1" id="subject" class="form-control" required name="dep_name">
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="" style="width:200px">Depositor's Phone:</label>
                                    <input type="text" tabindex="1" id="subject" class="form-control" required name="dep_phone">
                                </div>


                                <div class="compose-btn">
                                    <button class="btn btn-primary btn-sm" type="submit" name="deposit" ><i class="fa fa-check" ></i> Deposit</button>
                                </div>

                            </form>
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

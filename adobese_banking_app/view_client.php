<?php
include('connection/connect.php');
$query = "Select * from clients";
$connect = con_str();
$res = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Responsive_table :: w3layouts</title>
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
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    
     REGISTERED CLIENTS (<?php if (mysqli_affected_rows($connect) > 0) {
                          $data_no = mysqli_affected_rows($connect);
                        } else {
                          $data_no = 0;
                        }
                        echo $data_no; ?>)
    </div>
    <div>
      <table class="table table-responsive table-hover" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <?php
        if (mysqli_affected_rows($connect) > 0) {
          echo '<thead>
       
          <tr>
          <th data-breakpoints="xs">S/N</th>          
            <th>Account Name</th>
            <th>Account No.</th>
            <th>Account Balance</th>
            <th data-breakpoints="xs">Phone</th>
           
            <th data-breakpoints="xs sm md" data-title="DOB">E-mail</th>
          </tr>
        </thead>
        <tbody>';
        $sn = 1;
          while ($row = mysqli_fetch_assoc($res)) 
          {
            
            echo ' <a href="#"> <tr href="#" data-expanded="true">
            
          <td>'.$sn++.'</td>
          <td><a href="client_dashboard.php?id='.$row["client_id"].'&acct_no='.$row["account_no"].'">'.$row["lastname"]." ".$row["firstname"]." ".$row["middlename"].'</a></td>
          <td>'.$row["account_no"].'</td>
          <td>&#8358; '.number_format($row["balance"],0).'</td>
          <td>'.$row["phone"].'</td>
          
          <td>'.$row["email"].'</td>
         
        </tr> </a>';
          }

        } else {
          echo '<p style="text-align:center; color:#a94442; margin-bottom:10px; background:#fff; border:solid thin #a94442; padding:10px; width:auto;">No Record Found</p>';
        }
        ?>
       
        
        
          
        </tbody>
      </table>
    </div>
  </div>
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

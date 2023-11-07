<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2'])) {
    $pid=intval($_GET['pkgid']);
    $useremail=$_SESSION['login'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $comment=$_POST['comment'];
    $status=0;
    $sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pid',$pid,PDO::PARAM_STR);
    $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
    $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
    $query->bindParam(':todate',$todate,PDO::PARAM_STR);
    $query->bindParam(':comment',$comment,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        $msg="Booked Successfully";
    } else {
        $error="Something went wrong. Please try again";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="banner-3">
        <div class="container">
            <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">I-T&T - Package Details</h1>
        </div>
    </div>

    <div class="selectroom">
        <div class="container">
            <?php if($error){?>
                <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
            <?php } else if($msg){?>
                <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
            <?php }?>
            
            <!-- Offer sections -->
            <div class="offer">
                <h2>UP TO ₹600 OFF TRAVEL SMART</h2>
                <p>Book your next trip smartly and get up to ₹600 off on your travel expenses.</p>
            </div>
            
            <div class="offer">
                <h2>UP TO 70% OFF ON HOTEL ACROSS THE WORLD</h2>
                <p>Explore the world and enjoy up to 70% off on hotel bookings worldwide.</p>
            </div>
            
            <div class="offer">
                <h2>FLAT ₹700 OFF ON APP OFFER</h2>
                <p>Exclusive offer for our app users! Get a flat ₹700 off on your bookings.</p>
            </div>
            
            <!-- Rest of the content -->
            <!-- ... -->
        </div>
    </div>
    
    <!-- Include footer and other sections -->
    <?php include('includes/footer.php');?>
    <?php include('includes/signup.php');?>            
    <?php include('includes/signin.php');?>           
    <?php include('includes/write-us.php');?>
</body>
</html>

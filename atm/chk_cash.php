<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
    echo "<script>window.open('chkamt.php','_self');</script>";
}else{
?>
<!DOCTYPE html>
<html>		    
	<head>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Atm System</title>
        <!--
            ============================
                Bootstrap + Custom + Css
            ============================
        -->
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/custom.css"/>
		<!--
            ===============================
                Bootstrap + Custom + Jquery
            ===============================
        -->
		<script src="js/jquery_library.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	 <!--
            ====================
                Navbar Starts
            ====================
        -->
		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
			<div class="container">
				<div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					 <a class="navbar-brand" href="home.php"><strong><i class="glyphicon glyphicon-list-alt"></i> ABC Bank (ATM)</strong></a>
     			</div>
                <div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class='glyphicon glyphicon-log-out'></span>  Logout</a></li>
                    </ul>
			</div>
		</nav>	
        <!--
            =======================
                Main Section Starts
            =======================
        -->
        <div class="container-fluid" style="background:#cc99ff; margin-top:50px;">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> ATM Machine 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
                                <div class="well well-sm" style="border-radius:0px; padding-bottom: 20px;">
                                    <?php
									   $id=$_SESSION['id'];
                                        $amt=mysqli_fetch_array(mysqli_query($con,"select * from user where id='$id'"));
                                    ?>
                                    <hr>
                                    <h4 align="center"><b>Transaction Details:</b></h4>
                                    <hr/>
                                    <h4 align="center">Current Account Balance : Tk. <?php echo $amt['amt']; ?>  </h4>
									<hr>
									<h4 align="center">Withdrawn Amount : Tk. <?php if(@$_GET['r']){echo @$_GET['r'];}else{ echo "0";} ?>  </h4>
									<hr/>
									<p align="center" style="padding-top: 50px;"><a href="home.php" align="center" class="btn btn-info btn-custom">Back</a></p>
								</div>
                            </div>
                            <div class="panel-footer" align="center" style="padding-top: 60px; padding-bottom: 30px;">
                                <input type="text" name="amt" required="" placeholder="Enter Amount..." class="form-control"/><br/>
                                <button type="submit" name="sub" class="btn btn-success btn-custom"><span class="glyphicon glyphicon-thumbs-up"></span> Cashout </button>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['sub']))
                            {//1st starts
                                $taka=$_POST['amt'];
                                // to save from hacking or not
                                if($amt['amt']==0){
                                    echo "<script>alert('Please Recharge your Account! Thank you');</script>";
                                }
                                else if($taka<3000 || $taka>30000)
                                {
									echo "<script>alert('You can withdraw mininum 1500 and maximum 10000');</script>";
                                }
                                else if($taka<=$amt['amt']){
                                    $amnt = $amt['amt'];
                                    $amnt = $amnt - $taka;
                                    $id=$_SESSION['id'];
                                    $date = date('d/M/y h:i a');
                                    $t_date = date('M/y');
                                    mysqli_query($con,"update user set amt='$amnt',lt='$date' where id='$id'");
                                    mysqli_query($con,"insert into tran (uid,dte,amt,month) values('$id','$date','$taka','$t_date')"); 
                                    echo "<script>alert('Transaction successful!');</script>";  
                                    echo "<script>window.open('chk_cash.php?r=$taka','_self');</script>";

                                }else{
				    				echo "<script>alert('Withdrawn amount is greater then your balance.');</script>";
                                }
                            }
                            //amt zero
                        ?>
                    </form>	
                </div>
            </div>
        </div>
		 <!--
            ======================
                Footer  Starts 
            ======================
        -->
        <div class="container-fluid" style="position: fixed; left: 0; bottom: 0; width: 100%; background: #171323; color: white; text-align: center; padding-top: 10px">
            <p align="center">Copyright ©  Group 17, CSE370 Section 7, Summer 2019</p>
        </div>
	</body>
</html>
<?php } ?>
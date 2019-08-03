<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
    echo "<script>window.open('index.php','_self');</script>";
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
       <div class="container-fluid" style="background:#cc99ff; margin-top: 50px; border-radius: 0px; padding-bottom: 0px">
            <div class="row">
                <br/>
                <div class="col-sm-12" style="text-align:center;">
                    <div class="panel">
                        <div class="panel-body"  style="border-radius:0px; box-shadow:2px 2px 2px 0px; padding-bottom:0px;">
                            <table align="center" class="table table-bordered table-hover table-striped">
                        <tr>
                            <?php
							 include("conn.php");
							$id=$_SESSION['id'];
							$cn=mysqli_query($con,"select * from user where id='$id'");
							$n = mysqli_fetch_array($cn);
							
							?>
							   <td colspan="3" align="left"  style="background:#444; color:#fff; font-size:20px;">Money Transfer/Cashout Details of <b><?php echo ucwords($n[1]); ?> (  <?php echo date('Y'); ?> )</b></td>
							</tr>
							<tr>
								<td align="center"><b>Transaction No.</b></td>
								<td align="center"><b>Transaction Date</b></td>
								<td align="center"><b>Transaction Amount</b></td>
							</tr>
							<?php
							include("conn.php");
							$d = date('M/y'); 
							$user=mysqli_query($con,"select * from tran where uid='$id'");
							$i=0;
							$t=0;
							while($u = mysqli_fetch_array($user)){
							
								$i++;
							
								$t=$t+$u[3];
							
							?>
							<tr>	
								<td ><?php echo $i ?></td>
								<td colspan="" align="center"><?php echo $u[2];?></td>
								<td colspan="" align="center"><?php echo $u[3];?></td>
							</tr>
							<?php  }?>
							<tr>	
								<td colspan="" class="bg-danger" ><h5 align="center">Balance approved by bank: <?php echo $n['g_amt']; ?> </h5></td>
								<td colspan="" class="bg-success" ><h5 align="center">Remaining Balance: <?php echo $n['amt'];?></h5></td>
								<td colspan="" class="bg-info" ><h5 align="center">Total amount withdrawn: <?php echo $t?></h5></td>
							</tr>
                                <tr>
                                    <td colspan="9">
                                        <p align="center" style="padding-top: 200px;"><a href="home.php" class="btn btn-info btn-custom">Back</a></p>
                                    </td>
                                </tr>
                        </table>
                        
                        </div>
                    </div>    
                    
                
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
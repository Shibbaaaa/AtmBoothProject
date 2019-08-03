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
        <div class="container-fluid" style="background:#cc99ff; margin-top:50px; padding-bottom: 20px">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px; padding-bottom: 180px">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center; padding-bottom: 50px">
                                <i class="glyphicon glyphicon-copy"></i> ATM Machine 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
								<div class="well well-sm" style="border-radius:0px; padding-bottom: 20px; padding-top: 40px">
								   <h3 align="center">Your current Account Balance: </h3>
									<?php
									$id=$_SESSION['id'];
									$amt=mysqli_fetch_array(mysqli_query($con,"select * from user where id='$id'"));
									?>
									<hr>
									<h4 align="center" style="padding-bottom: 20px; padding-top: 30px"> Tk. <?php echo $amt['amt']; ?> </h4>
									<hr>
									<p align="center"><a href="home.php" align="center" class="btn btn-primary btn-custom">Back</a></p>
								</div>
							</div>
							
						</div>
							
						<?php
						if(isset($_POST['sub']))
						{//1st starts
					        $name=$_POST['ch'];
							// to save from hacking or not
							if($name==1)
							{
								echo "<script>window.open('chkamt.php','_self');</script>";

							}
							else
								if($name==2)
							{
								
							}
							else
								if($name==3)
							{
								
							}
						}// isset bracket ends here
						?>
						
						
						
						
						
					</form>	
				</div>
				<div class="col-sm-4">
				</div>
				<!-- container -->
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
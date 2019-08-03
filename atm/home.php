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
        <div class="container-fluid" style="background:#cc99ff; margin-top:50px; padding-bottom: 20px">
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
								<div class="well well-sm" style="border-radius:0px; padding-bottom: 80px">
								    <h4>Welcome,<b> <?php echo ucwords($_SESSION['name']);?>!</b></h4>
								    <hr>
								    <h4><b>Please choose from the options below: </b></h4><hr/><br/>
									<h5>1. Check my current account balance </h5><br/>
									<h5>2. I want to withdraw money from my account </h5><br/>
									<h5>3. Show my transaction history </h5><br/>	
								</div>
							</div>
							<div class="panel-footer">
                                <select name="option" class="form-control">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <br/>
                                <center>
                                    <button type="submit" name="sub" class="btn btn-info btn-custom"><span class="glyphicon glyphicon-send"></span> Submit</button>
                                </center>
                            </div>
                        </div>
						<?php
						if(isset($_POST['sub']))
						{//1st starts
					        $opt=$_POST['option'];
							
							if($opt==1)
							{
                                echo "<script>window.open('chk_amt.php','_self');</script>";
							}
							else if($opt==2)
							{
                                echo "<script>window.open('chk_cash.php','_self');</script>";
							}
							else if($opt==3)
							{
                                echo "<script>window.open('check.php','_self');</script>";
                            }// isset bracket ends here
                        }
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
            <div class="container-fluid" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: rgba(192,109,187,1); color: white; text-align: center; padding-top: 10px">
                    <p align="center">Copyright ©  Group 17, CSE370 Section 7, Summer 2019</p>
            </div>
	</body>
</html>
<?php  } ?>
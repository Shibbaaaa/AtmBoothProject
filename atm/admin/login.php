<?php 
include('../conn.php');
session_start();
 ?>
<!DOCTYPE html>
<html>		    
	<head>
        <!--
            ==============================================
                Mobile + Desktop + Browser Responsive Tags
            ==============================================
        -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator Panel</title>
        <meta http-equiv="refresh" content=""/>
        <!--
            ============================
                Bootstrap + Custom + Css
            ============================
        -->
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/custom.css"/>
		<!--
            ================================
                Bootstrap + Custom + Jquery
            ================================
        -->
		<script src="../js/jquery_library.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<body style="background: #ccc;">
		<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 10px">
			<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><strong><i class="glyphicon glyphicon-lock"></i> Admin Panel - Dashboard</strong></a>
                </div>
			</div>
		</nav>	
		<!-- navbar ends-->
		<div class="container-fluid" style="background: #0066cc; margin-top: 20px; padding-top: 30px;">
			<br/><div class="row">
				<!-- container -->
				<div class="col-sm-4 col-sm-offset-4">
                    <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px">
                        <div class="panel-heading" id="signin_panel_header">
                            <p align="center"> <img src="user4.png" style="width: 50%; border-radius: 50%; text-align: center; margin-top: 20px;"/> </p>
                            <h4 align="center" style="padding-top:5px;">Admin Access</h4><hr/>
                        </div>
                        <div class="panel-body" style="margin-top:-25px; padding-bottom: 70px">
                            <form role="form" align="center" action="" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" placeholder="Type here.." id="email" name="user" type="text"  required>
	                                		</div>
                                    <div class="form-group">
                                          <label>Password</label>
                                        <input class="form-control" placeholder="Type here..." id="pass" name="pass" type="password" value="" required>
                                    </div>
                                    <hr/>
                                    
                                    	<center>
                                        	<button  type="submit" name="login" class="btn btn-success btn-custom" style="padding:12px 35px;"><i class="glyphicon glyphicon-log-in"></i>  Log In</button>
                                    	</center>
                                	
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
					if(isset($_POST['login']))
					{
						$email = mysqli_real_escape_string($con ,$_POST['user']);
						$password = mysqli_real_escape_string($con, $_POST['pass']);
						//$encrypt = md5($password);// for to encrypt password
						$query = "select * from admin where user='$email' and pass='$password'"; 
						$run = mysqli_query($con,$query);
						if(mysqli_num_rows($run)>0)
						{
							$query2 = "select * from admin where user='$email' and pass='$password'"; 
							$run2 = mysqli_query($con,$query);
							$run3 = mysqli_fetch_array($run2);
							$_SESSION['name'] = $run3['1'];
							$_SESSION['email'] = $run3['2'];
							echo '<script>window.open("index.php","_self")</script>';
						}
						else
						{
							echo '<script>alert("Enter Email and Password Correctly");</script>';
						}
					}
			?>
	
            	<!-- container -->
			</div>
		</div>
		<!-- Main div end -->
		<footer class="container-fluid" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: rgba(16, 42, 193, 1); color: white; text-align: center; padding-top: 10px; padding-bottom: 0px">
            	<p align="center">Copyright ©  Group 17, CSE370 Section 7, Summer 2019</p>
        </footer>
		<!-- footer end-->
	</body>
</html>
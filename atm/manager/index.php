<?php 
include('conn.php');
session_start();
?>
<!DOCTYPE html>
<html>		    
	<head>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manager Sign In</title>
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
	<body>
		<!--
            ====================
                Navbar Starts
            ====================
        -->
        <nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 10px">
            <div class="container">
				<div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><strong><i class="glyphicon glyphicon-list-alt"></i> Hello Manager! </strong></a>
     			</div>
			</div>
		</nav>	
        <!--
            ========================
                Main Section Starts 
            ========================
        -->
        <div class="container-fluid" style="background:#ccffff; margin-top:20px; padding-top: 20px">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" align="center" action="">
                        <div class="panel panel-login" style="border-radius:0px; box-shadow:2px 2px 2px 0px;">
                                <div class="panel-heading" id="signin_panel_header">
                                    <p align="center"><img src="../admin/user3.png" style="width: 45%; border-radius: 50%; text-align: center;margin: auto;"/> </p>
                                    <h4 align="center">Manager Access</h4>
                                    <hr/>
                                </div>
                                <div class="panel-body" style="margin-top:-25px; padding-bottom: 100px">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="email" class="form-control" placeholder="Type here.." required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" placeholder="Type here.." required=""/>
                                    </div>
                                </div>
                                <div class="panel-footer footer-login">
                                    <center>
                                        <button type="submit" name="login" class="btn btn-success btn-custom" style="padding:12px 35px;"><i class="glyphicon glyphicon-log-in"></i> Log In</button>
                                    </center>
                                </div>
                            </div>         
                        </form>
                    </div>
                </div> 
            </div> 
             <?php
        if(isset($_POST['login'])){
            $user = mysqli_real_escape_string($con, $_POST['email']);
            $pass = mysqli_real_escape_string($con, $_POST['pass']);
            $query ="select * from manager where user='$user' and pass='$pass' ";
            $run = mysqli_query($con,$query);
            if(mysqli_num_rows($run)==1)
            {
                $query_id ="select * from manager where user='$user'";
                $run_id = mysqli_query($con,$query_id);
                $run_id2 = mysqli_fetch_array($run_id);
                $_SESSION['id'] = $run_id2['id'];
                $_SESSION['name'] = $run_id2['name'];
                echo "<script>window.open('home.php','_self');</script>";
            }
            else
            {
                echo "<script>alert('Pro tip: If you cannot even get the password correct, how are you going to win a trophy for your club?')</script>";
            }   
        }
    ?>      
            <!--
                ======================
                    Footer  Starts 
                ======================
            -->
            <div class="container-fluid" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: rgba(139,201,218,1); color: white; text-align: center; padding-top: 10px">
                    <p align="center">Copyright ©  Group 17, CSE370 Section 7, Summer 2019</p>
            </div>
	</body>
</html>
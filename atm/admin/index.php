<?php 
session_start();
include('../conn.php');
$admin= $_SESSION['name'];
if(!$_SESSION['email'])
{
header('location:login.php');
}else{
?>
<!DOCTYPE html>
<html>		    
	<head>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <meta http-equiv="refresh" content=""/>
        <!--
            ============================
                Bootstrap + Custom + Css
            ============================
        -->
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/custom.css"/>
		<!--
            ===============================
                Bootstrap + Custom + Jquery
            ===============================
        -->
		<script src="../js/jquery_library.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
    <body>
        <!--
        ==================
            Navbar starts
        ==================
        -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-lock"></i><b> Home</b></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i><b>  Logout</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--
        ==================
            Main Section
        ==================
        -->
        <div class="container-fluid" style="margin-top:50px; background:#ccffff;">
            <div class="row">
                 <!--
                    ==================
                        Left Side
                    ==================
                 -->
                <div class="col-sm-3">
                    <br/>
                    <div class="well well-sm">
                        <ul class="nav">
                            <li class="" style="background:#ccc;color: black; text-align:center; font-size:25px; padding:0px 0px; margin:15px">Dashboard </li>
                            <li><a href="index.php?m"><span class="glyphicon glyphicon-cog"></span><b> Register new managers</b></a></li>
                            <li><a href="index.php?a"><span class="glyphicon glyphicon-cog"></span><b> Register new administrators</b></a></li>
                            <li><a href="index.php?c"><span class="glyphicon glyphicon-cog"></span><b> Check customers </b></a></li>
                            <li><a href="index.php?c_r"><span class="glyphicon glyphicon-cog"></span><b> Requests made by customers </b></a></li>
                        </ul>
                    </div>
                </div>
                 <!--
                    ==================
                        Right Side
                    ==================
                 -->
                <div class="col-sm-9" style="background:#0066cc">
                    <!-- container-fluid-->
                      <?php 
                      if(isset($_GET['m'])){
                          include('manager.php');
                      }
                      else if(isset($_GET['a'])){
                          include('admin.php');
                      }
                      else if(isset($_GET['c_r'])){
                          include('request.php');
                      }
                      else if(isset($_GET['c'])){
                          include('customer.php');
                      }
                      else{  
                    ?>
                    <h1 class="page-header" style="color: white">ATM Database Information</h1>
                    <h3 style="color: white"> Welcome, <b> <?php echo ucwords($admin); ?>! </b></h3>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="well" style="border-radius:0px; margin-right: -150px; margin-left: -150px; margin-top: 100px; margin-bottom: 270px; padding-top: 30px; padding-bottom:10px; box-shadow:2px 2px 3px 0px;">
                                <table class="table table-bordered table-hover table-striped">
                    
                                    <tr>
                                        <td colspan="2" style="background:#555; color:#fff; height: 50px ;padding-top: 13px ;text-align:center; font-size:20px">Website Stats</td>
                                    </tr>

                                    <tr>
                                        <td align="center" width="50%" style="border: 2px solid black; text-underline-position: under;"><b>Entities </b></td>
                                        <td align="center" width="50%" style="border: 2px solid black; text-underline-position: under;"><b>Data </b></td>
                                    </tr>
                                    <tr>
                                        <td align="center" width="50%">Number of customers</td>
                                        <td align="center" width="50%">
                                            <b>
                                                <?php
                                                    echo $amt = mysqli_num_rows(mysqli_query($con,"select * from user")). " Customers";
                                                ?>
                                            </b>    
                                        </td>   
                                    </tr>	

                                    <tr>
                                        <td align="center" width="50%">Number of managers</td>
                                        <td align="center" width="50%">
                                            <b>
                                                <?php
                                                    echo $amt = mysqli_num_rows(mysqli_query($con,"select * from manager")). " Manager(s)";
                                                ?>
                                            </b>
                                        </td>
                                    </tr>	


                                    <tr>
                                        <td align="center" width="50%">Number of administrators</td>
                                        <td align="center" width="50%">
                                            <b>
                                                <?php
                                                    echo $amt = mysqli_num_rows(mysqli_query($con,"select * from admin")). " Admin(s)";
                                                ?>
                                            </b>
                                        </td>
                                    </tr>	


                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--
        ==================
            Footer Section
        ==================
        -->
        <footer class="container-fluid" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: rgba(16, 42, 193, 1); color: white; text-align: center; padding-top: 10px; padding-bottom: 0px">
                <p align="center">Copyright ©  Group 17, CSE370 Section 7, Summer 2019</p>
        </footer>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.js"></script>
    </body>
</html>
<?php } ?>
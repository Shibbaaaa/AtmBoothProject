<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
	header('location: index.php');
}
else{
	include('conn.php');
    $u_id=$_SESSION['id'];
	$t_name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>		    
	<head>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Atm System</title>
        <meta http-equiv="refresh" content=""/>
        <!--
            ============================
                Bootstrap + Custom + Css
            ============================
        -->
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/custom.css"/>
		<!--
            =================================
                Bootstrap + Custom + Jquery
            =================================
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
        <nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="home.php"><i class="glyphicon glyphicon-list-alt"></i> Home </a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="add_cus.php"><span class='glyphicon glyphicon-copy'></span> Add Customer</a></li>
                        <li><a href="request.php"><span class='glyphicon glyphicon-edit'></span> Register Customer</a></li>
                    </ul>
                    <form action="search.php" class="navbar-form navbar-right" role="search" method="get">
                        <div class="form-group input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search id..." required=""/>
                            <span class="input-group-btn">
                                <button class="btn btn-default s-btn" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>        
                        </div>
                    </form>   
                    <ul class="nav navbar-nav navbar-right">
						<li><a href="../logout.php"><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!--
            =========================
                User info bar Starts
            =========================
        -->
		<div class="container-fluid" style="background:#B1AAC4; margin-top: 50px; border-radius: 0px;">
			<div class="container">
				<h4>  <b>  <i class="glyphicon glyphicon-user"></i> Manager <?php echo $t_name?></b><span class="pull-right" style="line-height:auto; margin-top: px;"><a></a><i class="glyphicon glyphicon-time	"></i> Date: <?php echo $date = date('d/M/y h:i a'); ?></span></h4> 
			</div>
		</div>
		<!--
            ========================
                Main Section starts
            ========================
        -->
        <div class="container-fluid" style="background: #54457F; padding-bottom: 420px;">		
            <div class="row">
                <br/>
                <div class="col-sm-12" style="text-align:center;">
                    <div class="panel">
                        <div class="panel-body" style="border-radius:0px; padding-bottom:0px; box-shadow:2px 2px 2px 0px;">
                           <table align="center" class="table table-bordered table-hover">
                                <tr>
                                   <td colspan="8" align="center" style="background:#444; color:#fff; font-size:22px; border-color:#444;">Searched Customers </td>
                               </tr>
                                <tr>
                                   <td align="center"><b>Id</b></td>
                                   <td align="center"><b>Name</b></td>
                                   <td align="center"><b>ATM account password</b></td>
                                   <td align="center"><b>ATM account username</b></td>
                                   <td align="center"><b>Last date of Transaction</b></td>
                                   <td align="center"><b>Remaining Amount</b></td>
                                   <td align="center"><b>Transaction details</b></td>
                                   <td align="center"><b>Edit Amount</b></td>
                               </tr>
                               
                               <?php
                                    include("conn.php");
                                    if(isset($_GET['search'])){
                                    $id = $_GET['search'];
									                  $cn=mysqli_query($con,"select * from user where id='$id'");
                                        if(mysqli_num_rows($cn)!=0){
                                            while($n = mysqli_fetch_array($cn)){
                               ?>
                               <tr>	
                                   <td align="center"><?php echo $n[0];?></td>
                                   <td align="center"><?php echo ucwords($n[1]);?></td>
                                   <td align="center"><?php echo $n[2];?></td>
                                   <td align="center"><?php echo $n[3];?></td>
                                   <td align="center"><?php echo $n[4]?></td>
                                   <td align="center">Rs. <?php echo $n[5]?> /=</td>
                                   <td align="center"><a class="btn btn-info btn-sm" href="check.php?name=<?php echo $n[0]?>"><i class="glyphicon glyphicon-check"></i></a></td>
                                   <td align="center"><a class="btn btn-success btn-sm" href="edit.php?name=<?php echo $n[0]?>"><i class="glyphicon glyphicon-edit" ></i></a></td>
                               </tr>
                               <?php } }else { echo '<tr>	
											<td colspan="9" align="center"><span style="color:#ff0000; text-align: center;"><b>PLEASE SEARCH USING THE UNIQUE CUSTOMER ID ONLY!!</b></span></td>
										</tr>';
                    echo '<span style="color:#ff0000; text-align: center;">SEARCHING USING CUSTOMER NAME OR USERNAME WILL NOT WORK!</span>';
								}}else{
                                        echo 	'<tr>	
                                                    <td colspan="9" align="center">Please Search By Customer name..!!!</td>
										          </tr>';
                                    }
							?>
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
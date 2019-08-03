<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="refresh" content=""/>	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ATM Booth - Main Menu</title>
        <link rel="stylesheet" href="atm/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="atm/css/custom.css"/>
        <script src="atm/js/jquery_library.js"></script>
		<script src="atm/js/bootstrap.min.js"></script>
        
    </head>
	<body style="background: #ffffff;">
		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
			<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"><strong><i class="glyphicon glyphicon-list-alt "></i> ATM Booth - Main Menu</strong></a>
                </div>
			</div>
		</nav>	
		<!-- navbar ends-->
		<div class="container-fluid" style="background: #4dff88; margin-top:50px; padding-bottom: 55px">
			<br/><div class="row">
                <div class="col-sm-1"></div>
				<!-- Main Menu -->
                <div class="col-sm-3">
                    <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px">
                        <div class="panel-heading" id="signin_panel_header">
                            <p align="center"> <img src="atm/admin/user2.png" style="width: 50%; border-radius: 50%; text-align: center; margin-top: 20px;"/> </p>
                            <h4 align="center" style="padding-top:5px;">Customer Panel</h4><hr/>
                        </div>
                        <div class="panel-body" style="margin-top:-30px;">
                           <center>
                                  <a class="btn btn-success" style="padding:15px 20px;" href="atm/"><i class="glyphicon glyphicon-log-in"></i>  Go</a>
                         </center>
                        </div>
                    </div>
                </div>
                <!-- Manager Menu -->
                <div class="col-sm-4">
                    <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px">
                        <div class="panel-heading" id="signin_panel_header">
                            <p align="center"> <img src="atm/admin/user3.png" style="width: 50%;border-radius: 50%;text-align: center;margin-top: 20px;"/> </p>
                            <h4 align="center" style="padding-top:5px;">Manager Panel</h4><hr/>
                        </div>
                        <div class="panel-body" style="margin-top:-30px;">
                           <center>
                                  <a class="btn btn-success" style="padding:15px 20px;" href="atm/manager/"><i class="glyphicon glyphicon-log-in"></i>   Go</a>
                         </center>
                        </div>
                    </div>
                </div>
                <!-- Admin Menu -->
				<div class="col-sm-3">
                    <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px">
                        <div class="panel-heading" id="signin_panel_header">
                            <p align="center"> <img src="atm/admin/user4.png" style="width: 50%;border-radius: 50%; text-align: center; margin-top: 20px;"/> </p>
                            <h4 align="center" style="padding-top:5px;">Admin Panel</h4><hr/>
                        </div>
                        <div class="panel-body" style="margin-top:-30px;">
                           <center>
                               <a class="btn btn-success" style="padding:15px 20px;" href="atm/admin/"><i class="glyphicon glyphicon-log-in"></i>  Go</a>
                            </center>
                        </div>
                    </div>
                </div>
               <!-- <div class="col-sm-1"></div> -->
			</div>
		</div>
		<!-- Main div ends -->
		<footer class="container-fluid" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: rgba(255,255,255,1); color: black; text-align: center; padding-top: 10px; padding-bottom: 10px">
             <p align="center">Prepared by:</p>
             <p align="center">Chayan Saha (17101415)</p>
             <p align="center">Shihab Sharar (17201095)</p> 
             <p align="center">Md. Tahmid Chowdhury Abir (17201029)</p>
             <p align="center">Md. Sazzad Hossain Shehan (17201150)</p>
        </footer>
		<!-- footer ends-->
	</body>
</html>
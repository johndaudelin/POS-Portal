<?php
ob_start();
session_start();
require_once 'db/set_transact_info.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game Store Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-home"></i> <span> Game Store</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/<?php if (file_exists("images/".$_SESSION['id'].".png")) { echo $_SESSION['id']; } else { echo "user"; }?>.png?=<?php echo date("Y m d H i s"); ?>" alt="..." class="img-circle profile_img" style="width:60px; height:60px;">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['name']; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dash Board </a>
                    
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
	        				<li><a href="prices.php"><i class="fa fa-bar-chart-o"></i> Manage Prices </a>
                  </li>
	        				<li><a href="employees.php"><i class="fa fa-desktop"></i> Manage Employees </a>
                  </li>
                </ul>
              </div>
	    				<div class="menu_section">
                <ul class="nav side-menu">
	         				<li><a href="schedule.php"><i class="fa fa-table"></i> My Schedule </a>
                  </li>
	        				<li><a href="inventory.php"><i class="fa fa-sitemap"></i> Inventory </a>
                  </li>
	        				<li><a href="cashreports.php"><i class="fa fa-edit"></i> Cash Reports </a>
                  </li>
                </ul>
              </div>
	    				<div class="menu_section">
                <ul class="nav side-menu">

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
	    				<a data-toggle="tooltip" data-placement="top" title="Profile" href="profile.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="db/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/<?php if (file_exists("images/".$_SESSION['id'].".png")) { echo $_SESSION['id']; } else { echo "user"; }?>.png?=<?php echo date("Y m d H i s"); ?>" alt=""><?php echo $_SESSION['name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                     <li><a  href = "db/logout.php" ><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
			<div class="">
				<div class="page-title">
					<div class="title_left">
						<h3>Invoice #<?php echo $_GET['invoice']; ?></h3>
					</div>
				</div>

				<div class="clearfix"></div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Itemized List</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						
						<div class="x_content">
							<table id="itemlist" class="table table-striped jambo_table">
								<thead>
									<tr class="headings">
										<th class="column-title">Type </th>
										<th class="column-title">Inventory ID </th>
										<th class="column-title">Name </th>
										<th class="column-title">Qty </th>
										<th class="column-title">Amount ($) </th>
									</tr>
								</thead>

								<tbody>
									<?php
									$total = floatval($tax);
									while ($row = mysqli_fetch_assoc($items)){
										$inv = db_query("SELECT name FROM inventory WHERE id='" . $row['inventoryId'] . "'");
										$inv = mysqli_fetch_assoc($inv);
										$name = $inv['name'];
										echo '<tr class=" "><td class=" ">';
										echo $row['type'];
										echo '</td><td class=" ">';
										echo $row['inventoryId'];
										echo '</td><td class=" ">';
										echo $name;
										echo '</td><td class=" ">';
										echo $row['count'];
										echo '</span></td><td class=" "><span style="color:';
										if ($row['amount'] < 0){
											echo 'RED;">';
										}
										else {
											echo 'GREEN;">';
										}
										echo $row['amount'];
										echo '</span></td></tr>';
										$total += $row['amount'];
									}
									?>
									<tr class=" "> 
										<td class=" ">Tax/Fees</td>
										<td class=" "></td>
										<td class=" "></td>
										<td class=" "></td>
										<td class=" "><?php if ($tax > 0){ echo '<span style="color:GREEN;">'; } else { echo '<span style="color:RED;">'; } echo $tax; echo '</span>'; ?></td>
									</tr>
									<tr class="<?php if ($total > 0){echo 'info';} else {echo 'danger';} ?>">
										<td class=" "><b>TOTAL</b></td>
										<td class=" "></td>
										<td class=" "></td>
										<td class=" "></td>
										<td class=" "><b><?php
										if ($total > 0){
											echo '<span style="color:GREEN;">';
										}
										else {
											echo '<span style="color:RED;">';
										}
										echo number_format(strval($total),2);
										echo '</span>'
										?></b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="x_panel">
						<div class="x_title">
							<h2>Payments</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						
						<div class="x_content">
							<table id="payments" class="table table-striped jambo_table">
								<thead>
									<tr class="headings">
										<th class="column-title">Type </th>
										<th class="column-title">Amount ($) </th>
										<th class="column-title">Card Type </th>
									</tr>
								</thead>

								<tbody>
								<?php
									$total = 0.0;
									while ($row = mysqli_fetch_assoc($cash)){
										echo '<tr class=" "><td class=" ">Cash</td><td class= " ">';
										echo $row['amount'];
										echo '</td><td class=" ">N/A';
										echo '</td></tr>';
										$total += $row['amount'];
									}
									while ($row = mysqli_fetch_assoc($credit)){
										echo '<tr class=" "><td class=" ">Credit Card</td><td class= " ">';
										echo $row['amount'];
										echo '</td><td class=" ">N/A'; //CHANGE THIS IF IMPLEMENTING CARD TYPES
										echo '</td></tr>';
										$total += $row['amount'];
									}
									while ($row = mysqli_fetch_assoc($storeCredit)){
										echo '<tr class=" "><td class=" ">Store Credit</td><td class= " ">';
										echo $row['amount'];
										echo '</td><td class=" ">N/A';
										echo '</td></tr>';
										$total += $row['amount'];
									}
									while ($row = mysqli_fetch_assoc($giftCard)){
										echo '<tr class=" "><td class=" ">Gift Card</td><td class= " ">';
										echo $row['amount'];
										echo '</td><td class=" ">Card ID: ';
										echo $row['cardId'];
										echo '</td></tr>';
										$total += $row['amount'];
									}
									?>
									<tr class="<?php if ($total > 0){echo 'info';} else {echo 'danger';} ?>">
										<td class=" "><b>TOTAL</b></td>
										<td class=" "><b><?php echo number_format(strval($total),2); ?></b></td>
										<td class=" "></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<center><a style="font-size:85%" class="btn btn-primary" data-position-to="window" href="cashreports.php">Return</a></center>
				</div>
			</div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
	
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
	<!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>

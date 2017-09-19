<?php
ob_start();
session_start();
require_once 'db/console_items.php';
require_once 'db/set_price.php';
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

		<!-- Custom Theme Style -->
		<link href="../build/css/custom.min.css" rel="stylesheet">
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="index.php" class="site_title"><i class="fa fa-home"></i> <span>Game Store</span></a>
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
									<li><a href="index.php"><i class="fa fa-home"></i> Dash Board </a></li>
								</ul>
							</div>
							<div class="menu_section">
								<ul class="nav side-menu">
									<li><a href="prices.php"><i class="fa fa-bar-chart-o"></i> Manage Prices </a></li>
									<li><a href="employees.php"><i class="fa fa-desktop"></i> Manage Employees </a></li>
								</ul>
							</div>
							<div class="menu_section">
								<ul class="nav side-menu">
									<li><a href="schedule.php"><i class="fa fa-table"></i> My Schedule </a></li>
									<li><a href="inventory.php"><i class="fa fa-sitemap"></i> Inventory </a></li>
									<li><a href="cashreports.php"><i class="fa fa-edit"></i> Cash Reports </a></li>
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
								<h3>Manage Prices</h3>
							</div>
						</div>

						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Prices for <?php echo $_GET['console']; ?></h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
											<li><a class="close-link"><i class="fa fa-close"></i></a></li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<table class="table table-striped jambo_table" id="prices">
											<thead>
												<tr>
													<th>UPC</th>
													<th>Name</th>
													<th>Console</th>
													<th>Our Price</th>
													<th>GS Price</th>
													<th>CIB Price</th>
													<th>Set Price</th>
												</tr>
											</thead>
											<tbody>
											
											</tbody>
										</table>
										
										<center><a style="font-size:85%" class="btn btn-primary" data-position-to="window" href="prices.php">Return</a></center>
									</div>
								</div>
							</div>
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
		<!-- Custom Theme Scripts -->
		<script src="../build/js/custom.min.js"></script>
		
		<script>
		
		<?php
		echo "var upcArr = " . $jsUpc . ";";
		echo "var priceArr = " . $jsPrices . ";";
		echo "var nameArr = " . $jsNames . ";";
		?>
		
		if (upcArr.length == 0){
			$('#prices tbody').html('<tr><th scope="row" colspan="7"><center>No items in inventory.</center></th></tr>');
		}
		
		for (var i = 0; i < upcArr.length; i++){
			var twelveDigitUpc = ('00000000000' + upcArr[i]).substr(-12)
			var stringURL = "https://www.pricecharting.com/api/product?t=32f149df8d3b2f397caf25b93158bc27a863fca1&upc=" + twelveDigitUpc;
			var upc = upcArr[i];
			var price = priceArr[i];
			var name = nameArr[i];
			var r = new Array(), j = -1;
			var console = '<?php echo $_GET['console']; ?>';
			r[++j] ='<tr><th scope="row">';
			r[++j] = upc
			r[++j] = '</th><td class=" " style="text-transform:uppercase;">';
			r[++j] = name;
			r[++j] = '</td><td class=" ">'
			r[++j] = console;
			r[++j] = '</td><td class=" ">$'
			r[++j] = price;
			$.ajax({
				async: false,
				url: stringURL,
				type: "POST",
				dataType: "json",
				success: function( response ) {
					r[++j] = '</td><td class=" ">';
					if ('gamestop-price' in response){
						var gsPrice = parseFloat(response['gamestop-price']) / 100;
						r[++j] = '$';
						r[++j] = gsPrice;
					}
					else {
						r[++j] = 'N/A';
					}
					r[++j] = '</td><td class=" ">';
					if ('cib-price' in response){
						var cibPrice = parseFloat(response['cib-price']) / 100;
						r[++j] = '$';
						r[++j] = cibPrice;
					}
					else {
						r[++j] = 'N/A';
					}
				},
				error: function(xhr, errMSG, errOBJ){
					// handle the case upc value not found in pricecharting table
					r[++j] = '</td><td class=" ">N/A';
					r[++j] = '</td><td class=" ">N/A';
				}
			});
			r[++j] = '</td><td class=" ">';
			r[++j] = '<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" style="width:250px;"><div class="input-group"><input type="hidden" name="console" value="'+ console +'"/><input type="hidden" name="upc" value="' + upc + '"/><input style="float:right; width:200px;" type="number" step=".01" class="form-control" name="price" required="required" min="0" max="999999.99" placeholder="Enter New Price"><span class="input-group-btn"><button type="submit" class="btn btn-primary">Go!</button></span></div></form>';
			r[++j] = '</td></tr>';
			
			$('#prices tbody').append(r.join(""));
		}
		
		</script>
	</body>
</html>
<?php ob_end_flush(); ?>
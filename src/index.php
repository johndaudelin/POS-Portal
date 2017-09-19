<?php
session_start();

// it will never let you open this page if session is not set
 if ( !isset($_SESSION['name']) ) {
  header("Location: login.php");
  exit;
 }
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
								<h3>Dash Board</h3>
							</div>
						</div>

						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Sales (last 6 months)</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									
									<div class="x_content">
										<canvas id="salesChart"></canvas>
									</div>
								</div>
							</div>
						
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Profit (last 6 months)</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									
									<div class="x_content">
										<canvas id="profitChart"></canvas>
									</div>
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2 id="day">Today's Report: </h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									
									<div class="x_content">
										<table class="table table-striped jambo_table" id="dayReport">
											<thead>
												<tr>
													<th>Sales</th>
													<th>Gross Profit</th>
													<th>Trades</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2 id="month">This Month's Report: </h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									
									<div class="x_content">
										<table class="table table-striped jambo_table" id="monthReport">
											<thead>
												<tr>
													<th>Sales</th>
													<th>Gross Profit</th>
													<th>Trades</th>
													<th>Projected Estimate</th>
													<th>Year To Date</th>
													<th>Last Year (this month)</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
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
		<!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
		<!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
		<!-- handle dynamic content -->
		<script>
		/* graphs with data */
		var salesChart = document.getElementById("salesChart").getContext("2d");
		var profitChart = document.getElementById("profitChart").getContext("2d");
		
		var currDate = new Date();
		var numericMonth = currDate.getMonth(); // MUST ADD 1 LATER because date months go from 0 to 11
		var numericYear = currDate.getFullYear();
		var numericDay = currDate.getDate();
		var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		
		/* add string version of current month and current day to their respective labels on the page */
		var stringMonth = months[numericMonth];
		$('#month').append("<b>" + stringMonth + " " + numericYear + "</b>");
		$('#day').append("<b>" + stringMonth + " " + numericDay + ", " + numericYear + "</b>");
		
		var past6Months = []; // A string array containing the string names of the past 6 months (including the current month as the last element) - SERVES AS THE GRAPHS' X-AXIS
		
		// initialize x-axis array
		for (var i = 5; i >= 0; i--){
			var index = (numericMonth - i) < 0 ? 12 + (numericMonth - i) : (numericMonth - i);  // index is from 0 to 11
			past6Months.push(months[index]);
		}
		
		// initialize options for the sales graph
		var options1 = {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			},
			title: {
				display: true,
				fontSize: 10,
				text: "Totals Per Month ($)"
			},
			tooltips: {
				enabled: true,
				titleFontSize: 14,
				callbacks: {
					// display the month and total sales/profit when the mouse is hovered over a data point
					label: function(tooltipItem, data) {                
						return  "Gross Sales: $" + data.datasets[0].data[tooltipItem.index];
					}
				}
			}
		}
		
		// initialize options for the profit graph
		var options2 = {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			},
			title: {
				display: true,
				fontSize: 10,
				text: "Totals Per Month ($)"
			},
			tooltips: {
				enabled: true,
				titleFontSize: 14,
				callbacks: {
					// display the month and total sales/profit when the mouse is hovered over a data point
					label: function(tooltipItem, data) {                
						return  "Gross Profit: $" + data.datasets[0].data[tooltipItem.index];
					}
				}
			}
		}
		
		// arrays of 6 months, each containing total sum of sales/profits for each month
		// days[0] represents oldest month, days[5] represents current month
		var monthsSales = [0, 0, 0, 0, 0, 0];
		var monthsProfits = [0, 0, 0, 0, 0, 0];
		
		var monthsTrades = 0.0;
		var daySales = 0.0;
		var dayProfit = 0.0;
		var dayTrades = 0.0;
		var yearSales = 0.0;
		var lastYearMonth = 0.0;
		
		$.ajax({
			type: "GET",
			url: "db/salesRaw.php",
			dataType: "json"
		}).done(function( data ) {
			$.each(data, function(index, element) {
				var elementMonth = parseInt(element.date_time.slice(5, 7)); // FROM 1 to 12
				var elementYear = parseInt(element.date_time.slice(0, 4));
				var elementDay = parseInt(element.date_time.slice(8, 10)); // FROM 1 to 31
				
				var sale = parseFloat(element.total_amount);
				
				// test if the current element's date is in this year
				if (elementYear == numericYear){
					if (sale > 0){
						yearSales += sale;
					}
					
					// test if the current element's date is TODAY
					if (elementMonth == numericMonth + 1 && elementDay == numericDay){
						// Calculate trade, sale, and profit increases for today from the current transaction
						if (sale < 0){
							dayTrades -= sale;
						}
						else {
							daySales += sale;
							dayProfit += (sale - parseFloat(element.cost_of_goods));
						}
					}
				}
				// test if the current element's date is in this month of last year
				else if (elementYear == numericYear - 1 && elementMonth == numericMonth + 1){
					if (sale > 0){
						lastYearMonth += sale;
					}
				}
				
				// test if the current element's date is older than the last 6 months and exit function if it is
				if (elementYear < numericYear - 1){
					return;
				}
				else if (elementYear == numericYear - 1){
					if (elementMonth < (8 + numericMonth)){
						return;
					}
				}
				else if (elementMonth < (numericMonth - 4) || elementMonth > numericMonth + 1){
					return;
				}
				
				// test if the current element's total amount is less than 0 and if so, add to the month's trades and exit the function
				if (sale < 0){
					if (elementMonth == numericMonth + 1){
						monthsTrades -= sale;
					}
					return;
				}
				
				// add the indiviual sale/profit amount to the total sale/profit amount for the appropriate month
				var index = 5 - (elementMonth > numericMonth + 1 ? (numericMonth + 13 - elementMonth) : (numericMonth + 1 - elementMonth));
				var profit = sale - parseFloat(element.cost_of_goods);
				monthsSales[index] += sale;
				monthsProfits[index] += profit;
			});
			
			// format all dollar amounts to two decimal places
			for (var i = 0; i < 6; i++){
				monthsSales[i] = monthsSales[i].toFixed(2);
				monthsProfits[i] = monthsProfits[i].toFixed(2);
			}
			monthsTrades = monthsTrades.toFixed(2);
			daySales = daySales.toFixed(2);
			dayProfit = dayProfit.toFixed(2);
			dayTrades = dayTrades.toFixed(2);
			yearSales = yearSales.toFixed(2);
			lastYearMonth = lastYearMonth.toFixed(2);
			
			// instantiate the data for the two tables (day report and month report)
			var numDays = new Date(numericYear, numericMonth + 1, 0).getDate();
			var estimate = (monthsSales[5] / numericDay * numDays).toFixed(2);
			$('#dayReport tbody').html('<tr><th scope="row">$' + daySales + '</th><td class=" ">$' + dayProfit + '<td class=" ">$' + dayTrades + '</td></tr>');
			$('#monthReport tbody').html('<tr><th scope="row">$' + monthsSales[5] + '</th><td class=" ">$' + monthsProfits[5] + '</td><td class=" ">$' + monthsTrades + '</td><td class=" ">$' + estimate + '</td><td class=" ">$' + yearSales + '</td><td class=" ">' + lastYearMonth + '</td></tr>');
			
			// create the graphs of sales and profits for the last 6 months
			var lineChart1 = new Chart(salesChart, {
				type: 'line',
				data: {
					labels: past6Months,
					datasets: [
						{
							data: monthsSales,
							label: "Gross Sales",
							borderWidth: 3,
							backgroundColor: "rgba(75,192,192,0.4)",
							borderColor: "rgba(75,192,192,1)",
							pointHoverRadius: 6,
							lineTension: 0.5,
							fill: true
						}
					] 
				},
				options: options1  // already defined before ajax request
			});
			
			var lineChart2 = new Chart(profitChart, {
				type: 'line',
				data: {
					labels: past6Months,
					datasets: [
						{
							data: monthsProfits,
							label: "Gross Profit",
							borderWidth: 3,
							backgroundColor: "rgba(21, 178, 42, 0.4)",
							borderColor: "rgba(21, 178, 42, 1)",
							pointHoverRadius: 6,
							lineTension: 0.5,
							fill: true
						}
					] 
				},
				options: options2  // already defined before ajax request
			});
			
		});
			
		</script>
  </body>
</html>

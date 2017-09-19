<?php
 ob_start();
 session_start();
 require_once 'db/inventory_change.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game Store Admin </title>

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
                <h3>Inventory</h3>
              </div>
	          </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Item Info</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="form-horizontal form-label-left" >
                      <?php
                      if ( isset($errMSG) ) {
                      ?>
                      <div class="form-group">
                        <div class="alert alert-danger">
                          <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="upc">UPC</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="number" name="upc" class="form-control col-md-7 col-xs-12" required="required" min="0" max="999999999999" value="<?php echo $upc ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" maxlength="100" value="<?php echo $name; ?>" style="text-transform:uppercase;">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="console">Console</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="console" class="form-control col-md-7 col-xs-12" maxlength="20" value="<?php echo $console; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="cost" class="control-label col-md-3">Cost</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step=".01" name="cost" class="form-control col-md-7 col-xs-12" min="0" max="999999.99" value="<?php echo $cost; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="price" class="control-label col-md-3">Price </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step=".01" name="price" required="required" class="form-control col-md-7 col-xs-12" min="0" max="999999.99" value="<?php echo $price; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="percentDiscount" class="control-label col-md-3 col-sm-3 col-xs-12">% discount</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step="0.1" name="percentDiscount" required="required" class="form-control col-md-7 col-xs-12" min="0" value="<?php echo $percentDiscount; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="dollarDiscount" class="control-label col-md-3 col-sm-3 col-xs-12">$ discount</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step=".01" name="dollarDiscount" required="required" class="form-control col-md-7 col-xs-12" min="0" value="<?php echo $dollarDiscount; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="tax" class="control-label col-md-3 col-sm-3 col-xs-12">Sales Tax</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step=".01" name="tax" required="required" class="form-control col-md-7 col-xs-12" min="0" max="1" value="<?php echo $tax; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="count" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="count" required="required" class="form-control col-md-7 col-xs-12" min="0" max="99999" value="<?php echo $count; ?>">
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="inventory.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                          <button type="submit" name="btn btn-default submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
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
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<?php ob_end_flush(); ?>
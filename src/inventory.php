<?php
ob_start();
session_start();
require_once 'db/add_item.php';
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
    <!-- Custom Popup Style -->
    <link href="css/popups.css" rel="stylesheet">
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
                <h3>Inventory Manager</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Inventory</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped jambo_table" id="datatable">
                      <thead>
                        <tr>
                          <th>UPC</th>
                          <th>Name</th>
                          <th>Console</th>
                          <th>Cost</th>
                          <th>Price</th>
                          <th>Qty.</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <a class="btn btn-success" id="add"><i class="fa fa-cart-arrow-down m-right-xs"></i> Add Item</a>
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
    
    <script>

    //sort the inventory alphabetically
    $(document).ready( function(){
      $("#datatable").DataTable( {
        "order": [[ 1, "asc" ]]
      });
    });
    
    $.ajax({
      async: false,
      url: "db/inventoryRaw.php",
      type: "POST",
      dataType: "json",
      success: function( response ) {
        var r = new Array(), j = -1;
        for (var i = 0; i < response.length; i++){
          r[++j] ='<tr><th scope="row">';
          r[++j] = response[i]["upc"];
          r[++j] = '</th><td style="text-transform:uppercase;">';
          r[++j] = response[i]["name"];
          r[++j] = '</td><td>';
          r[++j] = response[i]["console"];
          r[++j] = '</td><td>$';
          r[++j] = response[i]["cost"];
          r[++j] = '</td><td>$';
          r[++j] = response[i]["price"];
          r[++j] = '</td><td>';
          r[++j] = response[i]["count"];
          r[++j] = '</td><td>';
          r[++j] = '<a onClick="javascript: return confirm(\'Are you sure you want to remove item from inventory? This action cannot be undone.\');" style="font-size:85%" class="btn btn-primary" data-position-to="window" href="db/delete_item.php?id=';
          r[++j] = response[i]["id"];
          r[++j] = '">Remove</a>';
          r[++j] = '<a style="font-size:85%" class="btn btn-primary" data-position-to="window" href="edit_inventory.php?id=';
          r[++j] = response[i]["id"];
          r[++j] = '">Edit</a>';
          r[++j] = '</td></tr>';
        }
        
        $('#datatable tbody').html(r.join(""));
      },
      error: function(xhr, errMSG, errOBJ){
        // handle unexpected error by redirecting to 500 error page
        window.location = "page_500.html";
      }
    });
    </script>
	
	  <div id="overlay"></div>
	
    <!-- Popup for adding employee -->
    <div id="popup">
      <div class="popupcontent">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2 style="padding-top:5px">Add to Inventory</h2>
                <a id="popupclose"><i class="fa fa-close"></i></a>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" class="form-horizontal form-label-left" >
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="upc">UPC <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  type="number" name="upc" class="form-control col-md-7 col-xs-12" required="required" min="0" max="999999999999">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  type="text" name="name" class="form-control col-md-7 col-xs-12" required="required" maxlength="100" style="text-transform:uppercase;">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="console">Console</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="console" class="form-control col-md-7 col-xs-12" maxlength="20">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Cost ($)</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" step="0.01" name="cost" class="form-control col-md-7 col-xs-12" min="0" max="999999.99">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price ($) <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" step="0.01" name="price" required="required" class="form-control col-md-7 col-xs-12" min="0" max="999999.99">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="count">Quantity <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" name="count" required="required" class="form-control col-md-7 col-xs-12" min="1" max="99999" value="1">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <a id="popupclose-button"><button type="button" class="btn btn-primary">Cancel</button></a>
                      <button type="submit" name="submit" class="btn btn-success" value="add">Add</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>	
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	  <!-- Custom Popup Script -->
    <script src="js/popups.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
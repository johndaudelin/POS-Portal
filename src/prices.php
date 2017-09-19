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
                <h3>Manage Prices</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Select Console</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <ul>
                      <li><a href="console_prices.php?console=3DO">3DO</a></li>
                      <li><a href="console_prices.php?console=Amiibo">Amiibo</a></li>
                      <li><a href="console_prices.php?console=Atari+2600">Atari 2600</a></li>
                      <li><a href="console_prices.php?console=Atari+400">Atari 400</a></li>
                      <li><a href="console_prices.php?console=Atari+5200">Atari 5200</a></li>
                      <li><a href="console_prices.php?console=Atari+7800">Atari 7800</a></li>
                      <li><a href="console_prices.php?console=Atari+Lynx">Atari Lynx</a></li>
                      <li><a href="console_prices.php?console=CD-i">CD-i</a></li>
                      <li><a href="console_prices.php?console=Colecovision">Colecovision</a></li>
                      <li><a href="console_prices.php?console=Commodore+64">Commodore 64</a></li>
                      <li><a href="console_prices.php?console=Disney+Infinity">Disney Infinity</a></li>
                      <li><a href="console_prices.php?console=GameBoy">GameBoy</a></li>
                      <li><a href="console_prices.php?console=GameBoy+Advance">GameBoy Advance</a></li>
                      <li><a href="console_prices.php?console=GameBoy+Color">GameBoy Color</a></li>
                      <li><a href="console_prices.php?console=Gamecube">Gamecube</a></li>
                      <li><a href="console_prices.php?console=Intellivision">Intellivision</a></li>
                      <li><a href="console_prices.php?console=Jaguar">Jaguar</a></li>
                      <li><a href="console_prices.php?console=N-Gage">N-Gage</a></li>
                      <li><a href="console_prices.php?console=NES">NES</a></li>
                      <li><a href="console_prices.php?console=Neo+Geo">Neo Geo</a></li>
                      <li><a href="console_prices.php?console=Neo+Geo+Pocket+Color">Neo Geo Pocket Color</a></li>
                      <li><a href="console_prices.php?console=Nintendo+3DS">Nintendo 3DS</a></li>
                      <li><a href="console_prices.php?console=Nintendo+64">Nintendo 64</a></li>
                      <li><a href="console_prices.php?console=Nintendo+DS">Nintendo DS</a></li>
                      <li><a href="console_prices.php?console=Nintendo+Switch">Nintendo Switch</a></li>
                      <li><a href="console_prices.php?console=Odyssey+2">Odyssey 2</a></li>
                      <li><a href="console_prices.php?console=PAL+Master+System">PAL Master System</a></li>
                      <li><a href="console_prices.php?console=PAL+NES">PAL NES</a></li>
                      <li><a href="console_prices.php?console=PSP">PSP</a></li>
                      <li><a href="console_prices.php?console=Playstation">Playstation</a></li>
                      <li><a href="console_prices.php?console=Playstation+2">Playstation 2</a></li>
                      <li><a href="console_prices.php?console=Playstation+3">Playstation 3</a></li>
                      <li><a href="console_prices.php?console=Playstation+4">Playstation 4</a></li>
                      <li><a href="console_prices.php?console=PlayStation+Vita">PlayStation Vita</a></li>
                      <li><a href="console_prices.php?console=Sega+32X">Sega 32X</a></li>
                      <li><a href="console_prices.php?console=Sega+CD">Sega CD</a></li>
                      <li><a href="console_prices.php?console=Sega+Dreamcast">Sega Dreamcast</a></li>
                      <li><a href="console_prices.php?console=Sega+Game+Gear">Sega Game Gear</a></li>
                      <li><a href="console_prices.php?console=Sega+Genesis">Sega Genesis</a></li>
                      <li><a href="console_prices.php?console=Sega+Master+System">Sega Master System</a></li>
                      <li><a href="console_prices.php?console=Sega+Saturn">Sega Saturn</a></li>
                      <li><a href="console_prices.php?console=Skylanders">Skylanders</a></li>
                      <li><a href="console_prices.php?console=Super+Nintendo">Super Nintendo</a></li>
                      <li><a href="console_prices.php?console=TurboGrafx-16">TurboGrafx-16</a></li>
                      <li><a href="console_prices.php?console=Vectrex">Vectrex</a></li>
                      <li><a href="console_prices.php?console=Vic-20">Vic-20</a></li>
                      <li><a href="console_prices.php?console=Virtual+Boy">Virtual Boy</a></li>
                      <li><a href="console_prices.php?console=Wii">Wii</a></li>
                      <li><a href="console_prices.php?console=Wii+U">Wii U</a></li>
                      <li><a href="console_prices.php?console=Xbox">Xbox</a></li>
                      <li><a href="console_prices.php?console=Xbox+360">Xbox 360</a></li>
                      <li><a href="console_prices.php?console=Xbox+One">Xbox One</a></li>
					          </ul>
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
  </body>
</html>

<?php
 ob_start();
 session_start();
 require_once 'db/first_admin.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
              <h1>Register</h1>
	    
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
                
              <div>
                <span class="text-danger"></span>
                <input type="text" name="name" class="form-control" placeholder="Full name" value="<?php echo $name; ?>" required="" />
              </div>
              <div>
                <span class="text-danger"><?php echo $emailError; ?></span>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required="" />
              </div>
              <div>
                <span class="text-danger"><?php echo $passError; ?></span>
                <input type="password" name="pass" class="form-control" placeholder="Password" value="<?php if ($passError == ""){ echo $pass; } ?>" required="" />
              </div>
              <div>
                <input type="password" name="pass2" class="form-control" placeholder="Confirm Password" value="<?php if ($passError == ""){ echo $pass2; } ?>" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="btn-register">Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                
                <br />

                <div>
                  <h1><i class="fa fa-home"></i> Game Store</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<?php ob_end_flush(); ?>

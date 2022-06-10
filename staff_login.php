<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SCI-EDU | Staff Login</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">

  <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="user_check.php" method="post">
              <h1>Staff Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
              </div>
              <div>
                <button class="btn btn-default" id="login" type="submit">Login</button>
                <button class="btn btn-default" id="back" onclick="backtohome()">Back To Home</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div class="clearfix"></div>
                <br />

                <h1>
                  <i class="fa fa-graduation-cap"></i> SCI-EDU OFFICIAL</h1>
                  <p>©2020 BetaDevTeam All Rights Reserved.</p>
              </div>
            </form>
          </section>
        </div>
          <script>
            function backtohome(){
              location.replace("index.php");
            }
          </script>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>

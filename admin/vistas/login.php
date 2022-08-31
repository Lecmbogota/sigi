<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=2, maximum-scale=3, user-scalable=yes" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/css/blue.css">
    <link rel="shortcut icon" href="../public/images/logo_lg.webp">
    <style>
html {
  height: 100%;
}
body {
  min-height: 100%;
}
</style>


  </head>
  <body >
    <?php require '../config/Conexion.php'; ?>
    <div class="login-box">
      <div class="login-logo">
      <img class="profile-img" src="../public/images/logo_lg.webp" width="250">
      </div><!-- /.login-logo -->
      <div class="login-box-body ">

        <form method="post" id="frmAcceso">
          <div class="form-group has-feedback">
            <input type="text" id="logina" name="logina" class="form-control" placeholder="Usuario">
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Password">
            <span class="fa fa-key form-control-feedback"></span>
          </div>
          <div class="row ">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"> Ingresar</button>
            </div><!-- /.col -->
          </div>
          
        </form>        
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
     <!-- Bootbox -->
    <script src="../public/js/bootbox.min.js"></script>

    <script type="text/javascript" src="scripts/login.js"></script>


   </body>
   
</html> 
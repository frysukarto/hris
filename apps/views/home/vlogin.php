<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRIS Valdo</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo $html['css']; ?>
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url() ?>assets/images/login_bg.jpg); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">
<div class="login-box">
  <div class="login-logo">
      <a style="color: #ffffff;" href="<?php echo base_url() ?>dashboard"><b>VALDO</b> ADMIN</a>
  </div>
    <?php
$is_logged_in = $this->session->userdata('id_admin');
if (!isset($is_logged_in) || $is_logged_in != true) {
    ?>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in Here</p>
    <?php if (validation_errors()) { echo validation_errors('<p class="alert alert-danger" align="center">', '</p>');} ?>
    <form action="<?php echo base_url()?>login" method="post">
      <div class="form-group has-feedback">
          <input type="username" required name="login" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" name="password" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
</div>
    <?php } else{ ?>
    <div class="login-box-body">
        <span class="btn-flat">Welcome, <b><?php echo $this->session->userdata('fullname'); ?></b></span><br><br>
        <a href="<?php echo base_url()?>dashboard"><button type="submit" class="btn btn-primary btn-block btn-flat">To Dashboard</button></a><br>
        <a href="<?php echo base_url()?>logout"><button type="submit" class="btn btn-danger btn-block btn-flat">Logout</button></a>

    </div>
    <?php }?>
</div>
<?php echo $html['js']; ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

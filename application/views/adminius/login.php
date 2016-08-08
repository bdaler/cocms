<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?php  echo base_url('assets/adminius/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
    <link href="<?php  echo base_url('assets/adminius/bootstrap/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
    <link href="<?php  echo base_url('assets/adminius/assets/styles.css');?>" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php  echo base_url('assets/adminius/vendors/modernizr-2.6.2-respond-1.1.0.min.js');?>"></script>
  </head>
  <body id="login">
    <div class="container">
    <?php  echo form_open('adminius/main/login', array('class'=>'form-signin'));?>
      <?php  echo validation_errors();?>
      <?php  echo $this->session->flashdata('msg'); ?>
      <!--form class="form-signin"-->
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="email" class="input-block-level" placeholder="Email address">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        <a href="/" class="btn btn-large btn-primary">Back to site</a>
      </form>

    </div> <!-- /container -->
    <script src="<?php  echo base_url('assets/adminius/vendors/jquery-1.9.1.min.js');?>"></script>
    <script src="<?php  echo base_url('assets/adminius/bootstrap/js/bootstrap.min.js');?>"></script>
  </body>
</html>
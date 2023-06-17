 <?php $err=0;
 	if($this->session->flashdata('error_message'))
 		$err = $this->session->flashdata('error_message'); 
 ?>
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url();?>assets/images/pink-ribbon.png" width="50%" />
    <h3>Breast Cancer Information System </h3>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo base_url();?>index.php" method="post">
      <div class="form-group has-feedback <?php if($err==3):?>has-error<?php endif;?>">
        <input type="text" class="form-control" placeholder="Username" name="l_uname" required="required">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php if($err==3):?>
        <span class="help-block">Username not found !</span>
    	<?php endif; ?>
      </div>
      <div class="form-group has-feedback <?php if($err==2):?>has-error<?php endif;?>">
        <input type="password" class="form-control" placeholder="Password" name="l_upass" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if($err==2):?>
        <span class="help-block">Wrong Password !</span>
    	<?php endif; ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label for="remember">
              <input type="checkbox" name="remember" value="1"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-danger btn-block btn-flat bg-pink">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
  </div>
  <!-- /.login-box-body -->

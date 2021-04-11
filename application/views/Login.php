<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Task System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
   <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0)"><b>Task Management</b></a>
		
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login</p>
		 <p class="login-box-msg" style="color:red"><?php echo $this->phpsession->get('msg');$this->phpsession->clear('msg');?></p>		
        <form action="<?php echo $this->config->item('base_url').'login/' ?>" method="post" id="login" name="login">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username"  value="" name="loginname" id="loginname" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<span class="error_class"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password"  value="" name="password" type="password"  />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="error_class"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                                
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input  type="submit" class="btn btn-primary btn-block btn-flat"  name="btnLogin" id="btnLogin"  value="Sign In">
            </div><!-- /.col -->
          </div>
        </form>

       
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
   <script src="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- validtor -->
	<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>js/validation/jquery.validate.min.js"></script>
  </body>
</html>
<style>
.error{
	color:red!important;
}
</style>
<script>

// Wait for the DOM to be ready
$(function() {
  $("form[name='login']").validate({
    // Specify validation rules
    rules: {
        loginname: {
			required: true,
			email: true
			
		},
        password: "required",
		
    },
    messages: {
        loginname: {
			required: "Email ID is required.",
			email: "Please enter valid Email ID."
			 
		},
        password: "Password is required",
		
    },
	errorPlacement: function(error, element) {
		element.parents(".has-feedback").find(".error_class").append(error);
	},
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script>  
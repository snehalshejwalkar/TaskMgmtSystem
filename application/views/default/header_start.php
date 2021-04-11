<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Task System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
	
	 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
	<!-- <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>bootstrap/css/font-awesome.min2.css" rel="stylesheet" type="text/css" /> -->
	
    <!-- Ionicons -->
    <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	
	    <!-- DATA TABLES -->
    <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	
    <!-- Theme style -->
    <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />


	<!-- Datepicker-->
	  <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>js/datepicker/datepicker.css" rel="stylesheet" type="text/css" />
	  <link href="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>js/datepicker/datepicker.less" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    form .error {
  color: #ff0000;
}



    </style>
	
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <a href="javascript:void(0)" class="logo"><b>Task Management</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">
			  <div style="float:left;margin-left:5px;">
			 
			  </div>
                <a href="<?php echo $this->config->item('base_url').'login/out';?>">
                  <?php echo "Hello, ".ucfirst($this->phpsession->get('userFname'));?> <span class="fa fa-sign-out"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <!--  <img src="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>dist/img/avatar5.png" class="img-circle" alt="User Image" /> -->
                    <p>
                     Owner
                      <small></small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
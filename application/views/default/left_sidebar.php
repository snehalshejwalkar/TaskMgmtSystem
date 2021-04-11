  	
   <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!--<img src="<?php echo $this->config->item('base_url');?>templates/<?php echo $this->config->item('base_template_dir');?>dist/img/avatar5.png" class="img-circle" alt="User Image" /> -->
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
           
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
			<?php  if($this->phpsession->get('userType') == '1'){?>
			  <li><a href="<?php echo base_url('Task/view');?>"><i class="fa fa-circle-o text-yellow"></i> <span>Task List</span></a></li>
			<?php }?>
			  <li><a href="<?php echo base_url('Report/view');?>"><i class="fa fa-circle-o text-yellow"></i> <span>Report</span></a></li>

        </section>
        <!-- /.sidebar -->
      </aside>
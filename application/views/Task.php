<?php
$this->load->view($this->config->item('base_template_dir')."/header_start");
$this->load->view($this->config->item('base_template_dir')."/left_sidebar");
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Task 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $this->config->item('base_url');?>Task/view/">Task</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <p align="center" id="error_msg" class="error"><?php echo $this->phpsession->get('error_msg');  $this->phpsession->clear('error_msg'); ?></p>
    <section class="content">
	<?php if($this->phpsession->get('success_msg')){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $this->phpsession->get('success_msg');$this->phpsession->clear('success_msg') ?></div>
    </div>
    <?php }elseif($this->phpsession->get('error_msg')){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $this->phpsession->get('error_msg');$this->phpsession->clear('error_msg') ?></div>
    </div>
    <?php } ?>
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form name="frmSearch" action="<?php echo $this->config->item('base_url');?>Task/view/" method="post">
            <div class="box-header">
              <h3 class="box-title"><a class="btn btn-primary" href="<?php echo $this->config->item('base_url');?>Task/taskAddmodify" role="button">New Task</a></h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="search" class="form-control pull-right" placeholder="Search" id="search" value="<?php echo ($search!="-"?$search:''); ?>">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <tr>
					<th>Task Name</th>
					<th>Employee Name</th>
					<th>Category</th>
					<th>Task Status</th>
					<th>Estimated Time( in Hrs)</th>
				    <th>Completed Time( in Hrs)</th>
					<th>Action</th>
                </tr>
                <?php
$i=0;

if($task->num_rows() > 0)
foreach ($task->result() as $info) {
$i++;

$CI =& get_instance();
$CI->load->model('Users_Model','U_Model');
$user_info = $CI->U_Model->getUserById($info->user_assign);
$category_data = $CI->U_Model->getCatById($info->category);
              
?>
                <tr>
                  <td  width="10%" ><?php echo $info->task_name; ?></td>
                  <td  width="20%"><?php echo ucwords($user_info->firstname.' '.$user_info->lastname); ?></td>
                  <td  width="15%"><?php echo $category_data->category ?></td>
                  <td  width="15%"><?php echo ucwords($info->task_status); ?></td>
                  <td  width="15%"><?php echo $info->estimated_hr;?></td>
				  <td  width="15%"><?php echo $info->completed_hr; ?></td>
                  <td  width="15%"><a href="<?php echo $this->config->item('base_url');?>Task/taskAddmodify/<?php echo $info->task_id ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
				  <a href="<?php echo $this->config->item('base_url');?>Task/deleteTask/<?php echo $info->task_id ?>" onclick="return confirm('Are you sure want to delete this task?')" "><i class="fa fa-trash"></i></a></td>
                 
                </tr>
<?php } else { ?>

          <tr>
						<td colspan="100%" align="center" bgcolor="#FFFFFF" class="error">Sorry, there is no Record found.</td>
					</tr>

<?php } ?> 

              </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              <?php if($PAGING) { ?><?php echo $PAGING;?><?php } ?>
              </ul>
            </div>

          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

 <?php
//$this->load->view($this->config->item('base_template_dir')."/footer_start");
?>


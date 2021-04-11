<?php
$this->load->view($this->config->item('base_template_dir')."/header_start");
$this->load->view($this->config->item('base_template_dir')."/left_sidebar");
?>
<style>
.ui-autocomplete {
z-index: 100;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Report 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $this->config->item('base_url');?>Report/view/">Report</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <p align="center" id="error_msg" class="error"><?php echo $this->phpsession->get('error_msg');  $this->phpsession->clear('error_msg'); ?></p>
    <section class="content">
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form name="frmSearch" action="<?php echo $this->config->item('base_url');?>Report/view/" method="post">
            <div class="box-header">
				<?php 	if($this->phpsession->get('userType') == '1'){ ?>
				<div class="form-group" style="width:15%;float:left;">  
					<select class="form-control" name="user_assign" id="user_assign">
						<option value="" >Select the User</option>
						<?php foreach( $users as $user){ ?>
						<option value="<?php  echo $user->id ?>" <?php if( $user->id ==  $user_assign ) { echo "selected"; } ?> ><?php echo ucwords($user->firstname.' '.$user->lastname);  ?></option>
						<?php  } ?> 
						
					</select>
				</div>
				<?php }?>
				<div class="form-group" style="width:15%;float:left;margin-left:5px;">
					<select class="form-control" name="category" id="category">
						<option value="" >Select Category</option>
						<?php foreach($categories as $cat){?>
                        <option value="<?php echo $cat->id;?>" <?php if( $cat->id == $category ) { echo "selected"; } ?> ><?php echo $cat->category;?></option>
						<?php }?>
					</select>
                </div>	
				
				<div class="form-group" style="width:15%;float:left;margin-left:5px;">
					
					<select class="form-control" name="task_status" id="task_status">
						<option value="" >Select Task Status</option>
						<?php foreach($task_status_arr as $task_st){?>
						<option value="<?php echo $task_st;?>" <?php if( $task_st == $task_status ) { echo "selected"; } ?> ><?php echo ucwords($task_st);?></option>
						<?php }?>
					</select>
				</div>
				<input type="text" name="time_taken" class="form-control" placeholder="Completed Time" id="time" value="<?php echo $time_taken; ?>" style="width:15%;float:left;margin-left:5px;">
			  
                  <div class="input-group-btn" style="float:left;margin-left:5px;margin-left:5px;">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					 <button type="button" onclick="window.location.href=window.location.href" class="btn btn-default" style="margin-left:5px;"><i class="fa fa-refresh"></i></button>
					
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


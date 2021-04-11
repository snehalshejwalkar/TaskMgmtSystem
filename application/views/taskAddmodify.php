<?php
$this->load->view($this->config->item('base_template_dir')."/header_start");
$this->load->view($this->config->item('base_template_dir')."/left_sidebar");

?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $edit_id > 0 ? 'Edit' : 'Add' ?> Task
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php  echo base_url('Task/view');?>"><i class="fa fa-dashboard"></i>Task</a></li>
            <li class="">&nbsp;&nbsp;</li>
          </ol>
        </section>

        <!-- Main content -->
	
		   <!-- display error / success messages -->
   <p align="center" id="error_msg" class="error"><?php echo $this->phpsession->get('error_msg');  $this->phpsession->clear('error_msg'); ?></p>
   <!-- End display error / success messages -->
		<form name="frmAdModifyTask" id="frmAdModifyTask" action="<?php echo $this->config->item('base_url').'Task/taskAddmodify/'.$edit_id?>" method="POST">
		<input type="hidden" name="hidden_edit_id" value="<?php echo $edit_id; ?>">

        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
              
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
				   
                    <div class="form-group" style="width:50%;">
                      <label for="task_name">Task Name</label>
                      <input type="text" class="form-control" id="task_name"  name="task_name" placeholder="Task Name" value="<?php echo $task_name ?>" />
                    </div>
                    
                   
                    <div class="form-group" style="width:50%;">
                        <label>Assign to User</label>
                        <select class="form-control" name="user_assign" id="user_assign">
                            <option value="" >Select User</option>
                            <?php foreach( $users as $user){ ?>
                            <option value="<?php  echo $user->id; ?>" <?php if( $user->id ==  $user_assign ) { echo "selected"; } ?> ><?php echo ucwords($user->firstname.' '.$user->lastname);  ?></option>
                            <?php  } ?> 
                            
                        </select>
                    </div>


                    <div class="form-group" style="width:50%;">
                        <label>Category Type</label>
                        <select class="form-control" name="category" id="category">
							<option value="" >Select Category</option>
							<?php foreach($categories as $cat){?>
                            <option value="<?php echo $cat->id;?>" <?php if( $cat->id == $category ) { echo "selected"; } ?> ><?php echo $cat->category;?></option>
							<?php }?>
                        </select>
                    </div>

                    <div class="form-group" style="width:50%;">
                        <label>Task Status</label>
                        <select class="form-control" name="task_status" id="task_status">
                            <option value="" >Select Task Status</option>
							<?php foreach($task_status_arr as $task_st){?>
                            <option value="<?php echo $task_st;?>" <?php if( $task_st == $task_status ) { echo "selected"; } ?> ><?php echo ucwords($task_st);?></option>
							<?php }?>
                        </select>
                    </div>

                    <div class="form-group" style="width:50%;">
                      <label for="category_name">Estimated Time(in Hrs)</label>
                      <input type="text" class="form-control" id="estimated_hr"  name="estimated_hr" placeholder="Completed Time" value="<?php echo $estimated_hr ?>" />
                    </div>
					
					<div class="form-group" style="width:50%;">
                      <label for="category_name">Completed Time(in Hrs)</label>
                      <input type="text" class="form-control" id="completed_hr"  name="completed_hr" placeholder="Completed Time" value="<?php echo $completed_hr ?>" />
                    </div>
					
					<div class="box-footer">
                  
            <input type="submit" name="Submit" value="<?php if($edit_id == '') { ?>Save <?php }else{ ?> Update<?php } ?>"  class="btn btn-primary" />
          </div>
				
					
                </form>
				
              </div><!-- /.box -->

          
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
	   
      <?php
$this->load->view($this->config->item('base_template_dir')."/footer_start");
?>

<script>

// Wait for the DOM to be ready
$(function() {
  $("form[name='frmAdModifyTask']").validate({
    // Specify validation rules
    rules: {
        task_name: {
			required: true,
			minlength: 3
		},
        user_assign: "required",
		category: "required",
		task_status: "required",
		estimated_hr: {
			required: true,
			number: true,
		},
		completed_hr: {
			required: true,
			number: true,
		},
    },
    messages: {
        task_name: {
			required: "Task Name is required.",
			minlength: "Name should be at least 3 characters."
		},
        user_assign: "Please select the User.",
		category: "Please select the Category.",
		task_status: "Please select the Task Status.",
		estimated_hr: {
			required: "Estimated Time is required",
			number: "Please enter estimated time as a numerical value",
		},
		completed_hr: {
			required: "Completed Time is required",
			number: "Please enter completed time as a numerical value",
		},
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script>  
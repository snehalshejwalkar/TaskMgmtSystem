<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url','pagination'));
        $this->load->model('Task_Model','T_Model');
        $this->load->model('Users_Model','U_Model');
		$this->load->library('message');
		if($this->phpsession->get('userType') == '2'){
			redirect('Report/view');
		}
		
	}
	/**
    * Function for Task Add/Update
    * @param $edit_id
    * @return Response
	*/
	public function taskAddmodify($edit_id=0){
		if(!$this->phpsession->get('ciAdmId')){	redirect('login');	}

		if(strlen(trim($this->input->post('Submit'))) > 0){
			if($edit_id > 0){
				//	update record
				$data = array(
                                    'task_name'             =>  $this->input->post('task_name'),
									'user_assign'			=>	$this->input->post('user_assign'),
									'category' 		        =>	$this->input->post('category'),
									'task_status' 		    =>  $this->input->post('task_status'),
									'estimated_hr'	        =>  $this->input->post('estimated_hr'),
									'completed_hr'	        =>  $this->input->post('completed_hr')
				);
				
				
				$this->T_Model->taskOperations($data,'update',$edit_id);
				$this->phpsession->save('success_msg', 'Task has been updated successfully');
				redirect('Task/view');
			}else{
				//	insert record
				$data = array(		
                                    'task_name'             =>  $this->input->post('task_name'),
									'user_assign' 			=> $this->input->post('user_assign'),
									'category'			    =>	$this->input->post('category'),
									'task_status' 		    =>	$this->input->post('task_status'),
									'estimated_hr' 		    =>  $this->input->post('estimated_hr'),
									'completed_hr'	        =>  $this->input->post('completed_hr')
				);
            	$inserted_id = $this->T_Model->taskOperations($data,'addnew');
				if($inserted_id > 0){
					$this->phpsession->save('success_msg', 'Task has been added successfully');
					redirect('Task/view');
				}
            
		}
    }
		$data = array(
                        'edit_id'			=> '',
                        'task_name'			=> '',
						'user_assign' 		=> '',
						'category' 			=> '',
                        'task_status' 		=> '',
                        'estimated_hr' 		=> '',
						'completed_hr'	    =>  ''
		);

		if($edit_id > 0){
            $record = $this->T_Model->getTaskById($edit_id);
			$data = array(
                                'edit_id'			=> $edit_id,
                                'task_name'         => $record->task_name,
								'user_assign' 		=> 	$record->user_assign,
								'category'		    =>	$record->category,
                                'task_status'		=>	$record->task_status,
                                'estimated_hr' 	    =>  $record->estimated_hr,
								'completed_hr' 	    =>  $record->completed_hr
			);
		}
		
		// set variable to show active menu 
		$data['menutab'] = 'master';
		$data['menuitem'] = 'Task';
		$data['users'] =  $this->U_Model->getUser();
		$data['categories'] =  $this->U_Model->getCategory();
		$data['task_status_arr'] = $this->config->item("task_status_arr");

		$this->load->view('taskAddmodify',$data);
	}//end taskAddmodify

	/**
    * Function for Task Listing 
    * 
    * @return Response
	*/
	function view(){
		
		if(!$this->phpsession->get('ciAdmId')){	redirect('login');	}
		$data = array('task' => '', 'PAGING' => '' , 'search' => '-');
		$this->load->helper(array('pagination'));

		$array = $this->uri->uri_to_assoc(3);
		$pages = (@$array['pages']?$array['pages']:1);
		$page = (@$array['page']?$array['page']:1);
		$data['search'] = (@$array['search']?$array['search']:'-');

		$orderb = (@$array['orderby']?@$array['orderby']:"asc");
		$fn = (@$array['fn']?@$array['fn']:"task_id");
		$orderby = $fn." ".$orderb;

		$PAGE = $page;
		$PAGE_LIMIT = 25; //$this->C_Model->countCategoryRecords($data['search'],$orderby); //25;
		$DISPLAY_PAGES = 25;
		$PAGE_LIMIT_VALUE = ($PAGE - 1) * $PAGE_LIMIT;
		// Get posted search value in variables
		$data['search'] = ($this->input->post('search')?trim(strtolower($this->input->post('search'))):$data['search']);
	
		// Count total cms records
		$total = $this->T_Model->countTaskRecords($data['search'],$orderby);
		$PAGE_TOTAL_ROWS = $total;
		$PAGE_URL = $this->config->item('base_url').'Task/view/search/'.$data['search'];
		$data['PAGING'] = pagination_assoc($PAGE_TOTAL_ROWS,$PAGE_LIMIT,$DISPLAY_PAGES,$PAGE_URL,$page,$pages);
		//	Pagination end

		// Get all cms records
        $data['task'] = $this->T_Model->getTaskRecords($PAGE_LIMIT_VALUE,$PAGE_LIMIT,$data['search'],$orderby);
		// echo "<pre>";print_r($data['task']); die;
        // echo $this->db->last_query();exit;
     
       // set variable to show active menu 
      	$data['menutab'] = 'master';
      	$data['menuitem'] = 'task';
		$this->load->view('task', $data);
	}// end view

	/**
    * Function for Delete Task
    * @param $task_id
    * @return Response
	*/
	function deleteTask($task_id){
		
		$data = array(
						'is_deleted'		=> '1',
					);	
		$this->T_Model->taskOperations($data,'update',$task_id);
		 
		$this->phpsession->save('success_msg', 'Task has been deleted successfully');
		redirect('Task/view'); 
	}
	
	
}
//end of Task controller
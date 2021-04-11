<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
    * Controller for Report View
	*/
class Report extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url','pagination'));
        $this->load->model('Task_Model','T_Model');
        $this->load->model('Users_Model','U_Model');
		
		if(!$this->phpsession->get('ciAdmId')){	redirect('login');	}
	}
	/**
    * Function for Report View
    *
    * @return Response
	*/
	function view(){
		
		if($this->phpsession->get('userType') == '2'){
			$user_assign_sess = $this->phpsession->get('ciAdmId');
		}else{
			$user_assign_sess = "";
		}
		$data = array('task' => '', 'PAGING' => '' , 'search' => '-');
		$this->load->helper(array('pagination'));
		$search_array = array();
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
		//$data['search'] = ($this->input->post('search')?trim(strtolower($this->input->post('search'))):$data['search']);
		$data['category']= $search_array['category']= $this->input->post('category')? $this->input->post('category'): "";
		$data['task_status'] = $search_array['task_status']= $this->input->post('task_status')? $this->input->post('task_status'): "";
		$data['user_assign'] = $search_array['user_assign']=$this->input->post('user_assign')? $this->input->post('user_assign'): $user_assign_sess;
		$data['time_taken'] = $search_array['time_taken']=$this->input->post('time_taken')? $this->input->post('time_taken'): "";
		
		// Count total cms records
		$total = $this->T_Model->countTaskRecords('-',$orderby,$search_array);
		$PAGE_TOTAL_ROWS = $total;
		$PAGE_URL = $this->config->item('base_url').'Task/view/search/'.$data['search'];
		$data['PAGING'] = pagination_assoc($PAGE_TOTAL_ROWS,$PAGE_LIMIT,$DISPLAY_PAGES,$PAGE_URL,$page,$pages);
		//	Pagination end

		// Get all cms records
        $data['task'] = $this->T_Model->getTaskRecords($PAGE_LIMIT_VALUE,$PAGE_LIMIT,$data['search'],$orderby,$search_array);
       // echo "<pre>";print_r($data['task']); die;
        

	
      // set variable to show active menu 
      	$data['menutab'] = 'master';
      	$data['menuitem'] = 'report';
		$data['users'] =  $this->U_Model->getUser();
		$data['categories'] =  $this->U_Model->getCategory();
		$data['task_status_arr'] = $this->config->item("task_status_arr");
		// echo "<pre>";print_r($data); die;
		$this->load->view('report', $data);
	}// end view
	
}
//end of Task controller
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Login Controller

*/
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url','pagination'));
		$this->load->model('Users_Model',"U_Model");	
	}

	/**
    * Index function of controller for Login View
    *
    * @return Response
   */
	public function index()
	{
		if(strlen(trim($this->input->post('btnLogin'))) > 0)
		{
			
			 $usersInfo = $this->U_Model->checkUserLogin($this->input->post('loginname'), md5($this->input->post('password')));
			if ($usersInfo == FALSE)
			{
               $this->msg = "<span class='error'>Incorrect login lnformation, please enter valid information.</span>";
               $this->phpsession->save('msg', $this->msg);
               redirect('login');
         	}else
			{         
				// Set admin login information in session
				$this->phpsession->save('userType', $usersInfo->type);
				$this->phpsession->save('ciAdmId', $usersInfo->id);
				$this->phpsession->save('userFname', $usersInfo->firstname);
				$this->phpsession->save('userLname', $usersInfo->lastname);
				redirect('/Task/view/');
         	}
		}	
		
		$this->load->view('login');	
	}//end function 
	
	/**
    * Logout Function
    *
	* @return Response
    */
	
	function out()
	{	
	  $this->phpsession->clear();
      redirect('login');
		
	}// end function logout	


}

/* Location: ./application/controllers/login.php */
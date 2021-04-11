<?php
class Users_Model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
    * Function for check user is logged in or not
    * @param $email, $pass
    * @return array/bool
	*/
	public function checkUserLogin($email, $pass){
		
		$this->db->select("*");
		$this->db->where("email = '$email' AND password = '$pass'");
		$query = $this->db->get('tbl_users');
		if ($query->num_rows() > 0){
			return $usersInfo = $query->row();
		}else{
			return FALSE;
		}

	}//end checkUserLogin
	

	/**
    * Function for get the user data or list
    * @param postData
    * @return array
	*/
	public function getUser($postData = array()){
		
		if(isset($postData['search'])){
			
		  // Select record
		  $this->db->where("firstname like '%".$postData['search']."%' OR lastname like '%".$postData['search']."%' ");
		  $records = $this->db->get('tbl_users')->result();
		$response = array();
		  foreach($records as $row ){
			$response[] = array("value"=>$row->id,"label"=>$row->firstname);
		  }
		  return $response;
		  
		}else{
			$this->db->where('type', 2);
			$query = $this->db->get('tbl_users');
			if ($query->num_rows() > 0){
				return $usersInfo = $query->result();
			}else{
				return FALSE;
			}
			
		}
		

	}//end checkUserLogin

	/**
    * Function for get the user by its id
    * @param $id
    * @return array
	*/

	public function getUserById($id=0){
		if($id > 0){
			$query = $this->db->get_where('tbl_users', array('id' => $id));
			$row = array();
			if($query->num_rows() > 0){
				$row = $query->row();
			}
			return $row;
		}
	}//end getTaskById
	
	
	/**
    * Function for get the category data
    * @param $postData
    * @return array
	*/
	public function getCategory($postData = array()){
		
		$query = $this->db->get('tbl_category');
		if ($query->num_rows() > 0){
			return $categories = $query->result();
		}else{
			return FALSE;
		}
		

	}//end category
	
	/**
    * Function for get the category data by its id
    * @param $id
    * @return array
	*/---------------------------------------

	public function getCatById($id=0){
		if($id > 0){
			$query = $this->db->get_where('tbl_category', array('id' => $id));
			$row = array();
			if($query->num_rows() > 0){
				$row = $query->row();
			}
			return $row;
		}
	}//end getTaskById

} //end class usermodel

?>
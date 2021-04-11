<?php
/**
    * Model For Task
    * 
	*/
class Task_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	/**
    * Function for Task Add/Update/Delete
    * @param $data,$action='',$edit_id=0
    * @return bool
	*/

	 public function taskOperations($data,$action='',$edit_id=0){
       
      switch($action) {
         case 'addnew':
               // insert new record
               if(is_array($data)) {
                  $this->db->query($this->db->insert_string("tbl_task",$data));
                  return $this->db->insert_id();
               }
               break;
         case 'update':
               // update existing record
               if(is_array($data)) {
                  $this->db->query($this->db->update_string("tbl_task",$data,array('task_id' => $edit_id)));
                  return 1;
               }
               break;
        case 'delete':
                  $array = explode(",",$data['task_id']);
		  		  $this->db->where_in('task_id',$array);
                  $this->db->delete('tbl_task'); 
                  return "Task(s) deleted successfully.";
               break;
        
      }
   }//end function taskOperations


	/**
    * Function for Count of Number of Tasks
    * @param $search = '-',$orderby='',$search_array = array()
    * @return count
	*/
	public function countTaskRecords($search = '-',$orderby='',$search_array = array())
	{
		if($search != "-")
		{
			
			$res = $this->db->select('count(task_id) as rowcount')
			->from('tbl_task')
			->like('task_status', $search)
			->where('is_deleted','0')
			->order_by($orderby)
			->get();
			
			return  $res->num_rows();
 			
		}else if(!empty($search_array)){
			
			
			if($search_array['category'] != ""){
				$this->db->where('category',$search_array['category']);
			}
			if($search_array['task_status'] != ""){
				$this->db->where('task_status',$search_array['task_status']);
			}
			if($search_array['user_assign'] != ""){
				$this->db->where('user_assign',$search_array['user_assign']);
			}
			if($search_array['time_taken'] != ""){
				$this->db->where('estimated_hr',$search_array['time_taken']);
			}
			$this->db->where('is_deleted','0');
			$this->db->order_by($orderby);
			$res = $this->db->get('tbl_task');
		
			return  $res->num_rows();
		}
		else
		{
			$res = $this->db->select('count(task_id) as rowcount')
			->from('tbl_task')
			->like('task_status', $search)
			->where('is_deleted','0')
			->order_by($orderby)
			->get();
			return  $res->num_rows();
		}

	}//end countTaskRecords

	/**
    * Function for list of tasks
    * @param $num=0, $offset=0,$search = '',$orderby='',$search_array = array()
    * @return array
	*/

	public function getTaskRecords($num=0, $offset=0,$search = '',$orderby='',$search_array = array()){
		if($offset > 0){
			if($search != "-")
			{
				return $res = $this->db->select('*')
				->from('tbl_task')
				->like('task_status', $search)
				->where('is_deleted','0')
				->limit($offset, $num)
				->get();
			}else if(!empty($search_array)){
			
			
				if($search_array['category'] != ""){
					$this->db->where('category',$search_array['category']);
				}
				if($search_array['task_status'] != ""){
					$this->db->where('task_status',$search_array['task_status']);
				}
				if($search_array['user_assign'] != ""){
					$this->db->where('user_assign',$search_array['user_assign']);
				}
				if($search_array['time_taken'] != ""){
					$this->db->where('completed_hr',$search_array['time_taken']);
				}
				
				$this->db->order_by($orderby);
				$this->db->where('is_deleted','0');
				$this->db->limit($offset, $num);
				return $res = $this->db->get('tbl_task');
				
				
			}else{
				return $res = $this->db->select('*')
				->from('tbl_task')
				->where('is_deleted','0')
				->limit($offset, $num)
				->get();
			}
		}else{
			return $res = $this->db->select('*')
			->from('tbl_task')
			->get();
		}
	}//end getTaskRecords


	/**
    * Function for get task by its id
    * @param $task_id
    * @return array
	*/

	public function getTaskById($task_id=0){
		if($task_id > 0){
			$query = $this->db->get_where('tbl_task', array('task_id' => $task_id));
			$row = array();
			if($query->num_rows() > 0){
				$row = $query->row();
			}
			return $row;
		}
	}//end getTaskById

 

}//end class Task_Model

?>

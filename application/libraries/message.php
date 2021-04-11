<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message {
	
	function setMessage($message, $message_type,$varmessage="message"){
		if(strlen(trim($message)) > 0 && strlen(trim($message_type)) > 0){
			switch($message_type){
				case 'success':
				case 'SUCCESS':
					$class = "customsuccess";
					break;
				
				case 'error':
				case 'ERROR':
					$class = "customerror";
					break;
					
				case 'warning':	
				case 'WARNING':
					$class = "customwarning";
					break;
					
				case 'question':
				case 'QUESTION':
					$class = "customquestion";
				break;
			}
			@$this->_registerMessage($message,$message_type,$varmessage);
			$_SESSION[$varmessage] = "<div class='".$class."'>".$message."</div>";
		}else{
			trigger_error("Argument Missing",E_USER_ERROR);
		}
		
	}
	
	function _registerMessage($message,$message_type,$varmessage)
	{
		$ci =& get_instance();
		$ci->load->model('Application_Message_Model','AM_Model');
		$message_id = $ci->AM_Model->checkMessageIdDb($message,$message_type);
		if(!$message_id)
		{
			$data = array(
							'message'	=>	$message,
							'module'	=>	'Not Updated',
							'type'	=>	strtolower($message_type),
							'status' =>	'active'
				);
			$inserted_id = $ci->AM_Model->applicationMessageOperations($data,'addnew',0);
			$message_id = $inserted_id;
		}
		return $message_id;
	}
	
	function getMessage($varmessage = "message"){
		if( isset( $_SESSION[$varmessage] ) && $_SESSION[$varmessage] != '' ) { 
			$x = $_SESSION[$varmessage];
			unset($_SESSION[$varmessage]);
		} else {
			$x = '';
		}
		return $x;
	}
	
	function customMessage($message, $message_type){
		if(strlen(trim($message)) > 0 && strlen(trim($message_type)) > 0){
			switch($message_type){
				case 'success':
				case 'SUCCESS':
					$class = "customsuccess";
					break;
				
				case 'error':
				case 'ERROR':
					$class = "customerror";
					break;
					
				case 'warning':	
				case 'WARNING':
					$class = "customwarning";
					break;
					
				case 'question':
				case 'QUESTION':
					$class = "customquestion";
				break;
			}
			return "<div class='".$class."'>".$message."</div>";
		}else{
			trigger_error("Argument Missing",E_USER_ERROR);
		}
	}
}

?>

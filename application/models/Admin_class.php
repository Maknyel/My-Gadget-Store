<?php

class Admin_class extends CI_Model
{
	public function login_submit($data){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'=>$data['username'],'password'=>$data['password'],'status'=>'active','branch_id'=>'0'));
		$query = $this->db->get()->result_array();
		$query = current($query);
		if($query){
			return $query['user_id'];
		}else{
			return 0;
		}
	}
	

}

?>








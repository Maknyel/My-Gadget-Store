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
	
	public function update_pending_image($post){
		$arrayName = array(
			'item_name' 					=> $post['item_name'],
			'item_description' 				=> $post['item_description'],
			'item_price' 					=> $post['item_price'],
			'min_downpayment' 				=> ($post['item_price'] * .20),
			'image_name'					=> $post['image_name'],
			'is_verified'					=> '2',
					
		);
		$this->db->where('pending_item_id', $post['pending_item_id']);
		$result = $this->db->update('pending_item', $arrayName);

		if($result){
			return 1;
		}else{
			return 0;
		}
	}

}

?>








<?php

class Main_model extends CI_Model
{
	
	public function apply_for_item_computation($apply_for_item_id){
		$this->db->select('*');
		$this->db->from('apply_for_item_computation');
		$this->db->where(array('apply_for_item_id'=>$apply_for_item_id));
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function login_submit($data){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'=>$data['username'],'password'=>$data['password'],'status'=>'active','branch_id'=>'5'));
		$query = $this->db->get()->result_array();
		$query = current($query);
		if($query){
			return $query['user_id'];
		}else{
			return 0;
		}
	}

	public function register_submit($post){
		

		if(user_username_count($post['username']) == 0){
			$arrayName = array(
				'username' 			=> $post['username'],
				'password'			=> $post['password'],
				'name'				=> $post['name'],
				'branch_id'			=> '5',
				'status'			=> 'active',
			);
			$result = $this->db->insert('user', $arrayName);
			$id = $this->db->insert_id();

			$user_dir_resume    = './User';
	        if(!file_exists($user_dir_resume)){
	            mkdir( $user_dir_resume, 0755 );
	        }

	        $user_dir_resume    = './User/'.$id;
	        if(!file_exists($user_dir_resume)){
	            mkdir( $user_dir_resume, 0755 );
	        }

			foreach (get_user_data_image($post['token_id']) as $key => $value) {
				copy('./User/'.$post['token_id'].'/'.$value['image_name'], './User/'.$id.'/'.$value['image_name']);	
				unlink('./User/'.$post['token_id'].'/'.$value['image_name']);
			}
			
			
			$arrayName = array(
				'user_id'					=> $id,
				'token_id'					=> $post['token_id'],			
			);

			$this->db->where('token_id', $post['token_id']);
			$result = $this->db->update('customer_image', $arrayName);
			if($result){
				$arrayName = array(
					'email' 				=> $post['email'],
					'birthdate' 			=> $post['birthdate'],
					'contact' 				=> $post['contact'],
					'address' 				=> $post['address'],
					'house_status' 			=> $post['house_status'],
					'years' 				=> $post['years'],
					'rent' 				    => $post['rent'],
					'emp_name' 				=> $post['emp_name'],
					'emp_no' 				=> $post['emp_no'],
					'emp_address' 			=> $post['emp_address'],
					'emp_year' 				=> $post['emp_year'],
					'occupation' 			=> $post['occupation'],
					'salary' 				=> $post['salary'],
					'spouse' 				=> $post['spouse'],
					'spouse_no' 			=> $post['spouse_no'],
					'spouse_emp' 			=> $post['spouse_emp'],
					'spouse_details' 		=> $post['spouse_details'],
					'spouse_income' 		=> $post['spouse_income'],
					'comaker' 				=> $post['comaker'],
					'comaker_details' 		=> $post['comaker_details'],
					'user_id'				=> $id,
				);
				$result = $this->db->insert('user_addtional_info', $arrayName);
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}
	}

	public function add_myadditionalinfo($post){
			$result = $this->db->insert('user_addtional_info', $post);
			if($result){
				return 1;
			}else{
				return 0;
			}
		
	}

	public function add_pending($post){
		$data = array(
			'message'					=> $post['message'],
			'user_id'					=> client_session_val(),
			'date_added' 				=> current_ph_date_time(),
			);
			$result = $this->db->insert('pending_item', $data);
			if($result){
				return 1;
			}else{
				return 0;
			}
		
	}

	public function apply_form($post){
		if($post['message'] != ''){
			$arrayName = array(
			'is_verified'					=> '1',
					
		);
		$this->db->where('pending_item_id', $post['pending_item_id']);
		$result = $this->db->update('pending_item', $arrayName);

			$arrayName = array(
				'product_id' 		=> $post['product_id'],
				'downpayment' 		=> $post['downpayment'],
				'total_payment' 	=> $post['total_payment'],
				'per_month_bill' 	=> $post['per_month_bill'],
				'total_months'		=> $post['total_months'],
				'message'			=> $post['message'],
				'is_approved'		=> '0',
				'date_added'		=> current_ph_date_time(),
				'user_id'			=> client_session_val(),
				'proof_image'		=> $post['proof_image']
			);
			$result = $this->db->insert('apply_for_item', $arrayName);
			$id = $this->db->insert_id();
			if($result){
				for($i = 1; $i<=$post['total_months'];$i++){
					$arrayName = array(
						'apply_for_item_id' 			=> $id,
						'computation' 					=> $post['per_month_bill'],
						'total_months' 					=> $post['total_months'],
						'datetime_expected_to_pay'		=> date_plus_month($i),
						'is_payed'						=> '0',
						'user_id'						=> client_session_val(),
					);
					$result = $this->db->insert('apply_for_item_computation', $arrayName);
				}
				return 1;
			}else{
				return 0;
			}
		}else{

		}
		
	}

	public function bill_form($post){
		// if($post['downpayment'] == $post['computation']){
			$arrayName = array(
						'proof_image' 					=> $post['image'],
						'amount_payed' 					=> $post['downpayment'],
						'datetime_pay'					=> current_ph_date_time(),
						'is_payed'						=> '2',
						
					);
			$this->db->where('apply_for_item_computation', $post['apply_for_item_computation']);
			$result = $this->db->update('apply_for_item_computation', $arrayName);

			if($result){
				if(apply_count_id($post['apply_for_item_id']) == 0){
					$arrayName = array(
						'is_ok'							=> '1',
					
					);				
					$this->db->where('apply_for_item_id', $post['apply_for_item_id']);
					$result = $this->db->update('apply_for_item', $arrayName);
				}
				return 1;
			}else{
				return 0;
			}
		// }else{
		// 		$arrayName = array(
		// 			'proof_image' 					=> $post['image'],
		// 			'amount_payed' 					=> $post['downpayment'],
		// 			'datetime_pay'					=> current_ph_date_time(),
		// 			'is_payed'						=> '2',
					
		// 		);				
		// 		$this->db->where('apply_for_item_computation', $post['apply_for_item_computation']);
		// 		$result = $this->db->update('apply_for_item_computation', $arrayName);

		// 	if($result){
		// 		if(apply_count_id($post['apply_for_item_id']) > 0){
		// 			foreach (apply_count_id_foreach($post['apply_for_item_id']) as $key => $value) {
		// 				$total_apply = apply_count_id($post['apply_for_item_id']);
		// 				$subtract = $post['downpayment'] - $post['computation'];
		// 				$subcompute = $subtract/$total_apply;
		// 				$arrayName2 = array(
		// 					'computation' 					=> $value['computation']-$subcompute,
		// 				);				
		// 				$this->db->where('apply_for_item_computation', $value['apply_for_item_computation']);
		// 				$result = $this->db->update('apply_for_item_computation', $arrayName2);						
		// 			}
		// 		}
		// 		if(apply_count_id($post['apply_for_item_id']) == 0){
		// 			$arrayName = array(
		// 				'is_ok'							=> '1',
					
		// 			);				
		// 			$this->db->where('apply_for_item_id', $post['apply_for_item_id']);
		// 			$result = $this->db->update('apply_for_item', $arrayName);
		// 		}
		// 		return 1;
		// 	}else{
		// 		return 0;
		// 	}
		// }
		
	}



	public function delete_image_data($post){
			$this->db->where('image_id', $post);
			$result = $this->db->delete('customer_image');
			if($result){
				return 1;
			}else{
				return 0;
			}
		
	}

	public function update_myadditionalinfo($post){
			$this->db->where('user_id', client_session_val());
			$result = $this->db->update('user_addtional_info', $post);
			if($result){
				return 1;
			}else{
				return 0;
			}
	}

	public function change_profile($post){
		if(user_username_count_update($post['username']) == 0){
			$arrayName = array(
				'username' 			=> $post['username'],
				'name'				=> $post['name'],
			);
			$this->db->where('user_id', client_session_val());
			$result = $this->db->update('user', $arrayName);
			if($result){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}
	}

	public function change_profile_password($post){
			$arrayName = array(
				'password' 			=> $post['password'],
			);
			$this->db->where('user_id', client_session_val());
			$result = $this->db->update('user', $arrayName);
			if($result){
				return 1;
			}else{
				return 0;
			}
	}

	public function insert_image($data = array()){ 
        $insert = $this->db->insert('customer_image', $data); 
        return $insert?true:false; 
    }
}

?>








<?php
if(!function_exists('global_page_function')){
	function global_page_function() {
		return 'My Gadget Store';
	}
}

if(!function_exists('computefor_house')){
	function computefor_house($total,$downpayment,$months) {
		$todivide = $total - $downpayment;
		$interest = $todivide + ($todivide * .13);
		$toreturn = $interest/$months;
		return $toreturn; 
	}
}

if (!function_exists('admin_session_redirection')) {
	function admin_session_redirection(){
		$CI =& get_instance();
		if(!$CI->session->userdata('admin')){
			redirect(base_url().'admin/login', 'location');
		}
	}
}


if (!function_exists('re_admin_session_redirection')) {
	function re_admin_session_redirection(){
		$CI =& get_instance();
		if($CI->session->userdata('admin')){
			redirect(base_url().'admin', 'location');
		}
	}
}

if (!function_exists('admin_session_val')) {
	function admin_session_val(){
		$CI =& get_instance();
		return $CI->session->userdata('admin');
	}
}

if (!function_exists('client_session_val')) {
	function client_session_val(){
		$CI =& get_instance();
		return $CI->session->userdata('user');
	}
}

if(!function_exists('get_user_data')){
	function get_user_data($field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('user');
		$CI->db->where('user_id', client_session_val());
		$query = $CI->db->get()->result_array();
		$query = current($query);

		return ($query[$field]);

	}
}

if(!function_exists('get_brand_entity')){
	function get_brand_entity($field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('product');
		$CI->db->where('prod_name', $field['brand']);
		$query = $CI->db->get()->result_array();
		$query = current($query);

		return ($query);

	}
}


if(!function_exists('get_user_pending_item')){
	function get_user_pending_item(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('pending_item');
		$CI->db->where('user_id', client_session_val());
		$CI->db->where('is_verified<>', '1');
		$result = $CI->db->get();
		return $result->num_rows();

	}
}

if(!function_exists('get_user_data_image')){
	function get_user_data_image($token_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('customer_image');
		$CI->db->where('token_id', $token_id);
		$query = $CI->db->get()->result_array();
		
		return ($query);

	}
}

if(!function_exists('get_user_data_image_comaker')){
	function get_user_data_image_comaker($token_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('comaker_customer_image');
		$CI->db->where('token_id', $token_id);
		$query = $CI->db->get()->result_array();
		
		return ($query);

	}
}


if(!function_exists('get_user_data_admin')){
	function get_user_data_admin($user_id,$field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('user');
		$CI->db->where('user_id', $user_id);
		$query = $CI->db->get()->result_array();
		$query = current($query);

		return ($query[$field]);

	}
}

if (!function_exists('re_user_session_redirection')) {
	function re_user_session_redirection(){
		$CI =& get_instance();
		if($CI->session->userdata('user')){
			redirect(base_url().'', 'location');
		}
	}
}

if (!function_exists('user_session_redirection')) {
	function user_session_redirection(){
		$CI =& get_instance();
		if(!$CI->session->userdata('user')){
			redirect(base_url().'login', 'location');
		}
	}
}

if(!function_exists('get_admin_data')){
	function get_admin_data($field){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('user');
		$CI->db->where('user_id', admin_session_val());
		$query = $CI->db->get()->result_array();
		$query = current($query);

		return ($query[$field]);

	}
}

if(!function_exists('get_product_id')){
	function get_product_id($prod_id){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('product');
		$CI->db->where('prod_id', $prod_id);
		$query = $CI->db->get()->result_array();
		$query = current($query);
		return ($query);

	}
}

if(!function_exists('get_history_data')){
	function get_history_data(){
		$CI =& get_instance();
		$CI->db->select('history_log.*,user.*');
		$CI->db->from('history_log');
		$CI->db->join('user', 'history_log.user_id = user.user_id', 'inner');
		$query = $CI->db->get()->result_array();
	
		return ($query);

	}
}

if(!function_exists('get_all_user_data')){
	function get_all_user_data($type=null){
		$CI =& get_instance();
		$CI->db->select('user.*,branch.*,user_addtional_info.is_verified');
		$CI->db->from('user');
		$CI->db->join('branch', 'user.branch_id = branch.branch_id', 'inner');
		$CI->db->join('user_addtional_info', 'user.user_id = user_addtional_info.user_id', 'left');
		// $CI->db->where('branch_id','5');
		if($type){
			if($type=='1'){
				$CI->db->where('user_addtional_info.is_verified',$type);
			}else{
				$CI->db->where('user_addtional_info.is_verified',0);
			}
			
		}
		$query = $CI->db->get()->result_array();
	
		return ($query);

	}
}

if(!function_exists('customer_table_select')){
	function customer_table_select($branch_id,$credit_status) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("customer");
		$CI->db->where('branch_id',$branch_id);
		$CI->db->where('credit_status',$credit_status);
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_product')){
	function get_all_product() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("product");
		$CI->db->order_by('prod_id','ASC');
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_product_ordered')){
	function get_all_product_ordered($is_ok) {
		$CI =& get_instance();
		$CI->db->select("apply_for_item.*,pending_item.*");
		$CI->db->from("apply_for_item");
		$CI->db->join('pending_item', 'apply_for_item.product_id = pending_item.pending_item_id', 'inner');
		$CI->db->where('apply_for_item.is_ok',$is_ok);
		$CI->db->where('apply_for_item.user_id',client_session_val());
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('global_icon')){
	function global_icon() {
		return base_url().'assets/icon.png';
	}
}

if(!function_exists('practice')){
	function practice() {
		$arrayName = array(
			'SSS','UMID','PRC','Driver&apos;s license','Passport','TIN ID'
		);

		return $arrayName;

	}
}


if(!function_exists('practice1')){
	function practice1() {
		$arrayName = array(
			'Bank account statement','Company ID','PAGIBIG/HDMF ID','Remittance Slip','Brgy. Certificate/Clearance','Electric bill','PhilHealth ID','Salary Slip','Certificate of Employment','Mobile phone bill','Phone bill','NBI Clearance','Water bill','Postal ID'
		);

		return $arrayName;

	}
}

if(!function_exists('category_brand')){
	function category_brand() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("list_of_category");
		$query = $CI->db->get()->result_array();
		return $query;

	}
}

if(!function_exists('get_all_product_ordered_admin')){
	function get_all_product_ordered_admin($is_verified) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("pending_item");
		$CI->db->where('user_id',client_session_val());
		$CI->db->where('is_verified',$is_verified);
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_user_additional_info_field')){
	function get_user_additional_info_field($user_id,$field) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("user_addtional_info");
		$CI->db->where("user_id",$user_id);
		$query = $CI->db->get()->result_array();
		$val = current($query);
		return ($val[$field]);
	}
}

if(!function_exists('get_pending_item_val')){
	function get_pending_item_val($pending_item_id,$field) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("pending_item");
		$CI->db->where("pending_item_id",$pending_item_id);
		$query = $CI->db->get()->result_array();
		$val = current($query);
		return ($val[$field]);
	}
}

if(!function_exists('get_user_additional_info_field_count')){
	function get_user_additional_info_field_count($user_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("user_addtional_info");
		$CI->db->where("user_id",$user_id);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('get_token_id_function')){
	function get_token_id_function($token_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("customer_image");
		$CI->db->where('token_id',$token_id);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('get_token_id_function_comaker')){
	function get_token_id_function_comaker($token_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("comaker_customer_image");
		$CI->db->where('token_id',$token_id);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('count_dashboard_all')){
	function count_dashboard_all($type) {
		$CI =& get_instance();
		switch ($type) {
			case 'customer':
				$CI->db->select("*");
				$CI->db->from("user");
				$CI->db->where("branch_id",'5');
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'applicant':
				$CI->db->select("apply_for_item.*,pending_item.*,user.*,user_addtional_info.*");
				$CI->db->from("apply_for_item");
				$CI->db->join('pending_item', 'apply_for_item.product_id = pending_item.pending_item_id', 'inner');
				$CI->db->join('user', 'apply_for_item.user_id = user.user_id', 'inner');
				$CI->db->join('user_addtional_info', 'apply_for_item.user_id = user_addtional_info.user_id', 'left');
				$CI->db->where('apply_for_item.is_approved','0');
				$query = $CI->db->get();
				return $query->num_rows();
			break;

			case 'verified':
				$CI->db->select("*");
				$CI->db->from("user");
				$CI->db->join('user_addtional_info', 'user.user_id = user_addtional_info.user_id', 'inner');
				$CI->db->where("user_addtional_info.is_verified",'1');
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'pending':
				$CI->db->select("*");
				$CI->db->from("user");
				$CI->db->join('user_addtional_info', 'user.user_id = user_addtional_info.user_id', 'inner');
				$CI->db->where("user_addtional_info.is_verified",'0');
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'product':
				$CI->db->select("*");
				$CI->db->from("product");
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'pending_product':
				$CI->db->select("*");
				$CI->db->from("pending_item");
				$CI->db->where('is_verified','0');
				$result = $CI->db->get();
				return $result->num_rows();
			break;

			case 'pending_product_payment':
				$CI =& get_instance();
				$CI->db->select("*");
				$CI->db->from("apply_for_item_computation");
				// $CI->db->where("apply_for_item_id",$apply_for_item_id);
				$CI->db->where("is_payed",'2');
				$result = $CI->db->get();
				return $result->num_rows();
			break;
			
			default:
			break;
		}
		
		
	}
}

function _list_registered_users($year,$month)
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('apply_for_item');

			$CI->db->where(array('YEAR(date_added)' => $year,'MONTH(date_added)'=> $month));
		
		$query = $CI->db->get();
		return $query->num_rows();
		
	}


if(!function_exists('get_all_application')){
	function get_all_application() {
		$CI =& get_instance();
		$CI->db->select("apply_for_item.*,pending_item.*,user.*,user_addtional_info.*");
		$CI->db->from("apply_for_item");
		$CI->db->join('pending_item', 'apply_for_item.product_id = pending_item.pending_item_id', 'inner');
		$CI->db->join('user', 'apply_for_item.user_id = user.user_id', 'inner');
		$CI->db->join('user_addtional_info', 'apply_for_item.user_id = user_addtional_info.user_id', 'left');
		
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_application_own')){
	function get_all_application_own($id) {
		$CI =& get_instance();
		$CI->db->select("apply_for_item.*,pending_item.*,user.*,user_addtional_info.*");
		$CI->db->from("apply_for_item");
		$CI->db->join('pending_item', 'apply_for_item.product_id = pending_item.pending_item_id', 'inner');
		$CI->db->join('user', 'apply_for_item.user_id = user.user_id', 'inner');
		$CI->db->join('user_addtional_info', 'apply_for_item.user_id = user_addtional_info.user_id', 'left');
		$CI->db->where('user.user_id',$id);
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_application_v2')){
	function get_all_application_v2() {
		$CI =& get_instance();
		$CI->db->select("pending_item.*,user.*");
		$CI->db->from("pending_item");
		$CI->db->join('user', 'pending_item.user_id = user.user_id', 'inner');
		$CI->db->join('user_addtional_info', 'pending_item.user_id = user_addtional_info.user_id', 'inner');
		$CI->db->where('pending_item.is_verified<>','1');
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('manage_id_bill')){
	function manage_id_bill($id) {
		$CI =& get_instance();
		$CI->db->select("apply_for_item.*,pending_item.*");
		$CI->db->from("apply_for_item");
		$CI->db->join('pending_item', 'apply_for_item.product_id = pending_item.pending_item_id', 'inner');
		$CI->db->where('apply_for_item.apply_for_item_id',$id);
		$query = $CI->db->get()->result_array();
		return current($query);
	}
}



if(!function_exists('manage_id_bill_admin')){
	function manage_id_bill_admin($id) {
		$CI =& get_instance();
		$CI->db->select("apply_for_item.*,pending_item.*");
		$CI->db->from("apply_for_item");
		$CI->db->join('pending_item', 'apply_for_item.product_id = pending_item.pending_item_id', 'inner');
		$CI->db->where('apply_for_item.apply_for_item_id',$id);
		$query = $CI->db->get()->result_array();
		return current($query);
	}
}

if(!function_exists('get_all_my_ids')){
	function get_all_my_ids() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("customer_image");
		$CI->db->where('user_id',client_session_val());
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_my_ids_comaker')){
	function get_all_my_ids_comaker() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("comaker_customer_image");
		$CI->db->where('user_id',client_session_val());
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_my_ids_admin')){
	function get_all_my_ids_admin($user_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("customer_image");
		$CI->db->where('user_id',$user_id);
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('get_all_my_ids_admin_comaker')){
	function get_all_my_ids_admin_comaker($user_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("comaker_customer_image");
		$CI->db->where('user_id',$user_id);
		$query = $CI->db->get()->result_array();
		return $query;
	}
}


if(!function_exists('get_all_additional_info_field')){
	function get_all_additional_info_field($field) {
		$CI =& get_instance();
		if(user_info_count() == 0){
			return '';
		}
		$CI->db->select("*");
		$CI->db->from("user_addtional_info");
		$CI->db->where("user_id",client_session_val());
		$query = $CI->db->get()->result_array();
		$val = current($query);
		return ($val[$field]);
	}
}


if(!function_exists('get_all_additional_info_field_view')){
	function get_all_additional_info_field_view($user_id,$field) {
		$CI =& get_instance();
		if(user_info_count2($user_id) == 0){
			return '';
		}
		$CI->db->select("*");
		$CI->db->from("user_addtional_info");
		$CI->db->where("user_id",$user_id);
		$query = $CI->db->get()->result_array();
		$val = current($query);
		return ($val[$field]);
	}
}



if(!function_exists('get_all_branch')){
	function get_all_branch() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("branch");

		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('insert_notif')){
	function insert_notif($message,$date_confirm,$user_id) {
		$CI =& get_instance();
			$data = array(
				'message' 		=> $message,
				'date_added' 	=> current_ph_date_time(),
				'date_confirm' 	=> $date_confirm,
				'user_id' 		=> $user_id,
			);
			$result = $CI->db->insert('notification', $data);
			if($result){
				return 1;
			}else{
				return 0;
			}
		
	}
}

if(!function_exists('table_cruds')){
	function table_cruds($post) {
		$CI =& get_instance();
		switch ($post['method']) {
			case 'add':
				$result = $CI->db->insert('official_scope', $post);
				if($result){
					return 1;
				}else{
					return 0;
				}
			break;

			case 'edit':
				$CI->db->where('official_scope_id', $post['official_scope_id']);
				$query = $CI->db->update('official_scope', $data);
				if($query){
					return 1;
				}else{
					return 0;
				}
			
			break;

			case 'delete':
				$CI->db->where('official_scope_id', $post['official_scope_id']);
				$query = $CI->db->delete('official_scope');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;

			case 'get_all':
				$CI->db->select("*");
				$CI->db->from("official_scope");
				$query = $CI->db->get()->result_array();
				return $query;
		
			break;

			case 'get_all_num':
				$CI->db->select("*");
				$CI->db->from("official_scope");
				$result = $CI->db->get();
				return $result->num_rows();
			
			break;

			case 'get_by_id':
				$CI->db->select("*");
				$CI->db->from("official_scope");
				$CI->db->where('official_scope_id', $post['official_scope_id']);
				$query = $CI->db->get()->result_array();
				return current($query);
			
			break;
			
			default:
			break;
		}

	}
}

if(!function_exists('user_username_count')){
	function user_username_count($username) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("user");
		$CI->db->where("username",$username);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}



if(!function_exists('count_apply_for_item_computation')){
	function count_apply_for_item_computation($apply_for_item_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("apply_for_item_computation");
		$CI->db->where("apply_for_item_id",$apply_for_item_id);
		$CI->db->where("is_payed",'2');
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('apply_count')){
	function apply_count() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("apply_for_item_computation");
		$CI->db->where("user_id",client_session_val());
		$CI->db->where("is_payed",'0');
		$result = $CI->db->get();
		return $result->num_rows();
	}
}


if(!function_exists('apply_count_id')){
	function apply_count_id($apply_for_item_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("apply_for_item_computation");
		$CI->db->where("apply_for_item_id",$apply_for_item_id);
		$CI->db->where("is_payed",'0');
		$result = $CI->db->get();
		return $result->num_rows();
	}
}


if(!function_exists('apply_count_id_user_id')){
	function apply_count_id_user_id($user_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("apply_for_item_computation");
		$CI->db->where("user_id",$user_id);
		$CI->db->where("is_payed<>",'1');
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('apply_count_id_foreach')){
	function apply_count_id_foreach($apply_for_item_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("apply_for_item_computation");
		$CI->db->where("apply_for_item_id",$apply_for_item_id);
		$CI->db->where("is_payed",'0');
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('apply_count_id_foreach1')){
	function apply_count_id_foreach1($apply_for_item_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("apply_for_item_computation");
		$CI->db->where("apply_for_item_id",$apply_for_item_id);
		$CI->db->where("is_payed<>",'1');
		$query = $CI->db->get()->result_array();
		return $query;
	}
}

if(!function_exists('apply_count_id_foreach_loop')){
	function apply_count_id_foreach_loop($apply_for_item_id) {
		$CI =& get_instance();
		$val = 0;
		foreach (apply_count_id_foreach1($apply_for_item_id) as $key => $value) {
			$val = $value['computation'] + $val;
		}
		return $val;
	}
}


if(!function_exists('user_info_count')){
	function user_info_count() {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("user_addtional_info");
		$CI->db->where("user_id",client_session_val());
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('user_info_count2')){
	function user_info_count2($user_id) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("user_addtional_info");
		$CI->db->where("user_id",$user_id);
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('user_username_count_update')){
	function user_username_count_update($username) {
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from("user");
		$CI->db->where("username",$username);
		$CI->db->where("user_id<>",client_session_val());
		$result = $CI->db->get();
		return $result->num_rows();
	}
}

if(!function_exists('update_date_data_apply')){
	function update_date_data_apply($apply_for_item_id) {
		$CI =& get_instance();
		$arrayName = array(
					'is_approved' 	=> '1',
					'date_approved' => current_ph_date_time(),
				);
				$CI->db->where('apply_for_item_id', $apply_for_item_id);
				$query = $CI->db->update('apply_for_item', $arrayName);
				if($query){
					return 1;
				}else{
					return 0;
				}
	}
}


if(!function_exists('update_user_id')){
	function update_user_id($user_id) {
		$CI =& get_instance();
		$arrayName = array(
					'is_verified' 	=> '1',
				);
				$CI->db->where('user_id', $user_id);
				$query = $CI->db->update('user_addtional_info', $arrayName);
				if($query){
					return 1;
				}else{
					return 0;
				}
	}
}


if(!function_exists('product_function')){
	function product_function($post) {
		$CI =& get_instance();
		switch ($post['method']) {
			case 'add':
				$arrayName = array(
					'prod_category'	=> json_encode($post['prod_category']),
					'branch_id' => $post['branch_id'],
					'prod_desc' => $post['prod_desc'],
					'prod_name' => $post['prod_name'],
					'prod_price' => $post['prod_price'],
					'serial' => $post['serial'],
					'image' => $post['image'],
				);
				$result = $CI->db->insert('product', $arrayName);
				if($result){
					return 1;
				}else{
					return 0;
				}
			break;

			case 'edit':
				$arrayName = array(
					'prod_category'	=> json_encode($post['prod_category']),
					'branch_id' => $post['branch_id'],
					// 'prod_desc' => $post['prod_desc'],
					'prod_name' => $post['prod_name'],
					'prod_price' => $post['prod_price'],
					'serial' => $post['serial'],
				);
				$CI->db->where('prod_id', $post['prod_id']);
				$query = $CI->db->update('product', $arrayName);
				if($query){
					return 1;
				}else{
					return 0;
				}
			
			break;

			case 'delete':
				$CI->db->where('prod_id', $post['prod_id']);
				$query = $CI->db->delete('product');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;

			case 'get_all':
				$CI->db->select("*");
				$CI->db->from("product");
				$query = $CI->db->get()->result_array();
				return $query;
		
			break;

			case 'get_all_num':
				$CI->db->select("*");
				$CI->db->from("product");
				$result = $CI->db->get();
				return $result->num_rows();
			
			break;

			case 'get_by_id':
				$CI->db->select("*");
				$CI->db->from("product");
				$CI->db->where('prod_id', $post['prod_id']);
				$query = $CI->db->get()->result_array();
				return current($query);
			
			break;
			
			default:
			break;
		}

	}
}

if(!function_exists('confirm_bill')){
	function confirm_bill($post) {
		$CI =& get_instance();
		$countloop = apply_count_id_foreach_loop($post['apply_for_item_id']);
		$arrayName = array('is_payed'=>'1');
		$CI->db->where('apply_for_item_computation', $post['apply_for_item_computation']);
		$query = $CI->db->update('apply_for_item_computation', $arrayName);
		if($query){
			$CI->db->select("*");
				$CI->db->from("apply_for_item_computation");
				$CI->db->where('apply_for_item_computation', $post['apply_for_item_computation']);
				$query100 = $CI->db->get()->result_array();
				$beforedata = current($query100);
			
			if($beforedata['datetime_expected_to_pay'] > $beforedata['datetime_pay']){
				$computation = $beforedata['computation'];
			}else{
				$computation = $beforedata['computation'] + 100;
			}
			if($beforedata['amount_payed'] == $computation){
				
			}else{
					
					if(apply_count_id($beforedata['apply_for_item_id']) > 0){
						foreach (apply_count_id_foreach($beforedata['apply_for_item_id']) as $key => $value) {
								if($countloop <= $beforedata['amount_payed']){
									$arrayName2 = array(
										'computation' 					=> '0',
										'is_payed'						=> '1',
									);				
									$CI->db->where('apply_for_item_computation', $value['apply_for_item_computation']);
									$result = $CI->db->update('apply_for_item_computation', $arrayName2);

									$arrayName2 = array(
										'is_ok'							=> '1',
									);				
									$CI->db->where('apply_for_item_id', $beforedata['apply_for_item_id']);
									$result = $CI->db->update('apply_for_item', $arrayName2);


								}else{
									$total_apply = apply_count_id($beforedata['apply_for_item_id']);
									$subtract = $beforedata['amount_payed'] - $computation;
									$subcompute = $subtract/$total_apply;
									$arrayName2 = array(
										'computation' 					=> $value['computation']-$subcompute,
									);				
									$CI->db->where('apply_for_item_computation', $value['apply_for_item_computation']);
									$result = $CI->db->update('apply_for_item_computation', $arrayName2);
									}
														

						}
					}
					return 1;
				
			}
			return 1;
		}else{
			return 0;
		}
	}
}

if(!function_exists('user_function')){
	function user_function($post) {
		$CI =& get_instance();
		switch ($post['method']) {
			case 'add':
				$arrayName = array(
					'username' 				=> $post['username'],
					'password' 				=> $post['password'],
					'name' 					=> $post['name'],
					'status' 				=> $post['status'],
					'branch_id' 			=> $post['branch_id'],
					'iden'					=> '0',
				);
				$result = $CI->db->insert('user', $arrayName);
				if($result){
					return 1;
				}else{
					return 0;
				}
			break;

			case 'edit':
				$arrayName = array(
					'username' => $post['username'],
					'password' => $post['password'],
					'name' => $post['name'],
					'status' => $post['status'],
					'branch_id' => $post['branch_id'],
					'iden'		=> '0',
				);
				$CI->db->where('user_id', $post['user_id']);
				$query = $CI->db->update('user', $arrayName);
				if($query){
					return 1;
				}else{
					return 0;
				}
			
			break;

			case 'delete':
				$CI->db->where('user_id', $post['user_id']);
				$query = $CI->db->delete('user');
				if($query){
					return 1;
				}else{
					return 0;
				}
			break;

			case 'get_all':
				$CI->db->select("*");
				$CI->db->from("user");
				$query = $CI->db->get()->result_array();
				return $query;
		
			break;

			case 'get_all_num':
				$CI->db->select("*");
				$CI->db->from("user");
				$result = $CI->db->get();
				return $result->num_rows();
			
			break;

			case 'get_by_id':
				$CI->db->select("*");
				$CI->db->from("user");
				$CI->db->where('user_id', $post['user_id']);
				$query = $CI->db->get()->result_array();
				return current($query);
			
			break;
			
			default:
			break;
		}

	}
}


if(!function_exists('current_ph_date_time')){
	function current_ph_date_time(){
		date_default_timezone_set("Asia/Manila");
				return date("Y-m-d H:i:s");
	}
}

if(!function_exists('current_ph_date')){
	function current_ph_date(){
		date_default_timezone_set("Asia/Manila");
				return date("Y-m-d");
	}
}

if(!function_exists('date_plus_month')){
	function date_plus_month($months){
		$data = strtotime(date("Y-m-d", strtotime(current_ph_date())) . "+".$months." month");
		return date('Y-m-d', $data);
	}
}


if(!function_exists('sendMail')){
	function sendMail($data){

		$CI =& get_instance();
		$message = $CI->load->view('admin/email',$data,true);

		$config = array(
			// 'useragent' 	=> 'osau.com',
			'protocol' 		=> 'smtp',
			'smtp_host' 	=> 'smtp.hostinger.ph',
			'smtp_port' 	=> 587,
			'smtp_user' 	=> 'marcniel@cvsu-b-website.online',
			'smtp_pass' 	=> 'P@s$w0rd123!',
			'mailtype'  	=> 'html',
			'wordwrap'  	=> TRUE,
			'charset'   	=> 'utf-8',
// 			'auth' 			=> TRUE
		);

		$CI->email->set_newline("\r\n");
		$CI->email->initialize($config);
		$CI->email->from($data['email'], global_page_function());
		$CI->email->to( $data['email_to'] );

		$CI->email->subject($data['subject']);
		$CI->email->message( $message );
		$CI->email->send();
		return 1;
	}
}




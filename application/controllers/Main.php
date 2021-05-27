<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	//functions
	public function index(){
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Dashboard',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("index",$data);
		$this->load->view("global/footer",$data);
	}

	public function manage(){
		user_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Manage',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("manage",$data);
		$this->load->view("global/footer",$data);
	}

	public function manage_bill($id){
		user_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Manage Bill',
			'is_datatables'		=> TRUE, 
			'manage' 			=> manage_id_bill($id),
			'id'				=> $id,
			'get_data'			=> $this->Main_model->apply_for_item_computation($id),
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("manage_bill",$data);
		$this->load->view("global/footer",$data);
	}

	public function login(){
		re_user_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Login',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("login",$data);
		$this->load->view("global/footer",$data);
	}

	public function register(){
		re_user_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Register',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("register",$data);
		$this->load->view("global/footer",$data);
	}

	public function register_submit(){

		$post = $this->input->post();
		$val = $this->Main_model->register_submit($post);
				echo json_encode($val);
			
	}

	public function add_pending(){

		$post = $this->input->post();
		$val = $this->Main_model->add_pending($post);
				echo json_encode($val);
			
	}

	public function apply_form(){

		$post = $this->input->post();
		$val = $this->Main_model->apply_form($post);
		echo json_encode($val);
	}

	public function bill_form(){

		$post = $this->input->post();
		$val = $this->Main_model->bill_form($post);
		echo json_encode($val);
	}

	public function computefor_house(){

		$post = $this->input->post();
				echo json_encode(computefor_house($post['total'],$post['downpayment'],$post['months']));
			
	}

	public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url().'login', 'location');
    }

	public function login_submit(){

		$post = $this->input->post();
		$data = array(
			'username' 			=> $post['username'],
			'password'			=> $post['password'],
		);
		$val = $this->Main_model->login_submit($data);
			if($val != 0){
				$this->session->set_userdata('user',$val);
				echo json_encode(1);
			}else{
				echo json_encode(0);
			}
	}

	public function change_profile(){
		user_session_redirection();
		$post = $this->input->post();
		$data = array(
			'username' 			=> $post['username'],
			'name'				=> $post['name'],
		);
		$val = $this->Main_model->change_profile($data);
				echo json_encode($val);
			
	}

	public function change_profile_password(){

		$post = $this->input->post();
		$data = array(
			'password' 			=> $post['password'],
		);
		$val = $this->Main_model->change_profile_password($data);
				echo json_encode($val);
			
	}

	public function myadditionalinfo(){

		$post = $this->input->post();
		if(user_info_count() == 0){
			$val = $this->Main_model->add_myadditionalinfo($post);
		}else{
			$val = $this->Main_model->update_myadditionalinfo($post);
		}
		echo json_encode($val);
			
	}

	public function delete_image_data(){
		$post = $this->input->post();
			$val = $this->Main_model->delete_image_data($post['image_id']);
		if($val == 1){
			unlink('./User/'.client_session_val().'/'.$post['image_name']);
		}
		echo json_encode($val);
	}

	public function view($id){
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'View',
			'is_datatables'		=> FALSE,
			'view_table'		=> get_product_id($id), 
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("view",$data);
		$this->load->view("global/footer",$data);
	}

	public function profile(){
		user_session_redirection();
		$get = $this->input->get();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Profile',
			'is_datatables'		=> FALSE, 
			'get'				=> $get,
		);
		
		$this->load->view("global/header",$data);
		$this->load->view("profile",$data);
		$this->load->view("global/footer",$data);
	}

	function dragDropUpload(){ 
        if(!empty($_FILES)){ 
            // File upload configuration 
            $user_dir_resume    = './User';
	        if(!file_exists($user_dir_resume)){
	            mkdir( $user_dir_resume, 0755 );
	        }

	        $user_dir_resume    = './User/'.client_session_val();
	        if(!file_exists($user_dir_resume)){
	            mkdir( $user_dir_resume, 0755 );
	        }
            $uploadPath = 'User/'.client_session_val().'/'; 
            $config['upload_path'] = $uploadPath; 
            // $config['allowed_types'] = '*'; 
            $config['allowed_types']        = 'gif|jpg|png';
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
             
            // Upload file to the server 
            if($this->upload->do_upload('file')){ 
                $fileData = $this->upload->data(); 
                $uploadData['image_name'] = $fileData['file_name']; 
                $uploadData['image_date'] = current_ph_date_time();
                $uploadData['user_id'] = client_session_val(); 
                 
                // Insert files info into the database 
                $insert = $this->Main_model->insert_image($uploadData); 
            } 
        } 
    }

    function dragDropUpload_with_token($id){ 
        if(!empty($_FILES)){ 
            // File upload configuration 
            $user_dir_resume    = './User';
	        if(!file_exists($user_dir_resume)){
	            mkdir( $user_dir_resume, 0755 );
	        }

	        $user_dir_resume    = './User/'.$id;
	        if(!file_exists($user_dir_resume)){
	            mkdir( $user_dir_resume, 0755 );
	        }
            $uploadPath = 'User/'.$id.'/'; 
            $config['upload_path'] = $uploadPath; 
            // $config['allowed_types'] = '*'; 
            $config['allowed_types']        = 'gif|jpg|png';
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
             
            // Upload file to the server 
            if($this->upload->do_upload('file')){ 
                $fileData = $this->upload->data(); 
                $uploadData['image_name'] = $fileData['file_name']; 
                $uploadData['image_date'] = current_ph_date_time();
                $uploadData['token_id'] = $id; 
                 
                // Insert files info into the database 
                $insert = $this->Main_model->insert_image($uploadData); 
            } 
        } 
    }


    public function upload_bill($id){
		$user_dir_resume    = './Bill';
        if(!file_exists($user_dir_resume)){
            mkdir( $user_dir_resume, 0755 );
        }

        $user_dir_resume2    = './Bill/'.$id;
        if(!file_exists($user_dir_resume2)){
            mkdir( $user_dir_resume2, 0755 );
        }

        $file_path = './Bill/'.$id.'/';

        //Upload Config
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'png|jpeg|jpg';//'png|jpeg|jpg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (isset($_FILES['file']['name'])) {

            if (0 < $_FILES['file']['error']) {
                $result = array(
                    'status'    => 'error',
                    'msg'       => 'Error occured during file upload.',
                    'file_data' => ''
                );
            } else {
                if (file_exists($file_path. $_FILES['file']['name'])) {
                    $result = array(
                        'status'    => 'existing',
                        'msg'       => 'File already exists.',
                        'file_data' => ''
                    );
                } else {

                    if (!$this->upload->do_upload('file')) {
                        $result = array(
                            'status'    => 'error',
                            'msg'       => $this->upload->display_errors(),
                            'file_data' => ''
                        );
                    } else {

                        
                        $upload_data = $this->upload->data();
                        $result = array(
                            'status'    => 'success',
                            'path'       => base_url().'Bill/'.$id.'/'.$upload_data['file_name'],
                            'file_data' => $upload_data['file_name'],
                        );
                    }
                }
            }
        } else {
            $result = array(
                'status'    => 'blank',
                'msg'       => 'Please choose a file.',
                'file_data' => ''
            );
        }
        echo json_encode($result);
	}

	public function upload_bill_file($id){
		$user_dir_resume    = './pending_upload';
        if(!file_exists($user_dir_resume)){
            mkdir( $user_dir_resume, 0755 );
        }

        $user_dir_resume2    = './pending_upload/'.$id;
        if(!file_exists($user_dir_resume2)){
            mkdir( $user_dir_resume2, 0755 );
        }

        $file_path = './pending_upload/'.$id.'/';

        //Upload Config
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'png|jpeg|jpg';//'png|jpeg|jpg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (isset($_FILES['file']['name'])) {

            if (0 < $_FILES['file']['error']) {
                $result = array(
                    'status'    => 'error',
                    'msg'       => 'Error occured during file upload.',
                    'file_data' => ''
                );
            } else {
                if (file_exists($file_path. $_FILES['file']['name'])) {
                    $result = array(
                        'status'    => 'existing',
                        'msg'       => 'File already exists.',
                        'file_data' => ''
                    );
                } else {

                    if (!$this->upload->do_upload('file')) {
                        $result = array(
                            'status'    => 'error',
                            'msg'       => $this->upload->display_errors(),
                            'file_data' => ''
                        );
                    } else {

                        
                        $upload_data = $this->upload->data();
                        $result = array(
                            'status'    => 'success',
                            'path'       => base_url().'pending_upload/'.$id.'/'.$upload_data['file_name'],
                            'file_data' => $upload_data['file_name'],
                        );
                    }
                }
            }
        } else {
            $result = array(
                'status'    => 'blank',
                'msg'       => 'Please choose a file.',
                'file_data' => ''
            );
        }
        echo json_encode($result);
	}

	public function upload_bill_testing($id){
		$user_dir_resume    = './Bill_view';
        if(!file_exists($user_dir_resume)){
            mkdir( $user_dir_resume, 0755 );
        }

        $user_dir_resume2    = './Bill_view/'.$id;
        if(!file_exists($user_dir_resume2)){
            mkdir( $user_dir_resume2, 0755 );
        }

        $file_path = './Bill_view/'.$id.'/';

        //Upload Config
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'png|jpeg|jpg';//'png|jpeg|jpg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (isset($_FILES['file']['name'])) {

            if (0 < $_FILES['file']['error']) {
                $result = array(
                    'status'    => 'error',
                    'msg'       => 'Error occured during file upload.',
                    'file_data' => ''
                );
            } else {
                if (file_exists($file_path. $_FILES['file']['name'])) {
                    $result = array(
                        'status'    => 'existing',
                        'msg'       => 'File already exists.',
                        'file_data' => ''
                    );
                } else {

                    if (!$this->upload->do_upload('file')) {
                        $result = array(
                            'status'    => 'error',
                            'msg'       => $this->upload->display_errors(),
                            'file_data' => ''
                        );
                    } else {

                        
                        $upload_data = $this->upload->data();
                        $result = array(
                            'status'    => 'success',
                            'path'       => base_url().'Bill_view/'.$id.'/'.$upload_data['file_name'],
                            'file_data' => $upload_data['file_name'],
                        );
                    }
                }
            }
        } else {
            $result = array(
                'status'    => 'blank',
                'msg'       => 'Please choose a file.',
                'file_data' => ''
            );
        }
        echo json_encode($result);
	}	
}

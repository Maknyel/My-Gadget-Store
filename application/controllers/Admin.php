<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	//functions
	public function index(){
		admin_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Dashboard',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("admin/global/header",$data);
		$this->load->view("admin/index",$data);
		$this->load->view("admin/global/footer",$data);
	}

    public function getBarChartDataLastYear() {
            $currentMonth = 12;

            $newBarData = array();
            $json = array();

            for($x = 1; $x <= $currentMonth; $x++) {
                if($x != '10' && $x != '11' && $x != '12'){
                    $monthData = "0".$x;
                } else {
                    $monthData = $x;
                }

                $dateObj = DateTime::createFromFormat('!m', $x);
                $monthName = $dateObj->format('M');

                $dataArr = array(
                                 $monthName,
                                 _list_registered_users(date('Y')-1,$monthData),
                                 _list_registered_users(date('Y'),$monthData)
                                 );

                array_push($newBarData, $dataArr);

            }

            foreach($newBarData as $key=>$value){
                
                $json[] = array('y'=> $newBarData[$key][0] , 'a' => $newBarData[$key][1], 'b' => $newBarData[$key][2]);
            }


            echo json_encode($json);
        }

	public function upload_file(){
		$user_dir_resume    = './Product';
        if(!file_exists($user_dir_resume)){
            mkdir( $user_dir_resume, 0755 );
        }

        $file_path = './Product/';

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
                            'path'       => base_url().'Product/'.$upload_data['file_name'],
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

    
    public function get_profile_user($id){
        admin_session_redirection();
        $data = array(
            'title'             => global_page_function(),
            'page'              => 'Profile',
            'is_datatables'     => TRUE,
            'id'                => $id
        );
        
        $this->load->view("admin/global/header",$data);
        $this->load->view("admin/get_profile_user",$data);
        $this->load->view("admin/global/footer",$data);
    }

	public function application(){
		admin_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Application',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("admin/global/header",$data);
		$this->load->view("admin/application",$data);
		$this->load->view("admin/global/footer",$data);
	}

    public function pending_application(){
        admin_session_redirection();
        $data = array(
            'title'             => global_page_function(),
            'page'              => 'Pending Application',
            'is_datatables'     => FALSE, 
        );
        
        $this->load->view("admin/global/header",$data);
        $this->load->view("admin/pending_application",$data);
        $this->load->view("admin/global/footer",$data);
    }

	public function branch(){
		admin_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Branch',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("admin/global/header",$data);
		$this->load->view("admin/branch",$data);
		$this->load->view("admin/global/footer",$data);
	}

	public function user(){
		admin_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'User',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("admin/global/header",$data);
		$this->load->view("admin/user",$data);
		$this->load->view("admin/global/footer",$data);
	}


    public function approve(){
        $get = $this->input->get();
        $val = update_date_data_apply($get['id']);
        if($val){
            $content = "<p>Hi ".$get['name'].",</p>";
            $content .= "<p>Congratulations your loan and downpayment has been approved by the administrator</p>";
            $data = array(
                'content'           => $content,
                'email'             => 'noreply@gmail.com',
                'email_to'          => $get['email'], 
                'subject'           => 'Approve Loan',
                'message_type'      => 'Loan Approved',
            );
            insert_notif('Congratulations your applied loan and downpayment has been approved by the administrator','',$get['user_id']);
            sendmail($data);
            redirect(base_url().'admin/application', 'location');    
        }
        
    }

    public function verify_user(){
        $get = $this->input->get();
        $val = update_user_id($get['user_id']);
        if($val){
            insert_notif('Congratulations your account has been verified by the administrator','',$get['user_id']);
            $content = "<p>Hi ".$get['name'].",</p>";
            $content .= "<p>Congratulations your account has been verified by the administrator</p>";
            $data = array(
                'content'           => $content,
                'email'             => 'noreply@gmail.com',
                'email_to'          => $get['email'], 
                'subject'           => 'Verify Account',
                'message_type'      => 'Account Verified',
            );
            
            sendmail($data);
            redirect(base_url().'admin/user', 'location');    
        }
        
    }

	public function history(){
		admin_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'History',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("admin/global/header",$data);
		$this->load->view("admin/history",$data);
		$this->load->view("admin/global/footer",$data);
	}

    public function update_pending_image(){
        $post = $this->input->post();
        $name = (get_user_data_admin(get_pending_item_val($post['pending_item_id'],'user_id'),'fname') != '')?get_user_data_admin(get_pending_item_val($post['pending_item_id'],'user_id'),'fname').' '.get_user_data_admin(get_pending_item_val($post['pending_item_id'],'user_id'),'lname'):get_user_data_admin(get_pending_item_val($post['pending_item_id'],'user_id'),'name');
            $content = "<p>Hi ".$name.",</p>";
            $content .= "<p>Congratulations your applied loan has been updated by the administrator</p>";
            $data = array(
                'content'           => $content,
                'email'             => 'noreply@gmail.com',
                'email_to'          => get_user_additional_info_field(get_pending_item_val($post['pending_item_id'],'user_id'),'email'), 
                'subject'           => 'Update applied loan',
                'message_type'      => 'Update applied loan',
            );
            
            sendmail($data);

        insert_notif('Congratulations your applied loan has been updated by the administrator','',get_pending_item_val($post['pending_item_id'],'user_id'));
        echo json_encode($this->Admin_class->update_pending_image($post));
    }

	public function product_function(){
		$post = $this->input->post();
		echo json_encode(product_function($post));
	}

    public function confirm_bill(){
        $post = $this->input->post();
        $name = (get_user_data_admin(get_billing_item_val($post['apply_for_item_id'],'user_id'),'fname') != '')?get_user_data_admin(get_billing_item_val($post['apply_for_item_id'],'user_id'),'fname').' '.get_user_data_admin(get_billing_item_val($post['apply_for_item_id'],'user_id'),'lname'):get_user_data_admin(get_billing_item_val($post['apply_for_item_id'],'user_id'),'name');
            $content = "<p>Hi ".$name.",</p>";
            $content .= "<p>Congratulations your payment has been approved by the administrator</p>";
            $data = array(
                'content'           => $content,
                'email'             => 'noreply@gmail.com',
                'email_to'          => get_user_additional_info_field(get_billing_item_val($post['apply_for_item_id'],'user_id'),'email'), 
                'subject'           => 'Approved billing payment',
                'message_type'      => 'Approved billing payment',
            );
            
            sendmail($data);

        insert_notif('Congratulations your billing payment has been approved by the administrator',get_billing_item_val($post['apply_for_item_id'],'datetime_pay'),get_billing_item_val($post['apply_for_item_id'],'user_id'));
        echo json_encode(confirm_bill($post));
    }

    

	public function user_function(){
		$post = $this->input->post();
		echo json_encode(user_function($post));
	}


	public function login(){
		re_admin_session_redirection();
		$data = array(
			'title' 			=> global_page_function(),
			'page' 				=> 'Login',
			'is_datatables'		=> FALSE, 
		);
		
		$this->load->view("admin/login",$data);
		
	}

	public function logout()
    {
        admin_session_redirection();
        $this->session->unset_userdata('admin');
        redirect(base_url().'admin/login', 'location');
    }

	public function login_submit(){
		$post = $this->input->post();
		$data = array(
			'username' 			=> $post['username'],
			'password'			=> $post['password'],
		);
		$val = $this->Admin_class->login_submit($data);
			if($val != 0){
				$this->session->set_userdata('admin',$val);
				echo json_encode(1);
			}else{
				echo json_encode(0);
			}
	}


	public function upload_image()
    {
        
        //upload file
        

        $user_dir_resume    = './Announcement';
        if(!file_exists($user_dir_resume)){
            mkdir( $user_dir_resume, 0755 );
        }

        

        $file_path = './Announcement'.'/';

        //Upload Config
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = '*';//'png|jpeg|jpg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = (1024*15); //15 MB
        // ./Upload Config

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
                            'link'      => base_url().'Announcement/'.$upload_data['file_name'],
                            'filepath'  => $file_path,
                            'filename'  => $upload_data['file_name']
                        );

                        $file = './Announcement';
                        

                        $this->session->set_userdata('last_uploaded_banner', $upload_data['file_name']);
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

    public function records($id){
        admin_session_redirection();
        $data = array(
            'title'             => global_page_function(),
            'page'              => 'Manage Bill',
            'is_datatables'     => TRUE, 
            'manage'            => manage_id_bill_admin($id),
            'id'                => $id,
            'get_data'          => $this->Main_model->apply_for_item_computation($id),
        );
        
        $this->load->view("admin/global/header",$data);
        $this->load->view("admin/manage_bill",$data);
        $this->load->view("admin/global/footer",$data);
    }

	
}

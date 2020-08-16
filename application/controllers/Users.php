<?php 
	class Users extends CI_Controller{
		public function login(){
			$this->load->view('templates/header');
			$this->load->view('templates/login');
			$this->load->view('templates/footer');
		}

		public function register(){
			$this->load->view('templates/header');
			$this->load->view('templates/register');
			$this->load->view('templates/footer');
		}

		public function userregister(){
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('uname','Username','required');
			$this->form_validation->set_rules('email','E-mail','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('rpassword','Re-type password','required|matches[password]');

			if (!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('templates/register');
				$this->load->view('templates/footer');
			}else{
				//to hash a apssword and pass it to the model
				// $hashedpwd= password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				// $this->Usermodel->registeruser($hashedpwd);

				$this->Usermodel->registeruser();
				$this->session->set_flashdata('user_registered','Registration successfull. You can now login');
				redirect('index.php/users/login');
			}
		}

		public function userlogin(){
			$this->form_validation->set_rules('uname','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if (!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('templates/login');
				$this->load->view('templates/footer');
			}else{
				$uname= $this->input->post('uname',TRUE);
				$password= $this->input->post('password',TRUE);
				$validate= $this->Usermodel->login($uname,$password);

				if ($validate->num_rows() > 0) {
					//collecting user data from DB
					$data  = $validate->row_array();
					$id  = $data['id'];
					$uname  = $data['uname'];
					$name  = $data['name'];
			        $email  = $data['email'];

			        //creating session for user
			        $sesdata = array(
			        'id'  => $id,
			        'uname'  => $uname,
		            'name'  => $name,
		            'email'  => $email,
		            'logged_in' => TRUE
       			 );
			        $this->session->set_flashdata('valid_login','Logged In');
					$this->session->set_userdata($sesdata);
					redirect('index.php/posts');
				}else{	
					$this->session->set_flashdata('invalid_login','Username or Password is Wrong');
					redirect('index.php/users/login');
				}
			}	
		}

		public function logout(){
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('uname');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('logged_in');
     		
     		$this->session->set_flashdata('logout','Logged out');
     		redirect('index.php/users/login');
		}

		public function userprofile($id){
			if (!$this->session->userdata('logged_in')) {
				redirect('index.php/posts');
			}

			$data['posts']= $this->Usermodel->userprofile($id);

			$this->load->view('templates/header');
			$this->load->view('pages/userprofile',$data);
			$this->load->view('templates/footer');
		}
	}
?>
<?php
	class Usermodel extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		//hashed password is entered in the argument when passed from the controller
		// public function registeruser($hashedpwd)

		public function registeruser(){
			$data= array(
				'name'=> $this->input->post('name'),
				'uname'=> $this->input->post('uname'),
				'email'=> $this->input->post('email'),
				'password'=> $this->input->post('password'),

				// for hashed password
				// 'password'=> $hashedpwd,
			);
			return $this->db->insert('users',$data);
		}

		public function login($uname,$password){
			$this->db->where('uname', $uname);
			$this->db->where('password', $password);
			$result= $this->db->get('users');
			return $result;
		}

		public function userprofile($id){
			$this->db->where('user_id',$id);
			$query= $this->db->get('posts');
			return $query->result_array();
		}
	}
?>
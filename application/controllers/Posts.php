<?php
	class Posts extends CI_Controller{
		
		public function index(){
			$data['title']='Latest Posts';
			$data['posts']=$this->Postmodel->getposts();


			$this->load->view('templates/header');
			$this->load->view('posts/index',$data);
			$this->load->view('templates/footer');
		}

		public function show($id = NULL){								
			$data['posts'] =$this->Postmodel->getpostid($id);
			$data['comments'] =$this->Commentmodel->getcomments();

			$this->load->view('templates/header');
			$this->load->view('posts/show',$data);
			$this->load->view('templates/footer');
		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('index.php/posts');
			}

			$data['title']='Create Post';
			$data['categories']= $this->Postmodel->getcategory();

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('body','Body','required');
			$this->form_validation->set_rules('category_id','Category_id','required');

			if ($this->form_validation->run() === false) {
				$this->load->view('templates/header');
				$this->load->view('posts/create',$data);
				$this->load->view('templates/footer');
			}else{
				$config['upload_path']= './assets/images/posts';
				$config['allowed_types']= 'jpg|jpeg|png|gif';
				$config['max_size']= '1024';
				$config['max_height']= '2000';
				$config['max_width']= '2000';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload()) {
					$errors= array('error'=> $this->upload->display_errors());
					$post_image= "noimage.jpg";
				}else{
					$data= array('upload_data'=>$this->upload->data());
					$post_image= $_FILES['userfile']['name'];
				}

				$this->Postmodel->createpost($post_image);
				$this->session->set_flashdata('post_created','Post created');
				redirect('index.php/posts');
			}			
		}

		public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('index.php/posts');
			}

			$this->Postmodel->delete($id);
			$this->session->set_flashdata('post_deleted','Post deleted');
			redirect('index.php/posts');
		}

		public function edit($id){
			if(!$this->session->userdata('logged_in')){
				redirect('index.php/posts');
			}

			$data['title']= "Edit Post";
			$data['posts'] =$this->Postmodel->getpostid($id);

			$data['categories']= $this->Postmodel->getcategory();

			$this->load->view('templates/header');
			$this->load->view('posts/edit',$data);
			$this->load->view('templates/footer');
		}

		public function update($id){
			if(!$this->session->userdata('logged_in')){
				redirect('index.php/posts');
			}
			
			$this->Postmodel->update($id);
			$this->session->set_flashdata('post_updated','Post updated');
			redirect('index.php/posts');
		}
	}
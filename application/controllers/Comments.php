<?php
class Comments extends CI_Controller{
	public function getcomments(){
		if(!$this->session->userdata('logged_in')){
			redirect('index.php/posts');
		}
		$this->Commentmodel->getcomments($id,$data);
	}

	public function addcomment($id){
		if(!$this->session->userdata('logged_in')){
			redirect('index.php/posts');
		}

		$this->form_validation->set_rules('comment','Comment','required');
		if (!$this->form_validation->run()) {
			redirect('index.php/posts/'.$id);
		}
		
		$this->Commentmodel->addcomment($id);
		$this->session->set_flashdata('comment_added','Comment added');
		redirect('index.php/posts/'.$id);
	}

	public function delete_comment($id){
		if(!$this->session->userdata('logged_in')){
			redirect('index.php/posts');
		}
		$validate= $this->Commentmodel->delete_comment($id);

		if ($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$post_id  = $data['post_id'];
		}
		 
		$this->session->set_flashdata('comment_deleted','Comment deleted');
		redirect('index.php/posts/'.$post_id);
	}

	public function editcomment($id){
		if(!$this->session->userdata('logged_in')){
			redirect('index.php/posts');
		}
		$this->form_validation->set_rules('edit','Edit','required');

		if (!$this->form_validation->run()) {
			$this->load->view('templates/header');
			$this->load->view('posts/show');
			$this->load->view('templates/footer');
		}

		$validate= $this->Commentmodel->editcomment($id);
		$data= $validate->row_array();
		$post_id= $data['post_id'];

		$this->session->set_flashdata('comment_edited','Comment updated');
		redirect('index.php/posts/'.$post_id);
	}
}
<?php
	class Postmodel extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function getposts(){
			//to join posts and category table
			//$this->db->order_by('posts.id','desc');
			//$this->db->join('category','category.id = posts.category_id');

			$this->db->order_by('id','desc');
			$query= $this->db->get('posts');
			return $query->result_array();
		}

		public function getpostid($id){
			//after joining is successfull,it gets id of category instead of posts

			$this->db->where('id',$id);
			$query= $this->db->get('posts');
			return $query->result_array();
		}

		public function createpost($post_image){
			$data =array(
				'title'=> $this->input->post('title'),
				'body'=> $this->input->post('body'),
				'category_id'=> $this->input->post('category_id'),
				'user_id'=> $this->session->userdata('id'),
				'post_image'=> $post_image
			);
			return $this->db->insert('posts',$data);
		}

		public function delete($id){
			$query= $this->db->where('id',$id);
			
			$query= $this->db->delete('posts');
			return true;
		}

		public function update($id){
			$data =array(
				'title'=> $this->input->post('title'),
				'body'=> $this->input->post('body'),
				'category_id'=> $this->input->post('category_id')
			);
			$query= $this->db->where('id',$id);
			return $this->db->update('posts',$data);
		}

		public function getcategory(){
			$this->db->order_by('name','DESC');
			$query= $this->db->get('category');
			return $query->result_array();
		}

		public function getcategoryid($id){
			$this->db>where('id',$id);
			$this->db->order_by('name','DESC');
			$query= $this->db->get('category');
			return $query->result_array();
		}
	}
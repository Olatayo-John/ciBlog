<?php
class Commentmodel extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function getcomments(){
		$query= $this->db->get('comment');
		return $query->result_array();
	}

	public function addcomment($id){
		$data= array(
			'user_id'=> $this->session->userdata('id'),
			'post_id'=> $id,
			'uname'=> $this->session->userdata('uname'),
			'body'=> $this->input->post('comment'),
		);
		return $query= $this->db->insert('comment',$data);
	}

	public function delete_comment($id){	
		$result= $this->db->get_where('comment', array('id'=>$id));
		$this->db->where('id',$id);
		$this->db->delete('comment');
		return $result;
	}

	public function editcomment($id){
		$data= array(
			'body'=>$this->input->post('edit')
		);
		$this->db->where('id',$id);
		$this->db->update('comment',$data);
		$result= $this->db->get_where('comment',array('id'=>$id));
		return $result;
	}
}
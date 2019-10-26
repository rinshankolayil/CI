<?php

class Modal extends CI_Model{

	public function __construct(){
				$this->load->database();
	}
	public function add_user($user_name,$pass)
	{
		$password = md5($pass);
		// $this->db->query("INSERT INTO user (user_name,password) VALUES ('$user_name','$password')")
		$data = array(
	        'user_name' => $user_name,
	        'password' => $password
		);
		$this->db->where('user_name',$user_name);
		$q = $this->db->get('user');
		if ( $q->num_rows() > 0 ) {
			return "User name already exist";
		}
		else{
			$this->db->insert('user', $data);
			return "User added successfully";
		}
		
	}
	public function login_user($user_name,$pass)
	{
		$password = md5($pass);
		$data = array(
	        'user_name' => $user_name,
	        'password' => $password
		);
		$query = $this->db->get_where('user', array('user_name' => $user_name,'password' => $password));
		if ( $query->num_rows() > 0 ){
	        $row = $query->row_array();
	        $return_array['user_name'] = $row['user_name'];
	        $return_array['id'] = $row['id'];
	        $return_array['status'] = true;
	    }
	    else{
	    	$return_array['status'] = false;
	    }
	    return $return_array;

	}

	public function gallery_insert($path,$name){
		$data = array(
	        'image_path' => $path,
	        'image_name' => $name
		);
		$this->db->insert('images', $data);
	}

	public function photos(){
		$query = $this->db->get('images');
		if ($query->num_rows() > 0 ){
			$row = $query->row_array();
			foreach ($query->result() as $row)
			{
				$return_array['path'][] = $row->image_path;
				$return_array['name'][] = $row->image_name;
				$return_array['id'][] = $row->id;
				$return_array['status'] = "not null";
			}
		}
		else{
			$return_array['status'] = "null";
		}
		return $return_array;
	}

	public function file_name_update($id,$name){
		$data = array(
        'id' => $id,
        'image_name' => $name,
		);
		$this->db->where('id', $id);
		$this->db->update('images', $data);
	}
}
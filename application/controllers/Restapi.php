<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Restapi extends CI_Controller {

	public function login(){
		if(isset($_POST['username'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$this->load->model('modal');
			$login_user = $this->modal->login_user($username,$password);
			if($login_user['status'] == true){
				$result = array(
					'user_name' => $login_user['user_name'],
					'id' => $login_user['id'],
					'status' => 'success'
				);

            }
            else{
            	$result = array(
					'status' => 'fails'
				);
            }
            echo json_encode($result);
		}
	}

	public function upload_api(){
		if(isset($_POST['name'])){
			$target_dir = "media/";
			$tmp_name = basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($tmp_name,PATHINFO_EXTENSION));
			$file_name = $_POST['name'] . '.' . $imageFileType ;
			$target_file = $target_dir . $file_name;
			if (file_exists($target_file)) {
			    $return_array['message'] = 'File name exist, please choose new name';
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
			    $return_array['message'] = "Sorry, only JPG, JPEG, & PNG files are allowed.";
			    $uploadOk = 0;
			}
			if ($uploadOk != 0) {
			    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			        $return_array['message'] = "Photo has been uploaded.";
			        
			        $this->load->model('modal');
					$gallery = $this->modal->gallery_insert($target_file,$_POST['name']);
					redirect('/admin/upload_view');
			    } else {
			        $return_array['message'] = "Sorry, there was an error uploading your file.";
			    }
			}
		}
		echo json_encode($return_array);
	}
	public function logout_api(){
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            $this->session->unset_userdata($key);
        }
	    $this->session->sess_destroy();
	    $return_array['message'] = "Logout implemented but i don't know why it requires";
	    echo json_encode($return_array);
	}
}
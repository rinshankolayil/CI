<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_header');
		if(!$this->session->userdata('user_name')){
			redirect('/welcome/index');
		}

		$this->load->model('modal');
		$gallery = $this->modal->photos();
		$data = array(
			'username'=>$this->session->userdata('user_name'),
			'gallery' =>$gallery,
		);
		$this->load->view('admin/index',$data);
		$this->load->view('admin_footer');
	}

	public function upload_view(){
		$this->load->view('admin_header');
		$this->load->view('admin/upload_view');
		$this->load->view('admin_footer');

	}

	public function upload(){
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
		$this->load->view('admin_header');
		$this->load->view('admin/upload_view',$return_array);
		$this->load->view('admin_footer');

	}

	public function update_name(){
		if(isset($_POST['file_name'])){
			$id = $_POST['id'];
			$name = $_POST['file_name'];
			$this->load->model('modal');
			$gallery = $this->modal->file_name_update($id,$name);
			redirect('admin');
		}
	}

	public function logout()
	{
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            $this->session->unset_userdata($key);
        }
	    $this->session->sess_destroy();
	    redirect('welcome');
	}
}
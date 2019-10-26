<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		if($this->session->userdata('user_name')){
			redirect('/admin/index');
		}
		$this->load->view('layout');
		if($this->session->flashdata('msg')){
			$data = array('message' => $this->session->flashdata('msg'));
		}
		else{
			$data = array('message' => "");
		}
		if($this->session->flashdata('login_message')){
			$data = array('login_message' => $this->session->flashdata('login_message'));
		}
		else{
			$data = array('login_message' => "");
		}
		
		$this->load->view('welcome/login',$data);
	}

	public function login(){
		if(isset($_POST['username'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$this->load->model('modal');
			$login_user = $this->modal->login_user($username,$password);
			if($login_user['status'] == true){
				$user = array(
					'user_name' => $login_user['user_name'],
					'id' => $login_user['id']);
				$this->session->set_userdata($user);
				redirect('/admin/index');
            }
            else{
            	$this->session->set_flashdata('login_message',"Check user name or password");
				redirect('/welcome/index', 'refresh');
            }
		}
	}

	public function register(){
		if(isset($_POST['username_reg'])){
			$this->load->model('modal');
			$username = $_POST['username_reg'];
			$password = $_POST['password_reg'];
			$create_user = $this->modal->add_user($username,$password);
			$this->session->set_flashdata('msg',$create_user);
			redirect('/welcome/index', 'refresh');

		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends My_Controller
{
	public function index()
	{
		$this->load->view('public/admin_login');

	}
	public function admin_login()
	{
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('email', 'Email', 'required');
		 $this->form_validation->set_rules('password', 'Password', 'required');
		 $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		 if($this->form_validation->run())
		 {
		 	$email=$this->input->post('email');
		 	$password=$this->input->post('password');
		 	$this->load->model('loginmodel');
		 	$login_id=$this->loginmodel->valid_login($email,$password);
		 	foreach ($login_id as $key => $login) {
		 		$username=$login->username;
		 		$userid=$login->user_id;
		 	}
		 	if($login_id)
		 	{
		 		
		 		$this->session->set_userdata('username',$username);
		 		$this->session->set_userdata('userid',$userid);
		 		return redirect('admin/dasboard');

		 	}
		 	else
		 	{
		 		echo "somethimd error";
		 	}
		 }
		 else
		 {
		 	$this->load->view('public/admin_login');
		 }

	}
	public function logout()
	{
		unset(
        $_SESSION['username'],
        $_SESSION['userid']
		);
		return redirect('login');
	}
		
}
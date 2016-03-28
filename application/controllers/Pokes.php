<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokes extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->output->enable_profiler();
		// $this->load->model('Poke');		
	}

	public function registration() {
		$this->load->view('Login');
	}

		public function main() {
		$this->load->view('MainPage');
	}

	 public function logout() {
        $this->session->sess_destroy();
        redirect('/');   
    }

	public function register() {

		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last name", "trim|required");
		$this->form_validation->set_rules("email", "email", "trim|required|is_unique[users.email]|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|matches[confirm]|md5");
		$this->form_validation->set_rules("confirm", "Confirm Password", "trim|required|md5");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}

		// else {

		// 	$this->load->model('Poke');
		// 	$user_details = array(
		// 		'firstname' => $this->input->post('first_name'),
		// 		'lastname' => $this->input->post('last_name'),
		// 		'email' => $this->input->post('email'),
		// 		'password' => $this->input->post('password')
		// 		);

		// 	$insert_info = $this->Poke->InsertInfo($user_details);
		// 	redirect('/main');
	 //    }
	}

	public function login() {

		$this->load->library("form_validation");
		$this->form_validation->set_rules("email2", "email", "trim|required|valid_email");
		$this->form_validation->set_rules("password2", "Password", "trim|required");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}

		// else {

		// 	$email = $this->input->post('email2');
		// 	$password = md5($this->input->post('password2'));
		// 	$this->load->model('Poke');
		// 	$user= $this->Poke->RetrieveInfo($email);

		// 	if($user && $user['password'] == $password) {
		// 		$logger = array(
		// 			'user_id' => $user['id'],
		// 			'user_email' => $user['email'],
		// 			'user_name' => $user['first_name'].' '.$user['last_name'],
		// 			'is_logged_in' => true);

		// 		$this->session->set_userdata($logger);
		// 		redirect('/main');
		// 	}

		// 	else {
		// 		redirect('/');
		// 	}	
		// }
		
    }

}











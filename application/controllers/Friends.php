<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('Friend');		
	}

		public function main() {
		$this->load->model('Friend');
		$allfriends['friends'] = $this->Friend->GetFriends($this->session->userdata['user_id']);
		$allfriends['notFriends'] = $this->Friend->getNotFriends($this->session->userdata['user_id']);
		$this->load->view('MainPage', $allfriends);
	}

	public function registration() {
		$this->load->view('Login');
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect('/');   
    }

	public function register() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");
		$this->form_validation->set_rules("email", "email", "trim|required|is_unique[users.email]|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|matches[confirm]|min_length[8]|md5");
		$this->form_validation->set_rules("confirm", "Confirm Password", "trim|required|min_length[8]|md5");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}

		else {
			$this->load->model('Friend');
			$user_details = array(
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'dob' => $this->input->post('dob')
				);

			$insert_info = $this->Friend->InsertInfo($user_details);
			redirect('/main');
	    }
	}

	public function login() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email2", "email", "trim|required|valid_email");
		$this->form_validation->set_rules("password2", "Password", "trim|required");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}

		else {
			$email = $this->input->post('email2');
			$password = md5($this->input->post('password2'));
			$this->load->model('Friend');
			$user= $this->Friend->RetrieveInfo($email);

			if($user && $user['password'] == $password) {
				$logger = array(
					'user_id' => $user['id'],
					'user_email' => $user['email'],
					'user_alias' => $user['alias'],
					'is_logged_in' => true);

				$this->session->set_userdata($logger);
				redirect('/main');
			}
			else {
				redirect('/');
			}	
		}	
    }

	 public function deleteFriend($friend_id) {
        $this->load->model("Friend");
        $this->Friend->delete($friend_id);
        redirect('/main');
    }

    public function friendDeets($friend_id) {
    	 $this->load->model("Friend");
        $friendInfo['info'] = $this->Friend->friendData($friend_id);
        $this->load->view("friendDetails", $friendInfo);
    }

    public function addFriend($friend_id) {
        $this->load->model("Friend");
        $this->Friend->add($friend_id);
        redirect("/main");
    }

}











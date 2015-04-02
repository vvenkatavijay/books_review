<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$errors = $this->session->flashdata("errors");
		$success_message = $this->session->flashdata("success_message");

		$view_data = array('errors' => $errors,
							'success_message' => $success_message);
		
		$this->load->view("welcome.php", $view_data);
	}

	public function register()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('password', 'Password', 
			'required|min_length[8]|matches[confpassword]');
		$this->form_validation->set_rules('email', 'Email', 
			'required|valid_email|is_unique[users.email]');

		$this->form_validation->set_message('is_unique', '%s already exists.');

		if($this->form_validation->run()) 
		{
			$this->load->model("User");

			$user_data = $this->input->post(NULL, TRUE);
			$user_data['password'] = md5($user_data['password']);
			unset($user_data['confpassword']);

			if($this->User->add_user($user_data)) {
				$this->session->set_flashdata("success_message", 
					"Registration successful. Please sign in to continue");
			} else {
				$this->add_error("<p>Unable to add user to database</p>");
			}
			
		} else {
			$this->add_error(validation_errors());
		}

		redirect("/");

	}

	public function signin() 
	{
		$this->load->library('form_validation');
		$this->load->model('User');

		$this->form_validation->set_rules('email', 'Email', 
			'required|valid_email');

		if($this->form_validation->run()) {

			$email = $this->input->post('email');
			$user_details = $this->User->get_user_details($email);

			if(!$user_details) {

				$this->add_error("<p> Unable to login due to database error. Please try later </p>");

			} else if(md5($this->input->post('password')) === $user_details['password']){

				unset($user_details['password']);
				$this->session->set_userdata('user_details', $user_details);

				redirect("/books");

			} else {

				$this->add_error('<p>Invalid login credentials</p>');
			}
		} else {
			$this->add_error(validation_errors());
		}

		redirect("/");
	}

	public function add_error($error) 
	{
		$errors = $this->session->flashdata('errors');

		if($errors) {
			$errors .= $error;
		} else {
			$errors = $error;
		}

		$this->session->set_flashdata('errors', $errors);
	}
}

//end of main controller
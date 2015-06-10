<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		$this->session->set_userdata('number', rand(1,100));
		$this->load->view('index');
	}
	public function register(){
		$this->load->model('process');
		if($this->process->validateReg($this->input->post())){
			echo "success";
		}else{
			echo "validation failed";
		}
	}

	public function login(){
		$this->load->model('process');
		if($this->process->validateLog($this->input->post())){
			$this->session->set_userdata('logged_user', $this->process->validateLog($this->input->post()));
			redirect('/books');
		}else{
			echo "Wrong username or password";
		}
	}

	public function book_route(){
		$this->load->view('landing');
	}
}
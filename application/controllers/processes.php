<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function register(){
		$this->load->model('process');
		if($this->process->validateReg($this->input->post())){
			if($this->process->validateLog($this->input->post())){
				$this->session->set_userdata('logged_user', $this->process->validateLog($this->input->post()));
				redirect('/books');
			}
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

	public function logout(){
		session_destroy();
		redirect('/');
	}

	public function showUser($id){
		$this->load->model('process');
		$this->load->view('user', array('user'=>$this->process->getUserbyId($id), 'review_count'=>$this->process->getUserReviewCount($id), 'books'=>$this->process->getUsersBooks($id)));
	}
	public function book_route(){
		$this->load->model('book');
		$book_reviews = $this->book->getBookReviews();
		$reviewed_titles = $this->book->getAllBooks();
		$this->load->view('landing',array('book_reviews'=>$book_reviews, 'titles'=>$reviewed_titles));
	}
}
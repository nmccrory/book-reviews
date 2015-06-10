<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}

	public function showform(){
		$this->load->view('add');
	}

	public function addBookandRev(){
		$this->load->model('book');
		//creating book
		$book = array('title'=>$this->input->post('title'), 'author'=>$this->input->post('author'));
		$this->book->addBook($book);
		//setting up review after a bookid has been set
		$newestbook = $this->book->getRecentBook();
		$review = array('review'=>$this->input->post('review'), 'rating'=>$this->input->post('rating'), 'book_id'=>$newestbook['id'], 'user_id'=>$this->session->userdata('logged_user')['id']);
		$this->book->addReview($review);
	}
}
 ?>
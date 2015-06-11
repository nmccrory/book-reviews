<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}

	public function showform(){
		$this->load->model('book');
		$this->load->view('add', array('authors'=>$this->book->getAuthors()));
	}

	public function showBook($id){
		$this->load->model('book');
		$bookinfo = $this->book->getById($id);
		$reviews = $this->book->getReviewsbyUserid($id);
		$this->load->view('bookpage', array('bookinfo'=>$bookinfo, 'reviews'=>$reviews));
	}

	public function addReview($book_id){
		$this->load->model('book');
		if($this->book->addRev($this->input->post(),$this->session->userdata('logged_user')['id'],$book_id)){
			redirect("/books/$book_id");
		}else{
			//add error handling
			return FALSE;
		}
		
	}
	public function addBookandRev(){
		$this->load->model('book');
		//creating book
		$book = array('title'=>$this->input->post('title'), 'author'=>$this->input->post('author'), 'new_author'=>$this->input->post('new_author'));
		$this->book->addBook($book);
		//setting up review after a bookid has been set
		$newestbook = $this->book->getRecentBook();
		$review = array('review'=>$this->input->post('review'), 'rating'=>$this->input->post('rating'), 'book_id'=>$newestbook['id'], 'user_id'=>$this->session->userdata('logged_user')['id']);
		if($this->book->addReview($review)){
			$bookpage = "/books/{$newestbook['id']}";
			redirect($bookpage);
		}else{
			return FALSE;
		}
	}
}
 ?>
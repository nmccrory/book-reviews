<?php 

class Book extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getRecentBook(){
		$query = "SELECT * FROM books WHERE books.created_at = (SELECT max(created_at)FROM books)";
		return $this->db->query($query)->row_array();
	}

	public function getAllBooks(){
		$query = "SELECT * FROM books";
		return $this->db->query($query)->result_array();
	}
	public function getBookReviews(){
		$query = "SELECT reviews.id, review, user_id, book_id, first_name, last_name, reviews.updated_at, title, author, rating FROM reviews LEFT JOIN books ON reviews.book_id = books.id LEFT JOIN users ON reviews.user_id = users.id ORDER BY reviews.updated_at DESC LIMIT 3";
		return $this->db->query($query)->result_array();
	}
	public function getReviewsbyUserid($id){
		$query = "SELECT reviews.id, review, rating, user_id, book_id, reviews.created_at, reviews.updated_at, first_name, last_name FROM reviews LEFT JOIN users ON reviews.user_id = users.id WHERE book_id = $id";
		return $this->db->query($query)->result_array();
	}

	public function getById($id){
		$query = "SELECT * FROM books WHERE id=$id";
		return $this->db->query($query)->row_array();
	}

	public function getAuthors(){
		$query = "SELECT * FROM books GROUP BY author";
		return $this->db->query($query)->result_array();
	}

	public function addBook($post){
		if($post['new_author'] == ''){
			$author = $post['author'];
		}else{
			$author = $post['new_author'];
		}

		$query = "INSERT INTO books (title, author, created_at, updated_at) VALUES (?,?, NOW(),NOW())";
		$values = array($post['title'], $author);
		$this->db->query($query, $values);
	}

	public function addReview($post){
		$query = "INSERT INTO reviews (review, rating, user_id, book_id, created_at, updated_at) VALUES (?,?,?,?,NOW(), NOW())";
		$values = array($post['review'], $post['rating'], $post['user_id'], $post['book_id']);
		if($this->db->query($query, $values)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function addRev($post,$user_id, $book_id){
		$query = "INSERT INTO reviews (review, rating, user_id, book_id, created_at, updated_at) VALUES (?,?,?,?,NOW(), NOW())";
		$values = array($post['review'], $post['rating'], $user_id, $book_id);
		if($this->db->query($query, $values)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>
<?php 

class Book extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getRecentBook(){
		$query = "SELECT * FROM books WHERE books.created_at = (SELECT max(created_at)FROM books)";
		return $this->db->query($query)->row_array();
	}

	public function addBook($post){
		$query = "INSERT INTO books (title, author, created_at, updated_at) VALUES (?,?, NOW(),NOW())";
		$values = array($post['title'], $post['author']);
		$this->db->query($query, $values);
	}

	public function addReview($post){
		$query = "INSERT INTO reviews (review, rating, user_id, book_id, created_at, updated_at) VALUES (?,?,?,?,NOW(), NOW())";
		$values = array($post['review'], $post['rating'], $post['user_id'], $post['book_id']);
		$this->db->query($query, $values);
	}
}
?>
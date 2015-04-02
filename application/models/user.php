<?php 

/**
* 
*/
class User extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function add_user($user_data) 
	{
		$user_query = "INSERT INTO users VALUES(NULL, ?, ?, ?, ?, NOW())";

		return $this->db->query($user_query, $user_data);
	}

	public function get_user_details($email)
	{
		$user_query = "SELECT * FROM users WHERE email = ?";

		return $this->db->query($user_query, $email)->row_array();
	}

	public function get_top_three()
	{
		$books_query = "SELECT b.name AS book, 
							   r.created_at AS time, 
							   r.rating AS rating, 
							   r.description AS description, 
							   u.first_name AS user,
							   b.id AS book_id
 							FROM reviews AS r LEFT JOIN books AS b
 							ON r.books_id = b.id 
 							LEFT JOIN users AS u
 							ON r.user_id = u.id
 							ORDER BY time DESC LIMIT 3;";

 		return $this->db->query($books_query)->result_array();
	}

	public function get_books()
	{
		$books_query = "SELECT name FROM books";

		return $this->db->query($books_query)->result_array();
	}

	public function get_authors()
	{
		$authors_query = "SELECT name FROM authors";

		return $this->db->query($authors_query)->result_array();
	}

	public function get_book_id($book)
	{
		$id_query = "SELECT id FROM books WHERE name = ?";

		return $this->db->query($id_query, $book)->row_array();
	}

	public function get_author_id($book)
	{
		$id_query = "SELECT id FROM authors WHERE name = ?";

		return $this->db->query($id_query, $book)->row_array();
	}

	public function add_review_existing_book($data)
	{
		$review_query = "INSERT INTO reviews VALUES(NULL, ?, ?, ?, ?, NOW());";

		return $this->db->query($review_query, $data);
	}

	public function add_book($data)
	{
		$books_query = "INSERT INTO books VALUES(NULL, ?, ?, NOW());";

		return $this->db->query($books_query, $data);
	}

	public function add_author($author_name)
	{
		$author_query = "INSERT INTO authors VALUES(NULL, ?, NOW());";

		return $this->db->query($author_query, $author_name);
	}

	public function get_book_data($id)
	{
		$reviews_query = "SELECT r.id AS review_id,
						r.description AS description,
 						r.created_at AS created_at,
 						r.rating AS rating,
 						u.first_name AS user_name,
 						u.id AS user_id
 						FROM reviews AS r 
 						LEFT JOIN users AS u
 						ON r.user_id = u.id
 						WHERE r.books_id = ?";

 		$book_name_query = "SELECT name, author_id FROM books WHERE id = ?";
 		$author_name_query = "SELECT name FROM authors WHERE id = ?";

 		$reviews = $this->db->query($reviews_query, $id)->result_array();
 		$book_details = $this->db->query($book_name_query, $id)->row_array();
 		$author_name = $this->db->query($author_name_query, $book_details['author_id'])->row_array();

 		$data = array('reviews' => $reviews,
 					 'book_name' => $book_details['name'],
 							'book_id' => $id,
 							'author_name' => $author_name['name'],
 							'author_id' => $book_details['author_id']);

 		return $data;

	}

	public function get_user_data($id) 
	{
		$user_query = "SELECT * FROM users WHERE id = ?";
		$review_query = "SELECT DISTINCT books.name, books.id FROM reviews LEFT JOIN books 
							ON reviews.books_id = books.id WHERE reviews.user_id = ?";

		$user_data = array("user_data" => 
							$this->db->query($user_query, $id)->result_array(),
							"books_data" => 
							$this->db->query($review_query, $id)->result_array()
						);

		return $user_data;
	}

	public function delete_review($id)
	{
		$delete_query = "DELETE FROM reviews WHERE id = ?";

		return $this->db->query($delete_query, $id);
	}
}

?>
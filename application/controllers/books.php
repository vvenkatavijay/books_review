<?php 

/**
* 
*/
class Books extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index() 
	{
		$this->load->model('User');
		$books = $this->User->get_top_three();
		$list_of_books = $this->User->get_books();
		$user_name = $this->session->userdata('user_details');

		$view_data = array('books' => $books,
							'list_of_books' => $list_of_books,
							'user_name' => $user_name['first_name']);

		$this->load->view("main.php", $view_data);
	}

	public function add()
	{
		$this->load->model('User');

		$books = $this->User->get_books();
		$authors = $this->User->get_authors();
		
		$view_data = array('books' => $books,
							'authors' => $authors);

		$this->load->view('add_book.php', $view_data);
	}

	public function each_book($id)
	{
		$this->load->view('each_book.php');
	}

	public function add_book()
	{
		$this->load->model("User");
		$user_details = $this->session->userdata('user_details');
		$book_id = false;
		$author_id = false;
		
		if($this->input->post('book_name_input')) 
		{
			$book_name = $this->input->post('book_name_input');
		} 
		else
		{
			$book_name = $this->input->post('book_name_option');
			$book_id = $this->User->get_book_id($book_name);
		}

		if($this->input->post('author_name_option')) 
		{
			$author_name = $this->input->post('author_name_option');
			$author_id = $this->User->get_author_id($author_name);
		} 
		else
		{
			$author_name = $this->input->post('add_author');
		}


		if(!$book_id)  {

			if(!$author_id) {

				$this->User->add_author($author_name);
				$author_id = $this->User->get_author_id($author_name);

			}

			$data = array('book_name' => $book_name,
							'author_id' => $author_id['id']);

			$value = $this->User->add_book($data);
			$book_id = $this->User->get_book_id($book_name);
		}

		$review_data = array("user_id" => $user_details['id'],
							"books_id" => $book_id['id'],
							"rating" => $this->input->post('rating'),
							"description" => $this->input->post('description'));

		$this->User->add_review_existing_book($review_data);
	}

	public function show_book($id)
	{
		$this->load->model("User");

		$user_details = $this->session->userdata('user_details');

		$view_data = $this->User->get_book_data($id);
		$view_data['current_user_id'] = $user_details['id'];
		$this->load->view('each_book.php', $view_data);
	}

	public function show_user($id)
	{
		$this->load->model("User");

		$user = $this->User->get_user_data($id);

		$view_data = array("user_data" => $user['user_data'][0],
							"books_list" => $user['books_data']);

		$this->load->view("each_user",$view_data);
	}

	public function delete_review($id)
	{
		$this->load->model("User");


		if($this->User->delete_review($id)) {
			redirect("/books");
		}
	}
}

?>
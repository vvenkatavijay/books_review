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
}

?>
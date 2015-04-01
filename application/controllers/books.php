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
		$this->load->view("main.php");
	}

	public function add()
	{
		
	}
}

?>
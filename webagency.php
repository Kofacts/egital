<?php

class webagency extends CI_CONTROLLER{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	function index(){
		redirect("foodie/index");
	}

	function contact(){
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$message=$this->input->post("message");

		

		//first, this is to validate the form.. This has been done using HTML5 in homepage

		

		$this->email->from($email,$name);
		$this->email->to('yourmail@domain.com');
		
		$this->email->message($message);

		$sent=$this->email->send();

		if($sent){
		$this->load->view("webagency_success");
	}
	else{
		$this->index();
	}
	
	}
}
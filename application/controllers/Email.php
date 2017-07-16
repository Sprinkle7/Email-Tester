<?php

class Email extends CI_Controller {

	/**
	*  Email Tester 
	*/

	public function index()
	{
		$this->load->view('email');
	}

	public function Send()
	{
		$sendTo        = $this->input->post('to');
		$subject       = $this->input->post('subject');
		$Message  = $this->input->post('template');
		
		$toMail   = "'".json_decode($Message)."'";
		// Sending Email
		$AdminEmail = "xxxxxxxxxxxxxxxxx.com";
		$this->email->set_mailtype("html");
		
                $configemail = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'xxxxxxxxxxxxx.com', 
                  'smtp_port' => 26, 
                  'smtp_user' => 'xxxxxxxxxxxx.com', 
                  'smtp_pass' => 'xxxxxxxxxxxxxxx',
                  'mailtype'  => 'html', 
                  'charset'   => 'iso-8859-1'
                );
		$this->load->library('email', $configemail);
		$this->email->set_newline("\r\n");
		$this->email->subject($subject);
		$this->email->message($toMail);
		$this->email->from($AdminEmail,$subject);
		$this->email->to($sendTo);
		$this->email->send();
		echo "1";
		
	}

}

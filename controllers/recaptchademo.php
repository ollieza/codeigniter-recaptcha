<?php

class Recaptchademo extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		
		$this->load->library('recaptcha');
	    $this->load->library('form_validation');
	    $this->load->helper('form');
	    $this->lang->load('recaptcha');
	}

	// --------------------------------------------------------------------
		
	function index()
  	{
		$this->form_validation->set_rules('recaptcha_response_field', 'lang:recaptcha_field_name', 'required|callback_check_captcha');
		
	    if ($this->form_validation->run() == FALSE) 
	    {
			// the desired language code string can be passed to the get_html() method
	      	// "en" is the default if you don't pass the parameter
	      	// valid codes can be found here:http://recaptcha.net/apidocs/captcha/client.html
	      	$this->load->view('recaptcha_demo', array('recaptcha' => $this->recaptcha->get_html()));
	    }
	    else
	    {
			$this->load->view('recaptcha_demo', array('recaptcha' => 'Yay! You got it right!'));
	    }
  	}

	// --------------------------------------------------------------------
		
	function check_captcha($val)
	{
	  	if ($this->recaptcha->check_answer($this->input->ip_address(), $this->input->post('recaptcha_challenge_field'), $val))
		{
	    	return TRUE;
	  	}
		
	    $this->form_validation->set_message('check_captcha', $this->lang->line('recaptcha_incorrect_response'));
	    return FALSE;
	}

	// --------------------------------------------------------------------	
}

/* End of file recaptchademo.php */
/* Location: ./application/controllers/recaptchademo.php */

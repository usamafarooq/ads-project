<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertToBase64'))
{
	function ad_file($path)
	{
		if (!file_exists($_SERVER['DOCUMENT_ROOT'].$path)) {
			return base_url().$path;
		}

		return base_url('uploads/no-img.jpg');
	}

	function send_mail($from = null, $to, $subject, $template, $data = [])
	{
		if (empty($from)) $from = 'moiz.kingdomvision@gmail.com';

		if (empty($data['name'])) $data['name'] = 'Click Pay Earn';

		$config = [
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'moiz.kingdomvision@gmail.com',
		    'smtp_pass' => 'karachi@123',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		];
		$this->load->library('email', $config);
		
		$this->email->from($from, $data['name']);
		$this->email->to($to);
		
		$this->email->subject($subject);
		$this->email->message($template);
		
		$this->email->send();
		return true;
		
		// echo $this->email->print_debugger();
	}
}
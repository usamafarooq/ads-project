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
		if (empty($from)) $from = 'info@clickpayearn.com';
		if (empty($data['name'])) $data['name'] = 'Click Pay Earn';

		// $config = [
		//     'protocol' => 'smtp',
		//     'smtp_host' => 'ssl://smtp.googlemail.com',
		//     'smtp_port' => 465,
		//     'smtp_user' => 'moiz.kingdomvision@gmail.com',
		//     'smtp_pass' => 'karachi@123',
		//     'mailtype'  => 'html', 
		//     'charset'   => 'iso-8859-1'
		// ];
		// $ci = & get_instance();
		// $ci->load->library('email', $config);
		
		// $ci->email->from($from, $data['name']);
		// $ci->email->to($to);
		
		// $ci->email->subject($subject);
		// $ci->email->message($template);
		
		// $ci->email->send();


		$headers = "From: " . strip_tags($from) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		

		mail($to, $subject, $template, $headers);
		return true;
		
		// echo $this->email->print_debugger();
	}
}
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



	function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'oiuyfdsfj!@#$%^&*';
        $secret_iv = 'gdsz!@#$%^&koiudxcvn';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }


    function is_open()
    {
    	$return = false;
    	$current_time = date('H:i a');
		$current_time = DateTime::createFromFormat('H:i a', $current_time);
		
		$first_time_start = date('H:i a', strtotime("07:00 am"));
		$first_time_end = date('H:i a', strtotime("09:00 am"));
		$first_time_start = DateTime::createFromFormat('H:i a', $first_time_start);
		$first_time_end = DateTime::createFromFormat('H:i a', $first_time_end);
		if ($current_time > $first_time_start && $current_time < $first_time_end)
		{
		 	$return = true;  
		}


		$second_time_start = date('H:i a', strtotime("12:00 pm"));
		$second_time_end = date('H:i a', strtotime("02:00 pm"));
		$second_time_start = DateTime::createFromFormat('H:i a', $second_time_start);
		$second_time_end = DateTime::createFromFormat('H:i a', $second_time_end);
		if ($current_time > $second_time_start && $current_time < $second_time_end)
		{
		 	$return = true;  
		}

		$third_time_start = date('H:i a', strtotime("04:00 pm"));
		$third_time_end = date('H:i a', strtotime("06:00 pm"));
		$third_time_start = DateTime::createFromFormat('H:i a', $third_time_start);
		$third_time_end = DateTime::createFromFormat('H:i a', $third_time_end);
		if ($current_time > $third_time_start && $current_time < $third_time_end)
		{
		 	$return = true;  
		}
		return $return;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Front_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->model('Ads_model');

    }

	public function signup()
	{
		if ($this->session->userdata('role') == 2) {
        	redirect('/','refresh');
        }
        $this->data['cities'] = $this->db->where_in('state_id', ['2723', '2724', '2725', '2726', '2727', '2728', '2729'])->order_by('Name')->get('cities')->result_array();
        

		$this->data['title'] = 'Signup';
		$this->data['pricing_plan'] = $this->User_model->all_rows('pricing_plan');
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]'); 
		$this->form_validation->set_rules('referrer', 'Referrer Email	', 'callback_referrer_check');
		if ($this->form_validation->run()) {
			if ($this->input->post()) {
				$package = $this->input->post('package');
				$data = $this->input->post();
				unset($data['package'], $data['re_email'], $data['con_password'], $data['terms']);
				$data['password'] = md5($data['password']);
				$data['role'] = 2;
				$user_data = $data;
				$user_id = $this->User_model->insert('users', $data);
				$data = [
					'user_id' => $user_id,
					'pricing_plan_id' => $package,
				];
				$id = $this->User_model->insert('plan_user', $data);
				$user = $this->User_model->get_users($user_id);
				$template = $this->load->view('email/signup', $user[0], TRUE);
				send_mail(NULL, $user_data['email'], 'Welcome to Click Pay Earn', $template);
				$this->session->set_flashdata('success', 'Register successfully and waiting for admin approval');
				redirect('thankyou','refresh');
			}
		}
		$this->load->front_template('user/signup',$this->data);
	}

	function referrer_check($str)
	{
		$field_value = $str;

		if (empty($field_value)) {
			return TRUE;
		}

		$getReferrerUser = $this->User_model->get_row_single('users', ['email'=>$field_value, 'status'=> 'Approved']);

		if(count($getReferrerUser) > 0){
			$checkExpiry = $this->User_model->get_row_single('plan_user', ['user_id'=>$getReferrerUser['id']]);

			$plan_expiry_date = date_create(date('Y-m-d', strtotime($checkExpiry['expire_at'])));
			$today = date_create(date('Y-m-d'));

			$expiry = date_format($plan_expiry_date,"Y-m-d");
			$date_diff = date_diff($today, $plan_expiry_date);
			if ($date_diff->days == 0 || $date_diff->invert == 1) {
				$this->form_validation->set_message('referrer_check','{field} is Expired!');
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			$this->form_validation->set_message('referrer_check','{field} is Not Exist!');
			return FALSE;
		}
	}
	public function login()
	{
		if ($this->session->userdata('role') == 2) {
        	redirect('/','refresh');
        }
		$this->data['title'] = 'Login';
		if ($this->input->post()) {
			$user = $this->User_model->get_row_single('users', ['email' => $this->input->post('email')]);
			if (empty($user)) {
				$message = 'Incorrect Email address';
				$this->session->set_flashdata('error', $message);
				redirect('user/login','refresh');
			}
			if ($user['status'] == 'Pending'){
				$created_at = date_create(date('Y-m-d', strtotime($user['created_at'])));
				$today = date_create(date('Y-m-d'));

				if (date_diff($created_at, $today)->days > 5 ) {
					$message = 'Your account will be active when admin will approve your account';
				}
			} 
			if ($user['status'] == 'Inactive') $message = 'Your account is Inactive please contact admin to active your account';
			if ($user['password'] != md5($this->input->post('password'))) $message = 'Incorrect Password';
			

			// $plan = $this->db->select()
			// ->from('plan_user pu')
			// ->join('pricing_plan pp', 'pp.id = pu.pricing_plan_id')
			// ->where('pu.user_id', $user['id'])
			// ->get()->row_array();

			// $plan_duration = date_create(date('Y-m-d', strtotime($user['created_at'].' +'.$plan['Duration'].' month')));
			// $created_at = date_create($user['created_at']);

			// $date_diff = date_diff($created_at, $plan_duration);

			// if ($date_diff->days == 0 || $date_diff->invert == 1) 
			// 	$message = 'Your account is Expire please contact admin';

			if (!empty($message)) {
				$this->session->set_flashdata('error', $message);
				redirect('user/login','refresh');
			}

			$role = $user['role'];
			$user = $this->User_model->get_users($user['id'])[0];

			$response = $this->Ads_model->checkViewedAds($user['id']);
			$available_limit = $user['Daily_Ads'] - count($response);
			if ($available_limit <= 0) {
				$available_limit = 0;
			}
			$user = [
				'id' 			=> $user['id'],
	            'first_name' 	=> $user['first_name'],
	            'last_name' 	=> $user['last_name'],
	            'username' 		=> $user['username'],
	            'phone' 		=> $user['phone'],
	            'email' 		=> $user['email'],
	            'role' 			=> $role,
	            'cnic' 			=> $user['cnic'],
	            'jazz_no' 		=> $user['jazz_no'],
	            'city_id' 		=> $user['city_id'],
	            'referrer' 		=> $user['referrer'],
	            'amount' 		=> $user['amount'],
	            'withrawal_type'=> $user['withrawal_type'],
	        	'status' 		=> $user['status'],
	        	'package' 		=> $user['package'],
	        	'Click_Price' 	=> $user['Click_Price'],
	        	'Daily_Ads' 	=> $user['Daily_Ads'],
	        	'withdraw_limit' => $user['withdraw_limit'],
	        	'expire_at' 	=> $user['expire_at'],
	        	'amount' 		=> $user['amount'],
	        	'Refer_Click_Price' => $user['Refer_Click_Price'],
	        	'available_limit' => $available_limit,

			];
			$this->session->set_userdata($user);
			redirect('user/dashboard','refresh');
		}
		$this->load->front_template('user/login',$this->data);
	}


	public function forgot_passowrd()
	{
		if ($this->session->userdata('id')) {
        	redirect('/','refresh');
        }
		$this->data['title'] = 'Forgot Password';
		if ($this->input->post()) {
			$user = $this->User_model->get_row_single('users', ['email' => $this->input->post('email')]);
			if (empty($user)) {
				$message = 'Incorrect Email address';
				$this->session->set_flashdata('error', $message);
				redirect('user/forgot_passowrd','refresh');
			}
			else{
				$token = md5(time());

				$this->User_model->update('users', ['forgot_token' => $token, 'forgot_token_expire' => 0], ['id' => $user['id']]);
				$data = ['user'=> $user, 'token' => $token];
				$template = $this->load->view('email/forgot', $data, TRUE);
				send_mail($from = null, $user['email'], 'Forgot Passowrd Token', $template, $data = []);
				$this->session->set_flashdata('success', 'We have sent you reset link to change your password please check your email');
				redirect('user/forgot_passowrd','refresh');

			}
		}
		$this->load->front_template('user/forgot',$this->data);
	}


	public function reset($token = null)
	{
		$this->data['title'] = 'Reset Passowrd';
		if ($token == null) {
			$this->session->set_flashdata('error', 'Incorrect reset token');
			redirect('user/login','refresh');
		}
		$user = $this->User_model->get_row_single('users', ['forgot_token' => $token, 'forgot_token_expire' => 0]);
		if ($user == null) {
			$this->session->set_flashdata('error', 'Incorrect reset token');
			redirect('user/login','refresh');
		}

		if ($this->input->post()) {
			$this->User_model->update('users', ['password' => md5($this->input->post('password')), 'forgot_token_expire' => 1], ['forgot_token' => $token] );
			$this->session->set_flashdata('success', 'Passowrd reset successfully');
			redirect('user/login','refresh');

		}
		$this->load->front_template('user/reset',$this->data);
	}

	public function edit()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
        $this->data['cities'] = $this->db->where_in('state_id', ['2723', '2724', '2725', '2726', '2727', '2728', '2729'])->get('cities')->result_array();
		$this->data['title'] = 'Edit Profile';
		$id = $this->session->userdata('id');
		if ($this->input->post()) {
        	$data = $this->input->post();
        	unset($data['con_password']);
        	if (!empty($data['password'])) {
        		$data['password'] = md5($data['password']);
        	}
        	else{
        		unset($data['password']);
        	}
        	$this->User_model->update('users',$data,array('id'=>$id));
        	$this->session->set_flashdata('success', 'profile has been updated');
        	redirect('user/edit');
        }
		$this->data['user'] = $this->User_model->get_row_single('users',array('id'=>$id));
		$this->load->front_template('user/edit',$this->data);
	}

	public function referrals()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
		$email = $this->session->userdata('email');
		$this->data['title'] = 'My Referrals';
		$this->data['users'] = $this->User_model->get_referrer($email);
		$this->load->front_template('user/referrals',$this->data);
	}

	public function payments()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
		$id = $this->session->userdata('id');
		$this->data['title'] = 'Payment History';
		$this->data['payments'] = $this->User_model->get_rows('withdraw',array('User'=>$id));
		$this->load->front_template('user/payments',$this->data);
	}


	public function dashboard()
	{
		if ($this->session->userdata('role') != 2) {
        	redirect('/','refresh');
        }
		$user_id = $this->session->userdata('id');
		$user = $this->User_model->get_row_single('users', ['id' => $user_id]);
		$this->session->set_userdata($user);
		// $user = $this->User_model->get_users($user_id)[0];
		// $this->db->select('ad_id')
		//         ->from('user_ads_view')
		//         ->where('user_id', $user['id'])
		//         ->where('created_at >=', date('Y-m-d'))
		//         ->where('created_at <=', date('Y-m-d 23:59:59'));
		// $query = $this->db->get()->result();

		// $get_planUser = $this->User_model->get_row_single('plan_user', ['user_id'=>$user_id]);			
		// $plan_expiry_date = date_create(date('Y-m-d', strtotime($user['user_plan_created'].' +'.$user['duration'].' month')));
		$plan_expiry_date = date_create(date('Y-m-d', strtotime($this->session->userdata('expire_at'))));
		$today = date_create(date('Y-m-d'));

		$this->data['expiry_date'] = date_format($plan_expiry_date,"Y-m-d");
		$this->data['is_expire'] = 0;

		$date_diff = date_diff($today, $plan_expiry_date);

		if ($date_diff->days == 0 || $date_diff->invert == 1) {
			$this->data['is_expire'] = 1;
		}

		// $limit = $user['Daily_Ads'] - count($query);
		// $this->data['limit'] = ($limit <= 0 ) ? 0 : $limit;
		$this->data['user'] = $user;
		$this->data['ads'] = $this->Ads_model->get_available_for_user($user_id, $this->session->userdata('available_limit'));

		$this->data['title'] = 'dashboard';
		$this->load->front_template('user/dashboard',  $this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}

}
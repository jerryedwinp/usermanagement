<?php 
 
class Users extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('model_users');
		$this->load->model('register');
		$this->load->helper(array('form','url'));

	}

	public function register()
	{
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|is_unique[users.username]'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|matches[passwordAgain]|trim|required|min_length[8]|max_length[15]|callback_chk_password_expression'
			),
			array(
				'field' => 'passwordAgain',
				'label' => 'Password Again',
				'rules' => 'required|matches[passwordAgain]|trim|required|min_length[8]|max_length[15]|callback_chk_password_expression'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|trim|is_unique[users.email]|callback_validateEmail'
			),
			array(
				'field' => 'mobile',
				'label' => 'Mobile',
				'rules' => 'required|trim|is_unique[users.mobile]|integer'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_message('valid_email', 'The {field} is invalid');
		$this->form_validation->set_message('is_unique', 'The {field} already exists');
		$this->form_validation->set_message('integer', 'The {field} must be number');		
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {

			$this->model_users->register();

			$validator['success'] = true;
			$validator['messages'] = 'Successfully Registered';
		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}

	public function login()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|callback_validate_username'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);		
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {

			$login = $this->model_users->login();

			if($login) {

				$this->load->library('session');

				$newdata = array(
	        'user_id'  => $login,	        
	        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);

				$validator['success'] = 1;
				$validator['messages'] = 'dashboard';	
								
			}
			else {
				$validator['success'] = 0;
				$validator['messages'] = 'Incorrect (Email/Mobile)/password combination';	
			} // /else
		} 
		else {
			$validator['success'] = 0;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}

	public function validate_username()
	{
		$username = $this->model_users->validate_username();

		if($username === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validate_username', 'The {field} does not exists');
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('location: ../');
	}

	public function update() {
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|callback_username_exists'
			),
			array(
				'field' => 'fullName',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);		
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {
			$this->load->library('session');
			$userId = $this->session->userdata('user_id');

			$update = $this->model_users->update($userId);

			if($update) {				

				$validator['success'] = true;
				$validator['messages'] = 'Successfully Updated';					
			}
			else {
				$validator['success'] = false;
				$validator['messages'] = 'Incorrect username/password combination';	
			} // /else
		} 
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}

	public function username_exists()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('user_id');

		$username_exists = $this->model_users->usernameExists($userId);

		if($username_exists === false) {
			return true;
		} 
		else {
			$this->form_validation->set_message('username_exists', 'The {field} value already exists');
			return false;
		}

	}

	public function changepassword()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'currentPassword',
				'label' => 'Current Password',
				'rules' => 'required|callback_validCurrentPassword'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|matches[passwordAgain]'
			),
			array(
				'field' => 'passwordAgain',
				'label' => 'Password Again',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);		
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {
			$this->load->library('session');
			$userId = $this->session->userdata('user_id');

			$changepassword = $this->model_users->changepassword($userId);

			if($changepassword) {				
				$validator['success'] = true;
				$validator['messages'] = 'Successfully Updated';					
			}			
		} 
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);
	}

	public function validCurrentPassword()
	{
		$this->load->library('session');
		$userId = $this->session->userdata('user_id');

		$password_exists = $this->model_users->validCurrentPassword($userId);

		if($password_exists === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validCurrentPassword', 'The {field} value is invalid');
			return false;
		}

	}

	public function validateEmail($email) {
    if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
    return true;  
    }else{
    	$this->form_validation->set_message('validateEmail', 'The {field} is not valid');
    return false;
    }
}


public function chk_password_expression($str)

    {

    if (1 !== preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m', $str))

    {
        $this->form_validation->set_message('chk_password_expression', '%s Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character');
        return FALSE;
    }

    else

    {
        return TRUE;
    }
} 


public function forgot()
	{
		error_reporting(0);
		if($this->session->userdata('user_id')){
			redirect('/');
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required',
		array('required' => 'You must provide a %s.'));
		
		if ($this->form_validation->run())
		{
			$otp = rand(100000,999999);
			$Email=$this->input->post('email');
			
			if($this->if_email_exist($Email,$otp))
			{
				$this->session->set_flashdata('otp_success','OTP successfully sended/Check your mail !!');
			    $this->load->view('updatepasswordSuccess');
			}
			else
			{
				$this->session->set_flashdata('otp_failed','Email not exist !!');
				$this->load->view('forgotcheck');
			}
			
		}
		else
		{
			
			$this->load->view('forgot');
			
		}	
	}

public function fupdatepassword()
	{
		if($this->session->userdata('id')){
			redirect('/');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('otp', 'otp', 'trim|required|min_length[3]|max_length[6]|numeric',
		array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[Password]');
	
		if ($this->form_validation->run())
		{
			$otp=$this->input->post('otp');
			$password=$this->input->post('Password');
			
			$this->load->model('register');
			if($this->register->update_password($otp,$password))
			{
				$this->session->set_flashdata('update_success','successfully Updated/ Login to your Ac!!');
			    return redirect('/');
			}
			else
			{
				$this->session->set_flashdata('update_failed','Otp not match or Otp expired!!');
				$this->load->view('updatepasswordFailed');
			}
			
		}
				 	
	}

	public function dashboard(){
		return redirect('/dashboard');	
	}


	public function if_email_exist($Email,$otp)
    {
    	 $this->load->library('phpmailerr');
        $q=$this->db->select('username')
            ->from('users')
            ->where(['email'=>$Email])
            ->get();
            $username = $q->row()->username;
      if($q->num_rows())
      {
     			/* PHPMailer object */
        $mail = $this->phpmailerr->load();
       
        /* SMTP configuration */
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        //$mail->SMTPDebug = 2; //Alternative to above constant
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'jerryedwin43@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 465;
       
        $mail->setFrom('jerryedwin43@gmail.com', 'Home');
        $mail->addReplyTo($Email, 'Home');
       
        /* Add a recipient */
        $mail->addAddress($Email);
       
        /* Add cc or bcc */
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
       
        /* Email subject */
        $mail->Subject = 'Technical Round Forgot password';
       
        /* Set email format to HTML */
        $mail->isHTML(true);
       
        /* Email body content */
        $mailContent = "<h3>Dear User</h3><br>'.'User Name: '.$username.'<br>Your One Time Password: '.$otp.'<br><h3>Thanks & Regards,<br>Admin Team</h3>";
        $mail->Body = $mailContent;
       $this->db->set(['email_verification_code'=>$otp])
                  ->where(['email'=>$Email])
                  ->update('users');
        /* Send email */
        if(!$mail->send()){
            echo 'Mail could not be sent.';
           // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            //echo 'Mail has been sent';
        }
			return true;	
      }
      else
      {
        return false;
      }
    }
}
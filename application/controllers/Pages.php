<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller 
{
	public function view($page = 'index')
	{
    if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
    {
      // Whoops, we don't have a page for that!
      show_404();
    }

    $data['title'] = ucfirst($page); // Capitalize the first letter

     if($page == 'index') {
      $this->loggedIn();   
    } else if($page == 'register') {
      $this->loggedRegisterIn();   
    }
    else if($page == 'forgot'){
       $this->loggedRegisterIn();
    }
    else if($page == 'updatepassword'){
       $this->loggedRegisterIn();
    }
    else if($page == 'dashboard'){
       $this->loggedIn();
    }
    else {
      $this->notLoggedIn();

      $this->load->library('session');

      $this->load->model('model_users');
      
      $data['userData'] = $this->model_users->fetchUserData($this->session->userdata('user_id'));            
    }

    $this->load->view($page, $data);  

    // $this->load->view('templates/header', $data);
    
    // $this->load->view('templates/footer', $data);
	}


  public function otpsent (){

    $this->load->view('updatepassword');
  }
}

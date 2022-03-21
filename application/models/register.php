<?php 

class Register extends CI_Model 
{
	

    public function update_password($otp,$pwd_hash)
    {
      $q=$this->db->where('email_verification_code',$otp)
                 ->get('users');
                
             if($q->num_rows())     
             {
                  $this->db->set('password',$pwd_hash)
                           ->where('email_verification_code',$otp)
                           ->update('users');
                  return true;
             }   
             else
             {
                 return false;
             }
    }
}
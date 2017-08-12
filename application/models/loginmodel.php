<?php
/**
* 
*/
class Loginmodel extends CI_model
{
	public function valid_login($email,$password)
	{
		$q=$this->db->where(['email'=>$email,'password'=>$password])
					->get('Users');
		if($q->num_rows())
		{
			return $q->result();
			//return $r->row()->id;
		}
		else
		{
			return FALSE;
		}
	}
}
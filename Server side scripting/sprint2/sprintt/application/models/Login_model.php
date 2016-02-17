<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

public function login_service($_data)
{
	$json = file_get_contents("php://input");
    $post = json_decode($json, true);
    if(isset($_REQUEST['email'])!=NULL&&isset($_REQUEST['password'])!=NULL)
	 //if (isset($this->input->get_post('email'))&&isset($this->input->get_post('password')))
     {
	 $data['vchr_email'] = $this->input->get_post('email');
	 $data['vchr_password']=$this->input->get_post('password');
	 $this->db->select('*');
		$this->db->from('tbl_login');//select data from tbl_login
		$where=$this->db->where($data);
		$query=$this->db->get();
             if($query->result()!==NULL)
             {
				$this->db->select('*');// select data from tbl_user
				$this->db->from('tbl_user');
		 		$query2=$this->db->get();

				$response= json_encode($query2);
				return($response);
		
              }
			if($query->result()==NULL)
					{
						if(isset($_REQUEST['email'])!=NULL)
						{
							$er=array(["ResponseCode"=>"500","Msg"=>"password is incorrect"]);
   
						}
		 
         				$er = array(["ResponseCode"=>"404","Msg"=>"Email or password is incorrect"]);
   	     				return json_encode($er);
					}
       }       
  //      elseif(isset($_REQUEST['email'])!=NULL)
		// //else if (isset($this->input->get_post('email')))
		// {
		// 	   $data2=$this->input->get_post('email');
		// 		$this->db->from('tbl_login');//select data from tbl_login
		// 		$where=$this->db->where($data2);
		// 		$query=$this->db->get();
				
		// 		$response=json_encode($query);
  //               return($response);

		// 	//
  //               //if(!isset($this->input->get_post('password')))
			
  //               if($_REQUEST['password'])
		// 	{      

  //              $er = array(["ResponseCode"=>"404","Msg"=>"Password is incorrect"]);
  //       	     echo json_encode($er);
  //       	     return $err;

		// 	}
		// }
		else
		{
			echo "unspecified error";
		}


}

}


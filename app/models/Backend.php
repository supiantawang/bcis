<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Model{
    
    function visitor()
    {
        $ip = $this->input->ip_address();
        $dateT = date('Y-m-d');
		$visit = $this->db->where('v_ip',$ip)
                    ->where('v_date',$dateT)
                    ->from("ek_visitor");
        $count = 0;  
        $count=$visit->count_all_results();
        
    	if ($count==0 )
    	{
    	    // Never visited - add
    	    $this->db->insert('ek_visitor', array('v_ip' => $ip,'v_date'=>date('Y-m-d h:i:s')) );
    	}
    }

    function getAuthenticate()
    {

        $result = $this->db->where("u_loginname",$this->input->post('l_uname'))
                            ->where('u_status',1)
                            //->where('u_role IN(1,2,3,4,5)')
                            ->get('ek_admin');
       
        foreach($result->result() as $row)
        {
            //echo "haha".$this->encryption->encrypt('1234');exit;
            //echo $this->encryption->decrypt($row->u_loginpass);exit;
            //l_upass
            //echo $this->input->post('password');exit;
            if($this->encryption->decrypt($row->u_loginpass)==$this->input->post('l_upass'))
            {
            	$expire = "3600";
            	if($this->input->post('remember')=="1")
            	{
            		$expire = (10 * 365 * 24 * 60 * 60);
            	}
                //echo $expire;exit;
		        $this->load->helper('cookie'); 
				    $cookie = array( 
				        'name' => '_userID', 
				        'value' => $row->u_id, 
				        'expire' => $expire,
                        'path'=>'/' 
				    ); 
				    set_cookie($cookie); 
				    
				    $cookie = array( 
				        'name' => '_userName', 
				        'value' => stripslashes($row->u_loginname), 
				        'expire' => $expire,
                        'path'=>'/'  
				    ); 
				    set_cookie($cookie);

				    $cookie = array( 
				        'name' => '_userFName', 
				        'value' => stripslashes($row->u_fullname), 
				        'expire' => $expire,
                        'path'=>'/'  
				    ); 
				    set_cookie($cookie);
                    
                    				    
				    $cookie = array( 
				        'name' => '_loginDateTime', 
				        'value' => date('Y-m-d h:i:s A'), 
				        'expire' => $expire ,
                        'path'=>'/' 
				    ); 
				    set_cookie($cookie); 
		            
		            
				    $cookie = array( 
				        'name' => '_urole', 
				        'value' => $row->u_role, 
				        'expire' => $expire,
                        'path'=>'/'  
				    ); 
				    set_cookie($cookie);
                    
                    
                    $cookie = array( 
    				        'name' => '_session', 
    				        'value' => session_id(), 
    				        'expire' => $expire,
                            'path'=>'/'  
    				    ); 
    				  set_cookie($cookie);

    				$cookie = array( 
    				        'name' => '_cexp', 
    				        'value' => $expire, 
    				        'expire' => $expire,
                            'path'=>'/'  
    				    ); 
    				  set_cookie($cookie);

                $exp = date("Y-m-d H:i:s", time() + $expire);

                 $login = array(   
                    'u_id'=> $row->u_id,
            		'logdate'=> date("Y-m-d H:i:s"),
            		'expired'=> $exp,
            		'logstatus'=> "Y",
                    'logUser'=>$row->u_fullname,
            		'ipAdd' =>  $this->input->ip_address(),
            		'sessionID'=>session_id()	
                 );
                 $this->db->insert('ek_login', $login); 

                // $this->blapps_lib->addEvent("Successfull login"); 
     
		
		       	return 1;
                $rowcount=1;
          	}
          	else
            {
                $login = array(   
                    'u_id'=> $row->u_id,
            		'logdate'=> date("Y-m-d H:i:s"),
            		'logstatus'=> 'F',
                    'logUser'=>$row->u_fullname,
            		'ipAdd' =>  $this->input->ip_address()	
                 );
                 $this->db->insert('ek_login', $login);
                
                return 2;
            }
          	 
             
        }
        
        if($result->num_rows()==0)
            return 3;   
    } 
    
    function checkSessionActive()
    {
    	$result = $this->db->where("u_loginname",get_cookie('_userName'))
                            ->where('u_status',1)
                            ->get('ek_admin');
       
        foreach($result->result() as $row)
        {
        	$cookie = array( 
				        'name' => '_userFName', 
				        'value' => stripslashes($row->u_fullname), 
				        'expire' => get_cookie('_cexp'),
                        'path'=>'/'  
				    ); 
			set_cookie($cookie);

        	$cookie = array( 
				        'name' => '_loginDateTime', 
				        'value' => date('Y-m-d h:i:s A'), 
				        'expire' => get_cookie('_cexp') ,
                        'path'=>'/' 
				    ); 
			set_cookie($cookie); 

			$cookie = array( 
				        'name' => '_urole', 
				        'value' => $row->u_role, 
				        'expire' => get_cookie('_cexp'),
                        'path'=>'/'  
				    ); 
			set_cookie($cookie);

        	$this->blapps_lib->addEvent("Successfull login");
        	return 1;
        }

        if($result->num_rows()==0)
        {
        	$this->db->where('sessionID',get_cookie('_session'))
      					->update("ek_login",array('logstatus'=>'N'));
      					
        	return 2; 
        }            
    }
}



?>
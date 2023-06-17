<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Blapps_lib {

    public function some_function()
    {
        
    }
    
    function getData($required,$table,$column,$cond_id){
       
       $CI =& get_instance();
       if($column!="")
       $CI->db->where($column,$cond_id);
       $result = $CI->db->get($table);
       $row = $result->result();
       
       return $row[0]->$required;
       
   }
   
   function getDataArr($required,$table,$cond,$column=''){
       
       $CI =& get_instance();
       foreach($cond as $cnd)
       {
        $CI->db->where($cnd[0],$cnd[1]);
       }
       $result = $CI->db->select($required)
                        ->get($table);
       $row = $result->result();
       
       if($column)
       return $row[0]->$column;
       else
       return $row[0]->$required;
       
   }
   
   function getDataResult($table,$cond,$like,$order){
       
       $CI =& get_instance();
       foreach($cond as $cnd)
       {
        if(count($cnd)>1)
        $CI->db->where($cnd[0],$cnd[1]);
        else
        $CI->db->where($cnd[0]);
       }
       
       if($like)
        $CI->db->like($like[0],$like[1]);
        
       $result = $CI->db->order_by($order[0],$order[1])
                        ->get($table);
       
       
       $row = $result->result();
       
       return $row;
       
   }
   
   function getDataResultSQL($sql){
       
       $CI =& get_instance();
       $result = $CI->db->query($sql);
              
       $row = $result->result();
       
       return $row;
       
   }
   
   function getDataArray($table,$cond,$like){
       
       $CI =& get_instance();
       foreach($cond as $cnd)
       {
        $CI->db->where($cnd[0],$cnd[1]);
       }
       
       if($like)
        $CI->db->like($like[0],$like[1]);
        
       $result = $CI->db->get($table);
       
       
       $row = $result->row();
       
       return $row;
       
   }
   
   function getData4Listbox($table,$cond,$like,$order,$idr,$valr,$val0)
   {
        $CI =& get_instance();
        if($cond)
        {
            foreach($cond as $cnd)
            {
                $CI->db->where($cnd[0],$cnd[1]);
            }
        
        }
        if($like)
        $CI->db->like($like[0],$like[1]);
        
        $result = $CI->db->order_by($order[0],$order[1])
                         ->get($table);
        
        $data['']=$val0;
        foreach($result->result() as $dt)
        {
            //$dr = eval($idr);
            //$val = eval($valr);
            
            $data[$dt->$idr] = $dt->$valr;
        }
        
        return $data;
   }
   
   function getData4ListboxVal($table,$cond,$like,$order,$idr,$valr)
   {
        $CI =& get_instance();
        foreach($cond as $cnd)
        {
            $CI->db->where($cnd[0],$cnd[1]);
        }
        
        if($like)
        $CI->db->like($like[0],$like[1]);
        
        $result = $CI->db->order_by($order[0],$order[1])
                         ->get($table);
        
        $data['0']='--Please Choose--';
        foreach($result->result() as $dt)
        {
            //$dr = eval($idr);
            //$val = eval($valr);
            
            $data[$dt->$idr] = $dt->$valr;
        }
        
        return $data;
   }
   
   function getDataCount($table,$cond='',$like='',$or=array())
   {
        $CI =& get_instance();
        
        
        if($cond)
        {
            $i=0;
            foreach($cond as $cnd)
            {
                if(count($cnd)>1)
                $CI->db->where($cnd[0],$cnd[1]);
                else
                $CI->db->where($cnd[0]);
                
                //echo count($or);
                if(count($or)>0)
                {
                    if(count($or[$i]))
                    $CI->db->or_where($or[$i][0],$or[$i][1]);
                }
                $i++;
                
            }
        }
        
        if($like)
        {
            foreach($like as $l)
            {
                $CI->db->like($l[0],$l[1]);
            }
        }
        
        $result = $CI->db->from($table)
                        ->get();
        
       //print_r($result);exit;
        return $result->num_rows();
   }
   
   function getSUMCount($column,$table,$cond='')
   {
        $CI =& get_instance();
        
        
        if($cond)
        {
            $i=0;
            foreach($cond as $cnd)
            {
                if(count($cnd)>1)
                $CI->db->where($cnd[0],$cnd[1]);
                else
                $CI->db->where($cnd[0]);
                
               
                $i++;
                
            }
        }
        $columns = explode(",",$column);
        foreach($columns as $sum)
        {
            $CI->db->select_sum($sum);
        }
        
        
        $result = $CI->db->from($table)
                        ->get();
        
       
        return $result->row();
   }
   
   function explodeDate($date,$from,$to)
    {
        if($date)
        {
            $td = explode($from,$date);
            
            return $td[2].$to.$td[1].$to.$td[0];
        }
    }
    
    function explodeDateTime($date,$from,$to)
    {
        if($date)
        {
            $td = explode($from,$date);
            $time = explode(" ", $td[2]);
            return $time[0].$to.$td[1].$to.$td[0]." ".$time[1];
        }
    }
    
        
    function sendMail($to, $subject, $message) {
        $CI = & get_instance();
    
        $config = array(
            'protocol' => strtolower("smtp"),
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_port' => "465",
            'smtp_user' => "sasbmailer@gmail.com", // change it to yours
            'smtp_pass' => "p@55w0rd", // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );                  
        $CI->load->library('email', $config);
        $CI->email->clear();
    
        $CI->email->set_newline("\r\n");
        $CI->email->set_crlf("\r\n");
        $CI->email->from('gogalley@artgallery.gov.my', 'Go Gallery'); // change it to yours
        $CI->email->to($to); // change it to yours
        $CI->email->bcc("supian@simpleadvantage.com");
        $CI->email->subject($subject);
        $CI->email->message($message);
        if (!$CI->email->send()) {
            return $CI->email->print_debugger();
        }
    
        return "";
    }
    
    function formatMoney($number, $fractional=true) { 
        if ($fractional) { 
            $number = sprintf('%.2f', $number); 
        } 
        while (true) { 
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
            if ($replaced != $number) { 
                $number = $replaced; 
            } else { 
                break; 
            } 
        } 
        return $number; 
    }

    function addEvent($event)
    {
    	
    	$CI = & get_instance();
    	$action = array(   
                    'a_user'=> get_cookie('_userID'),
            		'a_date'=> date("Y-m-d h:i:s A"),
            		'a_action'=> $event
                 );
                
        $CI->db->insert('pro_logs', $action); 
    }

    function getAuth()
    {
    	$CI = & get_instance();

    	if($CI->uri->segment(1)!="")
    		$CI->db->where("log_controller",$CI->uri->segment(1));
    	if($CI->uri->segment(2)!="")
    		$CI->db->where("log_function",$CI->uri->segment(2));

    	$check = $CI->db->where("log_access LIKE '%".get_cookie('_urole')."%'")
    					->get("menuaccess");

    	if($check->num_rows()==0)
    	{
    		redirect(base_url()."index.php/welcome/error/403");
    	}

    } 
}

?>
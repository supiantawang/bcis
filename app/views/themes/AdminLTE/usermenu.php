<ul class="sidebar-menu">
    <li class="header">NAVIGASI UTAMA</li>
    <?php
    $menu = $this->blapps_lib->getDataResult("ek_menuaccess",array(array('log_status','A'),array('log_parent',0),array("log_access LIKE '%".get_cookie('_urole')."%'")),'',array('log_order','ASC'));
   // echo $this->db->last_query();exit;
    foreach($menu as $item): 

    	$url = base_url()."index.php/".$item->log_controller;
    	if($item->log_function!="")
    		$url .="/".$item->log_function;

    	$active="";
    	if($this->uri->segment(1)==$item->log_controller && $this->uri->segment(2)==$item->log_function)
    		$active="active";

    	$hasChild = $this->blapps_lib->getDataCount("ek_menuaccess",array(array('log_parent',$item->log_id),array('log_status','A')));
    	if($hasChild>0) :
    		$subMenu = $this->blapps_lib->getDataResult("ek_menuaccess",array(array('log_status','A'),array('log_parent',$item->log_id),array("log_access LIKE '%".get_cookie('_urole')."%'")),'',array('log_order','ASC'));
			
			if($this->uri->segment(2)){
				$checkChild = $this->blapps_lib->getDataResult("ek_menuaccess",array(array('log_status','A'),array('log_parent',$item->log_id),array('log_controller',$this->uri->segment(1)),array('log_function',$this->uri->segment(2))),'',array('log_order','ASC'));
				if($checkChild) $active = "active"; else $active = "";
			}
    		
    	?>
    	<li class="<?php echo $active;?> treeview">
    		<a href="<?php echo $url;?>">
	            <i class="<?php echo $item->log_icon; ?>"></i> <span><?php echo $item->log_name;?></span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
		        <?php foreach($subMenu as $itemChild) : 
		        		$url2 = base_url()."index.php/".$itemChild->log_controller;
				    	if($itemChild->log_function!="")
				    		$url2 .="/".$itemChild->log_function;

				    	$active2="";
				    	if($this->uri->segment(1)==$itemChild->log_controller && $this->uri->segment(2)==$itemChild->log_function)
				    		$active2="active";
		        ?>

		            <li class="<?php echo $active2;?>"><a href="<?php echo $url2;?>" ><i class="<?php echo $itemChild->log_icon; ?>"></i> <?php echo $itemChild->log_name;?></a></li>
		            
		        <?php endforeach;?>
		        </ul>
    	</li>	
    	<?php
    	else:
    	?>
    	<li class="<?php echo $active;?>">
          <a href="<?php echo $url;?>">
            <i class="<?php echo $item->log_icon; ?>"></i> <span><?php echo $item->log_name; ?></span>
            
          </a>
        </li>
    	<?php
    	endif;	
    ?>
    
	<?php endforeach; ?>
	</li>
    <li class="header">TETAPAN AKAUN</li>
	<li <?php if($this->uri->segment(1) == "profile" && $this->uri->segment(2) == "") echo "class='active'"; ?>><a href="<?php echo base_url()?>index.php/profile"><i class="fa fa-circle-o text-red"></i> <span>Profil</span></a></li>
	<li <?php if($this->uri->segment(1) == "profile" && $this->uri->segment(2) == "password") echo "class='active'"; ?>><a href="<?php echo base_url()?>index.php/profile/password"><i class="fa fa-circle-o text-yellow"></i> <span>Tukar Kata Laluan</span></a></li>
	<li><a href="<?php echo base_url();?>index.php/dashboard/logout"><i class="fa fa-circle-o text-aqua"></i> <span>Log Keluar</span></a></li>
</ul>
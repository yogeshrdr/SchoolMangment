        <?php 

		//////////LOADING SYSTEM SETTINGS FOR ALL PAGES AND ACCOUNTS/////////
		$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
		$session	=	$this->db->get_where('settings' , array('type'=>'session'))->row()->description;
		?>
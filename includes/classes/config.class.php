<?php
ob_start();
/*
	filename	:	movie.class.php
	Class Name	:	movie
	Description	:	Handles movie related tasks
*/

class config extends ClassGeneral {

		var $db_connect;
		var $tbl_name;
		
	function __construct(){			
		global $glb_obj_genral;
		$this->db_connect = $glb_obj_genral->db_connect;
	}

	function get_list_all_config(){
		$artist_list_all = $this->db_connect->querySelect("CALL artist_list_all_gift()");		
		$this->db_connect->closedb();
		return $artist_list_all;	 
	}
}
?>

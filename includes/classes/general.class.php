<?php

// -------------------------------------------------------------------------------------------------------------------
// file name   : general.class.php 
// description : class to handle informations
//
// copyright(c), Inside Right, 2008-2009, all rights reserved.
//
// author: DotCom Infoway 
// last update: 21-01-2009
// -------------------------------------------------------------------------------------------------------------------

class ClassGeneral	{
	
	// ---------------------------------------------------------------------------------------------------------------
	// member declaration
	// ---------------------------------------------------------------------------------------------------------------
		
	var $tbl_admin = "";
	
	// internal use only  
	var $db_hostname = "localhost";
	var $db_username = "";
	var $db_password = "";
	var $db_name = "";
	var $db_connect = "";
	
	 
		 
		
	// ---------------------------------------------------------------------------------------------------------------
	// Database initialisation
	// ---------------------------------------------------------------------------------------------------------------
		
		// ---------------------------------------------------------------------------------------------------------------
		// function: initdb ( -- arguments -- )
		// ---------------------------------------------------------------------------------------------------------------
		// purpose:			method to initialize database connection.
		// arguments:		$username, $pwd, $db, $host
		// returns/assigns:	none
		// ---------------------------------------------------------------------------------------------------------------
		
		function initdb( $username, $pwd, $db, $host='localhost' ) {
			
			$this->db_hostname = $host;
			$this->db_username = $username;
			$this->db_password = $pwd;
			$this->db_name = $db;
			
			$this->db_connect = new database( 
				$this->db_username, 
				$this->db_password, 				 
				$this->db_hostname
			);
			 
			
		}

    // ---------------------------------------------------------------------------------------------------------------
		// function: createThumbnail ( -- arguments -- )
		// ---------------------------------------------------------------------------------------------------------------
		// purpose:			create Thumbnail image.
		// arguments:		$imageDirectory, $imageName, $thumbDirectory,$thumbheight,$thumbWidth
		// returns/assigns:	None
		// ---------------------------------------------------------------------------------------------------------------
	 
    function createThumbnail($imageDirectory, $imageName, $thumbDirectory,$thumbheight,$thumbWidth)
    {
       if (!file_exists( $thumbDirectory."/".$imageName))
        {
            $img="$imageDirectory/$imageName";
            $srcImg = imagecreatefromjpeg("$imageDirectory/$imageName");
            $srcsize = getimagesize($img);
            $origWidth = imagesx($srcImg);
            $origHeight = imagesy($srcImg);
            $dest_x = $thumbWidth;
            $dest_y=$thumbheight;
            $dst_img = imagecreatetruecolor($dest_x, $dest_y);
            imagecopyresampled($dst_img, $srcImg, 0, 0, 0, 0, $dest_x, $dest_y, $srcsize[0], $srcsize[1]);
            imagejpeg($dst_img, "$thumbDirectory/$imageName");
        }
    }

	

       
       
        

}

?>
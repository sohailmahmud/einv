<?php 
require_once('../database/Database.php');
require_once('../interface/iOffice.php');
class Office extends Database implements iOffice{
	
	public function get_offices()
	{
		$sql = "SELECT * FROM tbl_off";
		
		return $this->getRows($sql);
	}
}

$office = new Office();
<?php
require_once('../database/Database.php');
require_once('../interface/iPosition.php');
class Position extends Database implements iPosition {

	public function get_positions()
	{
		$sql = "SELECT *
				FROM tbl_pos;
			";
		return $this->getRows($sql);
	}

	public function delete_position($pid)
	{
		$sql = "DELETE FROM `tbl_pos` WHERE pos_id = ?";
		return $this->deleteRow($sql, [$pid]);
	}

	public function get_position($pid)
	{
		$sql = "SELECT * FROM tbl_pos WHERE pos_id = ?";
		return $this->getRow($sql, [$pid]);
	}

	public function update_position($pid, $desc)
	{
		$sql = "UPDATE tbl_pos 
				SET pos_desc = ?
				WHERE pos_id = ?;
		";
		return $this->updateRow($sql, [$desc, $pid]);
	}
}

$position = new Position();

/* End of file Positions.php */
/* Location: .//D/xampp/htdocs/deped/class/Positions.php */
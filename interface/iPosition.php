<?php 
interface iPosition{
	public function get_positions();
	public function delete_position($pid);
	public function get_position($pid);
	public function update_position($pid, $desc);
}
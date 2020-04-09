<?php 
interface iRequest{
	public function my_session_start();
	public function set_item_id($item_id);
	public function get_item_id();
	public function new_request($iID, $pur);
	public function all_owners_request();
	public function request_done($item_id);
	public function all_request_from_admin();
	public function update_request($req_id, $status, $item_id, $req_type);

}
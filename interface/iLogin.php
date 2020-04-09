<?php 
interface iLogin{
	public function set_un_pwd($username, $password);
	public function check_user();
	public function get_user_id();
	public function user_session();
	public function user_logout();
}


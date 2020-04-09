<?php 
require_once('../database/Database.php');
require_once('../interface/iLogin.php');

class Login extends Database implements iLogin {
	
	private $username;
	private $password;

	public function __construct()
	{
		parent:: __construct();
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();//start session if session not start
		}
	}

	public function set_un_pwd($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}	
	
	public function check_user()
	{
		//$type = 1;//1 = user 2 = admin if wala ge change ang db value
		$at_deped = 1;//1 if he or she is still working at deped
		$sql = "SELECT *
				FROM tbl_employee
				WHERE emp_un = ?
				AND emp_pass = ?
				AND emp_at_deped = ?
		";
		$result = $this->getRow($sql, [$this->username, $this->password, $at_deped]);
		return $result;

	}

	public function get_user_id()
	{
		$type = 1;//1 = user 2 = admin if wala ge change ang db value
		$at_deped = 1;//1 if he or she is still working at deped
		$sql = "SELECT emp_id
				FROM tbl_employee
				WHERE emp_un = ?
				AND emp_pass = ?
				AND type_id = ?
				AND emp_at_deped = ?
		";
		$result = $this->getRow($sql, [$this->username, $this->password, $type, $at_deped]);
		return $result;
	}

	public function user_session()
	{
		if(!isset($_SESSION['user_logged_in'])){
			header('location: ../index.php');
		}
	}

	public function user_logout()
	{
		unset($_SESSION['user_logged_in']);
		header('location: ../index.php');
	}



	public function admin_session()
	{
		if(!isset($_SESSION['admin_logged_in'])){
			header('location: ../index.php');
		}
	}

	public function admin_logout()
	{
		unset($_SESSION['admin_logged_in']);
		header('location: ../index.php');
	}


	public function admin_data()
	{
		/*get admin user and password through session id*/
		$at_deped = 1;//1 means naa pa siya ga work sa deped other wise wala na
		$id = $_SESSION['admin_logged_in'];//session na store pag login sa admin
		$sql = "SELECT *
				FROM tbl_employee 
				WHERE emp_id = ?
				AND emp_at_deped = ?
		";
		return $this->getRow($sql, [$id, $at_deped]);

	}



}

$login = new Login();

/* End of file Login.php */
/* Location: .//D/xampp/htdocs/deped/class/Login.php */


<?php 
require_once('../database/Database.php');
require_once('../interface/iEmployee.php');


class Employee extends Database implements iEmployee {
	public function __construct()
	{
		parent:: __construct();
	
	}

	public function my_session_start()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();//start session if session not start
		}
	}

	public function insert_employee($fN, $mN, $lN, $pos, $off, $type)
	{
		$un = $fN.'_'.$lN;
		$pass = $fN.'_'.$lN; $pass = md5($pass);
		$fN = ucwords($fN);
		$mN = ucwords($mN);
		$lN = ucwords($lN);
		$sql = "INSERT INTO tbl_employee
				(emp_fname, emp_mname, emp_lname, pos_id, off_id, type_id, emp_un, emp_pass)
				VALUES(?, ?, ?, ?, ?, ?, ?, ?);
				";
		return $this->insertRow($sql, [$fN, $mN, $lN, $pos, $off, $type, $un, $pass]);
	}

	public function update_employee($fN, $mN, $lN, $pos, $off, $type, $eid)
	{
		$sql = "UPDATE tbl_employee
				SET emp_fname = ?, emp_mname = ?, emp_lname = ?, pos_id = ?, off_id = ?, type_id = ?
				WHERE emp_id = ?;
		";
		return $this->updateRow($sql, [$fN, $mN, $lN, $pos, $off, $type, $eid]);
	}

	public function get_employee($emp_id)
	{
		$sql = "SELECT * 
					FROM tbl_employee e
					INNER JOIN tbl_pos p
					ON e.pos_id = p.pos_id
					INNER JOIN tbl_off o 
					ON e.off_id = o.off_id 
					INNER JOIN tbl_emp_type t 
					ON e.type_id = t.type_id
					WHERE e.emp_id = ?
					ORDER BY e.emp_fname;
			";
		return $this->getRow($sql, [$emp_id]);
	}

	public function get_employees($inner_joined = false)
	{
		$still_work_here = true;
		if(!$inner_joined){
			$sql = "SELECT * 
					FROM tbl_employee
					WHERE emp_at_deped = ?
					ORDER BY emp_fname;
			";
			return $this->getRows($sql, [$still_work_here]);
		}else{
			//get all including FK
			$sql = "SELECT * 
					FROM tbl_employee e
					INNER JOIN tbl_pos p
					ON e.pos_id = p.pos_id
					INNER JOIN tbl_off o 
					ON e.off_id = o.off_id 
					INNER JOIN tbl_emp_type t 
					ON e.type_id = t.type_id
					WHERE e.emp_at_deped = ?
					ORDER BY e.emp_fname;
			";
			return $this->getRows($sql, [$still_work_here]);
		}
	}
		
	public function employee_positions()
	{
		$sql = "SELECT * FROM tbl_pos;";
		return $this->getRows($sql);
	}

	public function employee_offices()
	{
		$sql = "SELECT * FROM tbl_off;";
		return $this->getRows($sql);
	}

	public function employee_account_types()
	{
		$sql = "SELECT * FROM tbl_emp_type;";
		return $this->getRows($sql);
	}

	public function employee_remove_undo($at_deped, $eid)
	{	
		$sql = "UPDATE tbl_employee 
				SET emp_at_deped = ?
				WHERE emp_id = ?;
		";
		return $this->updateRow($sql, [$at_deped, $eid]);
	}

	public function insert_employee_position($position)
	{
		$sql = "INSERT INTO tbl_pos(pos_desc)
				VALUES(?);
		";
		return $this->insertRow($sql, [$position]);
	}

	public function insert_employee_office($office)
	{
		$sql="INSERT INTO tbl_off(off_desc)
			  VALUES(?);
			";
		return $this->insertRow($sql, [$office]);
	}

	public function change_employee_password($id, $un, $pwd)
	{
		$sql = "UPDATE tbl_employee
				SET emp_un = ?, emp_pass = ?
				WHERE emp_id = ?;
		";
		return $this->updateRow($sql, [$un, $pwd, $id]);
	}

	public function item_owned()
	{
		/*
		*this function select all the user login owned items 
		* 3 or Condemed
		*/
		$condition = 1;
		$status = 4;//must = to none then then display.. if not display sa request nga TAB sa dashboard
		$this->my_session_start();
		$uid = $_SESSION['user_logged_in'];
		$sql = "SELECT *
				FROM tbl_item i
				INNER JOIN tbl_cat c 
				ON i.cat_id = c.cat_id 
				INNER JOIN tbl_con co 
				ON i.con_id = co.con_id
				INNER JOIN tbl_item_status s
				ON i.status_id = s.status_id
				WHERE i.emp_id = ?
				AND i.con_id = ?
				AND i.status_id = ?
		";
		$result = $this->getRows($sql, [$uid, $condition, $status]);
		return $result;
	}

	public function update_admin_data($un, $pass)
	{
		//id of admin naa sa session
		$this->my_session_start();
		$id = $_SESSION['admin_logged_in'];
		$pass = md5($pass);
		$sql = "UPDATE tbl_employee
				SET emp_un = ?, emp_pass = ?
				WHERE emp_id = ?;
			";
		return $this->insertRow($sql, [$un, $pass, $id]);
	}//end update_admin
}

$employee = new Employee();

/* End of file Employee.php */
/* Location: .//D/xampp/htdocs/deped/class/Employee.php */
 ?>
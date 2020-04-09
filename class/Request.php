<?php
require_once('../database/Database.php');
require_once('../interface/iRequest.php');
class Request extends Database implements iRequest {

	private $item_id;

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

	public function set_item_id($item_id)
	{
		$this->item_id = $item_id;
	}

	public function get_item_id()
	{
		return $this->item_id;
	}

	public function new_request($iID, $pur)
	{
		$date = date("Y-m-d"); //year month day
		$sql = "INSERT INTO tbl_request(req_date, item_id, req_type_id)
				VALUES(?, ?, ?);
		";
		$sql2= "UPDATE tbl_item
				SET status_id = ?
				WHERE item_id = ?;
		";
		$this->Begin();
		 	$this->insertRow($sql, [$date, $iID, $pur]);
		 	$this->updateRow($sql2, [$pur, $iID]);
		$this->Commit();
	 	return true;

	}

	public function all_owners_request()
	{
		$this->my_session_start();//start session
		//owners_id is the employee's ID store in session
		$owners_id = $_SESSION['user_logged_in'];
		// $owners_id = $owners_id['emp_id'];

		$request_is_done = 0;//display only those requesst which is not done or = 0;
		$sql = "SELECT * 
				FROM tbl_request r
				INNER JOIN tbl_item i 
				ON r.item_id = i.item_id
				INNER JOIN tbl_employee e  
				ON i.emp_id = e.emp_id
				INNER JOIN tbl_req_type rt 
				ON r.req_type_id = rt.req_type_id
				INNER JOIN tbl_req_status rs 
				ON r.req_status_id = rs.req_status_id
				WHERE e.emp_id = ?
				AND r.req_is_done = ?;
		";
		return $this->getRows($sql, [$owners_id, $request_is_done]);
	}

	public function request_done($item_id)
	{
		//update item
		//update request

		$status = 4;/// 4 is the default id for item that has not request
		$request_is_done = 1;//done para dili na siya ma view sa owners current request

		//update item
		$sql = "UPDATE tbl_item
				SET status_id= ?
				WHERE item_id = ?;
		";

		$sql2 = "UPDATE tbl_request
				 SET req_is_done = ?
				 WHERE item_id = ?
		";

		$return;
		try {
			$this->Begin();
				$this->updateRow($sql, [$status, $item_id]);
				$this->updateRow($sql2, [$request_is_done, $item_id]);
			$this->Commit();
			$return = true;
		} catch (Exception $e) {
			$return = false;
		}//end tryCatch
		
		return $return;
	}

	public function all_request_from_admin()
	{
		//display all pending request OR where req_status_id is pending
		$status_id = 1;//1 means pending pa siya
		$sql = "SELECT *
				FROM tbl_request r 
				INNER JOIN tbl_item i 
				ON r.item_id = i.item_id
				INNER JOIN tbl_employee e 
				ON i.emp_id = e.emp_id
				INNER JOIN tbl_req_type rt 
				ON r.req_type_id = rt.req_type_id
				WHERE r.req_status_id = ?
				ORDER BY r.req_id
		";
		$result = $this->getRows($sql, [$status_id]);
		return $result;
	}

	public function update_request($req_id, $status, $item_id, $req_type)
	{
		if($req_type == 'condemed'){
			$con_id = 2;//2 means condemed na siya kay ge approved ang request.
			$query = "UPDATE tbl_item
					  SET con_id = ?
					  WHERE item_id = ?
			";
			if(!$this->updateRow($query, [$con_id, $item_id])){
				return false;
			}
		}

		$sql = "
				UPDATE tbl_request 
				SET req_status_id = ?
				WHERE req_id = ?
		";
		$result = $this->updateRow($sql, [$status, $req_id]);
		return $result;
	}



}

$request = new Request();

/* End of file Request.php */
/* Location: .//D/xampp/htdocs/deped/class/Request.php */



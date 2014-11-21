<?php
	include_once 'mysql_db.php';

	class Authenticator {
		private $db;

		public function __construct(){
			$this->db = new MysqlDb();
		}

		public function login($username, $password){
			$user = $this->get_user($username);
			if($user['password'] == $password){
				session_start();
				$_SESSION['current_user'] = array('username' => $user['name'], 'id' => $user['id']);
				return true;
			}

			return false;
		}

		private function get_user($username){
			$sql = "select * from users where name = '$username'";
			$results = $this->db->query($sql);
			if($results){
				return $results->fetch_assoc();
			}
		}

	}
?>

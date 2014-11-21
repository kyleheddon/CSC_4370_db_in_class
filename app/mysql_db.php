<?php
	include_once 'db_config.php';

	class MysqlDb{
		private $connection;
		private $debug_log = '';

		public function __construct(){
			$this->connection = $this->connect_to_db();
		}

		public function query($sql){
			$this->debug($sql);
			return $this->connection->query($sql);
		}

		public function get_debug(){
			return $this->debug_log;
		}

		private function connect_to_db(){
			$db_credentials = get_mysql_credentials();
			return new mysqli('localhost', $db_credentials['username'], $db_credentials['password'], $db_credentials['username']);
		}

		private function debug($str){
			$this->debug_log .= "$str \n";
		}

	}
?>

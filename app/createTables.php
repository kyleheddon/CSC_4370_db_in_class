<?php
	include 'db_config.php';

	class TableCreator {
		private $connection;
		private $debug_log = '';

		public function __construct(){
			$this->connection = $this->connect_to_db();
		}

		public function create_tables(){
			$this->create_table('users', array('name', 'password'));
			$this->create_table('artists', array('name'));
			$this->create_table('albums', array('name', 'year', 'media_types'));

			$this->insert_a_user('general', 'password');
			$this->insert_a_user('kyle', '1337');
			$this->insert_a_user('andres', '1337');
		}

		public function get_debug(){
			return $this->debug_log;
		}

		private function create_table($table_name, $columns){
			if(!$this->table_exists($table_name)){
				$create_columns_sql = $this->create_columns_sql($columns);
				$sql = "create table $table_name ($create_columns_sql);";
				$this->query($sql);
			}
		}

		private function insert_a_user($username, $password){
			if($this->user_exists($username)){
				$this->debug("user, $username, exists");
				return;
			}

			$sql = "insert into users (name, password) values('$username', '$password');";
			$this->query($sql);
		}

		private function user_exists($username){
			$sql = "select exists(select 1 from users where name = '$username');";
			$result = $this->query($sql)->fetch_array();
			return $result[0];
		}

		private function table_exists($table_name){
			$result = $this->query("DESCRIBE $table_name");
			return $result != false;
		}

		private function create_columns_sql($columns){
			$column_sqls = array('id int(6) unsigned auto_increment primary key');

			foreach($columns as $column){
				$column_sqls[] = "$column varchar(30) not null";
			}

			return implode(', ', $column_sqls);
		}

		private function connect_to_db(){
			$db_credentials = get_mysql_credentials();
			return new mysqli('localhost', $db_credentials['username'], $db_credentials['password'], $db_credentials['username']);
		}

		private function debug($str){
			$this->debug_log .= "$str \n";
		}

		private function query($sql){
			$this->debug($sql);
			return $this->connection->query($sql);
		}
	}

?>

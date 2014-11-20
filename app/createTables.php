<?php
	include 'db_config.php';

	class TableCreator {
		private $connection;

		public function __construct(){
			$this->connection = $this->connect_to_db();
		}

		public function create_tables(){
			$this->create_table('users', array('name', 'password'));
			$this->create_table('artists', array('name'));
			$this->create_table('albums', array('name', 'year', 'media_types'));
		}

		private function create_table($table_name, $columns){
			if(!$this->table_exists($table_name)){
				$create_columns_sql = $this->create_columns_sql($columns);
				$sql = "create table $table_name ($create_columns_sql);";
				$this->connection->query($sql);
			}
		}

		private function table_exists($table_name){
			return $this->connection->query("DESCRIBE `table`");
		}

		private function create_columns_sql($columns){
			$column_sqls = array('id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY');

			foreach($columns as $column){
				$column_sqls[] = "$column VARCHAR(30) NOT NULL";
			}

			return implode(', ', $column_sqls);
		}

		private function connect_to_db(){
			$db_credentials = get_mysql_credentials();
			return new mysqli('localhost', $db_credentials['username'], $db_credentials['password'], $db_credentials['username']);
		}
	}

	$tableCreator = new TableCreator();
	$tableCreator->create_tables();
?>

<?php
	include_once 'mysql_db.php';
	include_once 'lib/album.php';

	class Artist {
		private $db;
		public $name;
		public $id;

		public function __construct($values){
			$this->db = new MysqlDb();
			$this->name = $values['name'];
			$this->id = $values['id'];
		}

		public function create(){
			$sql = "insert into artists (name) values ('$this->name')";
			$this->db->query($sql);

			return true;
		}

		public function get_albums(){
			return Album::find_by_artist_id($this->id);
		}

		public static function get_all(){
			$sql = "select * from artists";
			$result = Artist::query($sql);
			if($result) {
				return Artist::convert_result_to_artists($result);
			}

			return array();
		}

		public static function find($wheres){
			$wheres_sql = Artist::get_wheres_sql($wheres);
			$sql = "select * from artists where $wheres_sql";
			$result = Artist::query($sql);

			if($result){
				return Artist::convert_result_to_artists($result);
			}

			return array();
		}

		public static function find_by_id($id){
			$sql = "select * from artists where id = $id";
			$result = Artist::query($sql);
			if($result){
				$artists = Artist::convert_result_to_artists($result);
				return $artists[0];
			}
		}

		private static function convert_result_to_artists($result){
			$artists = array();
			while ($row = $result->fetch_assoc()) {
				$artists[] = new Artist($row);
			}
			return $artists;
		}

		private static function get_wheres_sql($wheres){
			$wheres_sql_arr = array();
			foreach($wheres as $key => $value){
				$wheres_sql_arr[] = "lower ($key) like '%$value%'";
			}
			return implode(' and ', $wheres_sql_arr);
		}

		private static function query($sql){
			$db = new MysqlDb();
			return $db->query($sql);
		}

	}
?>

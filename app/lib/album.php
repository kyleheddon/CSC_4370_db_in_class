<?php
	include_once 'mysql_db.php';

	class Album {
		private $db;
		public $id;
		public $name;
		public $year;
		public $media_types;
		public $artist_id;

		public function __construct($values){
			$this->db = new MysqlDb();

			$this->id = isset($values['id']) ? $values['id'] : null;
			$this->name = $values['name'];
			$this->year = $values['year'];
			$this->media_types = $values['media_types'];
			$this->artist_id = $values['artist_id'];
		}

		public function create(){
			$sql = "insert into albums (name, year, media_types, artist_id) values ('$this->name', '$this->year', '$this->media_types', $this->artist_id);";
			$this->db->query($sql);

			return true;
		}

		public static function find($wheres){
			$wheres_sql = Album::get_wheres_sql($wheres);
			$sql = "select * from artists where $wheres_sql";
			$result = Album::query($sql);

			if($result){
				return Album::convert_result_to_artists($result);
			}

			return array();
		}

		public static function find_by_artist_id($artist_id){
			$sql = "select * from albums where artist_id = $artist_id";
			$result = Album::query($sql);

			if($result){
				return Album::convert_result_to_albums($result);
			}

			return array();
		}

		private static function convert_result_to_albums($result){
			$albums = array();
			while ($row = $result->fetch_assoc()) {
				$albums[] = new Album($row);
			}
			return $albums;
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

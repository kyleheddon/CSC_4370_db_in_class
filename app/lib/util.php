<?php
	function fetch_post_var($key){
		if(isset($_POST[$key])){
			$value = trim(mysql_escape_string($_POST[$key]));
			return $value == '' ? null : $value;
		}
	}

	function fetch_get_var($key){
		if(isset($_GET[$key])){
			$value = trim(mysql_escape_string($_GET[$key]));
			return $value == '' ? null : $value;
		}
	}

	function redirect_to($location){
		header("Location: ./$location");
	}
?>

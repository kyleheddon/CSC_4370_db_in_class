<?php
	function get_post_var($key){
		if(isset($_POST[$key])){
			$value = trim(mysql_escape_string($_POST[$key]));
			return $value == '' ? null : $value;
		}
	}
?>

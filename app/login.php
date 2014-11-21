<?php
	include_once 'lib/util.php';
	include 'lib/authenticator.php';

	function login($username, $password){
		$authenticator = new Authenticator();
		if($authenticator->login($username, $password)){
			redirect_to('./');
		}
	}

	$username = fetch_post_var('username');
	$password = fetch_post_var('password');
	if($username && $password){
		login($username, $password);
	}
?>

<?php
	$page_title = 'Login';
	include 'header.php';
?>
	<div class="login">
		<form method="post">
				<label>
					Username
					<input type="text" name="username" value="<?php echo $username; ?>" />
				</label>
				<label>
					Password
					<input type="password" name="password" />
				</label>

				<input type="submit" value="submit" />
		</form>
	</div>
<?php include 'footer.php'; ?>

<?php
	$page_title = 'New Album';
	include 'header.php';
	include_once 'lib/artist.php';
	include_once 'lib/album.php';

	function implode_media_types(){
		$cd = fetch_post_var('media_type_cd');
		$tape = fetch_post_var('media_type_tape');
		$dvd = fetch_post_var('media_type_dvd');

		$media_types = array();
		if($cd) $media_types[] = 'cd';
		if($tape) $media_types[] = 'tape';
		if($dvd) $media_types[] = 'dvd';

		return implode(';', $media_types);
	}

	$artists = Artist::get_all();

	$artist_id = fetch_post_var('artist_id');
	if(!$artist_id){
		$artist_id = fetch_get_var('artist_id');
	}
	$name = fetch_post_var('name');
	$year = fetch_post_var('year');

	if($name && $artist_id && $year){
		$media_types = implode_media_types();

		$album = new Album(array('name' => $name, 'year' => $year, 'artist_id' => $artist_id, 'media_types' => $media_types));

		if($album->create()){
			redirect_to("artist.php?id=$artist_id");
		}
	}

?>
	<h1>Create New Album</h1>
	<form method="post">
		<label>
			Artist:
			<select>
				<?php foreach($artists as $artist) { ?>
					<option value="<?php echo $artist->id; ?>" <?php if($artist_id == $artist->id) echo 'selected'; ?>>
						<?php echo $artist->name; ?>
					</option>
				<?php } ?>
			</select>
		</label>
		<label>
			Album Name:
			<input class="large" type="text" name="name" />
		</label>
		<label>
			Year:
			<input type="text" maxlength="4" name="year" />
		</label>
		<div class="checkbox-group">
			Media Types:
			<label>
				CD
				<input type="checkbox" name="media_type_cd" />
			</label>
			<label>
				Tape
				<input type="checkbox" name="media_type_tape" />
			</label>
			<label>
				DVD
				<input type="checkbox" name="media_type_dvd" />
			</label>
		</div>
		<input type="submit" />
	</form>
	<a href="index.php">Search</a>
<?php include 'footer.php'; ?>

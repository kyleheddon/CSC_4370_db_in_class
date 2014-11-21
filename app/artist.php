<?php
	include 'header.php';
	include_once 'lib/artist.php';
	include_once 'lib/album.php';

	$id = fetch_get_var('id');
	$artist = Artist::find_by_id($id);
	$albums = $artist->get_albums();
?>

<h1><?php echo $artist->name; ?></h1>

<?php if(count($albums) > 0) { ?>
	<h2>Albums</h2>
	<?php foreach($albums as $album){ ?>

		<div class="album">
			<div class="name">
				<b>Name</b>
				<?php echo $album->name; ?>
			</div>
			<div class="year">
				<b>Year</b>
				<?php echo $album->year; ?>
			</div>
			<div class="media-types">
				<b>Media Types</b>
				<ul>
					<?php foreach(explode(';', $album->media_types) as $media_type){ ?>
						<li><?php echo $media_type; ?></li>
					<?php } ?>
				</ul>
			</div>
		</div>

	<?php } ?>
	<h3><a href="new_album.php?artist_id=<?php echo $id; ?>">Add More Albums</a></h3>

<?php } else { ?>
	<h2>No Albums</h2>
	<h3><a href="new_album.php?artist_id=<?php echo $id; ?>">Create one now</a></h3>
<?php } ?>
<a href="index.php">Search</a>
<?php include 'footer.php'; ?>

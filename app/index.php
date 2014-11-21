<?php
  include_once 'lib/artist.php';
  include_once 'lib/album.php';

  $page_title = 'Home';
  include 'header.php';

  $keywords = fetch_get_var('keywords');
?>
  <h1>Search</h1>
  <form>
      <label>Enter Artist or Album Name:
        <input class="search" type="text" name="keywords" value="<?php echo $keywords; ?>" />
      </label>
      <input class="go" type="submit" value="GO!">
  </form>

  <a href="new_artist.php">Create Artist</a>
  <a href="new_album.php">Create Album</a>

<?php
  if($keywords){
    $artists = Artist::find(array( 'name' => $keywords ));
    $albums = Album::find(array( 'name' => $keywords ));
?>
  <div class="results">
    <?php if(count($artists) > 0 || count($albums) > 0){ ?>

      <h2>Results</h2>
      <h3>Artists</h3>
      <?php foreach($artists as $artist){ ?>
        <div class="artist">
          <a href="artist.php?id=<?php echo $artist->id; ?>"><?php echo $artist->name; ?></a>
        </div>
      <?php } ?>

      <h3>Albums</h3>
      <?php foreach($albums as $album){ ?>
        <div class="album">
          <div class="name">
            <b>Name</b>
            <?php
              $artist = $album->get_artist();
            ?>
            <a href="artist.php?id=<?php echo $album->artist_id; ?>"><?php echo "$album->name, by $artist->name"; ?></a>
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
    <?php } else { ?>

      <h2>No matches</h2>

    <?php } ?>
  </div>
<?php } ?>

<?php include 'footer.php'; ?>

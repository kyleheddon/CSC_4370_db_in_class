<?php
  include 'lib/artist.php';

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
?>
  <div class="results">
    <?php if(count($artists) > 0){ ?>

      <h2>Results</h2>
      <?php foreach($artists as $artist){ ?>
        <div class="artist">
          <a href="artist.php?id=<?php echo $artist->id; ?>"><?php echo $artist->name; ?></a>
        </div>
      <?php } ?>

    <?php } else { ?>

      <h2>No matches</h2>
    
    <?php } ?>
  </div>
<?php } ?>

<?php include 'footer.php'; ?>

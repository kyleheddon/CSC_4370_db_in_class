<?php
  $page_title = 'New Artist';
  include 'header.php';
  include 'lib/artist.php';

  $artist_name = fetch_post_var('artist_name');
  if($artist_name){
    $artist = new Artist(array('name' => $artist_name));
    if($artist->create()){
      redirect_to("?keywords=$artist_name");
    }
  }
?>
  <h1>Create New Artist</h1>
  <form method="post">
    <p class="label"></p>
    <label>
      Artist Name:
      <input class="large" type="text" name="artist_name" value="<?php echo $artist_name; ?>" />
    </label>
    <input type="submit">
  </form>
  <a href="index.php">Search</a>
<?php include 'footer.php'; ?>

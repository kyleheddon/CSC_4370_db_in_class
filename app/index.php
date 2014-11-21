<?php
  $page_title = 'Home';
  include 'header.php';
?>
  <h1>Search</h1>
  <a href="#">enter new record</a>
  <form method="post">
      <label>Enter Artist or Album Name:
        <input class="search" type="text" name="keywords">
      </label>
      <input class="go" type="submit" value="GO!">
  </form>
<?php include 'footer.php'; ?>

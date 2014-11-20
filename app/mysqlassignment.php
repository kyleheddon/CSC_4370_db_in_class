<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container_form">
            <form>
                <h2>Create New Artist</h2>
                <p class="label">Artist Name:</p>
                <input class="large" type="text" name="artist_name">
                <input type="submit">

            </form>

            <form>
                <h2>Create New Album</h2>
                <p class="label">Album Name:</p>
                <input class="large" type="text" name="album_name">
                <p class="label">Year:</p>
                <input type="text" maxlength="4" name="year">
                <p class="label">Media Type</p>
                <select name="media_type">
                    <option>CD</option>
                    <option>Tape</option>
                    <option>Cassette</option>
                </select>
                <input type="submit">
            </form>
        </div>
        <div class="container">
            <a href="search.php">Search Records</a>
        </div>


        <?php
        ?>
    </body>
</html>

<?php
include_once '../db.php';

if (isset($_POST['btn-save'])) {
  // variables for input data
  $name = $_POST['name'];
  $lyrics = $_POST['lyrics'];
  $artist_id = $_POST['artist_id'];
  $album_id = $_POST['album_id'];
  $year = $_POST['year'];
  $songfile = $_FILES["songfile"]["name"];
  $file_name = $_FILES["songfile"]["name"];
  $file_tmp = $_FILES["songfile"]["tmp_name"];
  if ($file_name != '') {
    move_uploaded_file($file_tmp, "uploads/" . $file_name);
    }
  // variables for input data

  // sql query for inserting data into database

  $sql_query = "INSERT INTO music (`name`,`lyrics`,`artist_id`,`album_id`,`year`,`songfile`) VALUES('" . $name . "','" . $lyrics . "','" . $artist_id . "','" . $album_id . "','" . $year . "','" . $songfile . "')";
  // sql query for inserting data into database

  // sql query execution function
  if (mysqli_query($con, $sql_query)) {
    ?>
    <script type="text/javascript">
      alert('music added Successfully ');
      window.location.href = 'indexmusic.php';
    </script>
    <?php
    } else {
    ?>
    <script type="text/javascript">
      alert('error occured while inserting your data');
    </script>
    <?php
    }
  // sql query execution function
  }
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../assets/js/scripts.js" type="text/javascript"></script>
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

  <div class="container">
    <div class="table-responsive">
      <form method="post" enctype="multipart/form-data">
        <?php
        $artistssql = "SELECT id, name FROM artist";
        $artistresults = $con->query($artistssql);
        ?>
        <table class="table table-striped">
          <tr>
            <td align="center"><a href="indexmusic.php">back to main page</a></td>
          </tr>
          <tr>
            <td>
              <label for="name" class="form-label">Name:</label>
            </td>
            <td>
              <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
            </td>
          </tr>
          <tr>
            <td>
              <label for="lyrics">Lyrics</label>
            </td>
            <td>
              <textarea class="form-control" id="lyrics" name="lyrics"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <label for="artist_id">Artist</label>
            </td>
            <td>
              <select class="form-control" id="artist_id" name="artist_id">
                <option value=""></option>
                <?php
                foreach ($artistresults as $artist) {
                  echo '<option value="' . $artist['id'] . '">' . $artist['name'] . '</option>';
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="album_id">Album</label>
            </td>
            <td>
              <select class="form-control" id="album_id" name="album_id">
                <option value=""></option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="year" class="form-label">Year:</label>
            </td>
            <td>
              <input type="text" class="form-control" id="year" name="year" required placeholder="Year">
            </td>
          </tr>
          <tr>
            <td>
              <label for="songfile" class="form-label">Songfile:</label>
            </td>
            <td>
              <input type="file" class="form-control" id="songfile" name="songfile" required placeholder="Songfile">
            </td>
          </tr>

          <tr>
            <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>

</html>
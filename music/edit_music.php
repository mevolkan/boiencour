<?php
include_once '../db.php';

if (isset($_GET['edit_id'])) {
  $sql_query = "SELECT * FROM music WHERE id=" . $_GET['edit_id'];
  $result_set = mysqli_query($con, $sql_query);
  $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
  }
if (isset($_POST['btn-update'])) {
  // variables for input data

  $name = $_POST['name'];

  $lyrics = $_POST['lyrics'];

  $artist_id = $_POST['artist_id'];

  $album_id = $_POST['album_id'];

  $year = $_POST['year'];

  if ($_FILES["songfile"]["name"] == '') {
    $songfile = $fetched_row['songfile'];
    } else {
    $songfile = $_FILES["songfile"]["name"];
    $file_name = $_FILES["songfile"]["name"];
    $file_tmp = $_FILES["songfile"]["tmp_name"];
    if ($file_name != '') {
      move_uploaded_file($file_tmp, "uploads/" . $file_name);

      }
    }
  // variables for input data

  // sql query for update data into database
  $sql_query = "UPDATE music SET `name`='$name',`lyrics`='$lyrics',`artist_id`='$artist_id',`album_id`='$album_id',`year`='$year',`songfile`='$songfile' WHERE id=" . $_GET['edit_id'];

  // sql query for update data into database

  // sql query execution function
  if (mysqli_query($con, $sql_query)) {
    ?>
    <script type="text/javascript">
      alert('music updated successfully');
      window.location.href = 'indexmusic.php';
    </script>
    <?php
    } else {
    ?>
    <script type="text/javascript">
      alert('error occured while updating data');
    </script>
    <?php
    }
  // sql query execution function
  }
if (isset($_POST['btn-cancel'])) {
  header("Location: indexmusic.php");
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
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

  <div id="container"> &<div id="table-responsive">
      <form method="post" enctype="multipart/form-data">
        <table class="table table-striped">
          <tr>
            <td>
              <label for="name" class="form-label">Name:</label>
            </td>
            <td>
              <input type="text" value="<?php echo $fetched_row['name'] ?>" class="form-control" id="name" name="name">
            </td>
          </tr>
          <tr>
            <td>
              <textarea class="form-control" id="lyrics"
                name="lyrics">     <?php echo $fetched_row['lyrics'] ?>       </textarea>
            </td>
          </tr>
          <br />
          <b>Notice</b>: Undefined index: options_2 in
          <b>/home/u130206082/domains/phpcodebuilder.com/public_html/crud-generator/core-php-crud.php</b> on line
          <b>1045</b><br />
          <tr>
            <td>
              <select class="form-control" id="artist_id" name="artist_id">
                <option value="" <?php if ($fetched_row['artist_id'] == "") {
                  echo "selected";
                  } ?>></option>
              </select>
            </td>
          </tr>
          <br />
          <b>Notice</b>: Undefined index: options_3 in
          <b>/home/u130206082/domains/phpcodebuilder.com/public_html/crud-generator/core-php-crud.php</b> on line
          <b>1045</b><br />
          <tr>
            <td>
              <select class="form-control" id="album_id" name="album_id">
                <option value="" <?php if ($fetched_row['album_id'] == "") {
                  echo "selected";
                  } ?>></option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="year" class="form-label">Year:</label>
            </td>
            <td>
              <input type="text" value="<?php echo $fetched_row['year'] ?>" class="form-control" id="year" name="year">
            </td>
          </tr>
          <tr>
            <td>
              <label for="songfile" class="form-label">Songfile:</label>
            </td>
            <td>
              <input type="file" value="<?php echo $fetched_row['songfile'] ?>" class="form-control" id="songfile"
                name="songfile">
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
              <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>

</body>

</html>
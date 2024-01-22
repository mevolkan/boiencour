<?php
include_once '../db.php';

if (isset($_GET['edit_id'])) {
  $sql_query = "SELECT * FROM album WHERE id=" . $_GET['edit_id'];
  $result_set = mysqli_query($con, $sql_query);
  $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
  }
if (isset($_POST['btn-update'])) {
  // variables for input data

  $albumname = $_POST['albumname'];

  $artist_id = $_POST['artist_id'];
  $brief = $_POST['brief'];

  $links = $_POST['links'];

  if ($_FILES["albumphoto"]["name"] == '') {
    $albumphoto = $fetched_row['albumphoto'];
    } else {
    $albumphoto = $_FILES["albumphoto"]["name"];
    $file_name = $_FILES["albumphoto"]["name"];
    $file_tmp = $_FILES["albumphoto"]["tmp_name"];
    if ($file_name != '') {
      move_uploaded_file($file_tmp, "uploads/" . $file_name);

      }
    }
  // variables for input data

  // sql query for update data into database
  $sql_query = "UPDATE album SET `albumname`='$albumname',`artist_id`='$artist_id,`brief`='$brief',`links`='$links',`albumphoto`='$albumphoto' WHERE id=" . $_GET['edit_id'];

  // sql query for update data into database

  // sql query execution function
  if (mysqli_query($con, $sql_query)) {
    ?>
    <script type="text/javascript">
      alert('album updated successfully');
      window.location.href = 'indexalbum.php';
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
  header("Location: indexalbum.php");
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
  <div class="container">
    <div class="table-responsive">
      <form method="post" enctype="multipart/form-data">
        <table class="table table-striped">
          <tr>
            <td>
              <label for="albumname" class="form-label">Albumname:</label>
            </td>
            <td>
              <input type="text" value="<?php echo $fetched_row['albumname'] ?>" class="form-control" id="albumname"
                name="albumname">
            </td>
          </tr>
          <tr>
            <td>
              <label for="artist_id" class="form-label">Artist_id:</label>
            </td>
            <td>
              <select class="form-control" id="artist_id" name="artist_id">
                <option value="" <?php if ($fetched_row['artist_id'] == "") {
                  echo "selected";
                  } ?>></option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="brief" class="form-label">brief:</label>
            </td>
            <td>
              <input type="text" value="<?php echo $fetched_row['brief'] ?>" class="form-control" id="brief"
                name="brief">
            </td>
          </tr>
          <tr>
            <td>
              <label for="links" class="form-label">Links:</label>
            </td>
            <td>
              <input type="text" value="<?php echo $fetched_row['links'] ?>" class="form-control" id="links"
                name="links">
            </td>
          </tr>
          <tr>
            <td>
              <label for="albumphoto" class="form-label">Albumphoto:</label>
            </td>
            <td>
              <input type="file" value="<?php echo $fetched_row['albumphoto'] ?>" class="form-control" id="albumphoto"
                name="albumphoto">
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
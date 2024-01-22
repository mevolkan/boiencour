<?php
include_once '../db.php';

if (isset($_POST['btn-save'])) {
    // variables for input data
    $albumname = $_POST['albumname'];
    $artist_id = $_POST['artist_id'];
    $brief = $_POST['brief'];
    $links = $_POST['links'];

    // File upload
    $albumphoto = $_FILES["albumphoto"]["name"];
    $file_tmp = $_FILES["albumphoto"]["tmp_name"];
    $upload_directory = "uploads/";

    if (!empty($albumphoto)) {
        move_uploaded_file($file_tmp, $upload_directory . $albumphoto);
    }

    // SQL query using prepared statement
    $sql_query = "INSERT INTO album (albumname, artist_id, brief, links, albumphoto) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "sssss", $albumname, $artist_id, $brief, $links, $albumphoto);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Album added Successfully"); window.location.href = "indexalbum.php";</script>';
    } else {
        echo '<script>alert("Error occurred while inserting your data");</script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// // Close the database connection
// mysqli_close($con);
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

        <?php
        $formsql = "SELECT id, name FROM artist";
        $artistresults = $con->query($formsql);
        ?>
        <table class="table table-striped">
          <tr>
            <td align="center"><a href="indexalbum.php">back to main page</a></td>
          </tr>
          <tr>
            <td>
              <label for="albumname" class="form-label">Album Name:</label>
            </td>
            <td>
              <input type="text" class="form-control" id="albumname" name="albumname" required placeholder="Albumname">
            </td>
          </tr>
          <tr>
            <td>
              <label for="artist_id" class="form-label">Artist:</label>
            </td>
            <td>
              <?php
              if ($artistresults->num_rows > 0) {
                echo '<select class="form-control" id="artist_id" name="artist_id">';
                while ($row = $artistresults->fetch_assoc()) {
                  echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                  }
                echo '</select>';
                } else {
                echo '<p>No artists found</p>';
                }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <label for="brief" class="form-label">Brief:</label>
            </td>
            <td>
              <input type="textbox" class="form-control" id="brief" name="brief" required placeholder="brief">
            </td>
          </tr>
          <tr>
            <td>
              <label for="links" class="form-label">Links:</label>
            </td>
            <td>
              <input type="text" class="form-control" id="links" name="links" required placeholder="Links">
            </td>
          </tr>
          <tr>
            <td>
              <label for="albumphoto" class="form-label">Albumphoto:</label>
            </td>
            <td>
              <input type="file" class="form-control" id="albumphoto" name="albumphoto" required
                placeholder="Albumphoto">
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
<?php
include_once '../db.php';

if (isset($_GET['view_id'])) {
   $sql_query = "SELECT * FROM music WHERE id=" . $_GET['view_id'];
   $result_set = mysqli_query($con, $sql_query);
   $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
   }
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

   <div class="container mt-3">

      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
               <td>
                  <label for="name" class="form-label">Name:</label>
               </td>
               <th colspan="5"> <?php echo $fetched_row['name'] ?></th>
            </tr>
            <tr>
               <td>
                  <label for="lyrics" class="form-label">Lyrics:</label>
               </td>
               <th colspan="5"> <?php echo $fetched_row['lyrics'] ?></th>
            </tr>
            <tr>
               <td>
                  <label for="artist_id" class="form-label">Artist_id:</label>
               </td>
               <th colspan="5"> <?php echo $fetched_row['artist_id'] ?></th>
            </tr>
            <tr>
               <td>
                  <label for="album_id" class="form-label">Album_id:</label>
               </td>
               <th colspan="5"> <?php echo $fetched_row['album_id'] ?></th>
            </tr>
            <tr>
               <td>
                  <label for="year" class="form-label">Year:</label>
               </td>
               <th colspan="5"> <?php echo $fetched_row['year'] ?></th>
            </tr>
         </table>
      </div>
   </div>
</body>

</html>
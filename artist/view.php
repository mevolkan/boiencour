<?php
include_once '../db.php';

if (isset($_GET['view_id'])) {
    $sql_query = "SELECT * FROM artist WHERE id=" . $_GET['view_id'];
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
    }
?>
<?php include("../includes/header.php"); ?>


<div id="container">
    <div id="table-responsive">
    </div>
</div>

<table class="table table-striped">
    <tr>
        <td>
            <label for="name" class="form-label">Name:</label>
        </td>
        <th colspan="5"> <?php echo $fetched_row['name'] ?></th>
    </tr>
    <tr>
        <td>
            <label for="bio" class="form-label">Bio:</label>
        </td>
        <th colspan="5"> <?php echo $fetched_row['bio'] ?></th>
    </tr>
    <tr>
        <td>
            <label for="socialmedia" class="form-label">Socialmedia:</label>
        </td>
        <th colspan="5"> <?php echo $fetched_row['socialmedia'] ?></th>
    </tr>
</table>
<?php include("../includes/footer.php");
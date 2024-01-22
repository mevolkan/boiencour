<?php
include_once '../db.php';

if (isset($_GET['edit_id'])) {
    $sql_query = "SELECT * FROM artist WHERE id=" . $_GET['edit_id'];
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
    }
if (isset($_POST['btn-update'])) {
    // variables for input data

    $name = $_POST['name'];

    $bio = $_POST['bio'];

    $socialmedia = $_POST['socialmedia'];
    // variables for input data

    // sql query for update data into database
    $sql_query = "UPDATE artist SET `name`='$name',`bio`='$bio',`socialmedia`='$socialmedia' WHERE id=" . $_GET['edit_id'];

    // sql query for update data into database

    // sql query execution function
    if (mysqli_query($con, $sql_query)) {
        ?>
        <script type="text/javascript">
            alert('artist updated successfully');
            window.location.href = 'index.php';
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
    header("Location: index.php");
    }
?>
<?php include("../includes/header.php"); ?>

<div id="container">
    <div id="table-responsive">
    </div>
</div>

<div class="container"> <div class="table-responsive">
        <form method="post" enctype="multipart/form-data">
            <table class="table table-striped">
                <tr>
                    <td>
                        <label for="name" class="form-label">Name:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $fetched_row['name'] ?>" class="form-control" id="name"
                            name="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="bio" class="form-label">Bio:</label>
                    </td>
                    <td>
                        <input type="textbox" value="<?php echo $fetched_row['bio'] ?>" class="form-control" id="bio"
                            name="bio">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="socialmedia" class="form-label">Socialmedia:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $fetched_row['socialmedia'] ?>" class="form-control"
                            id="socialmedia" name="socialmedia">
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

<?php include("../includes/footer.php");
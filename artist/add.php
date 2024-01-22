<?php
include_once '../db.php';

if (isset($_POST['btn-save'])) {
    // variables for input data
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $socialmedia = $_POST['socialmedia'];
    // variables for input data

    // sql query for inserting data into database

    $sql_query = "INSERT INTO artist (`name`,`bio`,`socialmedia`) VALUES('" . $name . "','" . $bio . "','" . $socialmedia . "')";
    // sql query for inserting data into database

    // sql query execution function
    if (mysqli_query($con, $sql_query)) {
        ?>
        <script type="text/javascript">
            alert('artist added Successfully ');
            window.location.href = 'index.php';
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
<?php include("../includes/header.php"); ?>



<div class="container"> &<div id="table-responsive">
        <form method="post" enctype="multipart/form-data">
            <table class="table table-striped">
                <tr>
                    <td align="center"><a href="indexartist.php">back to main page</a></td>
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
                        <label for="bio" class="form-label">Bio:</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="bio" name="bio" required placeholder="Bio">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="socialmedia" class="form-label">Socialmedia:</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="socialmedia" name="socialmedia" required
                            placeholder="Socialmedia">
                    </td>
                </tr>

                <tr>
                    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include("../includes/footer.php");
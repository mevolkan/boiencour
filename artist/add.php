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
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Core PHP Crud functions By PHP Code Builder</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <center>

        <div id="container">
            <div id="table-responsive">
            </div>
        </div>
        <div id="container"> &<div id="table-responsive">
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
                                <input type="text" class="form-control" id="name" name="name" required
                                    placeholder="Name">
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

    </center>
</body>

</html>
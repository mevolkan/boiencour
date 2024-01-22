<?php
include_once '../db.php';


if (isset($_GET['delete_id'])) {
    $sql_query = "DELETE FROM artist WHERE id=" . $_GET['delete_id'];
    mysqli_query($con, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
    }
if (isset($_GET['changestatus_id'])) {
    $sql_query = "UPDATE artist SET `status`='" . $_GET['status'] . "' WHERE id=" . $_GET['changestatus_id'];
    mysqli_query($con, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
    }
?>
<?php include("../includes/header.php"); ?>




<div class="container">
    <div id="table-responsive">
        <table class="table table-striped">
            <tr>
                <th colspan="5"><a href="add.php">add artist.</a></th>
            </tr>
            <th>SL NO</th>
            <th>name</th>

            <th colspan="3">Actions</th>
            </tr>
            <?php
            $sql_query = "SELECT * FROM artist";
            $result_set = mysqli_query($con, $sql_query);
            $i = 1;
            while ($row = mysqli_fetch_row($result_set)) {
                ?>
                <tr>
                    <td align="center"><?php echo $i; ?></td>
                    <td align="center"> <a href="javascript:view_id('<?php echo $row[0]; ?>')">
                            <?php echo $row[1]; ?> </a> </td>
                    <?php if ($row[count($row) - 1] == 1) { ?>
                        <td align="center"><a href="javascript:changestatus_id('<?php echo $row[0]; ?>',0)">Deactivate</a></td>
                    <?php } else { ?>
                        <td align="center"><a href="javascript:changestatus_id('<?php echo $row[0]; ?>',1)">Activate</a>
                        </td>
                    <?php } ?>
                    <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">Edit</a></td>
                    <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">Delete</a></td>
                </tr>
                <?php
                $i++;
                }
            ?>
        </table>
    </div>
</div>
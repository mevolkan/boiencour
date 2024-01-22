<?php
include_once './db.php';

if (isset($_GET['view_id'])) {
    // $sql_query = "SELECT * FROM artist WHERE id=" . $_GET['view_id'];
    $view_id = intval($_GET['view_id']);
    $sql_query = "SELECT artist.id, artist.name, artist.bio, artist.socialmedia, 
    COUNT(album.id) AS album_count, 
    GROUP_CONCAT(album.albumname SEPARATOR ', ') AS album_names
    FROM artist
    LEFT JOIN album ON artist.id = album.artist_id
    WHERE artist.id = $view_id
    GROUP BY artist.id, artist.name, artist.bio, artist.socialmedia;";
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
    }

?>
<?php include("./includes/header.php"); ?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo $fetched_row['name'] ?></h1>
        <p class="lead"><?php echo $fetched_row['bio'] ?></p>
        <hr class="my-4">

        <?php echo $fetched_row['socialmedia'] ?>
    </div>
</div>
<section class="container">
    <h2>Albums <span class="badge bg-secondary"><?php echo $fetched_row['album_count'] ?></span></h2>
</section>
<section class="container">
    <h2>Songs <span class="badge bg-secondary">New</span></h2>
</section>

<?php include("./includes/footer.php");
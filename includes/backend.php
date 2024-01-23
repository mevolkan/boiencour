<?php
include_once '../db.php';


$artistId = $_GET['artist_id'];
$albums = getAlbumsByArtistId($artistId);

// Handle the AJAX request
if (isset($_GET['artist_id'])) {
    $artistId = $_GET['artist_id'];
    $albums = getAlbumsByArtistId($artistId);

    // Return the albums in JSON format
    header('Content-Type: application/json');
    echo json_encode($albums);
    }


// Function to get albums based on artist ID
function getAlbumsByArtistId($artistId)
    {
        global $con;

    $sql_query = "SELECT id, albumname FROM album WHERE artist_id = " .$artistId;

    $result = mysqli_query($con, $sql_query);

    if (!$result) {
        die(mysqli_error($con));

        }
    $albums = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $albums[] = $row;
        }
    return $albums;
    }


$(document).ready(function () {
  // Function to populate the Album dropdown based on the selected Artist
  function populateAlbums(artistId) {
    // Clear existing options
    $("#album_id").html('<option value=""></option>');

    // Use AJAX to fetch albums based on the selected artist
    $.ajax({
      url: "../includes/backend.php", // Replace with the actual backend script URL
      type: "GET",
      data: { artist_id: artistId },
      dataType: "json",
      success: function (data) {
        // Populate the Album dropdown with fetched albums
        $.each(data, function (index, album) {
          $("#album_id").append(
            '<option value="' + album.id + '">' + album.albumname + "</option>"
          );
        });
      },
      error: function (xhr, status, error) {
        console.error("Error fetching albums:", error);
      },
    });
  }

  // Event handler for the Artist dropdown change
  $("#artist_id").on("change", function () {
    var selectedArtistId = $(this).val();

    // Populate the Album dropdown based on the selected Artist
    if (selectedArtistId) {
      populateAlbums(selectedArtistId);
    }
  });
});

<?php
include("./includes/header.php");
include_once 'db.php';
?>

<body class="">

  <div class="container jumbotron">
    <h1 class="display-4">Gideon's Army</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
      featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </div>


  <section class="container py-5">
    <h2 class="" pb-1>Artists</h2>
    <div class="row row-cols-2 row-cols-md-3 g-4">
      <?php
      $sql_query = "SELECT * FROM artist";
      $result_set = mysqli_query($con, $sql_query);
      $i = 1;
      while ($row = mysqli_fetch_row($result_set)) {
        ?>
        <div class="col">
          <div class="card">
            <img src="./assets/img/ryan.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="javascript:artist_profile('<?php echo $row[0]; ?>')">
                  <?php echo $row[1]; ?> </a></h5>
              <p class="card-text"><?php echo $row[2]; ?></p>
            </div>
            <div class="card-footer">
              <a class="btn btn-primary" href="javascript:artist_profile('<?php echo $row[0]; ?>')">
                Profile </a>
              <a href="#" class="btn btn-primary">Albums</a>
            </div>
          </div>
        </div>
        <?php
        $i++;
        }
      ?>
    </div>
  </section>

  <section class="container py-5">
    <h2 class="" pb-1>Albums</h2>
    <div class="row row-cols-1 row-cols-md-3 g-2">
      <?php
      $sql_query = "SELECT album.*, artist.name AS artist_name
      FROM album
      JOIN artist ON album.artist_id = artist.id;";
      $result_set = mysqli_query($con, $sql_query);
      $i = 1;
      while ($row = mysqli_fetch_row($result_set)) {
        ?>
        <div class="col">
          <div class="card">
            <img src="./album/uploads/<?php echo $row[5]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[1]; ?> </a>
              </h5>
              <a href="javascript:view_id('<?php echo $row[3]; ?>')" class="card-text">Artist: <?php echo $row[7]; ?> </a>
              <p class="card-text"><?php echo $row[2]; ?> </p>
              <a class="card-text" href="?php echo $row[4]; ?>">More </a>
              <div class="card-footer">
                <a href="#" class="card-link">Listen To Album</a>
                <a href="#" class="card-link">More by Artist</a>

              </div>

            </div>
          </div>
        </div>
        <?php
        $i++;
        }
      ?>

    </div>
  </section>
</body>
<?php include("./includes/footer.php");
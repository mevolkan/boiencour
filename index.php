<?php
include("./includes/header.php");
include_once 'db.php';
?>

<body class="">

  <div class="container jumbotron">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
      featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </div>

  <section class="container ">
    <div class="row row-cols-2 row-cols-md-3 g-4">
      <?php
      $sql_query = "SELECT * FROM artist";
      $result_set = mysqli_query($con, $sql_query);
      $i = 1;
      while ($row = mysqli_fetch_row($result_set)) {
        ?>
        <div class="col">
        <div class="card" >
          <img src="./assets/img/ryan.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a href="javascript:artist_profile('<?php echo $row[0]; ?>')">
                <?php echo $row[1]; ?> </a></h5>
            <p class="card-text"><?php echo $row[2]; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
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
</body>
<?php include("./includes/footer.php");
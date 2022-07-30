<?php
    include "header.php";
    include "database.php";
    $albums = $db->query("SELECT * FROM albums ORDER BY time DESC");
    $musics = $db->query("SELECT * FROM music ORDER BY time DESC");
    $singers = $db->query("SELECT * FROM singers");
    /*
    $result = $db->query("SELECT * FROM albums");
    if($result->num_rows > 0){
        while ( $record = $result->fetch_assoc() ) {
        
            echo json_encode($record, true) . '<br><br>';
        }
     }
    */
?>

<div class="container-fluid rounded-4 mt-3 bg-light p-1">
    <div class="d-flex justify-content-center "> 

        <div class="col-3 mx-1 d-none d-xxl-block">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/albums/9.jpg" class="img-poster" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/albums/6.jpg" class="img-poster" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/albums/8.jpg" class="img-poster" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        </div>
        <div class="col mx-4">
            <img src="img/poster1.jpg" width="100%" height="100%"class="rounded-5" alt="...">
        </div>

        <div class="col-3 mx-1 d-none d-xxl-block">
            <div id="carouselExampleCaptions1" class="carousel slide">
                <div id="carouselExampleIndicators3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="1" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="2" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="3" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="4" aria-label="Slide 7"></button>

                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/track/1.jpg" class="img-poster" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/track/2.jpg" class="img-poster" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/track/4.jpg" class="img-poster" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/track/5.jpg" class="img-poster" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/track/6.jpg" class="img-poster" alt="...">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

        </div>
        
    </div>
</div>
<div class="container-fluid rounded-4 mt-3  p-3 bg-light">
    <h3>
        New Albums
    </h3>
    <hr>
    <div class="row">
        <?php $i=0; foreach($albums as $album): ?>
            <?php if($album['image'] != '' && $i < 6): ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                    <a class="albums " href="musics.php?album=<?php echo $album['id'];?>">
                    <div class="card rounded-3 bg-secondary">
                        <img src="<?php echo $album['image'];?>" class="card-img-top rounded-3 img-filter" width="200px" alt="<?php echo $album['name'];?>">
                        <div class="card-body bg-secondary rounded-3">
                            <p class="card-text albums"><?php echo $album['name'];?></p>
                        </div>
                    </div>
                    </a>
                </div>
            <?php $i++; endif;?>
        <?php endforeach; ?>
    </div>
</div>

<div class="container-fluid rounded-4 mt-3 p-3 bg-light">
    <h3>Popular Artists</h3>
    <hr>
    <div class="row">
        <?php foreach($singers as $i=>$artist):?>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                <a class="singers" href="albums.php?singer=<?php echo $artist['id'];?>">
                <div class="">
                    <img src="<?php echo $artist['image'];?>" class="card-img-top border border-5 border-secondary mb-1 rounded-circle img-filter" width="200px" alt="<?php echo $artist['name'];?>">
                    <div class="card-body rounded-3">
                        <p class="card-text text-dark"><?php echo $artist['name'];?></p>
                    </div>
                </div>
                </a>
            </div>
            <?php if($i == 5) break ?>
        <?php endforeach; ?>
    </div>
</div>

<div class="container-fluid rounded-4 mt-3 p-3 bg-light">
    <h3>New Music</h3>
    <hr>
    <div class="row">
        <?php $i = 0; foreach($musics as $music): ?>
            <?php if($music['image'] != '' && $i < 6): ?>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                    <a class="albums " href="musics.php?music=<?php echo $music['id'];?>">
                        <div class="card rounded-3 bg-secondary">
                            <img src="<?php echo $music['image'];?>" class="card-img-top rounded-3 img-filter" width="200px" alt="<?php echo $music['name'];?>" />
                            <div class="card-body bg-secondary rounded-3">
                                <p class="card-text albums"><?php echo $music['name'];?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php $i++; endif;?>
        <?php endforeach; ?>
    </div>
</div>



</div>
<?php include "footer.php"; ?>
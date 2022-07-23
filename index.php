<?php
    include "header.php";
    include "database.php";
    $albums = ($db->query("SELECT * FROM albums ORDER BY time DESC"))->fetch_all();
    /*
    $result = $db->query("SELECT * FROM albums");
    if($result->num_rows > 0){
        while ( $record = $result->fetch_assoc() ) {
        
            echo json_encode($record, true) . '<br><br>';
        }
     }
    */
?>

<div class="container-fluid rounded-4 mt-3  p-1">
    <div class="d-flex justify-content-center "> 

        <div class="col-3 mx-1 d-none d-xxl-block">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"  aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"  aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
                    
                </div>
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="img/albums/5.jpg" class="img-poster"  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="img/albums/2.jpg" class="img-poster"  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/albums/3.jpg" class="img-poster " alt="...">
                    <div class="carousel-caption d-none d-md-block">
                       
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>

        </div>
        <div class="col mx-4">
            <img src="img/poster1.jpg" class="img-fluid rounded-5" alt="...">
        </div>

        <div class="col-3 mx-1 d-none d-xxl-block">
            <div id="carouselExampleCaptions1" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="0" class="active"  aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="1"  aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="2"  aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="3"  aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="4"  aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="5"  aria-label="Slide 6"></button>
                </div>
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="img/track/1.jpg" class="img-poster"  alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="img/track/2.jpg" class="img-poster"  alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/track/3.jpg" class="img-poster " alt="...">

                </div>

                <div class="carousel-item">
                    <img src="img/track/4.jpg" class="img-poster"  alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="img/track/5.jpg" class="img-poster"  alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/track/6.jpg" class="img-poster " alt="...">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide="next">
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
        <?php for($i = 0; $i < 6; $i++): ?>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                <a class="albums " href="musics.php?album=<?php echo $albums[$i][0];?>">
                <div class="card rounded-3 bg-secondary">
                    <img src="<?php echo $albums[$i][2];?>" class="card-img-top rounded-3 img-filter" width="200px" alt="<?php echo $albums[$i][1];?>">
                    <div class="card-body bg-secondary rounded-3">
                        <p class="card-text albums"><?php echo $albums[$i][1];?></p>
                    </div>
                </div>
                </a>
            </div>
        <?php endfor; ?>
    </div>
</div>
<?php include "footer.php"; ?>
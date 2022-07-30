<?php
    include "header.php";
    include "database.php";
?>
    <?php if(!empty($_GET["singer"])):?>
        <?php 
        $singer_id = $_GET["singer"];
        $albums = $db->query("SELECT * FROM `albums` WHERE singers_id = $singer_id");
        $singer = $db->query("SELECT * FROM `singers` WHERE id = $singer_id")->fetch_assoc();
        $musics = $db->query("SELECT * FROM `music` WHERE singer_id = $singer_id");
        ?>
        <div class="container-fluid rounded-4 mt-3  p-3 bg-light">
            <header >
                <h1 class="text-center">
                    <?php echo $singer['name']; ?>
                </h1>
            </header>
            <?php if($albums->num_rows != null): ?>
                <h3>
                    Albums
                </h3>
                <hr>
            <?php endif; ?>
            <div class="row p-3">
                <?php if($albums->num_rows > 0): ?>
                    <?php foreach($albums as $album): ?>
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
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-dark d-flex justify-content-center" role="alert">
                        <h5>There is currently no album for this singer</h5>
                    </div>
                <?php endif; ?> 
            </div>
            <?php if($musics->num_rows != null): ?>
                <div class="row ms-1">
                    <h3>
                        Tracks
                    </h3>
                    <hr>
                    <?php foreach($musics as $music): ?>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                            <a class="albums " href="musics.php?music=<?php echo $music['id'];?>">
                            <div class="card rounded-3 bg-secondary">
                                <img src="<?php echo $music['image'];?>" class="card-img-top rounded-3 img-filter" width="200px" alt="<?php echo $music['name'];?>">
                                <div class="card-body bg-secondary rounded-3">
                                    <p class="card-text albums"><?php echo $music['name'];?></p>
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            <?php endif; ?>
        </div>
    <?php else: ?>
        <?php 
            $albums = $db->query("SELECT * FROM `albums`");
            $num_rows = $albums->num_rows;
            $albums = $albums->fetch_all();
        ?>
        <div class="container-fluid rounded-4 mt-3  p-3 bg-light">
            <h3>
                Albums
            </h3>
            <hr>
            <div class="row">
                <?php for($i = 0; $i <$num_rows; $i++): ?>
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
    <?php endif; ?>


<?php
    include "footer.php";
?>
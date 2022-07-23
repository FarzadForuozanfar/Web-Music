<?php
    include "header.php";
    include "database.php";
    $singer_id = $_GET["singer"];
    $albums = $db->query("SELECT * FROM `albums` WHERE singers_id = $singer_id");
    $singer = $db->query("SELECT * FROM `singers` WHERE id = $singer_id")->fetch_assoc();
?>
<div class="container-fluid rounded-4 mt-3  p-3 bg-light">
    <h3>
        Albums of <?php echo $singer['name']; ?>
    </h3>
    <hr>
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
</div>
<?php
    include "footer.php";
?>
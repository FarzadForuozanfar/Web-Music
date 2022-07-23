<?php
    include "header.php";
    include "database.php";
    $artists = $db->query("SELECT * FROM `singers`");
?>
<div class="container-fluid rounded-4 mt-3  p-3 bg-light">
    <h3>
        Artists
    </h3>
    <hr>
    <div class="row">
        <?php foreach($artists as $artist): ?>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                <a class="albums " href="albums.php?singer=<?php echo $artist['id']; ?>">
                <div class="card rounded-3 bg-secondary">
                    <img src="<?php echo $artist['image'];?>" class="card-img-top rounded-3 img-filter" width="200px" alt="<?php echo $artist['name'];?>">
                    <div class="card-body bg-secondary rounded-3">
                        <p class="card-text albums"><?php echo $artist['name'];?></p>
                    </div>
                </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
    include "footer.php";
?>
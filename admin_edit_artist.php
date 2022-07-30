<?php
    include "header.php";
    include "database.php";
?>
<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php if(!empty($_GET["id"])):?>
        <?php
            $singer_id = $_GET["id"];
            $singer = $db->query("SELECT * FROM singers WHERE id = $singer_id")->fetch_assoc();
        ?>
        <div class="container-fluid mt-3 rounded-4 bg-light card-glass">
            <div class="row">
                <?php include "admin_menu.php"; ?>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 rounded-4">
                    <h1>
                        Edit Artist
                    </h1>
                    <form action="edit_artist_proccess.php" method="post" enctype="multipart/form-data" role="form">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="artist-name" class="form-label">Artist Name :</label>
                                <input type="text" class="form-control" name="artist-name" value="<?php echo $singer['name']; ?>"id="artist-name">
                            </div>
                            <div class="col">
                                <label for="artist-img" class="form-label">Artist Image :</label>
                                <input class="form-control" name="image" id="artist-img" type="file">
                            </div>
                        </div>
                        <input type="hidden" name="singer-id" value="<?php echo $singer_id; ?>" />
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>
<?php include "footer.php"; ?>
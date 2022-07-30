<?php 
    include "header.php";
    include "database.php";
?>
<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php if(!empty($_GET["id"])):?>
        <?php
            $album_id = $_GET["id"];
            $album = $db->query("SELECT * FROM albums WHERE id = $album_id")->fetch_assoc();
            $singers = $db->query("SELECT * FROM `singers`");
            $singer_id = $album['singers_id'];
            $artist = $db->query("SELECT * FROM `singers` WHERE id = $singer_id")->fetch_assoc();
        ?>
        <div class="container-fluid mt-3 rounded-4 bg-light card-glass">
            <div class="row">
                <?php include "admin_menu.php"; ?>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 rounded-4">
                    <h1>
                        Edit "<b><i><?php echo $album['name'];?></i></b>" Album
                    </h1>
                <form action="edit_album_proccess.php" method="post" enctype="multipart/form-data" role="form">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="album-name" class="form-label">Album Name :</label>
                            <input type="text" class="form-control" name="album-name" value="<?php echo $album['name']; ?>"id="album-name" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="singer-name" class="form-label">Singer Name :</label>
                            <select class="form-select " id="singer-name" name="singer_id" aria-label=".form-select example">
                                <option value="<?php echo $artist['id']?>" selected><?php echo $artist['name'] ;?></option>
                                    <?php foreach ($singers as $singer): ?>
                                            <?php if($singer['name'] != $artist['name']): ?>
                                                <option value="<?php echo $singer['id']?>"><?php echo $singer['name'];?></option>
                                            <?php endif;?>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="album-img">Album Image :</label>
                        <input class="form-control" class="form-label" name="image" id="album-img" type="file">
                    </div>
                    <input type="hidden" name="album-id" value="<?php echo $album_id; ?>" />
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                </form>
                </div>
            </div>
        </div>

    <?php else:?>
        <?php header("Location:index.php"); ?>
    <?php endif;?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>
<?php include 'footer.php'; ?>
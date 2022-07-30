<?php 
    include "header.php";
    include "database.php";
?>
<?php if(!empty($_SESSION['login_admin'])):?> 
    <?php if($_GET["id"] != ""): ?>
        <?php 
            $music_id = $_GET["id"];
            $music = $db->query("SELECT * FROM music WHERE id = '$music_id'")->fetch_assoc();
            $album_id = $music['album_id'];
            $album_selected = $db->query("SELECT * FROM albums WHERE id = '$album_id'")->fetch_assoc();
            $albums = $db->query("SELECT * FROM albums");  
        ?>
        <?php include "admin_menu.php"; ?>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <h1>Edit Music</h1>
            <form action="edit_music_proccess.php" method="post" enctype="multipart/form-data" role="form">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="music-name" class="form-label">Music Name :</label>
                            <input type="text" class="form-control" name="music-name" value="<?php echo $music['name']; ?>"id="music-name">
                        </div>
                        <?php if(!empty($music['album_id'])): ?>
                            <div class="col">
                                <label for="album-name" class="form-label">Album Name :</label>
                                <select class="form-select" id="album-name" name="album-id" aria-label="Default select example">
                                    <option value="<?php echo $album_selected['id'];?>" selected><?php echo $album_selected['name'];?></option>
                                    <?php foreach ($albums as $album):?>
                                        <?php if($album['name'] != $album_selected['name']):?>
                                            <option value="<?php echo $album['id'];?>"><?php echo $album['name'];?></option>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="music-img" class="form-label">Music Image :</label>
                            <input class="form-control" name="image" id="music-img" type="file">
                        </div>
                        <div class="col">
                            <label for="music-mp3" class="form-label">MP3 :</label>
                            <input class="form-control" name="mp3" id="music-mp3" type="file">
                        </div>
                    </div>
                    <input type="hidden" name="music-id" value="<?php echo $music_id; ?>" />
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </form>
        </div>
    <?php else:
    {
        header("Location: index.php");
    }?>
    <?php endif; ?>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>  
<?php include "footer.php"; ?>
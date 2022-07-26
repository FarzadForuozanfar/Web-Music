<?php 
    include "header.php";
    include "database.php";

    $album_id = $_GET["album"];

    $album = $db->query("SELECT * FROM albums WHERE id = $album_id")->fetch_assoc();
    $tracks = $db->query("SELECT * FROM `music` WHERE album_id = $album_id");
    $tracks_assoc = $tracks->fetch_all();
?>

<div class="container-fluid mt-3 rounded-4 bg-light card-glass">
    <div class="row background-gradient rounded-4 rounded-bottom p-4 align-items-center">
        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">
            <img class="rounded-4 shadow-xxl" src="<?php echo $album['image']; ?>" width="100%" alt="<?php echo $album['name']; ?>" srcset="">
        </div>
        <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10 align-items-start">
            <h1 class="text-light">
                <b><?php echo $album['name']; ?></b>
            </h1>
        </div>
        
        
    </div>
    <div class="row card-glass pe-2 pb-2">
        <div class="pt-2 my-3 mb-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <button onclick="PlayMusic('<?php echo $tracks_assoc[0][4]; ?>');" class="btn btn-warning rounded-circle mx-5 "><i class="bi bi-play" style="font-size:20px;"></i></button>
            <button type="button" class="btn btn-outline-dark mx-4">Follow</button>
            
        </div>
        <div class="mt-3 col-lg-6 col-md-12 col-sm-12 col-xs-12 pt-2">
            <h3 id="music-name"></h3>
            <audio id="music-player" width="80%" style="width:80% !important;" controls></audio>
        </div>
        <?php foreach ($tracks as $i => $track):
            $url = str_replace('\\','/', $track['mp3']);
            ?>
            <div onclick="PlayMusic('<?= $url ?>','<?php echo $track['name'] ?>');" class="row add-border mx-1 py-1 py-3">
                <div class="col-1 text-center">
                    <?php echo $i+1; ?>
                </div>
                <div class="col-7">
                    <?php echo $track['name']; ?>
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <span class="bi bi-play play-pause"  onmouseover="this.className='bi bi-play-fill hover-play';" onmouseout="this.className='bi bi-play play-pause';"></span>
                </div>
                <div class="col-1">
                    <i class="bi bi-heart play-pause" onmouseover="this.className='bi bi-heart-fill hover-heart';" onmouseout="this.className='bi bi-heart play-pause';"></i>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    function PlayMusic(path_music,name) 
    {       
        music_name = document.getElementById("music-name");
        music_bar = document.getElementById('music-player');
        music_bar.setAttribute('src', path_music);
        music_name.innerHTML = name;
        console.log(name);
        music_bar.play();
    }
</script>
<?php
    include "footer.php";
?>
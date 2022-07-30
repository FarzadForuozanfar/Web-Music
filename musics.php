<?php 
    include "header.php";
    include "database.php";
    $result = $db->query("SELECT * FROM singers");
        $singer_name = array();
        if($result->num_rows > 0){
            while ( $record = $result->fetch_object() ) {
                $singer_name[] = $record->name;
            }
        }
?>
<?php if(!empty($_GET["album"])):?>
    <?php
        $album_id = $_GET["album"];
        $album = $db->query("SELECT * FROM albums WHERE id = $album_id")->fetch_assoc();
        $tracks = $db->query("SELECT * FROM `music` WHERE album_id = $album_id");
        $tracks_assoc = $tracks->fetch_assoc();
    ?>

    <div class="container-fluid mt-3 rounded-4 bg-light card-glass">
        <?php if($album != null):?>
            <div class="row background-gradient rounded-4 rounded-bottom p-4 align-items-center">
                <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2">
                    <img class="rounded-4 shadow-xxl" src="<?php  echo $album['image']; ?>" width="100%" alt="<?php if($album != null) echo $album['name']; ?>" srcset="">
                </div>
                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10 align-items-start">
                    <h1 class="text-light ms-5">
                        <b><?php if($album != null) echo $album['name']; ?></b>
                    </h1>
                </div>
            
                
            </div>
        <?php endif; ?>
        <?php if($tracks->num_rows != 0): ?>
            <div class="row card-glass pe-2 pb-2">
                <div class="pt-2 my-3 mb-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <button onclick="PlayMusic('<?php echo $tracks_assoc['mp3']; ?>','<?php echo $tracks_assoc['name'];?>');" class="btn btn-warning rounded-circle mx-5 "><i class="bi bi-play" style="font-size:20px;"></i></button>
                    <button type="button" class="btn btn-outline-dark mx-4">Follow</button>
                    
                </div>
                <div class="mt-3 col-lg-6 col-md-12 col-sm-12 col-xs-12 pt-2">
                    <h3 id="music-name"></h3>
                    <audio id="music-player" width="100%" style="width:100% !important;" controls></audio>
                </div>
                <?php foreach ($tracks as $i => $track):
                    $url = str_replace('\\','/', $track['mp3']);
                    ?>
                    <div  class="row add-border mx-1 py-1 py-3">
                        <div class="col-1 text-center">
                            <?php echo $i+1; ?>
                        </div>
                        <div class="col-7">
                            <?php echo $track['name']; ?>
                        </div>
                        <div class="col-2 d-flex justify-content-end">
                            <span class="bi bi-play play-pause" onclick="PlayMusic('<?= $url ?>','<?php echo $track['name'] ?>');" onmouseover="this.className='bi bi-play-fill hover-play';" onmouseout="this.className='bi bi-play play-pause';"></span>
                        </div>
                        <div class="col-1">
                            <i class="bi bi-heart play-pause" onmouseover="this.className='bi bi-heart-fill hover-heart';" onmouseout="this.className='bi bi-heart play-pause';"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-dark d-flex justify-content-center mt-3" role="alert">
                <h5>There is currently no track for this album</h5>
            </div>
        <?php endif; ?>
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
    <?php elseif(empty($_GET["music"])):
            $musics = $db->query("SELECT * FROM `music`");
        ?>
        <div class="container-fluid rounded-4 mt-3  p-3 bg-light">
            <div>
                <h1>Musics</h1>
            </div>
            <hr>
            <div class="row">
                <?php foreach($musics as $music): ?>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 albums my-2">
                        <a class="text-decoration-none" href="musics.php?music=<?php echo $music['id'];?>">
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
        </div>
    <?php elseif(!empty($_GET["music"])):
            $music_id = $_GET["music"];
            $music_selected = $db->query("SELECT * FROM `music` WHERE `id` = '$music_id'")->fetch_assoc();
            if ($music_selected != null)
            {
                $singer_id = $music_selected['singer_id'];
                $singer = $db->query("SELECT * FROM `singers` WHERE `id` = '$singer_id'")->fetch_assoc();
                $musics = $db->query("SELECT * FROM `music`");
            }
            else
            {
                header("Location:index.php");
            }
        ?>
        <?php if($music_selected != null): ?>
            <div class="container-fluid rounded-4 mt-3  p-3 bg-light">
                <div class="row d-inline">
                    <a class="txt-hover" href="musics.php">
                        <span>Musics / </span>
                    </a>

                    <a class="txt-hover" href="albums.php?singer=<?php echo $singer['id'];?>">
                        <span> <?php echo $singer['name'] ;?> / </span>
                    </a>

                    <span class="text-danger">
                        <?php echo $music_selected['name'] ;?>
                    </span>
                </div>
                <hr>
                <div class="row">

                    <div class="col-12 col-md-7 col-lg-9 mt-5 d-block justify-content-center " style="text-align: center">
                            <div class="d-flex justify-content-center">
                                <img class="rounded-5 border border-5 border-dark" src="<?php echo $music_selected['image'];?>" width="380px" alt="<?php echo $music_selected['name'];?>">
                            </div>
                            <audio id="music-player" style="width:65%; height: 65px;" controls autoplay>
                                <source src="<?php echo $music_selected['mp3'];?>" type="audio/mpeg">
                            </audio>
                    </div>

                    <div class="col-12 col-md-5 col-lg-3">
                        <ul class="list-group">
                            <li class="list-group-item background-gradient">
                                <div class="row text-decoration-none text-white">
                                    <div class="col-3">
                                        <img src="<?php echo $music_selected['image']; ?>" class="rounded-4" width="70px" alt="<?php echo $music_selected['name'];?>">
                                    </div>
                                    <div class="col-9">
                                        <h5>
                                            <?php echo $music_selected['name'];?>
                                        </h5>
                                        <h6>
                                            <?php echo $singer['name'];?>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                            <?php foreach ($musics as $i=>$music): ?>
                                <?php if($music['id'] != $music_selected['id']): ?>
                                    <li class="list-group-item add-border">
                                        <a href="musics.php?music=<?php echo $music['id'];?>" class="row text-decoration-none text-dark" onmouseover="ChangetToWhite(this)" onmouseout="ChangetToBlack(this)">
                                            <div class="col-3">
                                                <img src="<?php echo $music['image']; ?>" class="rounded-4" width="70px" alt="<?php echo $music['name'];?>">
                                            </div>
                                            <div class="col-9">
                                                <h5>
                                                    <?php echo $music['name'];?>
                                                </h5>
                                                <h6>
                                                    <?php echo $singer_name[$music['singer_id']-1];?>
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    
                </div>

            </div>
        <?php endif; ?>
    <?php endif; ?>

<script>
    function ChangetToWhite(element)
    {
        element.classList.remove('text-dark');
        element.classList.add('text-light');
        element.style.fontWeight = 'bolder';
    }
    function ChangetToBlack(element)
    {
        element.classList.remove('text-light');
        element.classList.add('text-dark');
    }
</script>
<?php
    include "footer.php";
?>
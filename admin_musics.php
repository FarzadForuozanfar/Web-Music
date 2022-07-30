<?php 
    include "header.php";
    include "database.php"; 
    $musics = $db->query("SELECT * FROM `music`");
    $albums = $db->query("SELECT * FROM `albums`");
?>
<?php include "admin_menu.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php if(!empty($_SESSION['login_admin'])):?> 
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <h1 align="center">
            ADD New Music
        </h1>
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success bi bi-plus-lg"></button>
        
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered border-dark table-hover ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Album Name</th>
                        <th class="d-none d-lg-block d-md-block" scope="col">Date Modified</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($musics as $i=>$music) :?>
                        <tr>
                            <th scope="row"><?php echo $i+1;?></th>
                            <td><?php echo $music['name'] ?></td>
                            <td ><img src="<?php echo $music['image']; ?>" class="rounded-3 mx-auto d-block" width="80px" alt="<?php echo $music['name'] ?>"></td>
                            <?php 
                            $album_id = $music['album_id'];
                            $album = $db->query("SELECT * FROM `albums` WHERE id = $album_id")->fetch_assoc();
                            ?>
                            <td>
                                <?php if(!empty($album['name'])):?>
                                <?php echo $album['name']; ?>
                                <?php else :echo ""; ?>
                                <?php endif; ?> 

                            </td>
                            <td><?php echo $music['time']; ?></td>
                            <td>
                                <a class="btn btn-info btn-sm bi bi-pencil-square mt-1" href="admin_edit_music.php?id=<?php echo $music['id'];?>"></a>
                                <button type="button" class="btn btn-danger btn-sm bi bi-trash mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $music['id'];?>"></button>
                                <div class="modal fade" id="exampleModal<?php echo $music['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $music['id'];?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title text-white" id="exampleModalLabel<?php echo $music['id'];?>">!! Warning !!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure want to delete this music?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                            <a href="delete_music.php?id=<?php echo $music['id']?>" class="btn btn-danger">Yes Delete it</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h3 class="modal-title text-white" id="exampleModalLabel">New music</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="new_music.php" method="post" enctype="multipart/form-data" role="form">
                            <div class="row">
                                <div class="col">
                                    <label for="music-name">Music Name :</label>
                                    <input type="text" class="form-control" name="music_name" id="music-name" aria-label="Name-music">
                                </div>
                                <div class="col">
                                    <label for="album-id">Album Name :</label>
                                    <select class="form-select " name="album_id" aria-label=".form-select example">
                                        <option selected>Choose Album Name</option>
                                        <?php foreach ($albums as $album): ?>
                                            <option value="<?php echo $album['id']?>"><?php echo $album['name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="clo-12">
                                    <label for="music-img">music Image :</label>
                                    <input class="form-control" name="image" id="music-img" type="file">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="clo-12">
                                    <label for="music-mp3">music mp3 :</label>
                                    <input class="form-control" name="mp3" id="music-mp3" type="file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" href="new_music.php" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<?php else:{header("Location: index.php");} ?>
<?php endif; ?>                                    
                    
                
               
<?php include "footer.php"; ?>  
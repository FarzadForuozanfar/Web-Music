<?php 
    include "header.php";
    include "database.php"; 
    $albums = $db->query("SELECT * FROM `albums`");
    $singers = $db->query("SELECT * FROM `singers`");

?>
<?php     include "admin_menu.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php if(!empty($_SESSION['login_admin'])):?> 
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <h1 align="center">
            ADD New Album
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
                        <th scope="col">Singer</th>
                        <th class="d-none d-lg-block d-md-block" scope="col">Date Modified</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($albums as $i=>$album) :?>
                        <tr>
                            <th scope="row"><?php echo $i+1; ?></th>
                            <td><?php echo $album['name'] ?></td>
                            <td ><img src="<?php echo $album['image']; ?>" class="rounded-3 mx-auto d-block" width="80px" alt="<?php echo $album['name'] ?>"></td>
                            <?php 
                            $singer_id = $album['singers_id'];
                            $singer = $db->query("SELECT * FROM `singers` WHERE id = $singer_id")->fetch_assoc();
                            ?>
                            <td><?php echo $singer['name']?></td>                    
                            <td><?php echo $album['time']; ?></td>
                            <td>
                                <a class="btn btn-info btn-sm bi bi-pencil-square mt-1" href="admin_edit_album.php?id=<?php echo $album['id']?>"></a>
                                <button type="button" class="btn btn-danger btn-sm bi bi-trash mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $album['id'];?>"></button>
                                <div class="modal fade" id="exampleModal<?php echo $album['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $album['id'];?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title text-white" id="exampleModalLabel<?php echo $album['id'];?>">!! Warning !!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure want to delete this album?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                            <a href="delete_album.php?id=<?php echo $album['id']?>" class="btn btn-danger">Yes Delete it</a>
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
                        <h3 class="modal-title text-white" id="exampleModalLabel">New Album</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="new_album.php" method="post" enctype="multipart/form-data" role="form">
                            <div class="row">
                                <div class="col">
                                    <label for="album-name">Album Name :</label>
                                    <input type="text" class="form-control" name="album_name" id="album-name" aria-label="Name-album">
                                </div>
                                <div class="col">
                                    <label for="singer-id">Singer Name:</label>
                                    <select class="form-select " name="singer_id" aria-label=".form-select example">
                                        <option selected>Choose Singer Name</option>
                                        <?php foreach ($singers as $singer): ?>
                                            <option value="<?php echo $singer['id']?>"><?php echo $singer['name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="clo-12">
                                    <label for="album-img">Album Image :</label>
                                    <input class="form-control" name="image" id="album-img" type="file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" href="new_album.php" class="btn btn-primary">Save</button>
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
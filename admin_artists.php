<?php 
    include "header.php";
    include "database.php"; 
    $singers = $db->query("SELECT * FROM `singers`");

?>
<?php     include "admin_menu.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php if(!empty($_SESSION['login_admin'])):?> 
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <h1 align="center">
            ADD New Artists
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($singers as $i=>$singer) :?>
                        <tr>
                            <th scope="row"><?php echo $i+1; ?></th>
                            <td><?php echo $singer['name'] ?></td>
                            <td ><img src="<?php echo $singer['image']; ?>" class="rounded-3 mx-auto d-block" width="80px" alt="<?php echo $singer['name'] ?>"></td>
                            <td>
                                <a class="btn btn-info btn-sm bi bi-pencil-square mt-1" href="admin_edit_artist.php?id=<?php echo $singer['id']?>"></a>
                                <button type="button" class="btn btn-danger btn-sm bi bi-trash mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $singer['id'];?>"></button>
                                <div class="modal fade" id="exampleModal<?php echo $singer['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $singer['id'];?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title text-white" id="exampleModalLabel<?php echo $singer['id'];?>">!! Warning !!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure want to delete this artists?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                            <a href="delete_singer.php?id=<?php echo $singer['id']?>" class="btn btn-danger">Yes Delete it</a>
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
                        <h3 class="modal-title text-white" id="exampleModalLabel">New Artist</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="new_singer.php" method="post" enctype="multipart/form-data" role="form">
                            <div class="row">
                                <div class="col">
                                    <label for="singer-name">Name :</label>
                                    <input type="text" class="form-control" name="singer_name" id="singer-name" aria-label="Name-singer">
                                </div>
                                
                            </div>
                            <div class="row mt-3">
                                <div class="clo-12">
                                    <label for="singer-img">Singer Image :</label>
                                    <input class="form-control" name="image" id="singer-img" type="file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" href="new_singer.php" class="btn btn-primary">Save</button>
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
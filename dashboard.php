<?php
    include "header.php";
    include "database.php";

    $singers = $db->query("SELECT * FROM `singers`");
    $albums = $db->query("SELECT * FROM `albums`");
    $musics = $db->query("SELECT * FROM `music`");
?>
<?php if(!empty($_SESSION['login_admin'])):?> 
    
        <h1 class="mb-1">
            Dashboard
        </h1>
        <?php include "admin_menu.php"; ?>
        <div class="col-lg-2 my-2 col-md-4 col-sm-4 col-xs-5 bg-danger rounded-4 p-3 bg-opacity-75 me-5">
            <div class="card text-light text-center bg-danger bg-opacity-75">
                <div class="card-header">
                    Albums :
                </div>
                <div class="card-body">
                    <?php echo $albums->num_rows; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 my-2 col-md-4 col-sm-4 col-xs-5 bg-warning rounded-4 p-3 bg-opacity-75 me-5">
            <div class="card text-light text-center bg-warning bg-opacity-75">
                    <div class="card-header">
                        Artists :
                    </div>
                    <div class="card-body">
                        <?php echo $singers->num_rows; ?>
                    </div>
                </div>
            </div>
        <div class="col-lg-2 my-2 col-md-4 col-sm-4 col-xs-5 bg-info rounded-4 p-3 bg-opacity-75 me-5">
            <div class="card text-light text-center bg-info bg-opacity-75">
                    <div class="card-header">
                        Musics :
                    </div>
                    <div class="card-body">
                        <?php echo $musics->num_rows; ?>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>
    function lightter(x)
    {
        x.classList.remove('text-light');
        x.classList.add('text-white');
    }
    function darker(x)
    {
        x.classList.remove('text-white');
        x.classList.add('text-light');
    }
</script>
<?php else:
        header("Location:index.php");
endif;?>

<?php
    include "footer.php";

?>
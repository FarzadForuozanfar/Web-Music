<?php 
    include "header.php";

?>

<div class="container-fluied  rounded-4 p-2 mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-2">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Login To Dashboard
                    </h2>
                </div>
                <div class="card-body">
                <form method="post" action="admin_login_proccess.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remmember Me</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include "footer.php";
?>
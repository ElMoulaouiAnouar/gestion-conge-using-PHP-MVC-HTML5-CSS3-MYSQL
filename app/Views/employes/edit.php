<?php
$userController = new UserController;
$user = $userController->getUser($data['id']);
?>
<div class="container">
    <div class="row">
        <div class="col col-sm-10 col-md-8 col-lg-6 mx-auto mt-3">
            <div class="card">
                <div class="card-header text-center">
                    Edit User
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?php  require_once '../app/Views/inc/form.php'?>
                        <div class="m-2">
                            <button type="submit" class="form-control bnt btn-outline-primary" name="btn_update">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
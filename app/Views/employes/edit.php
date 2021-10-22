<?php
$file_name = explode('.',basename(__FILE__))[0];
$employeController = new EmployeController();
//instance from class validation
$validation = new Validation();
//send instance to argument function uypdate  
//$data['id'] is parameter  url example (employe/edit/1) 
$user = $employeController->update($data['id'],$validation);
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
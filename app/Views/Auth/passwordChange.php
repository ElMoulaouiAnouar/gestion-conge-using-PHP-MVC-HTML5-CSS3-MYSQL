<?php 
$validation = new Validation();
$resetPassword = new ResetPasswordController();
$formData = $resetPassword->ChangePassword($validation,$data['email'],$data['token']);
?>
<div class="container-fluid bg-light h-100 d-flex align-items-center justify-content-center">
    <div class="bg-white p-2" style="width: 390px;">
        <?php include '../app/Views/inc/alert.php';?>
        <h3 class="text-primary text-center">Chose New Password</h3>
        <div class="m-2">
            <form method="post" action="">
                <div class="m-2">
                    <input type="password" name="password" class="form-control" placeholder="New Password" value="<?php echo (!is_null($formData)) ? $formData['password'] : '' ?>">
                    <div class="text-danger m-1"><?php echo $validation->DisplayError('password') ?></div>
                </div>
                <div class="text-danger ms-3"></div>
                <div class="m-2">
                    <input type="password" name="confirmed_password" class="form-control" placeholder="Confirmed Password" value="<?php echo (!is_null($formData)) ? $formData['confirmed_password'] : '' ?>">
                    <div class="text-danger m-1"><?php echo $validation->DisplayError('confirmed_password') ?></div>
                </div>
                <div class="text-danger ms-3"></div>
                <div class="m-2">
                    <button class="btn btn-primary form-control" type="submit" name="btn_save"><i class="fa fa-send"></i> Save And Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

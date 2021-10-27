<?php 
 $resetPassword = new ResetPasswordController();
 $resetPassword->sendToEmail();
?>

<div class="container-fluid bg-light h-100 d-flex align-items-center justify-content-center">
        <?php require '../app/Views/inc/alert.php'?>
    <div class="bg-white p-2" style="width: 390px;">
        <h3 class="text-primary text-center">Forgot Password</h3>
        <div class="text-center p-2">Enter Your Email Address To Reset Password</div>
        <div class="m-2">
            <form method="post" action="">
                <input type="email" required name="email" class="form-control" placeholder="Example@mail.com">
                <div class="m-3 mx-4">
                    <button class="btn btn-primary form-control" type="submit" name="btn_send"><i class="fa fa-send"></i> Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
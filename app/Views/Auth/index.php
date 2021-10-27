<?php 
if(isset($_SESSION['user_id'])){
    redirect::to('home/index');
}
    $data = Validation::$data;
     //instance obgect from class validation
     $validation = new Validation();
    //check if click button login
    if(isset($_POST['btn_login'])){
        
        //filter data(email and password)
        $data = [
            'email' => Filters::FilterInput($_POST['email']),
            'password' => Filters::FilterInput($_POST['pass'])
        ];
        //validate data(email and password) using function validate pre difiene to class vlidation
        $validation->Validate($data,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // check if exists un error
        if($validation->ErrorCount() == 0){
           $userController = new UserController();
           $userController->CheckLogin($data);
        }
    }

?>
<div class="container">
    <div class="row mt-4">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <p class="h5 text-center">Login</p>
                    </div>             
                </div>
                <div class="card-bodsy">
                <?php include '../app/Views/inc/alert.php';?>
                    <form method="POST" action="">
                        <div class="m-1 mb-2">
                           <div class="input-group">
                               <span class="input-group-text">@</span>
                               <input type="email" name="email" placeholder="Example@mail.com" value="" class="form-control" value="<?php echo $data['email'] ?? '' ?>">
                           </div>
                           <div class="text-danger m-1"><?php echo $validation->DisplayError("email") ?></div>
                        </div>
                        <div class="m-1 mb-2">
                            <div class="input-group">
                               <span class="input-group-text"><i class="fa fa-lock"></i></span>
                               <input type="password" name="pass" placeholder="Password" value="" class="form-control">
                           </div>
                           <div class="text-danger m-1"><?php echo $validation->DisplayError("password"); ?></div>
                        </div>
                        <div class="m-1">
                            <button type="submit" class="btn btn-outline-primary form-control" name="btn_login">Login</button>
                        </div>
                        <div>
                            <a href="<?php echo BASE_URL ?>/user/reset" style="text-decoration:none;margin-left:5px;font-size:17px">Forgot Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
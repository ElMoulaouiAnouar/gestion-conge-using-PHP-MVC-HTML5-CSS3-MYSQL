<?php 
$validation = new Validation();

$data = (new DemandController())->store($validation);

?>
<div class="container">

<div class="row">
    <div class="col-10 col-sm-8 col-md-6 col-lg-5 mx-auto mt-3">
        <div class="card">
            <div class="card-header text-center">
                Demande Un Conge
            </div>
            <div class="card-body">
                <?php  require '../app/Views/inc/alert.php'?>
                <form action="" method="post">
                    <div class="m-2">
                    <label for="date_debut" class="form-label">Date Debut :</label>
                        <input class="form-control" type="date" name="date_debut" value="<?php echo $data['date_debut'] ?? '' ?>">
                        <div class="text-danger m-1"><?php echo $validation->DisplayError('date_debut') ?></div>
                    </div>
                    <div class="m-2">
                    <label for="date_fin" class="form-label">Date Fin :</label>
                        <input class="form-control" type="date" name="date_fin" value="<?php echo $data['date_fin'] ?? '' ?>">
                        <div class="text-danger m-1"><?php echo $validation->DisplayError('date_fin') ?></div>
                    </div>
                    <div class="m-2">
                        <button type="submit" name="btn_add" class="form-control btn btn-outline-primary"><i class="fa fa-send"></i> Demander</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
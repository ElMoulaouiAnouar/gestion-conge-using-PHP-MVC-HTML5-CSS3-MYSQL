<div class="container">

<div class="card m-1">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">Mes Demandes</h3>
            </div>
        </div>
        <div class="card-body">
        <div class="d-flex align-items-center justify-content-center">
            <a href="<?=BASE_URL?>demand/MesDemands" class="btn btn-primary mx-1">All Demands</a>
            <a href="<?=BASE_URL?>demand/MesDemands/accepte" class="btn btn-success mx-1">Demands Accepte</a>
            <a href="<?=BASE_URL?>demand/MesDemands/refuse" class="btn btn-warning mx-1">Demands Refuse</a>
            <a href="<?=BASE_URL?>demand/MesDemands/attend" class="btn btn-warning mx-1">Demands Attend</a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date Demande</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Status</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $demand):?>
                    <tr>
                        <td><?php echo $demand->date_demande?></td>
                        <td><?php echo $demand->date_debut?></td>
                        <td><?php echo $demand->date_fin?></td>
                        <td><?php echo $demand->etat?></td>
                        <td>
                            <a title="delete" href="<?echo BASE_URL ?>demand/destroy/<?php echo $demand->id_demande ?>" class="btn btn-danger btn-sm ms-3" onclick="return confirm('voller-vous delete this demende')"><i class="fa fa-trash"></i></a>
                        </td>
                        
                    </tr>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date Demande</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Status</th>
                        <th>Operations</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>


</div>
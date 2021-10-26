<div class="container">

<div class="card m-1">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">List Demandes</h3>
            </div>
        </div>
        <div class="card-body">
        <div class="d-flex align-items-center justify-content-center">
            <a href="<?=BASE_URL?>demand/index" class="btn btn-primary mx-1">All Demands</a>
            <a href="<?=BASE_URL?>demand/index/accepte" class="btn btn-success mx-1">Demands Accepte</a>
            <a href="<?=BASE_URL?>demand/index/refuse" class="btn btn-warning mx-1">Demands Refuse</a>
            <a href="<?=BASE_URL?>demand/index/attend" class="btn btn-warning mx-1">Demands Attend</a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Date Demande</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Employe Demander</th>
                        <th>Email demand</th>
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
                        <td><?php echo ucwords($demand->nomprenom) ?></td>
                        <td><?php echo $demand->email ?></td>
                        <td><?php echo $demand->etat?></td>
                        <td>
                            <a title="delete" href="<?echo BASE_URL ?>demand/destroy/<?php echo $demand->id_demande ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a title="accept" href="<?echo BASE_URL ?>demand/ChangeStatus/<?php echo $demand->id_demande ?>/accepte" class="btn btn-success btn-sm"><i class="fa fa-save"></i></a>
                            <a title="refuse" href="<?echo BASE_URL ?>demand/ChangeStatus/<?php echo $demand->id_demande ?>/refuse" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i></a>
                        </td>
                        
                    </tr>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date Demande</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>demand Demander</th>
                        <th>Email demand</th>
                        <th>Status</th>
                        <th>Operations</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>


</div>
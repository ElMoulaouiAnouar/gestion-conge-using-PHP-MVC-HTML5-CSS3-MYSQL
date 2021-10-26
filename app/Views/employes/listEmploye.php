
<div class="container">

    <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="text-center">List Employes</h3>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nom & Prenom</th>
                            <th>DateNaissance</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Gander</th>
                            <th>Password</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $employe):?>
                        <tr>
                            <td><?php echo $employe->nom.' '.$employe->prenom ?></td>
                            <td><?php echo $employe->datenaissance?></td>
                            <td><?php echo $employe->email?></td>
                            <td><?php echo $employe->tel?></td>
                            <td><?php echo $employe->gander == 1 ? 'Male' : 'Famale'?></td>
                            <td><?php echo $employe->pass?></td>
                            <td>
                                <a title="delete" href="<?echo BASE_URL ?>employe/destroy/<?php echo $employe->id_employe ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <a title="edit" href="<?echo BASE_URL ?>employe/edit/<?php echo $employe->id_employe ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                            
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nom & Prenom</th>
                            <th>DateNaissance</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Gander</th>
                            <th>Password</th>
                            <th>Operations</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
    </div>


</div>
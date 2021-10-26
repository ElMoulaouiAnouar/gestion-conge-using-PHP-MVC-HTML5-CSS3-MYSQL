<?php 
  $userController = new UserController();
  $user = $userController->getUser($_SESSION['user_id']);
?>
<div class="card m-1 mt-3 mx-auto" style="max-width: 500px;">
              <div class="card-header text-center bg-white">
                Informations User
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>Nom </td>
                      <td><?php echo $user['nom'] ?></td>
                    </tr>
                    <tr>
                      <td>Prenom </td>
                      <td><?php echo $user['prenom'] ?></td>
                    </tr>
                    <tr>
                      <td>Email </td>
                      <td><?php echo $user['email'] ?></td>
                    </tr>
                    <tr>
                      <td>Telephone </td>
                      <td><?php echo $user['tel'] ?></td>
                    </tr>
                    <tr>
                      <td>Gander </td>
                      <td><?php echo  $user['gander'] == 1 ? 'male' : 'fammale' ?></td>
                    </tr>
                    <tr>
                      <td>Data de naissance </td>
                      <td><?php echo $user['datenaissance'] ?></td>
                    </tr>
                    <tr>
                      <td>Type User </td>
                      <td><?php echo $user['id_type_user'] == 1 ? 'admin' : 'user' ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="text-center">
                  <a class="btn btn-outline-primary" href="<?php echo BASE_URL ?>employe/edit/<?php echo $user['id_employe'] ?>">Modifier</a>
            </div>
         </div>
</div>
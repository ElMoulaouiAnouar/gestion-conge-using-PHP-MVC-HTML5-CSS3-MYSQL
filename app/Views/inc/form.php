<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
        <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo $user['nom'] ?? '' ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('nom') : '';  ?></div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
        <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $user['prenom'] ?? '' ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('prenom') : '';  ?></div>
</div>
<?php if($file_name == 'create'){?>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text">@</div>
        <input type="email" class="form-control" name="email" placeholder="Example@mail.com" value="<?php echo $user['email'] ?? '' ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('email') : '';  ?></div>
</div>
<?php }?>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-phone"></i></div>
        <input type="tel" class="form-control" name="tel" placeholder="06xxxxxxxx" value="<?php echo $user['tel'] ?? '' ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('tel') : '';  ?></div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        <input type="date" class="form-control" name="datenaissance" value="<?php echo $user['datenaissance'] ?? '' ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('datenaissance') : '';  ?></div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-transgender"></i></div>
        <select name="gander" class="form-select">
            <option value="1" <?php echo $user['gander']==1 ? 'selected': '' ?>>Male</option>
            <option value="0" <?php echo $user['gander']==0 ? 'selected': '' ?>>famale</option>
        </select>
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('gander') : '';  ?></div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-lock"></i></div>
        <input type="password" class="form-control" name="password" placeholder="***************" value="<?php echo $user['pass'] ?? $user['password'] ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('password') : '';  ?></div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-lock"></i></div>
        <input type="password" class="form-control" name="confirmed_password" placeholder="Confirmation password" value="<?php echo $user['confirmed_password'] ?? '' ?>">
    </div>
    <div class="text-danger m-1"><?php echo isset($validation) ? $validation->DisplayError('confirmed_password') : '';  ?></div>
</div>
<?php if($file_name == 'create'){?>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
        <select name="type_user" class="form-select">
            <option value="1">admin</option>
            <option value="2">user</option>
        </select>
    </div>
<?php }?>
</div>
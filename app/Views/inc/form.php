<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
        <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo $user->nom ?? '' ?>">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
        <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $user->prenom ?? '' ?>">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text">@</div>
        <input type="email" class="form-control" name="email" placeholder="Example@mail.com" value="<?php echo $user->email ?? '' ?>">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-phone"></i></div>
        <input type="tel" class="form-control" name="tel" placeholder="06xxxxxxxx" value="<?php echo $user->tel ?? '' ?>">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        <input type="date" class="form-control" name="date" value="<?php echo $user->datenaissance ?? '' ?>">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-transgender"></i></div>
        <select name="gander" class="form-select">
            <option value="1">Male</option>
            <option value="0">famale</option>
        </select>
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-lock"></i></div>
        <input type="password" class="form-control" name="pass" placeholder="***************" value="<?php echo $user->pass ?? '' ?>">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-lock"></i></div>
        <input type="password" class="form-control" name="confirm_pass" placeholder="Confirmation password">
    </div>
</div>
<div class="m-2">
    <div class="input-group">
        <div class="input-group-text"><i class="fa fa-user"></i></div>
        <select name="gander" class="form-select">
            <option value="1">admin</option>
            <option value="2">user</option>
        </select>
    </div>
</div>
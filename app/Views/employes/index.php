<?php 
    //check if user admin show info General
    if($_SESSION['type_user']=='admin'){
        require 'infoGeneral.php';
    }
    //require info user
    require 'infoUser.php';
?>

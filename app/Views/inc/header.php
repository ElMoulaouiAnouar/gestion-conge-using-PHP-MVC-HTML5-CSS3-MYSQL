<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      
      nav ul li a{
        font-size: 18px;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;
        letter-spacing: 1px;
      }
      body{
        user-select: none;
      }
        
      .notification i{
        font-size: 27px;
        margin-right: 1rem;
        color:greenyellow;
      
      }
      .notification {
        position: relative;
      }
      .nbr_notif{
        position: absolute;
        top:0;
        left: 3px;
        font-size: 17px;
        font-weight: 600;
      }

      /*change postion input filter in page listEmploye to attribute datatable*/
      div#example_filter {
         position: relative;
      }

      #example_filter label {
          position: absolute;
          right: 0;
      }

    </style>
</head>
<body>
  <?php if(isset($_SESSION['user_id'])){?>
<div class="container-fluid">
          <div class="row" style="height: 100%; padding-bottom: 10px;">
            <div class="col-11 mx-auto shadow p-0" <?php //style="height: 100%;" ?>>
              <!-- begin nav -->
              <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-2">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link"  href="<?=BASE_URL ?>home/index">Accuiel</a>
                      </li>
                      <?php if($_SESSION['type_user'] == 'admin'){?>

                            <li class="nav-item" id="tt">
                              <a class="nav-link"  href="<?=BASE_URL ?>employe/ListEmploye">ListEmploye</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link"  href="<?=BASE_URL?>demand/index">ListDemande</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link"  href="<?=BASE_URL?>employe/create">AddEmploye</a>
                            </li>

                      <?php }
                        else{
                      ?>

                            <li class="nav-item" id="tt">
                              <a class="nav-link"  href="<?=BASE_URL ?>demand/create">Demande Conge</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link"  href="<?=BASE_URL?>demand/MesDemands">Mes Demandes</a>
                            </li>
                       <?php }?>

                          </ul>
                          
                    <ul class="navbar-nav">

                        <?php if($_SESSION['type_user'] == 'admin') {?>
                          <li class="nav-item" title="<?php echo (new DemandController())->GetTotalNotification().' Notification'?>">
                              <a class="nav-link notification"  href="<?php echo BASE_URL?>demand/index">
                                <i class="fa fa-Bell" ></i>
                                <span  class="nbr_notif"><?php
                                    echo (new DemandController())->GetTotalNotification();
                                ?></span>
                              </a>
                            </li>
                          <?php }?>
                      <li class="nav-item">
                        <a class="nav-link"  href="<?= BASE_URL?>user/logout">LogOut</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link bg-secondary p-2 ms-2 border border-3 rounded-circle"  href="<?php echo BASE_URL?>home/index"><i class="fa fa-user"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

<?php }?>
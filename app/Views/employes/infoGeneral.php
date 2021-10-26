<?php 
$demandController = new DemandController();
?>
<h1 class="text-center">Informations Demands</h1>
            <div class="d-flex flex-wrap justify-content-center">
              
              <div class="card text-white bg-primary m-3" style="max-width: 12rem;max-height:7rem;">
                <div class="card-header">All Dommands</div>
                <div class="card-body">
                  <h5 class="card-title">Total : <?php echo $demandController->getTotalDemands(''); ?></h5>
                </div>
              </div>


              <div class="card text-white bg-success m-3" style="max-width: 12rem;max-height:7rem;">
                <div class="card-header">Demande Accepte</div>
                <div class="card-body">
                  <h5 class="card-title">Total : <?php echo $demandController->getTotalDemands('accepte'); ?></h5> </div>
              </div>
              <div class="card text-white bg-danger m-3" style="max-width: 12rem;max-height:7rem;">
                <div class="card-header">Demande Attends</div>
                <div class="card-body">
                  <h5 class="card-title">Total : <?php echo $demandController->getTotalDemands('attend'); ?></h5></div>
              </div>
              <div class="card text-dark bg-warning m-3" style="max-width: 12rem;max-height:7rem;">
                <div class="card-header">Demande Refuse</div>
                <div class="card-body">
                  <h5 class="card-title">Total : <?php echo $demandController->getTotalDemands('refuse'); ?></h5>
                </div>
              </div>

            </div>
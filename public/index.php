<?php
session_start();
require_once '../app/autoload.php';

require '../app/Views/inc/header.php';
new Core();
require '../app/Views/inc/footer.php';

?>

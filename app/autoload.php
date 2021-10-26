<?php
require_once '../app/Config/Config.php';
spl_autoload_register(function($className){
    $array_paths = [
        '../app/Config/',
        '../app/Controllers/',
        '../app/helpers/',
        '../app/librareis/',
        '../app/Models/'
    ];

    foreach ($array_paths as $path) {
        # code...
        $fileName = $path.$className.'.php';
        if(file_exists($fileName)){
            require $fileName;
        }
    }

});
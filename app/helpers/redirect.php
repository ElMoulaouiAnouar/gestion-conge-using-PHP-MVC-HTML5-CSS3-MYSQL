<?php 
class redirect{
    static public function To($path)
    {
        # code...
        header("location: ".BASE_URL.$path);
    }
}
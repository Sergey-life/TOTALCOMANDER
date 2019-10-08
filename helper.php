<?php
 function createFolder($dir ,$name)
 {
    mkdir($dir .'/'. $name);
 }

 function p($i)
 {
     echo '<pre>';
     var_dump($i);
     echo '</pre>';
 }

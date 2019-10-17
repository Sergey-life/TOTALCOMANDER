<?php
// Создаю директорию
 function createFolder($dir ,$name)
 {
    mkdir($dir .'/'. $name);
 }
 //Вывожу на экран что-то если нужно
 function p($i)
 {
     echo '<pre>';
     var_dump($i);
     echo '</pre>';
 }
 

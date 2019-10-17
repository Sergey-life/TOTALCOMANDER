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
 function getFolders($path){
     $folders =[];
     $files = scandir($path);
     foreach ($files as $file) {
         if ($file != '.' && $file != '..' & $file != '.DS_Store') {
             $currentDir[] = $file;
             array_push($folders, $file);
         }
     }
     return $folders;
 }
 

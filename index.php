<?php

const ROOT = __DIR__.'/files';
const INDEX = '/files';
require_once 'helper.php';

if (!empty($_POST['create'])){
    $dir = ROOT;
    createFolder($dir, $_POST['create']);
}

$files = scandir($dir);
foreach ($files as $file){
    if ($file != '.' && $file != '..' & $file != '.DS_Store') {
        $currentDir[] = $file;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Document</title>
</head>
<body>
<form action="" method="post" >
    <input type="text" name="create">
    <input type="submit" value="create to folder">
</form>

<h1>Files:</h1>

<?php foreach ($currentDir as $value) : ?>
<p>
    <a href="<?= $value ?>"><?= $value ?></a>
</p>

<?php endforeach; ?>

</body>
</html>








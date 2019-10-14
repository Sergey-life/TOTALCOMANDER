<?php
session_start();
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

if (!empty($_POST['delete'])) {
    $folderName = $_POST['delete'];
    try {
        rmdir($dir . DIRECTORY_SEPARATOR . $folderName);
    } catch (Error $e) {

    }
}

p($dir . DIRECTORY_SEPARATOR . $folderName);
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

<?php
foreach ($currentDir as $value) {
    echo "$value
<form method=\"post\" action=\"#\">
   <input type='text' name='delete' value='$value'>
        <input value='delete $value' type='submit'>
    </form>";
}
       ?>

</body>
</html>








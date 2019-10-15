<?php
session_start();
const ROOT = __DIR__ . '/files';
require_once 'helper.php';
$folders = [];
if (!empty($_POST['create'])) {
    $dir = ROOT;
    createFolder($dir, $_POST['create']);
} else {
    $dir = ROOT;
}
if (!empty($_POST['delete-folder'])) {
    var_dump($_POST);
    $folderName = $_POST['delete-folder'];
    try {
        rmdir($dir . DIRECTORY_SEPARATOR . $folderName);
    } catch (Error $e) {
    }
}
$files = scandir($dir);
foreach ($files as $file) {
    if ($file != '.' && $file != '..' & $file != '.DS_Store') {
        $currentDir[] = $file;
        array_push($folders, $file);
    }
}

if($_POST['last-name'] && $_POST['new-name']){
    $lastName=$_POST['last-name'];
    $newName =$_POST['new-name'];
    rename($dir . DIRECTORY_SEPARATOR . $lastName, $dir . DIRECTORY_SEPARATOR . $newName);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<p>
<form action="" method="post">
    <input type="text" name="create">
    <input type="submit" value="create to folder">
</form>

<h1>Files:</h1>

<?php
p($folders);
if (!empty($folders)) {
    foreach ($folders as $folderName) {
        ?>
       <p><form method="post" action="#">
            <?= $folderName ?>
            <input type='text' name='delete-folder' value='<?= $folderName ?>' hidden>
            <input value='delete <?= $folderName ?>' type='submit'>
        </form>
        </p>

    <form method='post' action='#'>
    <input type='text' value='<?= $folderName ?>' name='last-name' hidden>
    <input type='text' value='<?= $folderName ?>' name='new-name'>
    <input type='submit' value='rename'>
    </form>
        <?php
    }
}
//?>

</body>
</html>

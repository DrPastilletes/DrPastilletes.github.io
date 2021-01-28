<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form method="post" action="../controller/filesaws.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="uploadFile">file pls</label>
        <input type="file" class="form-control-file" id="uploadFile" name="uploadFile">
        <input type="submit" name="enviar">
    </div>
</form>

</body>
</html>
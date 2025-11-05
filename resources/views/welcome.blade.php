<?php

$data = file_get_contents("https://deskplan.lv/muita/app.json");
$mdata = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
   <p>Hello, welcome to the Muita application!</p>

    <span>
      <?php echo $mdata['total']['vehicles']; ?>
    </span>
</body>
</html>
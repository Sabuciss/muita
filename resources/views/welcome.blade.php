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

        <h2>Transportlīdzekļi</h2>
    <ul>
        @foreach($vehicles as $vehicle)
        <li>{{ $vehicle['plate_no'] }} | {{ $vehicle['make'] }} | {{ $vehicle['model'] }} | {{ $vehicle['country'] }}</li>
        @endforeach
    </ul>

<h2>Pārbaudes lietas</h2>

    <ul>
        @foreach($cases as $case)
        <li>{{ $case['external_ref'] }} | Statuss: {{ $case['status'] }} | Prioritāte: {{ $case['priority'] }}</li>
        @endforeach
    </ul>


</body>
</html>
<?php
$lat = 24.4826552;
$long = 39.554294;
// echo
'https://www.latlong.net/c/?lat='.$lat.'&long='.$long.'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
</head>
<body>
    <h1><a href="<?= 'https://www.latlong.net/c/?lat='.$lat.'&long='.$long.'' ?>" target="_blank">Go ToLocation</a></h1>
</body>
</html>
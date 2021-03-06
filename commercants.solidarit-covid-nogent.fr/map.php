<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SolidariT - Commercants</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
</head>
<body>
<h2>Bienvenue sur</h2>
<h1>SolidariT - Commercants</h1>
<h3>Vous trouverez ici la carte des demandes de livraisons :</h3>
<?php
$link = mysqli_connect('185.98.131.109', 'solid1346221', 'lugei1xz6q', 'solid1346221');

$sql = 'SELECT * FROM demandes;';
$result = $link->query($sql);
?>
<div id="mapid"></div>

<script>
    var mymap = L.map('mapid').setView([48.8396, 2.4768], 14);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoidWx0cndycyIsImEiOiJjazhhZGEwNzkwMTdqM29xcDlrNjdkODFrIn0.P5oLEvX4I8w60DOtnveikg'
    }).addTo(mymap);
    <?
    while($row = $result->fetch_assoc()) { ?>
    var marker = L.marker([ <? echo($row['lat']); ?>, <? echo($row['lon']); ?>]).addTo(mymap);
    marker.bindPopup("<? echo($row['prenom'])?> <? echo($row["nom"]) ?> <? echo($row['telephone']) ?> ");
    <? }
    mysqli_close($link); ?>
</script>

</body>
</html>
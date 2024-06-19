<?php
$locationId = $_GET['id'];
$location = $service->getHistoryLocationById($locationId);
$nextLocation = $_GET['id'] + 1;
$previousLocation = $_GET['id'] - 1;

if ($locationId == 1) {
    $previousLocation = count($service->getAllHistoryLocations());
}

if ($locationId == count($service->getAllHistoryLocations())) {
    $nextLocation = 1;
}

include __DIR__ . '/../header.php'
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="/css/history_style.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

<div id="titleBlock">
    <img src="\img\history\history_header.png" alt="header image" id="headerImage">
    <div>
        <p id="title"><?= $location->name ?></p>
    </div>
</div>

<div id="locationDetailPage">
    <div id="locationIntro">
        <div class="row">
            <div class="col-sm">
                <div id="locationMapBackground">
                    <div id="map"></div>
                </div>
                <div id="locationLink">
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                    <a href="https://www.google.com/maps/place/<?= $location->address ?>" target="_blank">
                        <?= $location->address ?>
                    </a>
                </div>
            </div>
            <div class="col-sm" id="locationIntroText">
                <p><?= nl2br($location->text1) ?></p>
            </div>
        </div>
    </div>

    <div id="locationDetails">
        <div id="locationDetailsContent">
            <div class="row">
                <div class="col-6">
                    <img src="\img\history\history_header.png" alt="header image">
                </div>
                <div class="col-6">
                    <p><?= nl2br($location->text2) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p><?= nl2br($location->text3) ?></p>
                </div>
                <div class="col-6">
                    <img src="\img\history\history_header.png" alt="header image">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="\img\history\history_header.png" alt="header image">
                </div>
                <div class="col-6">
                    <p><?= nl2br($location->text4) ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p><?= nl2br($location->text5) ?></p>
                </div>
                <div class="col-6">
                    <img src="\img\history\history_header.png" alt="header image">
                </div>
            </div>
        </div>
        <div id="locationButtons">
            <a href="/history/locationDetails?id=<?= $previousLocation ?>"> Previous Location </a>
            <a href="/history"> <i class="fa-solid fa-house"></i> </a>
            <a href="/history/locationDetails?id=<?= $nextLocation ?>"> Next Location </a>
        </div>
    </div>
</div>

<script>
    var map = L.map('map').setView([52.380744916034196, 4.638064154045008], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker([<?= $location->latitude ?>, <?= $location->longitude ?>]);
    marker.addTo(map)
</script>

<?php
include __DIR__ . '/../footer.php';
?>


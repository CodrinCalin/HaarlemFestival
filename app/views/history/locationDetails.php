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
<link href="/css/history_style.css" rel="stylesheet">

<div id="titleBlock">
    <img src="\img\history\history_header.png" alt="header image" id="headerImage">
    <div>
        <p id="title"><?= $location->name ?></p>
    </div>
</div>

<div id="locationDetailPage">
    <div id="locationIntro">
        <div id="locationIntoColourBlock"></div>
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <p><?= nl2br($location->text1) ?></p>
            </div>
        </div>
    </div>

    <div id="locationDetails">
        <div id="locationDetailsContent">
            <div class="row">
                <div class="col-6">

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

                </div>
            </div>
            <div class="row">
                <div class="col-6">

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

                </div>
            </div>
        </div>
        <div id="locationButtons">
            <a href="/history/locationDetails?id=<?= $previousLocation ?>"> Previous Location </a>
            <a href="/history"> Home </a>
            <a href="/history/locationDetails?id=<?= $nextLocation ?>"> Next Location </a>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>


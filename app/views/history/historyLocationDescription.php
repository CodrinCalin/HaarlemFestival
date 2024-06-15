<?php
$locations = $service->getAllHistoryLocations();
?>

<div id="locationDescription">
    <?php
    foreach ($locations as $location) { ?>
        <div class="locationSlides">
            <div class="row">
                <div class="col-sm">
                    <h1><?= $location->name ?></h1>
                    <p><?= $location->description ?></p>
                    <a id="learnMoreLocations" href="/history/locationDetails?id=<?= $location->id ?>">Learn More</a>
                </div>
                <div class="col-sm">
                    <img src="\img\history\history_header.png" alt="image">
                </div>
            </div>
            <div class="smallCard">
                <h1><?= $location->name ?></h1>
                <p><?= $location->description ?></p>
                <a id="learnMoreLocations" href="/history/locationDetails?id=<?= $location->id ?>">Learn More</a>
            </div>
        </div>
    <?php }
    ?>

    <a class="prev" onclick="plusSlides(-1)"> < </a>
    <a class="next" onclick="plusSlides(1)"> > </a>
</div>

<script src="/js/historyLocationsSlideShow.js"></script>


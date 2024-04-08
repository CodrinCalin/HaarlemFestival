<?php
$locations = $service->getAllHistoryLocations();
$currentLocation = 0;
?>

<div id="locationDescription">
    <h1 id="name"><?= $locations[$currentLocation]->name?></h1>
    <p id="description"><?= $locations[$currentLocation]->description ?></p>
    <button>Learn More</button>
    <button onclick="nextCard()"> > </button>
</div>

<script>
    var currentLocation = 0;

    function nextCard() {
        currentLocation++;
        document.getElementById("name").innerHTML = currentLocation;
    }
</script>


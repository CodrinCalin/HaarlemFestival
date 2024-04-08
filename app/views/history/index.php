<?php
include __DIR__ . '/../header.php';
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="/css/history_style.css" rel="stylesheet">

<div id="titleBlock">
    <img src="\img\history\history_header.png" alt="header image" id="headerImage">
    <div>
        <p id="title">Stroll Through History</p>
        <a onclick="document.getElementById('intro').scrollIntoView()">
            <button id="discoverButton">Discover The Event</button>
        </a>
    </div>
</div>

<div id="intro">
    <?php
    $content = $service->getContentById(1);
    ?>
    <h1>Stroll Through History</h1>
    <p><?= nl2br($content->content) ?></p>
    <div class="row">
        <div class="col-sm" onclick="document.getElementById('practicalInformation').scrollIntoView()">
            <div class="imgNav">
                <img src="\img\history\practicalInformation_nav.png">
            </div>
            Practical information
        </div>
        <div class="col-sm" onclick="document.getElementById('schedule').scrollIntoView()">
            <div class="imgNav">
                <img src="\img\history\schedule_nav.png">
            </div>
            Schedule
        </div>
        <div class="col-sm" onclick="document.getElementById('route').scrollIntoView()">
            <div class="imgNav">
                <img src="\img\history\route_nav.png">
            </div>
            Route
        </div>
        <div class="col-sm" onclick="document.getElementById('fAQ').scrollIntoView()">
            <div class="imgNav">
                <img src="\img\history\fAQ_nav.png">
            </div>
            Frequently Asked Question
        </div>
    </div>
</div>

<div id="practicalInformation">
    <h1>Practical Information</h1>
    <div class="row">
        <?php
        $info = $service->getPracticalInformation();
        foreach ($info as $item) { ?>
            <div class="col-sm">
                <div class="infoCard">
                    <img src="<?= $item->addition ?>" alt="icon">
                    <p>
                        <?= nl2br($item->content) ?>
                    </p>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>

<div id="schedule">
    <?php
    $content = $service->getContentById(7);
    ?>
    <h1>Schedule</h1>
    <p id="scheduleDescription"><?= nl2br($content->content) ?></p>
    <?php
    include __DIR__ . '/historySchedule.php';
    ?>
</div>

<div id="route">
    <h1>Route</h1>
    <div class="row">
        <?php
        include __DIR__ . '/historyMap.php';
        ?>
        <div class="meetingPlace">
            <?php
            $title = $service->getContentById(8);
            $address = $service->getContentById(9);
            $description = $service->getContentById(10);
            ?>
            <h1>Meeting Place</h1>
            <div class="meetingPlaceImage">
                <h3><?=$title->content ?></h3>
                <img src="\img\history\meetingPlace.png">
                <p>
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                    <a href="https://www.google.com/maps/place/<?= $address->content ?>" target="_blank">
                        <?= $address->content ?>
                    </a>
                </p>
                <p><?= $description->content ?> </p>
            </div>
        </div>
    </div>
</div>

<div id="locations">
    <h1>Locations</h1>
    <?php
    $locations = $service->getAllHistoryLocations();
    $currentLocation = 0;
    include __DIR__ . '/historyLocationDescription.php';
    ?>
</div>



<div id="fAQ">
    <h1>Frequently Asked Questions</h1>

    <?php
    $faq = $service->getFAQ();
    foreach ($faq as $question) {
        ?>
            <div id="question" class="row">
                <h3 class="col-1" id="plusMinus" onclick="plusMinusChange()">+</h3>
                <p class="col-sm"><?= $question->content ?> </p>
            </div>
    <?php }
    ?>
</div>

<script>
    function plusMinusChange() {
        if (document.getElementById("plusMinus").textContent === "+") {
            document.getElementById("plusMinus").innerHTML = "-";
        }
        else if (document.getElementById("plusMinus").textContent === "-") {
            document.getElementById("plusMinus").innerHTML = "+";
        }

    }
</script>

<div id="orderTicketsButton">
    <a href="/historyTickets">
        <button>Order Tickets</button>
    </a>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
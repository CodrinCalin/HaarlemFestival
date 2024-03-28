<?php
include __DIR__ . '/../header.php';
$service = new \App\Services\historyService();
?>
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
    <p><?= nl2br($content->content) ?></p>
    <?php
    include __DIR__ . '/historySchedule.php';
    ?>

</div>
<div id="route">
    <h1>Route</h1>
    <div class="row">
        <div class="col-7">
            <div id="mapBackground">

            </div>

        </div>
        <div class="col-1">

        </div>
        <div class="col-4">
            <h1 id="meetingPlaceHeader">Meeting Place</h1>
            <img src="\img\history\history_header.png">
        </div>
    </div>
</div>
<div id="locations">
    <h1>Locations</h1>
    <a href="/history/locationDetails">
        <button>Learn More</button>
    </a>

</div>
<div id="fAQ">
    <h1>Frequently Asked Questions</h1>
    <?php
    $faq = $service->getFAQ()
    ?>
    <p>Where do we gather?</p>
    <p>How long does the event last?</p>

</div>

<div id="orderTicketsButton">
    <a href="/historyTickets">
        <button>Order Tickets</button>
    </a>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

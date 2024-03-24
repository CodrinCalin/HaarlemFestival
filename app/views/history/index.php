<?php
include __DIR__ . '/../header.php';
$service = new \App\Services\homeService();
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
    $text = $service->getTextById(6);
    ?>
    <h1>Stroll Through History</h1>
    <p><?= nl2br($text->text) ?></p>
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
    <!--    --><?php
    /*    $model = $service->getTextByCategory("history_practicalInformation");
        foreach ($model as $Text)  {
            echo $model->id;
        }
        */ ?>
    <h1>Practical Information</h1>
    <div class="row">
        
    </div>

    <div class="infoCard">
        <?php
        $text = $service->getTextById(7);
        ?>
        <p><?= nl2br($text->text) ?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(8);
        ?>
        <p><?= nl2br($text->text) ?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(9);
        ?>
        <p><?= nl2br($text->text) ?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(10);
        ?>
        <p><?= nl2br($text->text) ?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(11);
        ?>
        <p><?= nl2br($text->text) ?></p>
    </div>

</div>
<div id="schedule">

</div>
<div id="route">

</div>
<div id="fAQ">

</div>

<div id="orderTicketsButton">
    <a href="/historyTickets">
        <button>Order Tickets</button>
    </a>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

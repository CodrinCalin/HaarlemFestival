<head>
    <title>Page Title</title>
    <link href="/css/home_style.css" rel="stylesheet">
</head>
<body>
<?php
include __DIR__ . '/../header.php';
?>
<?php
$service = new \App\Services\textservice();
?>

<div class="headerContainer">
    <p id="homeHeader">Haarlem Festival</p>
    <img src="\img\festival_home_header.png" alt="header image" id="headerImage">
</div>
<div id="eventOverview">
    <h1 class="header">The Events</h1>
    <div class="navFrame">
        <div class="navFrameCard">
            <a href="#dance">
                <img src="\img\dance_nav.png" class="smtsmtimg">DANCE!
            </a>
        </div>

        <a href="#yummy">
            <img src="\img\yummy_nav.png" class="smtsmtimg">Yummy!
        </a>
        <a href="#history">
            <img src="\img\history_nav.png" class="smtsmtimg">Stroll Through History
        </a>
        <a href="#teyler">
            <img src="\img\teyler_nav.png" class="smtsmtimg">The Secret of Professo Teyler
        </a>
    </div>
</div>
<div class="schedule">
    <?php
    $text = $service->getTextById(1);
    ?>
    <h1 class="header">Full Schedule</h1>
    <h2><?=$text->text ?></h2>
</div>
<div class="events">
    <div id="dance">
        <?php
        $text = $service->getTextById(2);
        ?>
        <h1 class="header">
            Dance!
        </h1>
        <p><?=nl2br($text->text)?></p>
        <button class="homeButton">Learn More About The Event</button>
    </div>
    <div id="yummy">
        <?php
        $text = $service->getTextById(3);
        ?>
        <h1 class="header">
            Yummy!
        </h1>
        <p><?=nl2br($text->text)?></p>
        <button class="homeButton">Learn More About The Event</button>
    </div>
    <div id="history">
        <?php
        $text = $service->getTextById(4);
        ?>
        <h1 class="header">
            Stroll Through History
        </h1>
        <p><?=nl2br($text->text)?></p>
        <a href="/history"><button class="homeButton">Learn More About The Event</button></a>
    </div>
    <div id="teyler">
        <?php
        $text = $service->getTextById(5);
        ?>
        <p>Haarlem Festival App</p>
        <h1 class="header">Interactive Museum <br> Puzzles For Children</h1>
        <p><?=nl2br($text->text)?></p>
        <p>Download the app</p>
        <p>Or use your camera and scan the QR code</p>
    </div>
</div>
<?php
include __DIR__ . '/../footer.php';
?>
</body>
</html>



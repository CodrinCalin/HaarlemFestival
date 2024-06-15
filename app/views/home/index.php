<?php
include __DIR__ . '/../header.php';
$service = new \App\Services\homeService();
?>
<link href="/css/home_style.css" rel="stylesheet">
<div class="headerContainer">
    <p id="homeHeader">Haarlem Festival</p>
    <img src="\img\homepage\festival_home_header.png" alt="header image" id="headerImage">
</div>
<div id="eventOverview">
    <h1 class="header">The Events</h1>
    <div class="navFrame">
        <div class="row">
            <a href="#dance" class="col-3">
                <img src="\img\homepage\dance_nav.png">
                <p>DANCE!</p>
            </a>
            <a href="#yummy" class="col-3">
                <img src="\img\homepage\yummy_nav.png">
                <p>Yummy!</p>
            </a>
            <a href="#history" class="col-3">
                <img src="\img\homepage\history_nav.png">
                <p>Stroll Through History</p>
            </a>
            <a href="#teyler" class="col-3">
                <img src="\img\homepage\teyler_nav.png">
                <p>The Secret of Professor Teyler</p>
            </a>
        </div>
    </div>
</div>
<div class="schedule">
    <?php
    include __DIR__ . '/fullSchedule.php';
    ?>
</div>
<div class="events">
    <?php
    include __DIR__ . '/eventsIntroduction.php'
    ?>
</div>
<?php
include __DIR__ . '/../footer.php';
?>



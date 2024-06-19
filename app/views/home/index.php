<?php
include __DIR__ . '/../header.php';
?>
<link href="/css/home_style.css" rel="stylesheet">
<div class="headerContainer">
    <p id="homeHeader">Haarlem Festival</p>
    <?php
    $image = $service->getContentById(20);
    ?>
    <img src="<?= htmlspecialchars($image->text, ENT_QUOTES, 'UTF-8') ?>" alt="header image" id="headerImage">
</div>
<div id="eventOverview">
    <h1 class="header">The Events</h1>
    <div class="navFrame">
        <div class="row">
            <?php
            $image1 = $service->getContentById(21);
            $image2 = $service->getContentById(22);
            $image3 = $service->getContentById(23);
            $image4 = $service->getContentById(24);
            ?>
            <a href="#dance" class="col-3">
                <img src="<?= htmlspecialchars($image1->text, ENT_QUOTES, 'UTF-8') ?>">
                <p>DANCE!</p>
            </a>
            <a href="#yummy" class="col-3">
                <img src="<?= htmlspecialchars($image2->text, ENT_QUOTES, 'UTF-8') ?>">
                <p>Yummy!</p>
            </a>
            <a href="#history" class="col-3">
                <img src="<?= htmlspecialchars($image3->text, ENT_QUOTES, 'UTF-8') ?>">
                <p>Stroll Through History</p>
            </a>
            <a href="#teyler" class="col-3">
                <img src="<?= htmlspecialchars($image4->text, ENT_QUOTES, 'UTF-8') ?>">
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



<?php
include __DIR__ . '/../header.php';
$service = new \App\Services\textservice();
?>
<style>
    #practicalInformation {
        background: #47515C;
        color: white;
    }
    .infoCard {
        background: #A9E0DE;
        color: black;
        border-radius: 15px;
        padding: 15px;
        margin: 15px;
    }
</style>
<div>
    <h1>Stroll Through History</h1>
    <button><a href="#intro">Discover The Event</a></button>

</div>
<div id="intro">
    <?php
    $text = $service->getTextById(6);
    ?>
    <h1>Stroll Through History</h1>
    <p><?=nl2br($text->text)?></p>
    <div class="links">
        <ul>
            <li id="practicalInformationLink"><a href="#practicalInformation">Practical information</a></li>
            <li id="scheduleLink"><a href="#schedule">Schedule</a></li>
            <li id="routeLink"><a href="#route">Route</a></li>
            <li id="fAQLink"><a href="#fAQ">Frequently Asked Question</a></li>
        </ul>
    </div>
</div>
<div id="practicalInformation">
<!--    --><?php
/*    $model = $service->getTextByCategory("history_practicalInformation");
    foreach ($model as $Text)  {
        echo $model->id;
    }
    */?>
    <h1>Practical Information</h1>

    <div class="infoCard">
        <?php
        $text = $service->getTextById(7);
        ?>
        <p><?=nl2br($text->text)?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(8);
        ?>
        <p><?=nl2br($text->text)?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(9);
        ?>
        <p><?=nl2br($text->text)?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(10);
        ?>
        <p><?=nl2br($text->text)?></p>
    </div>
    <div class="infoCard">
        <?php
        $text = $service->getTextById(11);
        ?>
        <p><?=nl2br($text->text)?></p>
    </div>

</div>
<div id="schedule">

</div>
<div id="route">

</div>
<div>

</div>
<div id="fAQ">

</div>



<?php
include __DIR__ . '/../footer.php';
?>

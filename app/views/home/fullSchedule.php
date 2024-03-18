<?php
$text = $service->getTextById(1);
$dates = $service->getAllDates();
$events = $service->getAllEvents();
?>
<h1 class="header">Full Schedule</h1>
<h2><?= $text->text ?></h2>
<div class="row">
    <?php
    foreach ($dates as $date) {
        $d = date("D d", strtotime($date));
        echo "<div class='col-sm'>
        <p>$d</p>
    </div>";
    }
    ?>
</div>
<?php
foreach ($events as $event) {
    if ($event->dates == $dates) {
        echo "<div class='row'>
        <div class='col-12 scheduleEvent'>
            <p>$event->name</p>
        </div>
    </div>";
    } else {
        $nextRow = "<div class='row'>";
        $eventcolwidth = 0;
        $dateCount = count($dates);
        foreach ($dates as $date) {
            if (in_array($date, $event->dates)) {
                $eventcolwidth++;
            }
            else {
                if ($eventcolwidth > 0){
                    $nextRow = $nextRow."<div class='scheduleEvent' style='max-width: calc((100% / ($dateCount)
                    * $eventcolwidth));'><p>$event->name</p></div>";
                    $eventcolwidth = 0;
                }
                $nextRow = $nextRow.
                    "<div style='max-width: calc(100% / $dateCount);'></div>";
            }
        }
        if ($eventcolwidth > 0) {
            $nextRow = $nextRow."<div class='scheduleEvent' style='max-width: calc((100% / $dateCount)*$eventcolwidth);'>
            <p>$event->name</p></div>";
        }
        $nextRow = $nextRow."</div>";
        echo $nextRow;
    }
}
?>




<?php
$text = $service->getTextById(1);
$dates = $service->getAllDates();
?>
<h1 class="header">Full Schedule</h1>
<h2><?= $text->text ?></h2>
<div class="row">
    <?php
    foreach ($dates as $date) {
        $d=date("D d", strtotime($date));
        echo "<div class='col-sm'>
        <p>$d</p>
    </div>";
    }
    ?>
</div>



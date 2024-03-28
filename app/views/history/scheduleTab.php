<?php
$tours = $service->getTourByLanguage($language);
$months = array();
foreach ($tours as $tour) {
    if (!in_array($tour->startTime->format('F'), $months)){
        $months[] = $tour->startTime->format('F');
    }
}

$headerString = "";
$headerString = $headerString.$months[0];
if (count($months) > 1) {
    for ($i = 1; $i < count($months); $i++) {
        $headerString = $headerString."-".$months[$i];
    }
}
$headerString = $headerString." ".$tours[0]->startTime->format('Y');
?>

<h3><?= $headerString ?></h3>
<div class="hline"></div>
<div class="row">
    <?php
    $days = array();
    foreach ($tours as $tour) {
        if (!in_array($tour->startTime->format('l d'), $days)) {
            $days[] = $tour->startTime->format('l d');
            ?>
            <div class="col-sm borderColumn">
                <p id="fullDayOfTheWeek">
                    <?= $tour->startTime->format('l')?>
                </p>
                <p id="dayOfTheWeek">
                    <?= $tour->startTime->format('d')?>
                </p>
                <div class="row">
                    <div class="col-6">
                        <p class="underline">Times: </p>
                    </div>
                    <div class="col-6">
                        <p class="underline">Tour guide: </p>
                    </div>
                </div>
                <?php
                foreach ($tours as $item) {
                    if ($tour->startTime->format('l d') == $item->startTime->format('l d')) {
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <p class="bold">
                                    <?= $item->startTime->format('G:i')?>
                                    -
                                    <?= $item->endTime->format('G:i')?>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <?= $item->tourGuide ?>

                                </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        <?php }
    }
    ?>
</div>



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


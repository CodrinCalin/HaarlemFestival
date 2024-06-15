<?php
include __DIR__ . "/../header.php";
?>

<link href="/css/restaurantstyle.css" rel="stylesheet">

    <div class="container-fluid p-0 m-0 yummy">
    <?php
    if($yummyDetails) { ?>
            <img class="darken img-scale" src="/img/png/food-bg.png" alt="People at a festival">
            <div class="yummy-text position-absolute top-50 start-50 px-5">Yummy!</div>
            <div class="date-text position-absolute fw-bold top-50 start-50"><?php echo $yummyDetails->date ?></div>
            <div class="caption-text position-absolute fw-bold text-center vw-100 z-1">A Food Festival in Haarlem</div>

            <div class="details-bg p-4 vw-100 position-relative text-center">
                <h1 class="yummy-details text-black fw-bold vw-100 p-1">Yummy! Food Event Details</h1>
                <p class="yummy-details-text text-black vw-50 mt-2 mb-2"><?php echo $yummyDetails->description ?></p>
                <p class="yummy-details-text text-blue fw-bold vw-50">REMINDER:<br><?php echo $yummyDetails->reminder ?></p>
            </div>

    <?php } else {
        echo "<h3>No Yummy details found.</h3>";
    } ?>

    <?php
    if($categoryModel){

        foreach($categoryModel as $category) { ?>
           <?php include __DIR__ . "/restaurantCard.php"; ?>

        <?php } }else { ?>
            <h3>No Categories found!</h3> <?php } ?>
    </div>





<?php
include __DIR__ . "/../footer.php";
?>

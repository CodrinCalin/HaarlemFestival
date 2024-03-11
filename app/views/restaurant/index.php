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
            <div class='category text-black fw-bold position-relative text-center mt-3 justify-items-center'><?php echo $category->category ?></div>
            <div class="row mt-3 row-cols-3 w-100 justify-content-center mb-5">
                <?php foreach($restaurantModel as $restaurant) {
                    if($restaurant->restaurantCategory == $category->category) { ?>
                        <div class="card mx-5 mt-3 p-0 col-4 text-bg-dark">
                            <img class="darken card-img img-scale" src="/img/png/ratatouille.png" alt="Picture of restaurant <?php echo $restaurant->name ?>">
                            <div class="card-img-overlay d-flex flex-column p-0 mt-3">
                                <h1 class="fw-bold text-center text-blue"><?php echo $restaurant->name ?></h1>
                                <h6 class="content-tag mx-3 px-3 py-2 text-center"><?php echo $restaurant->getTags() ?></h6>
                                <img class="rating align-self-center" src="/img/png/<?php echo $restaurant->rating ?>star.png" alt="<?php echo $restaurant->rating ?>star">
                                <div class="mt-auto d-flex flex-column">
                                    <h6 class="content-tag fw-bold text-center mb-3 mx-5 p-2">
                                        <?php echo $restaurant->address ?><br>
                                        Time Slots Available:<br>
                                        17:00 | 17:00 | 17:00</h6>
                                    <button class="btn btn-outline-info px-5 mx-5 fw-bold mb-5">Learn More</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <h3>Error: No categories found</h3>";
    <?php } ?>
    </div>





<?php
include __DIR__ . "/../footer.php";
?>

<?php
INCLUDE __DIR__ . '/../header.php';
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

        <div class="vw-100 position-relative text-center pt-4 pb-4">
            <a href="/restaurant"><img class="position-absolute d-flex justify-content-start" src="/img/arrow-left-circle.png" alt="return"></a>
            <h1 class="yummy-details fw-bold"><?php echo $restaurantModel->name ?></h1>
            <img class="rating " src="/img/png/<?php echo $restaurantModel->rating ?>star.png" alt="<?php echo $restaurantModel->rating ?>star">
        </div>

        <div class="vw-100 position-relative">
            <img class="darken img-scale" src="/img/restaurant/<?php echo $restaurantModel->frontPageImage ?>" alt="People at a festival">
            <div class="overlay-text position-absolute"><?php echo $restaurantModel->description ?></div>
            <div class="scroll-text position-absolute fw-bold">Scroll Down to Learn More</div>
            <div class="or-text position-absolute">or</div>
            <a class="scroll-button btn btn-outline-info position-absolute">Reserve a table</a>
        </div>

        <div class="vw-100 position-relative pt-5">
            <img class="display-one col-6" src="/img/restaurant/<?php echo $restaurantModel->displayImageOne ?>" alt="Image of Food">
            <div class="menu-header col-6 text-blue fw-bold d-flex justify-content-center">Food and Menu</div>
            <div class="menu-text"><?php echo $restaurantModel->menuText ?></div>
            <a href="<?php echo $restaurantModel->menuLink ?>" class="menu-button btn btn-outline-info">View Menu</a>
        </div>

        <div class="vw-100 position-relative pt-5">
            <div class="fw-bold text-blue information-header col-6 ps-5">Detailed Information</div>
            <div class="box information-text position-absolute ms-5 fw-bold">
                <div>Date: <span><?php echo $yummyDetails->date ?></span></div>
                <div>Address: <span><?php echo $restaurantModel->address ?></span></div>
                <div>Phone: <span><?php echo $restaurantModel->phoneNumber ?></span></div>
                <div>Timeslots: <span>17:00 | 17:00 | 17:00</span></div>
                <div>Price: €<span><?php echo $restaurantModel->adultPrice ?> <br> €<?php echo $restaurantModel->childPrice ?> for children under 12</span></div>
            </div>
            <img class="display-two col-6" src="/img/restaurant/<?php echo $restaurantModel->displayImageTwo ?>" alt="Image of the restaurant">
        </div>

        <div class="vw-100 position-relative pt-5">
            <h1 class="text-center text-blue fw-bold">Reserve a Table</h1>
        </div>
</div>





<?php
INCLUDE __DIR__ . '/../footer.php';
?>

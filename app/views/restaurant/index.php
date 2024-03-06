<?php
include __DIR__ . "/../header.php";
?>
<head>
    <title>Yummy!</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/css/restaurantstyle.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid p-0 m-0">
    <img src="/img/png/food-bg.png" alt="People at a festival">
    <div class="yummy-text position-absolute top-50 start-50 px-5">Yummy!</div>
    <div class="date-text position-absolute fw-bold top-50 start-50">July 25th-28th</div>
    <div class="caption-text position-absolute fw-bold top-50 start-50 text-center vw-100">A Food Festival in Haarlem</div>

    <div class="details-bg p-4 vw-100">
        <h1 class="yummy-details text-black fw-bold position-relative text-center vw-100">Yummy! Food Event Details</h1>
        <p class="yummy-details-text text-black position-relative text-center vw-50 mt-2 mb-2">Come and see the participating restaurants at our very own food event at the Haarlem Festival. Featuring all sorts of different cuisines you're sure to find something you that fits your tastes! Take a quick look at each restaurant and easily find out more about any restaurant and book your very own reservation by clicking "Learn More".</p>
        <p class="yummy-details-text text-blue fw-bold position-relative text-center vw-50">REMINDER:</p>
        <p class="yummy-details-text text-blue fw-bold position-relative text-center vw-50">A reservation is mandatory to dine at participating restaurants, remember to book before you wish to dine!</p>
    </div>

    <?php
        foreach($categoryModel as $category) {
            echo "<div class='banner text-black fw-bold position-relative text-center mt-3 text-nowrap'>$category->category</div>"; } ?>

<!--         TODO: For each restaurant with the same category, echo the column to place under the category -->
    <div class="row mt-1 g-5 row-cols-3 d-flex justify-content-center">
        <div class="col">
            <img class="restaurant-card position-absolute" src="/img/png/ratatouille.png" alt="Picture of restaurant Ratatouille">
            <div class="restaurant-card bg-dark opacity-50 position-relative"></div>
            <h1 class="fw-bold position-relative bottom-50">Ratatouille</h1>
        </div>
        <div class="col">
            <img class="restaurant-card position-absolute" src="/img/png/ratatouille.png" alt="Picture of restaurant Ratatouille">
            <div class="restaurant-card bg-dark opacity-50 position-relative"></div>
            <h1 class="fw-bold position-relative bottom-50">Ratatouille</h1>
        </div>
        <div class="col">
            <img class="restaurant-card position-absolute" src="/img/png/ratatouille.png" alt="Picture of restaurant Ratatouille">
            <div class="restaurant-card bg-dark opacity-50 position-relative"></div>
            <h1 class="fw-bold position-relative bottom-50">Ratatouille</h1>
        </div>

    </div>

</div>

</body>





<?php
include __DIR__ . "/../footer.php";
?>

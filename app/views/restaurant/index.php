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
    <img class="darken" src="/img/png/food-bg.png" alt="People at a festival">
    <div class="yummy-text position-absolute top-50 start-50 px-5">Yummy!</div>
    <div class="date-text position-absolute fw-bold top-50 start-50">July 25th-28th</div>
    <div class="caption-text position-absolute fw-bold text-center vw-100 z-1">A Food Festival in Haarlem</div>

    <div class="details-bg p-4 vw-100 position-relative text-center">
        <h1 class="yummy-details text-black fw-bold vw-100">Yummy! Food Event Details</h1>
        <p class="yummy-details-text text-black vw-50 mt-2 mb-2">Come and see the participating restaurants at our very own food event at the Haarlem Festival. Featuring all sorts of different cuisines you're sure to find something you that fits your tastes! Take a quick look at each restaurant and easily find out more about any restaurant and book your very own reservation by clicking "Learn More".</p>
        <p class="yummy-details-text text-blue fw-bold vw-50">REMINDER:<br>A reservation is mandatory to dine at participating restaurants, remember to book before you wish to dine!</p>
    </div>

    <?php
        foreach($categoryModel as $category) { ?>
            <div class='category text-black fw-bold position-relative text-center mt-3'><?php echo $category->category ?></div>
        <?php } ?>

<!--         TODO: For each restaurant with the same category, echo the column to place under the category -->
    <div class="row mt-3 px-2 row-cols-3 vw-100 justify-content-center">
        <div class="card mx-5 mt-3 p-0 col-4 text-bg-dark">
            <img class="darken card-img temp" src="/img/png/ratatouille.png" alt="Picture of restaurant Ratatoutille">
            <div class="card-img-overlay d-flex flex-column p-0 mt-3">
                <h1 class="fw-bold text-center text-blue">Ratatouille</h1>
                <h6 class="content-tag mx-3 px-3 py-2 text-center">EXAMPLE | EXAMPLE | EXAMPLE</h6>
                <div class="rating fw-bold text-center">*****</div> <!-- TODO:Image of Stars here later -->
                <div class="mt-auto d-flex flex-column">
                    <h6 class="content-tag fw-bold text-center mb-3 mx-5 p-2">
                        Spaarne 96, 2011 CL Haarlem<br>
                        Time Slots Available:<br>
                        17:00 | 17:00 | 17:00</h6>
                    <button class="btn btn-outline-info px-5 mx-5 fw-bold mb-5">Learn More</button>
                </div>
            </div>
        </div>
    </div>

</div>

</body>





<?php
include __DIR__ . "/../footer.php";
?>

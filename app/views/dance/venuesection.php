<div class="col-12 content-section text-center">
    <h3 class="section-header">Venues</h3>
</div>
<div class="container my-5">
    <?php foreach ($venues as $venue) : ?>
        <!-- Use the modulus operator to add classes for odd/even items and apply background style to even items -->
        <div class="venue-section <?= ($venue->venue_id % 2 === 0) ? 'even-background row-reverse' : '' ?>">
            <div class="row align-items-center ">
                <!-- Conditionally swap order classes based on the venue ID -->
                <div class="col-lg-6 <?= ($venue->venue_id % 2 === 0) ? 'order-lg-last' : 'order-lg-first' ?>">
                    <img src="<?= $venue->venue_img_url ?>" class="venue-image img-fluid" alt="<?= $venue->name; ?>"/>
                </div>
                <div class="col-lg-6 d-flex align-items-center" style="padding-top: 30px; padding-bottom: 30px;">
                    <div class="venue-description text-center w-100">
                        <h2 style="padding-bottom: 40px"><?= $venue->name; ?></h2>
                        <p><?= $venue->description; ?></p>
                        <!-- Add additional content as needed -->
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
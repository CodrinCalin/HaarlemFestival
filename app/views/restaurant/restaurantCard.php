 <div class='category text-black fw-bold position-relative text-center mt-3 justify-items-center'><?php echo $category->category ?></div>
            <div class="row mt-3 row-cols-3 w-100 justify-content-center mb-5">
                <?php foreach($restaurantModel as $restaurant) {
                    if($restaurant->restaurantCategory == $category->category) { ?>
                        <div class="card mx-5 mt-3 p-0 col-4 text-bg-dark">
                            <img class="darken card-img img-scale" src="/img/restaurant/<?php echo $restaurant->previewImage ?>" alt="Picture of restaurant <?php echo $restaurant->name ?>">
                            <div class="card-img-overlay d-flex flex-column p-0 mt-3">
                                <h1 class="fw-bold text-center text-blue"><?php echo $restaurant->name ?></h1>
                                <h6 class="content-tag mx-3 px-3 py-2 text-center"><?php echo $restaurant->getTags() ?></h6>
                                <img class="rating align-self-center" src="/img/png/<?php echo $restaurant->rating ?>star.png" alt="<?php echo $restaurant->rating ?>star">
                                <div class="mt-auto d-flex flex-column">
                                    <h6 class="content-tag fw-bold text-center mb-3 mx-5 p-2">
                                        <?php echo $restaurant->address ?><br>
                                        Time Slots Available:<br>
                                        17:00 | 17:00 | 17:00</h6>
                                        <a href="/restaurant/details?id=<?php echo $restaurant->id ?>" class="btn btn-outline-info px-5 mx-5 fw-bold mb-5">Learn More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>


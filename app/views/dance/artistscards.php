<div class="container mt-5 sec">
    <div class="row">
        <div class="col-12 content-section text-center"> <!-- needs to be dynamic  -- introduction section -- --->
            <!-- artist cards ---------------------------------------------------------------------------------------->
            <div class="row">
                <?php foreach ($artists as $artist) : ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <a href="/aboutartist?id=<?= $artist->artist_id ?>" class="artist-card-link">
                            <img src="<?= $artist->card_image_url ?>" class="img-fluid card-image" alt="<?= $artist->name ?>>">
                            <p><?= $artist->name; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
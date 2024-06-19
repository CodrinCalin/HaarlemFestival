<?php
include __DIR__ . '/../header.php';
?>
    <link href="css/dance-style.css" rel="stylesheet">
    <main class="flex-fill">
        <!-- Background -->
        <?php require 'websitebackround.php'; ?>


        <div class="content">
            <!-- Artist Banner -->
            <div class="artist-banner-container">
                <div class="artist-banner text-center text-white text-uppercase">
                    <img src="<?= htmlspecialchars($artist->artist_main_img_url, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8') ?>" class="banner-img">
                    <h1 class="artist-name"><?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8'); ?></h1>
                </div>
            </div>

            <div class="container my-3"> 

                <!-- Artist Title -->
                <div class="col-12 content-section text-center">
                    <h3 class="section-header"><?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8') . ' : The ' . htmlspecialchars($artist->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                </div>

                <!-- Alternating layout for artist details -->
                <div >
                    <?php 
                    $content_descriptions = $detailpagecontent['contentDescriptions'];
                    $notable_tracks = $detailpagecontent['notableTracks'];
                    $isEven = false; // Flag to alternate rows

                    foreach ($content_descriptions as $description) : 
                        $isEven = !$isEven; // Toggle the flag for alternating rows
                    ?>
                        <div class="artist-section row align-items-center <?= $isEven ? 'even-background row-reverse' : '' ?>">
                            <div class="col-lg-6 <?= $isEven ? 'order-lg-last' : 'order-lg-first' ?>">
                                <img src="<?= htmlspecialchars($description->description_image, ENT_QUOTES, 'UTF-8') ?>" class="artist-image img-fluid" alt="<?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8') ?>"/>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center" style="padding-top: 30px; padding-bottom: 30px;">
                                <div class="artist-description text-center w-100">
                                    <p><?= htmlspecialchars($description->description_body, ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Notable Tracks -->
                <div>
                    <h2 class="section-header">Notable Tracks</h2>
                    <div class="row">
                        <?php foreach ($notable_tracks as $track) : 
                            $url = (strpos($track->track_url, 'http') === 0) ? $track->track_url : 'https://' . $track->track_url;
                        ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="track-card">
                                    <img src="<?= htmlspecialchars($track->track_image, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($track->track_title, ENT_QUOTES, 'UTF-8') ?>">
                                    <p><?= htmlspecialchars($track->track_title, ENT_QUOTES, 'UTF-8') ?> By <?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8') ?></p>
                                    <div class="listen-now">
                                        <a href="<?= $url ?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-spotify" viewBox="0 0 16 16">
                                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.669 11.538a.5.5 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686m.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858m.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288"/>
                                            </svg>
                                            Listen Now!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

             <!-- Artist Performance Dates -->
                <div class="container my-5">
                <h2 class="section-header">Want To See <?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8'); ?> Live?</h2>
                <div class="row">
                    <div class="col-md-12">
                        <p><?= htmlspecialchars($artist->name, ENT_QUOTES, 'UTF-8'); ?> will perform in Haarlem at the following dates and venues.</p>
                        <table class="table enevts-table">
                            <thead>
                                <tr>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $event) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($event->venue_name, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($event->time, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($event->date, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><a href="buy_ticket_link_here" class="btn btn-primary">BUY TICKET</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </main>

    <!-- Footer-->
    <?php require __DIR__ . '/../footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

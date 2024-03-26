<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Haarlem Festival Dance!</title>
    <link href="css/dance-style.css" rel="stylesheet">
</head>
<body>
<!-- Navbar  -->
    <nav class="navbar custom-navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/">
            <img src="img/png/logo.svg" width="100" height="50" alt="" loading="lazy"> <!-- from db -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/history">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Entertainment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Food</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Festival
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/dance">!DANCE</a>
                        <a class="dropdown-item" href="/yummy">YUMMY</a>
                        <a class="dropdown-item" href="/stroll">STROLL TROUGH HISTORY</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>


    <?php
    $numberOfLines = 25; // Increase for more lines

    echo '<div class="lines-container">';
    for ($i = 0; $i < $numberOfLines; $i++) {
        // Random rotation angle
        $rotation = rand(-45, 45); // Angle range -45 to 45 degrees

        // Random position for the line's starting point
        $top = rand(0, 100); // Random start position from top of the page
        $left = rand(0, 100); // Random start position from left of the page
        // Adjust the length and thickness of the lines if desired
        $length = rand(60, 100); // Random length as a percentage of viewport height
        $thickness = rand(2, 6); // Random thickness for the lines

        echo "<div class='line' style='
            transform: rotate({$rotation}deg);
            top: {$top}vh;
            left: {$left}%;
            width: {$thickness}px;
            height: {$length}vh;
        '></div>";
    }
    echo '</div>';
    ?>





    <div class="vh-100 d-flex align-items-center justify-content-center text-center bg-cover bg-center text-white text-uppercase overlay-text-container" style="background-image: url('img/danceimages/backround-picture.png');">
        <h1 class="overlay-text" style="font-size: 9vw;">Haarlem Dance</h1>
    </div>

    <div class="content">

        <div class="container my-4">
            <h1 class="main-heading">WELCOME TO THE HAARLEM FESTIVAL DANCE !</h1>

            <div class="row align-items-center">
                <!-- Left-aligned text -->
                <div class="col-md-6">
                    <h2 class="text-left">Haarlem Festival: A Sonic Journey</h2>
                </div>
                <!-- Right-aligned text -->
                <div class="col-md-6 text-right">
                    <p>Experience the heartbeat of electronic dance music at Haarlem Festival this summer! Dive into a world where the iconic DJs like Martin Garrix and Armin van Buuren ignite the city's historic venues with electrifying beats. Each space, from cozy clubs to grand stages, offers a unique vibe, setting the scene for a day-to-night adventure in sound. Join us for a festival where every note promises an unforgettable escape.</p>

                </div>
            </div>

            <div class="container mt-5 sec">
                <div class="row">
                    <div class="col-12 content-section text-center"> <!-- needs to be dynamic  -- introduction section -- --->
                        <!-- artist cards ---------------------------------------------------------------------------------------->

                        <!-- make row dynamic -->
                        <div class="row">

                            <div class="col-sm-6 col-md-4 mb-4">
                                <img src="img/danceimages/martin.png" class="img-fluid" alt="Martin Garrix">
                                <p>Martin Garrix</p>
                            </div>
                            <div class="col-sm-6 col-md-4 mb-4">
                                <div class="placeholder-image"></div>
                                <p>Hardwell</p>
                            </div>
                            <div class="col-sm-6 col-md-4 mb-4">
                                <div class="placeholder-image"></div>
                                <p>Armin Van Buuren</p>
                            </div>
                            <div class="col-sm-6 col-md-4 mb-4">
                                <div class="placeholder-image"></div>
                                <p>Nicky Romero</p>
                            </div>
                            <div class="col-sm-6 col-md-4 mb-4">
                                <div class="placeholder-image"></div>
                                <p>Nicky Romero</p>
                            </div>
                            <div class="col-sm-6 col-md-4 mb-4">
                                <div class="placeholder-image"></div>
                                <p>Nicky Romero</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <!-- Artist cards row -->
                <div class="row">
                    <!-- Artist cards will be dynamically created here from the database -->
                    <!-- Example of an artist card -->
                    <div class="col-md-4">
                        <div class="artist-card">
                            <!-- Content from the database -->
                        </div>
                    </div>
                    <!-- Repeat for other artist cards -->
                </div>
            </div>

        <!-- Timetable section ----------------------------------------------------------------------------------------------------------->

        <!-- needs to be dynamic -->

            <div class="col-12 content-section text-center section-header">
                <h2>Artists That Will Be Present & Time Table</h2>
            </div>


        <div class="container my-4">
            <?php
            $dates = array_keys($eventsByDate);
            foreach ($dates as $index => $date):
                $events = $eventsByDate[$date];
                $imgOrderClass = ($index % 2 === 0) ? 'order-md-1' : 'order-md-2';
                $tableOrderClass = ($index % 2 === 0) ? 'order-md-2' : 'order-md-1';
                $imgSrc = "img/danceimages/event-photo-" . ($index + 1) . ".png";
                ?>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-5 d-flex align-items-center justify-content-center <?= $imgOrderClass ?> img-event-container">
                        <img src="<?= $imgSrc ?>" class="img-event" alt="Event image for <?= $date ?>">
                    </div>
                    <div class="col-md-7 <?= $tableOrderClass ?>">
                        <div class="table-container">
                            <p>Events Date: <?= $date ?></p>
                            <table class="table event-table">
                                <thead>
                                <tr>
                                    <th>ARTISTS</th>
                                    <th>TIME</th>
                                    <th>PRICE</th>
                                    <th>TICKETS</th>
                                    <th>VENUE</th>
                                    <th></th> <!-- For buy button -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?= $event['artist_name'] ?></td>
                                        <td><?= $event['time'] . " (" . $event['duration'] . ")" ?></td>
                                        <td>$<?= $event['price'] ?></td>
                                        <td><?= $event['tickets_available'] ?></td>
                                        <td><?= $event['venue_name'] ?></td>
                                        <td><button class="btn btn-primary">Buy Ticket</button></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>





        <!-- Venue Section ----------------------------------------------------------------------------------------------------------->

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

    </div>




<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <img src="img/png/logo.svg" width="80%" height="80%" alt="" loading="lazy">
            </div>

            <div class="col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Home</a></li>
                    <li><a href="#" class="text-light">About</a></li>
                    <li><a href="#" class="text-light">Services</a></li>
                    <li><a href="#" class="text-light">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-3">
                <h5>Contact Info</h5>
                <p>
                    Street Address, 123<br>
                    City, Country<br>
                    Email: contact@example.com<br>
                    Phone: +123456789
                </p>
                <div style="display: inline; padding-right: 20px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </div>

                <div style="display: inline; padding-right: 20px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                </div>

                <div style="display: inline; padding-right: 20px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col text-center">
                © 2024 Haarlem Vestival 2024
            </div>
        </div>
    </div>
</footer>









<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

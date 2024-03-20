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

<!--
        <div class="container my-4">
            <?php
/*            $dates = array_keys($eventsByDate); // Assuming $eventsByDate is your events array organized by date
            foreach ($dates as $index => $date):
                $events = $eventsByDate[$date];
                $orderClass = ($index % 2 === 0) ? '' : 'order-md-last'; // For even indexes, image on left; for odd, image on right
                $imgSrc = "img/danceimages/event-photo-" . ($index + 1) . ".png"; // Construct your image path dynamically
                */?>
                <div class="row justify-content-center mb-5 <?php /*= $orderClass */?>">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="<?php /*= $imgSrc */?>" class="img-event" alt="Event image for <?php /*= $date */?>">
                    </div>
                    <div class="col-md-6 <?php /*= $orderClass === 'order-md-last' ? 'order-md-first' : '' */?>">
                        <div class="table-container">
                            <p>Events Date: <?php /*= $date */?></p>
                            <table class="table event-table">
                                <thead>
                                <tr>
                                    <th>ARTISTS</th>
                                    <th>TIME</th>
                                    <th>PRICE</th>
                                    <th>TICKETS</th>
                                    <th>VENUE</th>
                                    <th></th>  For buy button
                                </tr>
                                </thead>
                                <tbody>
                                <?php /*foreach ($events as $event): */?>
                                    <tr>
                                        <td><?php /*= $event['artist_name'] */?></td>
                                        <td><?php /*= $event['time'] . " (" . $event['duration'] . ")" */?></td>
                                        <td>$<?php /*= $event['price'] */?></td>
                                        <td><?php /*= $event['tickets_available'] */?></td>
                                        <td><?php /*= $event['venue_name'] */?></td>
                                        <td><button class="btn btn-primary">Buy Ticket</button></td>
                                    </tr>
                                <?php /*endforeach; */?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php /*endforeach; */?>
        </div>-->

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
                    <div class="col-md-6 d-flex align-items-center justify-content-center <?= $imgOrderClass ?>">
                        <img src="<?= $imgSrc ?>" class="img-event" alt="Event image for <?= $date ?>">
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center <?= $tableOrderClass ?>">
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
            <!-- Column for contact info -->
            <div class="col-md-4 mb-3">
                <img src="img/png/logo.svg" width="80%" height="80%" alt="" loading="lazy">
            </div>

            <!-- Column for quick links -->
            <div class="col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Home</a></li>
                    <li><a href="#" class="text-light">About</a></li>
                    <li><a href="#" class="text-light">Services</a></li>
                    <li><a href="#" class="text-light">Contact</a></li>
                </ul>
            </div>

            <!-- Column for newsletter signup -->
            <div class="col-md-4 mb-3">
                <h5>Contact Info</h5>
                <p>
                    Street Address, 123<br>
                    City, Country<br>
                    Email: contact@example.com<br>
                    Phone: +123456789
                </p>
                <!-- Placeholders for icons -->
                <img src="path-to-your-image" alt="Facebook Icon" class="footer-icon">
                <img src="path-to-your-image" alt="Twitter Icon" class="footer-icon">
                <img src="path-to-your-image" alt="Instagram Icon" class="footer-icon">
            </div>
        </div>

        <!-- Copyright row -->
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

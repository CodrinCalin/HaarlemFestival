<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Haarlem Festival Dance!</title>
    <link href="/css/dance-style.css" rel="stylesheet">
</head>
<body>
<!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

    <!-- Full-Screen Image with Text Overlay -->
    <div class="full-screen-image"><!-- needs to be dynamic -->
        <div class="overlay-text">
            HAARLEM DANCE
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 content-section text-center"> <!-- needs to be dynamic -->
                <h1>WELCOME TO THE HAARLEM FESTIVAL DANCE !</h1>
                <h2 style="padding-top: 50px">Haarlem Festival: A Sonic Journey</h2>
                <p>Experience the heartbeat of electronic dance music at Haarlem Festival this summer! Dive into a world where the iconic DJs like Martin Garrix and Armin van Buuren ignite the city's historic venues with electrifying beats. Each space, from cozy clubs to grand stages, offers a unique vibe, setting the scene for a day-to-night adventure in sound. Join us for a festival where every note promises an unforgettable escape.</p>
                <h3 style="padding-top: 50px">Some Of The Biggest DJs Will Be There!</h3>

                <!-- make row dynamic -->
                <div class="row">

                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="placeholder-image"></div>
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

<!-- needs to be dynamic -->

    <div class="col-12 content-section text-center">
        <h2>Artists That Will Be Present & Time Table</h2>
    </div>



<!-- image for timetable -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <!-- Column for image -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div style="height: 600px; width: 100%; max-width: 500px; background-color: lightpink;"></div>
                <img src="img/danceimages/dayonetimetable.png" class="img-fluid" alt="Timetable Image"><!--get image from db -->
                <!-- This will have the background image -->
            </div>
<!-- make this for every day, one table for each day of events -->
            <!-- Column for timetable -->
            <div class="col-md-6">
                <div class="table-container">
                    <!-- Table goes here -->
                    <p>Events Date: </p>
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
                        <!-- Repeat this for each row -->

                        <?php foreach ($events as $event) : ?>
                        <tr>
                            <td><?= $event['artist_name'] ?></td>
                            <td><?= $event['time'] . " (" . $event['duration'] .")"?></td>
                            <td>$<?= $event['price']?></td>
                            <td><?= $event['tickets_available']?></td>
                            <td><?= $event['venue_name'] ?></td>
                            <td><button class="btn btn-primary">Buy Ticket</button></td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- Add more rows as needed -->
                        <!-- ... Other rows ... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">

        <!-- Venue Section 1 -->
        <div class="venue-section">
            <div class="row">
                <div class="col-lg-6 order-2">
                    <img src="path-to-your-first-image.jpg" class="venue-image" alt="Venue Image Description">
                </div>
                <div class="col-lg-6 order-1">
                    <div class="venue-description">
                        <h2>Caprera Openluchttheater</h2>
                        <p>Description for Caprera Openluchttheater...</p>
                        <!-- Add additional content as needed -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Venue Section 2 -->
        <div class="venue-section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="venue-description">
                        <h2>Jopenkerk</h2>
                        <p>Description for Jopenkerk...</p>
                        <!-- Add additional content as needed -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>IMAGE FOR DESCRIPTION</div>
                    <img src="path-to-your-second-image.jpg" class="venue-image" alt="Venue Image Description">
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

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

    <?php require 'websitebackround.php'; ?>

    <div class="vh-100 d-flex align-items-center justify-content-center text-center bg-cover bg-center text-white text-uppercase overlay-text-container" style="background-image: url('img/danceimages/backround-picture.png');">
        <h1 class="overlay-text" style="font-size: 9vw;">Haarlem Dance</h1>
    </div>

    <div class="content">

            <?php require 'introductionhomepage.php'; ?>

           <?php require 'artistscards.php'; ?>


        <!-- Timetable section ----------------------------------------------------------------------------------------------------------->

        <!-- needs to be dynamic -->

            <?php require 'timetablesection.php'; ?>

        <!-- Venue Section ----------------------------------------------------------------------------------------------------------->

           <?php require 'venuesection.php';?>

    </div>


<!-- footer ---------------------------------------------------------------------------------------------------------->

<?php require __DIR__ . '/../footer.php'?>



<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

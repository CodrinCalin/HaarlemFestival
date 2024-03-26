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
    <?php require 'navbar.php'; ?>

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

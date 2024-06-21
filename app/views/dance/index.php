<?php
include __DIR__ . '/../header.php';
?>
    <link href="css/dance-style.css" rel="stylesheet">

    <?php require 'websitebackround.php'; ?>

    <?php foreach ($dancecontenthome as $dancecontenthome) : ?>
        <div class="vh-100 d-flex align-items-center justify-content-center text-center bg-cover bg-center text-white text-uppercase overlay-text-container" style="background-image: url('<?= $dancecontenthome->getMainImageUrl(); ?>');">
            <h1 class="overlay-text" style="font-size: 9vw;">Haarlem Dance</h1>
        </div>
    <?php endforeach; ?>

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

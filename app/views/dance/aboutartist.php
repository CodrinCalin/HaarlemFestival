<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Haarlem Festival Dance!</title>
        <link href="css/dance-style.css" rel="stylesheet">
        <link href="css/dance-style-detail.css" rel="stylesheet">

    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Navbar  -->
        <?php require 'navbar.php'; ?>
        <body>

        <!-- Main content -->
        <main class="flex-fill">
            <!-- Background -->
            <?php require 'websitebackround.php'; ?>

            <!-- Page Content -->
            <div class="artist-banner d-flex align-items-center justify-content-center text-center bg-cover bg-center text-white text-uppercase overlay-text-container"
                 style="background-image: url('<?= $detailpagecontent->main_image_url ?>');">
                <h1 class="artist-name" style="font-size: 9vw;"><?= $artist->name; ?></h1>
            </div>




            <div class="col-12 content-section text-center">
                <h3 class="section-header"><?= $artist->name . ' : The ' . $artist->title; ?></h3>
            </div>



            <div>
                <?=
                    $detailpagecontent->description_body_one;

                ?>

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


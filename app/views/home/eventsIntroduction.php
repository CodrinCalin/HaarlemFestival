<div id="dance">
    <?php
    $title = "Dance!";
    $text = $service->getContentById(2);
    $image = $service->getContentById(27);
    $href = "/dance";
    include __DIR__ . '/eventSample.php';
    ?>
</div>
<div id="yummy">
    <?php
    $title = "Yummy!";
    $text = $service->getContentById(3);
    $image = $service->getContentById(26);
    $href = "/restaurant";
    include __DIR__ . '/eventSample.php';
    ?>
</div>
<div id="history">
    <?php
    $title = "Stroll Through History";
    $text = $service->getContentById(4);
    $image = $service->getContentById(25);
    $href = "/history";
    include __DIR__ . '/eventSample.php';
    ?>
</div>
<div id="teyler">
    <?php
    $text = $service->getContentById(5);
    $image = $service->getContentById(28);
    ?>
    <div class="row">
        <div class="col-6">
            <p>Haarlem Festival App</p>
            <h1 class="header">Interactive Museum <br> Puzzles For Children</h1>
            <p><br><?=nl2br($text->text)?></p>
            <p><br>Download the app</p>
            <div id="appstore">
                <img src="\img\homepage\googleplay.png">
                <img src="\img\homepage\appstore.png">
            </div>
            <p><br>Or use your camera and scan the QR code</p>
            <img src="\img\homepage\qrcode.svg">
        </div>
        <div class="col-sm">

        </div>
        <div class="col-4">
            <img style="height: auto; max-height: 50dvw; width: auto" src="<?= $image->text ?>">
        </div>
    </div>
</div>

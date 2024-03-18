<div id="dance">
    <?php
    $title = "Dance!";
    $text = $service->getTextById(2);
    $image = "\img\homepage\dance.jpg";
    include __DIR__ . '/eventSample.php';
    ?>
</div>
<div id="yummy">
    <?php
    $title = "Yummy!";
    $text = $service->getTextById(3);
    $image = "\img\homepage\yummy.jpg";
    include __DIR__ . '/eventSample.php';
    ?>
</div>
<div id="history">
    <?php
    $title = "Stroll Through History";
    $text = $service->getTextById(4);
    $image = "\img\homepage\history.png";
    include __DIR__ . '/eventSample.php';
    ?>
</div>
<div id="teyler">
    <?php
    $text = $service->getTextById(5);
    ?>
    <div class="row">
        <div class="col-sm">
            <p>Haarlem Festival App</p>
            <h1 class="header">Interactive Museum <br> Puzzles For Children</h1>
            <p><?=nl2br($text->text)?></p>
            <p>Download the app</p>
            <div class="appstore">
                <img src="\img\homepage\googleplay.png">
                <img src="\img\homepage\appstore.png">
            </div>
            <p>Or use your camera and scan the QR code</p>
            <img src="\img\homepage\qrcode.svg">
        </div>
        <div class="col-4">
            <img src="\img\homepage\teylerapp.png">
        </div>

    </div>
</div>

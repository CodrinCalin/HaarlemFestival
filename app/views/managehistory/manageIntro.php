<?php
include __DIR__ . '/../header.php';
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehistory"><button class="backButton">< Go Back</button></a>

        <h1>Change Introduction</h1>
        <h2>Change text</h2>
        <div class="row">
            <div class="col-sm">
                <h4>
                    Current text:
                </h4>
                <?php
                $content = $service->getContentById(1);
                ?>
                <p><?= nl2br($content->content) ?></p>
            </div>
            <div class="col-sm">
                <form action="changeIntro" method="post">

                    <h4><label for="introText">New text:</label></h4><br>
                    <textarea id="introText" name="introText"> <?= nl2br($content->content) ?> </textarea>
                    <button type="submit">Change</button>
                </form>
            </div>
        </div>
    </div>
<?php
include __DIR__ . '/../footer.php';
?>
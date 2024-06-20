<?php
include __DIR__ . '/../header.php';
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehistory"><button class="backButton">< Go Back</button></a>

        <h1>Edit Introduction</h1>
        <h2>Edit text</h2>
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
                <form action="editContent?id=1&type=intro" method="post">
                    <h4><label for="newContent">New text:</label></h4><br>
                    <textarea id="newContent" name="newContent" required> <?= nl2br($content->content) ?> </textarea>
                    <button type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
<?php
include __DIR__ . '/../footer.php';
?>
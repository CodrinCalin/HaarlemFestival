<?php
include __DIR__ . '/../header.php';
?>

<?php
$content = $service->getContentById(35);
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehistory"><button class="backButton">< Go Back</button></a>

        <h1>Edit Header</h1>
        <h2>Change header image</h2>
        <div class="row">
            <div class="col-sm">
                <h4>
                    Current image:
                </h4>
                <img class="currentImage" src="<?= $content->content ?>">
            </div>
            <div class="col-sm">
                <h4>Upload new image: </h4>
                <form action="changeImage?id=35&name=history_header&path=<?= $content->content ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="image" accept="image/*" required>
                    <button class="uploadButton" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
<?php
include __DIR__ . '/../footer.php';
?>
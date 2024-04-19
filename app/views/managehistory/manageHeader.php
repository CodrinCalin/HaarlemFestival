<?php
include __DIR__ . '/../header.php';
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehistory"><button class="backButton">< Go Back</button></a>

        <h1>Change Header</h1>
        <h2>Change header image</h2>
        <div class="row">
            <div class="col-sm">
                <h4>
                    Current image:
                </h4>
                <img class="currentImage" src="\img\history\history_header.png">
            </div>
            <div class="col-sm">
                <h4>Upload new image: </h4>
                <form action="/upload" method="post">
                    <input type="file" name="image" accept="image/*">
                    <button class="uploadButton" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
<?php
include __DIR__ . '/../footer.php';
?>
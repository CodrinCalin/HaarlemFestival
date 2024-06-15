<?php
include __DIR__ . '/../header.php';
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehome"><button class="backButton">< Go Back</button></a>

        <h1>Manage in page navigation section</h1>
        <div class="manageBodyContent">
            <h2>Change 'DANCE!' image</h2>
            <div class="row">
                <div class="col-sm">
                    <h4>
                        Current image:
                    </h4>
                    <img class="currentImage" src="\img\homepage\dance_nav.png">
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
        <div class="manageBodyContent">
            <h2>Change 'Yummy!' image</h2>
            <div class="row">
                <div class="col-sm">
                    <h4>
                        Current image:
                    </h4>
                    <img class="currentImage" src="\img\homepage\yummy_nav.png">
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
        <div class="manageBodyContent">
            <h2>Change 'Stroll Through History' image</h2>
            <div class="row">
                <div class="col-sm">
                    <h4>
                        Current image:
                    </h4>
                    <img class="currentImage" src="\img\homepage\history_nav.png">
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
        <div class="manageBodyContent">
            <h2>Change 'The Secret of Professor Teyler' image</h2>
            <div class="row">
                <div class="col-sm">
                    <h4>
                        Current image:
                    </h4>
                    <img class="currentImage" src="\img\homepage\teyler_nav.png">
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
    </div>
<?php
include __DIR__ . '/../footer.php';
?>
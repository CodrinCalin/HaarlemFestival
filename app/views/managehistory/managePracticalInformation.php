<?php
include __DIR__ . '/../header.php';
?>
    <link href="/css/management_style.css" rel="stylesheet">
    <div class="mainManageBody">
        <a href="/managehistory"><button class="backButton">< Go Back</button></a>

        <h1>Edit Practical Information</h1>
        <table class="table" id="practicalInformationTable">
            <thead>
            <tr>
                <th>Image</th>
                <th>Text</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $info = $service->getPracticalInformation();
            foreach ($info as $item) { ?>
                <tr>
                    <td><img class="icon" src="<?= $item->addition ?>" alt="icon"></td>
                    <td><?= $item->content ?></td>
                    <td>
                        <!--<a href="/managehistory/editPInfo?id=<?php /*= $item->id */?>"><button>Edit Text</button></a>
                        <a href="/managehistory/editPInfo?id=<?php /*= $item->id */?>"><button>Change Image</button></a>
                        <a href="/managehistory/editPInfo?id=<?php /*= $item->id */?>"><button>Delete Card</button></a>-->
                        <button onclick="openOverlayEditText(1, '<?= htmlspecialchars($item->content, ENT_QUOTES) ?>')">Edit Text</button>
                        <button onclick="openOverlayChangeImage()">Change Image</button>
                        <button onclick="openOverlayDeleteCard()">Delete Card</button>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>
        </table>
        <button onclick="openOverlayAddInfoCard()">Add information card</button>
    </div>

<div class="overlay" id="addInfoCard">
    <div class="overlayContent">
        <h1>Add information card</h1>
        <a onclick="closeOverlayAddInfoCard()">x</a>
        <form action="addInfoCard" method="post">
            <label for="content">Text:</label><br>
            <textarea id="content" name="content"></textarea><br>
            <label for="image">Image:</label><br>
            <input type="file" name="image" accept="image/*"><br>
            <button type="submit">Add</button>
        </form>
    </div>
</div>

<div class="overlay" id="editText">
    <div class="overlayContent">
        <h1>Edit Text</h1>
        <a onclick="closeOverlayEditText()">x</a>
        <form action="editContent?id=" method="post">
            <label for="introText">New text:</label><br>
            <textarea id="introText" name="introText"></textarea>
            <button type="submit">Edit</button>
        </form>
    </div>
</div>

<script src="/js/manageHistory.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>



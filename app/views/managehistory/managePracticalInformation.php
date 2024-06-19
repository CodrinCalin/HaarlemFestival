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
            foreach ($info as $item) {
                $itemJson = htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8');
                ?>
                <tr>
                    <td><img class="icon" src="<?= $item->addition ?>" alt="icon"></td>
                    <td><?= $item->content ?></td>
                    <td>
                        <button onclick="openOverlayEditText(<?= $itemJson ?>)">Edit Text</button>
                        <button onclick="openOverlayDeleteInfoCard(<?= $itemJson ?>)">Delete Card</button>
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
        <a onclick="closeOverlayAddInfoCard()" class="close">x</a>
        <?php
        $numFaq = count($service->getPracticalInformation())
        ?>
        <form action="addInfoCard?name=faq_icon<?= $numFaq ?>" method="post" enctype="multipart/form-data">
            <label for="content">Text:</label><br>
            <textarea id="content" name="content" required></textarea><br>
            <label for="image">Image:</label><br>
            <input type="file" name="image" accept="image/*" required><br>
            <button type="submit">Add</button>
        </form>
    </div>
</div>

<div class="overlay" id="editText">
    <div class="overlayContent">
        <h1>Edit Text</h1>
        <a onclick="closeOverlayEditText()" class="close">x</a>
        <form method="post" id="editContentForm" action="editContent">
            <label for="newContent">New text:</label><br>
            <textarea id="newContent" name="newContent"></textarea>
            <button type="submit">Edit</button>
        </form>
    </div>
</div>

<div class="overlay" id="deleteInfoCard">
    <div class="overlayContent">
        <p>Are you sure you want to delete this info card?</p>
        <div id="confirmDeleteButtons">
            <a href="/managehistory/deleteInfoCard" id="confirmDeleteInfoCard"><button>Yes</button></a>
            <button onclick="closeOverlayDeleteInfoCard()">No</button>
        </div>
    </div>
</div>

<script src="/js/manageHistory.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>



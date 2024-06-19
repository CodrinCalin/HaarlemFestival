<?php
include __DIR__ . '/../header.php';
?>
<link href="/css/management_style.css" rel="stylesheet">
<div class="mainManageBody">
    <a href="/managehistory"><button class="backButton">< Go Back</button></a>

    <h1>Edit Frequently Asked Questions</h1>
    <table class="table" id="fAQTable">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $info = $service->getFAQ();
        foreach ($info as $item) {
            $itemJson = htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8');
            ?>
            <tr>
                <td><?= htmlspecialchars($item->content, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item->addition, ENT_QUOTES, 'UTF-8') ?></td>
                <td><button onclick="openOverlayFAQEdit( <?= $itemJson ?>)">Edit</button></td>
                <td><button onclick="openOverlayFAQDelete( <?= $itemJson ?>)">Delete</button></td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
    <button onclick="openOverlayAddFAQ()">Add FAQ</button>
</div>

<div class="overlay" id="addFAQ">
    <div class="overlayContent">
        <h1>Add FAQ</h1>
        <a onclick="closeOverlayAddFAQ()" class="close">x</a>
        <form action="addFAQ" method="post">
            <label for="question">Question:</label><br>
            <input type="text" id="question" name="question" required><br>
            <label for="answer">Answer:</label><br>
            <input type="text" name="answer" id="answer" required><br>
            <button type="submit">Add</button>
        </form>
    </div>
</div>

<div class="overlay" id="editFAQ">
    <div class="overlayContent">
        <h1>Edit FAQ</h1>
        <a onclick="closeOverlayFAQEdit()" class="close">x</a>
        <form method="post" action="editFAQ" id="editFAQForm">
            <label for="newQuestion">Question: </label><br>
            <input type="text" id="newQuestion" name="newQuestion" required><br>
            <label for="newAnswer">Answer: </label><br>
            <input type="text" id="newAnswer" name="newAnswer" required><br>
            <button type="submit">Confirm</button>
        </form>
    </div>
</div>

<div class="overlay" id="deleteFAQ">
    <div class="overlayContent">
        <p>Are you sure you want to delete this faq:</p>
        <p id="faqDelete"></p>
        <div id="confirmDeleteButtons">
            <a href="/managehistory/deleteFAQ" id="confirmDeleteFAQ"><button>Yes</button></a>
            <button onclick="closeOverlayFAQDelete()">No</button>
        </div>
    </div>
</div>

<script src="/js/manageHistory.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>



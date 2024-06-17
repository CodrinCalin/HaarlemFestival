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
        </tr>
        </thead>
        <tbody>
        <?php
        $info = $service->getFAQ();
        foreach ($info as $item) { ?>
            <tr>
                <td><?= $item->content ?></td>
                <td><?= $item->addition ?></td>
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
        <a onclick="closeOverlayAddFAQ()">x</a>
        <form action="addFAQ" method="post">
            <label for="question">Question:</label><br>
            <input type="text" id="question" name="question"><br>
            <label for="answer">Answer:</label><br>
            <input type="text" name="answer" id="answer"><br>
            <button type="submit">Add</button>
        </form>
    </div>
</div>

<script src="/js/manageHistory.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>



<?php
include __DIR__ . '/../header.php';
?>

<link href="/css/management_style.css" rel="stylesheet">
<div class="mainManageBody">
    <a href="/managehistory"><button class="backButton">< Go Back</button></a>
    <h1>Edit schedule</h1>
    <table class="table" id="scheduleTable">
        <thead>
        <tr>
            <th>Start time</th>
            <th>End time</th>
            <th>Language</th>
            <th>Tour guide</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $scheduleEnglish = $service->getTourByLanguage("english");
        $scheduleDutch = $service->getTourByLanguage("dutch");
        $scheduleMandarin = $service->getTourByLanguage("mandarin");

        $allSchedules = array_merge($scheduleEnglish, $scheduleDutch, $scheduleMandarin);
        foreach ($allSchedules as $item) {
            ?>
            <tr>
                <td><?= htmlspecialchars($item->startTime->format('d-m-Y H:i')) ?></td>
                <td><?= htmlspecialchars($item->endTime->format('d-m-Y H:i')) ?></td>
                <td><?= htmlspecialchars($item->language) ?></td>
                <td><?= htmlspecialchars($item->tourGuide) ?></td>
                <td><button onclick="openOverlayScheduleDelete(<?= $item->id ?>)">Delete</button></td>

            </tr>
        <?php }
        ?>
        </tbody>
    </table>
    <button onclick="openOverlayAddSchedule()">Add new tour</button>
</div>

<div class="overlay" id="deleteSchedule">
    <div class="overlayContent">
        <p>Are you sure you want to delete this tour?</p>
        <div id="confirmDeleteButtons">
            <a href="/managehistory/deleteSchedule" id="confirmDeleteSchedule"><button>Yes</button></a>
            <button onclick="closeOverlayScheduleDelete()">No</button>
        </div>
    </div>
</div>

<div class="overlay" id="addSchedule">
    <div class="overlayContent">
        <h1>Add new tour</h1>
        <a onclick="closeOverlayAddSchedule()" class="close">x</a>
        <form action="addSchedule" method="post">
            <label for="language">Language:</label><br>
            <select name="language" id="languages" required>
                <option value="english">English</option>
                <option value="dutch">Dutch</option>
                <option value="mandarin">Mandarin</option>
            </select> <br>
            <label for="guide">Tour guide:</label><br>
            <input type="text" name="guide" id="guide" required><br>
            <label for="startDate">Start Date:</label><br>
            <input type="datetime-local" id="startDate" name="startDate" required><br>
            <label for="end_date">End Date:</label><br>
            <input type="datetime-local" id="endDate" name="endDate" required><br>
            <button type="submit">Add</button>
        </form>
    </div>
</div>

<script src="/js/manageHistory.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>



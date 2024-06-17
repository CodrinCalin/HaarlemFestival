<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'English')"  id="defaultOpen">
        <img src="\img\history\english_flag.png" alt="English">
    </button>
    <button class="tablinks" onclick="openTab(event, 'Dutch')">
        <img src="\img\history\dutch_flag.png" alt="Dutch">
    </button>
    <button class="tablinks" onclick="openTab(event, 'Mandarin')">
        <img src="\img\history\chinese_flag.png" alt="Mandarin">
    </button>
</div>

<div id="English" class="tabcontent">
    <?php
    $language = "english";
    include __DIR__ . '/scheduleTab.php'
    ?>
</div>
<div id="Dutch" class="tabcontent">
    <?php
    $language = "dutch";
    include __DIR__ . '/scheduleTab.php'
    ?>
</div>
<div id="Mandarin" class="tabcontent">
    <?php
    $language = "mandarin";
    include __DIR__ . '/scheduleTab.php'
    ?>
</div>

<script src="/js/historySchedule.js"></script>
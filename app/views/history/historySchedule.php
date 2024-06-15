<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'English')"  id="defaultOpen">
        <img src="\img\history\english_flag.png">
    </button>
    <button class="tablinks" onclick="openTab(event, 'Dutch')">
        <img src="\img\history\dutch_flag.png">
    </button>
    <button class="tablinks" onclick="openTab(event, 'Mandarin')">
        <img src="\img\history\chinese_flag.png">
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

<script>
    function openTab(evt, language) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(language).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>
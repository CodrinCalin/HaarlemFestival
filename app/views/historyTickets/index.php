<?php
include __DIR__ . '/../header.php';
$img = $service->getHeaderImage();
?>

<link href="/css/history_ticket.css" rel="stylesheet">

<div id="header">
    <img src="<?= htmlspecialchars($img->content) ?>" alt="header image" id="headerImage">
    <h1>Stroll Through History Tickets</h1>
</div>
<div id="languageContainer">
    <h2><label for="language">Select A Language:</label></h2>
    <select id="language" name="language" onchange="showCalendar()">
        <option value="" disabled selected>--Select--</option>
        <option value="English">English</option>
        <option value="Dutch">Dutch</option>
        <option value="Mandarin">Mandarin</option>
    </select>
</div>
<div id="timeTicketContainer">
    <div id="dateTimes">
        <div id="englishTickets" class="hidden">
            <?php
            $language = "English";
            include __DIR__ . '/ticketSelection.php';
            ?>
        </div>
        <div id="dutchTickets" class="hidden">
            <?php
            $language = "Dutch";
            include __DIR__ . '/ticketSelection.php';
            ?>
        </div>
        <div id="mandarinTickets" class="hidden">
            <?php
            $language = "Chinese";
            include __DIR__ . '/ticketSelection.php';
            ?>
        </div>
    </div>
    <div id="ticketTypes">

    </div>
</div>

<script src="/js/historyTicket.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>

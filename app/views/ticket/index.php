<?php
include __DIR__ . '/../header.php';
?>

<div style="background: #b4cbc9">
    <div class="container">
        <h1><?php echo $ticketPageHeader; ?></h1>
        <?php include_once __DIR__. "/../component/AvailableTicketCards.php"?>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

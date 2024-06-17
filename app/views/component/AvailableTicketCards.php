<div class="row">
    <?php foreach ($model as $ticket): ?>
        <div class="col-md-4 mb-4">
            <?php include __DIR__ . '/../component/TicketCard.php'; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php
include __DIR__ . '/../header.php';
?>
<div style="background: rgba(37.19, 189.66, 255, 0.30);">
    <div class="container p-5">
        <div class="card shadow">
            <div class="card-header">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h2 class="card-title">Order Details</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold">Order Code: <?php echo htmlspecialchars($order->getUniqueCode()); ?></p>
                        <p>Order Date: <?php echo htmlspecialchars($order->getOrderDate()->format('Y-m-d H:i:s')); ?></p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php foreach ($order->getOrderItems() as $orderItem): ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($orderItem->getTicketName()); ?></h5>
                                    <h6 class="card-text">Date: <?php echo $orderItem->getDatetime()->format('Y-m-d H:i:s'); ?></h6>
                                    <p class="card-text">Quantity: <?php echo htmlspecialchars($orderItem->getQuantity()); ?></p>
                                    <p class="card-text">Price per Unit: $<?php echo number_format($orderItem->getPrice(), 2); ?></p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p class="card-text">Total: $<?php echo number_format($orderItem->getQuantity() * $orderItem->getPrice(), 2); ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card-footer">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p class="font-weight-bold">Total Order Amount:</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="font-weight-bold">$<?php echo number_format($order->getTotalAmount(), 2); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

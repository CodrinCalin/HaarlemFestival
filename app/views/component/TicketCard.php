<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h5 class="card-title"><?php echo $ticket->getType() . " - " . $ticket->getName() . " (" . $ticket->getCategory() . ")";  ?></h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            <strong>id:</strong> <?php echo $ticket->getId(); ?><br>
            <strong>Type:</strong> <?php echo $ticket->getType(); ?><br>
            <strong>Price:</strong> &#8364;<?php echo $ticket->getPrice(); ?><br>
            <strong>Location:</strong> <?php echo implode(', ', $ticket->getLocation()); ?><br>
            <strong>Duration:</strong> <?php echo $ticket->getDuration() ? $ticket->getDuration() . " minute(s)" : "Full day"; ?><br>
            <strong>Date & Time:</strong> <?php echo $ticket->getDateTime(); ?>
        </p>
    </div>
    <div class="card-footer">
        <form action="/cart/addToCart" method="post">
            <input type="hidden" name="ticket_id" value="<?php echo $ticket->getId(); ?>">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <label for="quantity_<?php echo $ticket->getId(); ?>" class="sr-only">Quantity</label>
                    <input type="number" class="form-control" id="quantity_<?php echo $ticket->getId(); ?>" name="quantity" value="1" min="1">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block" name="add_to_cart">Add to Cart</button>
                </div>
            </div>
        </form>
    </div>
</div>
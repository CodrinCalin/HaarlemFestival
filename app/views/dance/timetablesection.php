
<div class="col-12 content-section text-center section-header">
    <h2>Artists That Will Be Present & Time Table</h2>
</div>


<div class="container my-4">
    <?php
    $dates = array_keys($eventsByDate);
    foreach ($dates as $index => $date):
        $events = $eventsByDate[$date];
        $imgOrderClass = ($index % 2 === 0) ? 'order-md-1' : 'order-md-2';
        $tableOrderClass = ($index % 2 === 0) ? 'order-md-2' : 'order-md-1';
        $imgSrc = "img/danceimages/event-photo-" . ($index + 1) . ".png";
        ?>
        <div class="row justify-content-center mb-5">
            <div class="col-md-4 d-flex align-items-center justify-content-center <?= $imgOrderClass ?> img-event-container">
                <img src="<?= $imgSrc ?>" class="img-event" alt="Event image for <?= $date ?>">
            </div>
            <div class="col-md-8 <?= $tableOrderClass ?>">
                <div class="table-container">
                    <p>Events Date: <?= $date ?></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Artists</th>
                                <th>Time</th>
                                <th>Price (€)</th>
                                <th>Tickets</th>
                                <th>Venue</th>
                                <th>Quantity to Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model as $ticket) : 
                                if($ticket->getType() === "Single" && $date == $ticket->getDateTime()->format('Y-m-d')) { ?>
                                <tr>
                                    <td><?php echo implode(", " , $ticket->getArtist()); ?></td>
                                    <td><?php echo $ticket->getDateTime()->format('H:i') . ' (' . $ticket->getDuration() . ' min)'; ?></td>
                                    <td><?php echo $ticket->getPrice(); ?></td>
                                    <td><?php echo $ticket->getQuantityAvailable(); ?></td>
                                    <td><?php echo implode(', ', $ticket->getLocation()); ?></td>
                                    <td>
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
                                    </td>
                                </tr>
                            <?php } endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

 <!-- Special Tickets Section -->
 <div class="container my-4 text-right">
    <div class="content-section text-center">
        <h2>Interested In Participating To Multiple Events?</h2>
        <h2>Here are our special tickets:</h2>
        <div class="row">
        <?php foreach ($model as $ticket) : 
                if($ticket->getType() !== "Single") { ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 text-left special_ticket_card">
                        <div class="card-body">
                            <h3 class="card-title"><?= $ticket->getType(); ?></h3>
                            <p class="card-text">Access to all events <?php if($ticket->getType() !== "Full Access Pass") {  echo "on the " . $ticket->getDateTime()->format('d') . " of July"; } else { echo "for the entire festival duration."; } ?></p>
                        </div>
                        <div class="card-footer text-center">
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
                </div>
            <?php } endforeach; ?>
        </div>
    </div>
</div>
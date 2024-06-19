
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
                    <table class="table event-table">
                        <thead>
                        <tr>
                            <th>ARTISTS</th>
                            <th>TIME</th>
                            <th>PRICE</th>
                            <th>TICKETS</th>
                            <th>VENUE</th>
                            <th></th> <!-- For buy button -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?= $event['artist_name'] ?></td>
                                <td><?= $event['time'] . " (" . $event['duration'] . ")" ?></td>
                                <td>$<?= $event['price'] ?></td>
                                <td><?= $event['tickets_available'] ?></td>
                                <td><?= $event['venue_name'] ?></td>
                                <td><button class="btn btn-primary">Buy Ticket</button></td>
                            </tr>
                        <?php endforeach; ?>
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
            <?php foreach ($specialTickets as $ticket) : ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 text-left special_ticket_card">
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($ticket->ticket_name, ENT_QUOTES, 'UTF-8') ?></h3>
                            <p class="card-text"><?= htmlspecialchars($ticket->ticket_information, ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary mt-3">
                                Buy <?= htmlspecialchars($ticket->ticket_name, ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($ticket->ticket_price, ENT_QUOTES, 'UTF-8') ?>)
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
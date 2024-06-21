<?php
$dates = $service->getDates($language);
?>

<h2>Select A Date: </h2>

    <?php
    foreach ($dates as $date) {
        $times = $service->getTimes($language, $date);
        ?>

        <button onclick="getTimes(<?= $date ?>)"><?= $date ?></button>
        <div id="time<?= $date ?>">
            <?php
            foreach ($times as $time){
                $tickets = $service->getTickets($language, $date, $time);
                ?>
                <button><?= $time ?></button>
                <?php
                foreach ($tickets as $ticket) {
                    ?>
                    <div id="ticketTypeCard">
                        <form action="addTicketToCard" method="post">
                            <p><?= $ticket->getType() ?></p>
                            <p><?= $ticket->getPrice() ?></p>
                            <input type="number" id="amount" name="amount" min="0">
                            <button type="submit">Add to basket</button>
                        </form>
                    </div>
                <?php }
                ?>
            <?php }
            ?>
        </div>
    <?php }
    ?>




<div class="table-responsive">
    <table class="table table-striped pb-0 mb-0">
        <thead>
        <tr>
            <!--<th scope="col">Id</th>-->
            <th scope="col">Date Time</th>
            <th scope="col">Ticket</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Remove Ticket(s)</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $items = $cart->getItems();
        if (!empty($items)) {
            foreach ($items as $item):
                ?>
                <tr>
                   <!-- <td><?php /*echo $item['ticket']->getId(); */?></td>-->
                    <td><?php echo $item['ticket']->getDateTime()->format('Y-m-d H:i:s'); ?></td>
                    <td><?php echo $item['ticket']->getFullTicketName();  ?></td>
                    <td>$<?php echo $item['ticket']->getPrice(); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>
                        <form action="/cart/removeFromCart" method="post">
                            <input type="hidden" name="ticket_id" value="<?php echo $item['ticket']->getId(); ?>">
                            <input type="number" name="quantity" min="1" max="<?php echo $item['quantity']; ?>" value="1" class="form-control d-inline-block w-auto">
                            <button type="submit" class="btn btn-danger btn-sm" name="remove_from_cart">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php
            endforeach;
        } else {
            ?>
            <tr>
                <td colspan="5"><p class="text-center">No tickets in cart!</p></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

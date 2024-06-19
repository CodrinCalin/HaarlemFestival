<?php
$cartController = new \App\Controllers\CartController();
$items = $cartController->viewCart();
?>

<h1>Shopping Cart</h1>
<table>
    <tr>
        <th>Ticket</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['ticket']->getName(); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['ticket']->getPrice(); ?></td>
            <td>
                <form action="remove_from_cart.php" method="post">
                    <input type="hidden" name="ticket_id" value="<?php echo $item['ticket']->getId(); ?>">
                    <button type="submit">Remove</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Total: <?php echo $cartController->getTotal(); ?></p>
<?php
include __DIR__ . '/../header.php';
$cart = \App\lib\CartManager::getCart();

$cartIsEmpty = empty($cart->getItems());
?>
<script src="/js/shoppingCartDisplaySwitch.js"></script>

<div class="p-4" style="background: rgba(37.19, 189.66, 255, 0.30);">
    <div class="container">
        <div class="row">
            <!-- Ticket Display (Left Side) -->
            <div class="col-md-9">
                <h1>Shopping Cart</h1>
                <div class="p-2" style="background: #464646">
                    <ul class="list-unstyled d-flex m-0">
                        <li class="me-3"><button id="listButton" class="btn btn-outline-light">List</button></li>
                        <li><button id="agendaButton" class="btn btn-outline-light">Agenda</button></li>
                    </ul>
                </div>
                <div id="shoppingCartList">
                    <?php include_once __DIR__ . "/../component/ShoppingCartList.php"?>
                </div>
                <div id="shoppingCartAgenda" class="d-none">
                    <?php include_once __DIR__ . "/../component/ShoppingCartAgenda.php"?>
                </div>
                <?php if(!$cartIsEmpty){ ?>
                    <div class="p-2" style="background: #464646">
                        <a href="/cart/clearCart" class="btn btn-danger">Clear Cart</a>
                    </div>
                <?php
                }
                ?>
            </div>

            <!-- Aside Display (Right Side) -->
            <aside class="col-md-3">
                <div class="card border-0 mt-4 mb-4"  style="background: #b8c5cc">
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: 32px; font-family: K2D; font-weight: 500; text-transform: capitalize;">Legend</h2>
                        <div class="row mt-3">
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="legend-item bg-success" style="width: 26px; height: 26px;"></div>
                                    <span class="ms-2" style="font-size: 20px; font-family: Montserrat; font-weight: 400;">Yummy!</span>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="legend-item bg-danger" style="width: 26px; height: 26px;"></div>
                                    <span class="ms-2" style="font-size: 20px; font-family: Montserrat; font-weight: 400;">Dance!</span>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="legend-item bg-warning" style="width: 26px; height: 26px;"></div>
                                    <span class="ms-2" style="font-size: 20px; font-family: Montserrat; font-weight: 400;">History</span>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="legend-item bg-primary" style="width: 26px; height: 26px;"></div>
                                    <span class="ms-2" style="font-size: 20px; font-family: Montserrat; font-weight: 400;">Jazz</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Placeholder for future content -->
                <div class="card border-0 mt-4 mb-4" style="background: #343a40;">
                    <div class="card-body text-center text-white">
                        <h3 class="card-title">Total Amount</h3>
                        <?php if (!$cartIsEmpty): ?>
                            <?php
                            // Assuming $totalPrice is calculated somewhere in your PHP code
                            $totalPrice = $cart->getTotal();
                            ?>
                            <h4>€ <?php echo number_format($totalPrice, 2); ?></h4>
                            <a href="/payment/checkout" class="btn btn-primary btn-lg mt-3">Proceed to Payment</a>
                        <?php else: ?>
                            <p>Your cart is empty. Add tickets to proceed to payment.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>

            <!-- Ticket Display (Left Side) -->
            <div class="col-md-9">
                <h1>Tickets</h1>
                <?php include_once __DIR__. "/../component/AvailableTicketCards.php"?>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

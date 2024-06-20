<?php
require __DIR__ . "/../../vendor/autoload.php";
include __DIR__ . '/../header.php';
?>

<div class="container m-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h2>Payment Successful</h2>
                </div>
                <div class="card-body">
                    <h4>Thank you for your purchase!</h4>
                    <p>Your order has been successfully processed. You will receive an email with the order details shortly.</p>
                    <p>If you have any questions or need further assistance, please contact our support team.</p>
                    <a href="/" class="btn btn-primary mt-3">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
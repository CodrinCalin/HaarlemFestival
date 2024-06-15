<?php
include __DIR__ . '/../header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="formContainers">
            <div style="text-align: center">
                <h2>Reset Password by Email</h2>
            </div>
            <div class="formContent">
                <form action="forgot_password" method="post">
                    <div class="form-group inputField">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <input type="submit" name="password-reset-token" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
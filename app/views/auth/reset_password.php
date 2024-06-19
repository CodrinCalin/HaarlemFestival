<?php
include __DIR__ . '/../header.php';
?>

<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card" style="background: darkgrey; padding: 20px; border-radius: 25px;">
            <div class="card-header text-center">
                <h2>Reset Password</h2>
                <p><span class="required">*</span> - fields are required to fill.</p>
            </div>
            <div class="card-body">
                <form action="reset_password" method="post">
                    <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($token); ?>">
                    <div class="form-group">
                        <label for="inputPassword">Password<span class="required">*</span></label>
                        <input type="password"
                               class="form-control" id="inputPassword" name="password"
                               placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordConfirm">Confirm Password<span class="required">*</span></label>
                        <input type="password"
                               class="form-control" id="inputPasswordConfirm" name="passwordConfirm"
                               placeholder="Confirm new password" required>
                    </div>
                    <button type="submit" name="password-reset" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

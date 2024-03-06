<?php
include __DIR__ . '/../header.php';
?>

<div style="background: darkgrey; padding: 20px; border-radius: 25px;">
    <h1>Log in</h1>
    <p><span class="required">*</span> - fields are required to fill.</p>
    <form action="auth/login" method="post">
        <div class="row">
            <h3>Identity</h3>
            <div class="form-group col-4">
                <label for="inputUsername">Username<span class="required">*</span></label>
                <input type="text"
                       class="form-control" id="inputUsername" name="username"
                       placeholder="Username">
            </div>
        </div>
        <div class="row">
            <h3>Password</h3>
            <div class="form-group col-4">
                <label for="inputPassword">Password<span class="required">*</span></label>
                <input type="password"
                       class="form-control" id="inputPassword" name="password"
                       placeholder="..." required>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="col-3 btn btn-success">Log in</button>
        </div>
        <div>
            <p>
                Forgot password? ->
                <a href="/auth/changePassword">Change Password</a>
            </p>
            <p>
                Don't have an account? ->
                <a href="/auth/register">Register</a>
            </p>
        </div>
    </form>
</div>

<div>

</div>

<?php
include __DIR__ . '/../footer.php';
?>

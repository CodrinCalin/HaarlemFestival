<?php
include __DIR__ . '/../header.php';
?>
    <div style="background: darkgrey; padding: 20px; border-radius: 25px;">
        <h1>Register</h1>
        <p><span class="required">*</span> - fields are required to fill.</p>
        <form action="register" method="post">
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
                <h3>Personal Information</h3>
                <div class="form-group col-5">
                    <label for="inputEmail">Email address<span class="required">*</span></label>
                    <input type="email"
                           class="form-control" id="inputEmail" name="email"
                           aria-describedby="emailHelp" placeholder="johndoe@gmail.com">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
                <div class="form-group col-4">
                    <label for="inputPasswordConfirm">Confirm Password<span class="required">*</span></label>
                    <input type="password"
                           class="form-control" id="inputPasswordConfirm" name="passwordConfirm"
                           placeholder="..." required>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="col-3 btn btn-success">Register</button>
            </div>
            <div>
                <p>
                    Have an account? ->
                    <a href="/auth">Log in</a>
                </p>
            </div>
        </form>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>
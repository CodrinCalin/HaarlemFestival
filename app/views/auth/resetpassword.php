<div style="background: darkgrey; padding: 20px; border-radius: 25px;" class="col-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Reset Password by Email</h2>
            <p><span class="required">*</span> - fields are required to fill.</p>
        </div>
        <div class="card-body">
            <form action="resetPassword" method="post">
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
                <input type="submit" name="password-reset" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
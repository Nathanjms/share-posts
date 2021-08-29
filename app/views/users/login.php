<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create an account</h2>
            <p>Please fill in your credentials to log in</p>
            <form action="<?= URLROUTE; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>

                <div class="col-lg-12 row gap-2 mx-auto mt-3">
                    <input type="submit" value="Login" class="btn btn-success">
                    <a class="btn btn-light" href="<?= URLROUTE; ?>/users/register">No Account? Register here!</a>
                </div>
            </form>
        </div>
    </div>
</div>
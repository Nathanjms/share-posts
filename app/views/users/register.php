<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create an account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?= URLROUTE; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" id="name" value="<?= $data['name']; ?>" class="form-control form-control-lg <?= (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['name_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" value="<?= $data['email']; ?>" class="form-control form-control-lg <?= (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['email_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg <?= (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['password_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg <?= (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['confirm_password_error']; ?></span>
                </div>

                <div class="col-lg-12 row gap-2 mx-auto mt-3">
                    <input type="submit" value="Register" class="btn btn-success">
                    <a class="btn btn-light" href="<?= URLROUTE; ?>/users/login">Have an Account? Log In</a>
                </div>
            </form>
        </div>
    </div>
</div>
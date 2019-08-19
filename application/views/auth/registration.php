<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="number" name="number" placeholder="Mobile Number" value="<?= set_value('number') ?>">
                                <?= form_error('number', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="fname" name="fname" placeholder="First Name" value="<?= set_value('fname') ?>">
                                <?= form_error('fname', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="lname" name="lname" placeholder="Last Name" value="<?= set_value('lname') ?>">
                                <?= form_error('lname', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="date" name="date" placeholder="Date Of Birth" value="<?= set_value('date') ?>">
                                <?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-check-inline">
                                <label class="form-check-label" for="radio1">
                                    <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" <?= set_radio('gender', 'Male', true); ?> checked>Male
                                </label>
                            </div>
                            <div class="form-group form-check-inline">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" <?= set_radio('gender', 'Female'); ?>>Female
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Register Account
                    </button>
                    <hr>
                    </form>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url() ?>auth">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
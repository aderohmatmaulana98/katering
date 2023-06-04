<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <?= $this->session->flashdata('message');  ?>
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center">
                            <img src="<?= base_url('assets/images/logo.png') ?>" alt="logo">
                        </div>
                        <h4>Hallo! Selamat datang di my catering</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form action="<?= base_url('auth/index') ?>" method="post" class="pt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    id="username">
                            </div>
                            <div class="mb-3">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="mb-3">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    type="submit">SIGN IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">

                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
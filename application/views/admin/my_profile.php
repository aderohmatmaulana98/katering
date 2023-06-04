<!-- partial -->
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="mt-2">
            <?= $this->session->flashdata('message');  ?>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h3 class="m-0"><?= $title; ?></h3>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>:</td>
                                        <td><?= $user->full_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>:</td>
                                        <td><?= $user->username ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td><?= $user->jenis_kelamin ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor HP</th>
                                        <td>:</td>
                                        <td><?= $user->no_hp; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><?= $user->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td><?= $user->alamat; ?></td>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
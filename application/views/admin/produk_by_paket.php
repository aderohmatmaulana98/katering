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
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($produk_by_paket as $p) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $p->nama_produk; ?></td>
                                        <td><img src="<?php echo json_decode($p->gambar); ?>" width="100" height="100">
                                        </td>
                                    </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?= base_url('admin/paket') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
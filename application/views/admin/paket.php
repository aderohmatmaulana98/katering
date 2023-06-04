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
						<div class="mb-3">
							<button type="button" class="btn btn-primary" data-toggle="modal"
								data-target="#exampleModal">
								Tambah
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
								aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Paket </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('admin/insert_paket') ?>" method="POST">
												<div class="form-group">
													<label for="namaPaket">Nama Paket</label>
													<input type="text" class="form-control" id="namaPaket"
														name="namaPaket" required>
												</div>
												<div class="form-group">
													<label for="harga">Harga</label>
													<input type="number" class="form-control" id="harga" name="harga"
														required>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"
												data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table align-middle">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Paket</th>
										<th>Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
                                    foreach ($paket as $p) : ?>
									<tr>
										<td><?= $no; ?></td>
										<td><a
												href="<?= base_url('admin/produk_by_paket/') . $p->id ?>"><?= $p->nama_paket; ?></a>
										</td>
										<td><?= $p->harga;  ?></td>
										<td>
											<a href="#" type="button" data-toggle="modal"
												data-target="#exampleModal1<?= $p->id; ?>"><span
													class="badge badge-pill badge-success">Edit</span></a>

											<!-- Modal -->
											<div class="modal fade" id="exampleModal1<?= $p->id; ?>" tabindex="-1"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Edit Paket
															</h5>
															<button type="button" class="close" data-dismiss="modal"
																aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url('admin/update_paket') ?>"
																method="POST"
																enctype="application/x-www-form-urlencoded">
																<div class="form-group">
																	<label for="nama_paket">Nama paket</label>
																	<input type="text" class="form-control"
																		id="nama_paket" name="namaPaket"
																		value="<?= $p->nama_paket ?>" required>
																	<input type="text" class="form-control" id="id"
																		name="id" value="<?= $p->id ?>" hidden required>
																</div>
																<div class="form-group">
																	<label for="harga">Harga</label>
																	<input type="number" class="form-control" id="harga"
																		name="harga" value="<?= $p->harga ?>" required>
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary"
																data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Save
																changes</button>
														</div>
														</form>
													</div>
												</div>
											</div>
											<a href="<?= base_url('admin/delete_paket/' . $p->id); ?>"
												onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')"><span
													class="badge badge-pill badge-danger">Hapus</span></a>
										</td>
									</tr>
									<?php $no++;
                                    endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

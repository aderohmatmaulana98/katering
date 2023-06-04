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
										<th>Nama Pemesan</th>
										<th>Paket</th>
										<th>Harga</th>
										<th>Tanggal Pesan</th>
										<th>Status Pemesanan</th>
										<th>Status Pembayaran</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
                                    foreach ($pemesanan as $p) : ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $p->full_name; ?></td>
										<td><?= $p->nama_paket;  ?></td>
										<td><?= $p->harga; ?></td>
										<td><?= $p->created_at; ?></td>
										<td><?= $p->nama_status; ?></td>
										<td><?= $p->pembayaran; ?></td>
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
															<h5 class="modal-title" id="exampleModalLabel">Edit
																Status Pemesanan
															</h5>
															<button type="button" class="close" data-dismiss="modal"
																aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form
																action="<?= base_url("admin/update_status_pemesanan/$p->id") ?>"
																method="POST" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="nama_status">Status Pemesanan</label>
																	<select class="form-select form-control"
																		aria-label="Status Pemesanan" name="nama_status"
																		required>
																		<option value="" disabled selected>Pilih Status
																		</option>
																		<?php foreach($status as $s): ?>
																		<option
																			<?= ($s->id == $p->id_status_pemesanan) ? 'selected' : '' ?>
																			value="<?= $s->id ?>">
																			<?= $s->nama_status ?></option>
																		<?php endforeach; ?>
																	</select>
																	<input type="text" class="form-control" id="id"
																		name="id" value="<?= $p->id ?>" required hidden>
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
											<a href="<?= base_url('admin/delete_pemesanan/' . $p->id); ?>"
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
